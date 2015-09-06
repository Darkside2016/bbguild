<?php
/**
 * abstract class aGameInstall
 *
 * @link http://www.bbdkp.com
 * @author Sajaki@gmail.com
 * @copyright 2013 bbdkp
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version 1.4.1
 */
namespace bbdkp\controller\games;
use bbdkp\controller\games;
/**
 * @ignore
 */
if (! defined('IN_PHPBB'))
{
	exit();
}
include($phpbb_root_path . 'umil/umil.' . $phpEx);
/**
 * Game interface
 * this abstract class is the framework for all game installers
 *
 */
abstract class GameInstall
{

    protected $game_id;
    protected $bossbaseurl;
    protected $zonebaseurl;

    private $gamename;

    /**
     * @return string
     */
    public final function getBossbaseurl()
    {
        return $this->bossbaseurl;
    }

    /**
     * @return string
     */
    public final function getZonebaseurl()
    {
        return $this->zonebaseurl;
    }

    /**
	 * Install a game
     * can be implemented, this is the default install
	 */
    public final function Install($game_id, $gamename, $bossbaseurl, $zonebaseurl)
	{
		global $cache, $db;
		$this->game_id = $game_id;
		$this->gamename = $gamename;
        $this->bossbaseurl = $bossbaseurl;
        $this->zonebaseurl = $zonebaseurl;

		$db->sql_transaction ( 'begin' );
		$this->Installfactions();
		$this->InstallClasses();
		$this->InstallRaces();
		$this->InstallEventGroup();
        $this->InstallRoles();

		//insert a new entry in the game table
		$data = array (
				'game_id' => $this->game_id,
				'game_name' => $this->gamename,
				'imagename' => $this->game_id,
				'armory_enabled' => ($this->game_id == 'wow' ? 1 : 0),
                'bossbaseurl' => $this->bossbaseurl,
                'zonebaseurl' => $this->zonebaseurl ,
				'status' => 1
		);

		$sql = 'INSERT INTO ' . BBGAMES_TABLE . ' ' . $db->sql_build_array ( 'INSERT', $data );
		$db->sql_query ( $sql );

		$db->sql_transaction ( 'commit' );
        $cache->destroy( 'sql', BBGAMES_TABLE );
        $cache->destroy( 'sql', CLASS_TABLE );
        $cache->destroy( 'sql', BB_LANGUAGE );
        $cache->destroy( 'sql', RACE_TABLE );
        $cache->destroy( 'sql', DKPSYS_TABLE );
        $cache->destroy( 'sql', EVENTS_TABLE );
        $cache->destroy( 'sql', MEMBER_LIST_TABLE );
        $cache->destroy( 'sql', BB_GAMEROLE_TABLE );

	}


    /**
     * Uninstall a game
     * @param $game_id
     * @param $gamename
     */
    Public final function Uninstall($game_id, $gamename)
    {
        global $cache, $db;
        $this->game_id = $game_id;
        $this->gamename = $gamename;

        $db->sql_transaction('begin');

        $factions = new \bbdkp\controller\games\Faction();
        $factions->game_id = $this->game_id;
        $factions->Delete_all_factions();

        $races = new \bbdkp\controller\games\Races();
        $races->game_id = $this->game_id;
        $races->Delete_all_races();

        $classes = new \bbdkp\controller\games\Classes();
        $classes->game_id = $this->game_id;
        $classes->Delete_all_classes();

        $roles = new \bbdkp\controller\games\Roles();
        $roles->game_id = $this->game_id;
        $roles->Delete_all_roles();

        $sql = 'DELETE FROM ' . BBGAMES_TABLE . " WHERE game_id = '" .   $this->game_id . "'";
        $db->sql_query ($sql);

        $db->sql_transaction ( 'commit' );

        $cache->destroy( 'sql', BBGAMES_TABLE );
        $cache->destroy( 'sql', CLASS_TABLE );
        $cache->destroy( 'sql', BB_LANGUAGE );
        $cache->destroy( 'sql', RACE_TABLE );
        $cache->destroy( 'sql', DKPSYS_TABLE );
        $cache->destroy( 'sql', EVENTS_TABLE );
        $cache->destroy( 'sql', MEMBER_LIST_TABLE );
    }



	/**
	 * Installs factions
	 * must be implemented
	 */
    abstract protected function Installfactions();

	/**
	 * Installs game classes
	 * must be implemented
	*/
    abstract protected function InstallClasses();

	/**
	 * Installs races
	 * must be implemented
	*/
    abstract protected function InstallRaces();

	/**
	 * Install sample Event Groups
	 * an Event answers the 'what' question
     * must be implemented
	 */
    abstract protected function InstallEventGroup();

    /**
     * Install sample roles
     * must be implemented
     */
    abstract protected function InstallRoles();
}

?>