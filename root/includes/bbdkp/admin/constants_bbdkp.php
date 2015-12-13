<?php
/**
 * Constants used by bbDKP
 * @link http://www.bbdkp.com
 * @author Sajaki@gmail.com
 * @copyright 2009 bbdkp
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version 1.4.1
 */
namespace bbdkp\admin
{
	global $table_prefix;
	/**
	 * @ignore
	 */
	if (!defined('IN_PHPBB'))
	{
		exit;
	}

	define('BBDKP_VERSIONURL', 'https://raw.githubusercontent.com/bbDKP/bbDKP/master/contrib/versions/');
	define('BBDKP_PLUGINURL' , 'https://www.bbdkp.com/downloads.php?cat=2" target="_blank');

	//BBDKP
	define('URI_ADJUSTMENT', 'adj');
	define('URI_DKPSYS',     'dkpsys_id');
	define('URI_EVENT',      'event_id');
	define('URI_ITEM',       'item_id');
	define('URI_LOG',        'log');
	define('URI_NAME',       'name');
	define('URI_NAMEID',     'member_id');
	define('URI_NEWS',       'news');
	define('URI_ORDER',      'o');
	define('URI_PAGE',       'pag');
	define('URI_RAID',       'raid_id');
	define('URI_GUILD',      'guild_id');
	define('URI_GAME',       'game_id');
	define('USER_LLIMIT', 40);  // LOG LIMIT

	// TABLE DEFINITIONS
	define('BBGAMES_TABLE',        	   $table_prefix . 'bbdkp_games');
	define('GAMES_TABLE',        	   $table_prefix . 'bbdkp_games');	// deprecated as of 1.4.1
	define('NEWS_TABLE',        	   $table_prefix . 'bbdkp_news');
	define('ADJUSTMENTS_TABLE',        $table_prefix . 'bbdkp_adjustments');
	define('EVENTS_TABLE',             $table_prefix . 'bbdkp_events');	 // deprecated as of 1.4.1
	define('BBEVENTS_TABLE',           $table_prefix . 'bbdkp_events');
	define('RAID_ITEMS_TABLE',         $table_prefix . 'bbdkp_raid_items');
	define('LOGS_TABLE',               $table_prefix . 'bbdkp_logs');	// deprecated as of 1.4.1
	define('BBLOGS_TABLE',             $table_prefix . 'bbdkp_logs');
	define('MEMBER_RANKS_TABLE',       $table_prefix . 'bbdkp_member_ranks');
	define('MEMBER_LIST_TABLE',        $table_prefix . 'bbdkp_memberlist');
	define('MEMBER_DKP_TABLE',         $table_prefix . 'bbdkp_memberdkp');
	define('RAID_DETAIL_TABLE',        $table_prefix . 'bbdkp_raid_detail');
	define('RAIDS_TABLE',              $table_prefix . 'bbdkp_raids');
	define('CLASS_TABLE',              $table_prefix . 'bbdkp_classes');
	define('RACE_TABLE',               $table_prefix . 'bbdkp_races');
	define('FACTION_TABLE',            $table_prefix . 'bbdkp_factions');
	define('DKPSYS_TABLE',     		   $table_prefix . 'bbdkp_dkpsystem');
	define('BBDKPPLUGINS_TABLE',	   $table_prefix . 'bbdkp_plugins');
	define('GUILD_TABLE',	           $table_prefix . 'bbdkp_memberguild');
	define('LOOTSYS_TABLE',	           $table_prefix . 'bbdkp_lootsystem');
	define('BB_LANGUAGE',	           $table_prefix . 'bbdkp_language');
	define('BOSSBASE',          	   $table_prefix . 'bbdkp_bosstable');
	define('ZONEBASE',         		   $table_prefix . 'bbdkp_zonetable');
	define('WELCOME_MSG_TABLE',        $table_prefix . 'bbdkp_welcomemsg');
	define('BBDKP_ROLES_TABLE',        $table_prefix . 'bbdkp_roles');      // deprecated as of 1.4.1
    define('GUILD_BOSS',               $table_prefix . 'bbdkp_guildboss');
    define('BBRECRUIT_TABLE',          $table_prefix . 'bbdkp_recruit');  //new in 1.4.1
    define('BB_GAMEROLE_TABLE',        $table_prefix . 'bbdkp_gameroles');  //new in 1.4.1

	// plugin anchors

	// RAIDTRACKER

	// BBTIPS

	// RAIDPLANNER
define('RP_RAIDS_TABLE',		$table_prefix . 'rp_raids');
define('RP_RECURRING',		$table_prefix . 'rp_recurring');
define('RP_SIGNUPS',		$table_prefix . 'rp_signups');
define('RP_RAIDPLAN_WATCH',	$table_prefix . 'rp_raidplans_watch'); //deprecated
define('RP_WATCH',			$table_prefix . 'rp_watch');  //deprecated
define('RP_RAIDPLAN_ROLES',		$table_prefix . 'rp_raidplanroles');
define('RP_RAIDPLAN_ANNOUNCEMENT',		$table_prefix . 'rp_announcement');
define('RP_TEAMS',		$table_prefix . 'rp_teams');
define('RP_TEAMSIZE',		$table_prefix . 'rp_teamsizes');

	// APPLY
}