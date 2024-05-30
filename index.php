<?php
/*
= LuxCal event calendar index =

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.

The LuxCal Web Calendar is free software: you can redistribute it and/or modify it under 
the terms of the GNU General Public License as published by the Free Software Foundation, 
either version 3 of the License, or (at your option) any later version.

The LuxCal Web Calendar is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with the LuxCal 
Web Calendar. If not, see <http://www.gnu.org/licenses/>.
*/

//sanity check
if (
	(isset($_REQUEST['cP']) and !preg_match('%^\d{1,2}$%', $_REQUEST['cP'])) or
	(isset($_POST['cL']) and !preg_match('%^[a-zA-Z]{1,12}$%', $_POST['cL'])) or
	(isset($_POST['cU']) and !is_array($_POST['cU'])) or
	(isset($_POST['cC']) and !is_array($_POST['cC'])) or
	(isset($_GET['cD']) and !preg_match('%^\d{4}-\d{2}-\d{2}$%', $_GET['cD'])) or
	(isset($_POST['newD']) and !preg_match('%^\d{2,4}.\d{2}.\d{2,4}$%', $_POST['newD'])) or
	(isset($_GET['hdr']) and !preg_match('%^(0|1)$%', $_GET['hdr']))
	) { exit('not permitted (indx)'); }

if (!file_exists("config.php")) { header("Location: install.php"); exit(); } //run install script

//set error reporting
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE); //errors, no warnings, AW 2019, because of PHP7.2
//error_reporting(E_ALL ^ E_NOTICE); //errors, no notices
//error_reporting(E_ALL); //errors and notices - test line
ini_set('display_errors',1);
 
//Current LuxCal version / maintenance suffix
define("LCV","2.5.3"); define("LCM","");

//proxies: don't cache
header("Cache-control: private");
header("P3P:CP=”IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT");

//start session
session_set_cookie_params(3600);
session_start();

//after login (bake = set) bake or eat cookie
if (isset($_REQUEST['bake'])) {
	setcookie('luxcal', serialize(array($_SESSION['uid'], $_SESSION['cL'])), time()+(2600000*$_REQUEST['bake'])); //expire in 1 month
}

//if no session try cookie
if (empty($_SESSION['uid']) and isset($_COOKIE['luxcal'])) {
  list($_SESSION['uid'],$_SESSION['cL']) = @unserialize(str_replace('\\','',($_COOKIE['luxcal']))); 
	setcookie('luxcal', serialize(array($_SESSION['uid'], $_SESSION['cL'])), time()+2600000); //update time
}

//emulate register_globals off (deprecated as off PHP 5.3)
if (ini_get('register_globals')) {
	if (isset($_REQUEST['GLOBALS']) || isset($_FILES['GLOBALS'])) { die('GLOBALS overwrite attempt detected'); }
	$noUnset = array('GLOBALS','_GET','_POST','_COOKIE','_REQUEST','_SERVER','_ENV','_FILES'); //Variables that shouldn't be unset
	$input = array_merge($_GET,$_POST,$_COOKIE,$_SERVER,$_ENV,$_FILES,$_SESSION);
	foreach ($input as $k => $v) {
		if (!in_array($k,$noUnset) and isset($GLOBALS[$k])) { unset($GLOBALS[$k]); }
	}
}

//get config and tools
require './config.php';
require './common/toolbox.php';
require './common/dbbox.php';
require './common/retrieve.php';

//set time zone
date_default_timezone_set($timeZone);

// check cookies enabled
// check_compatibility();  disabled, observe if everything is running

//set language
if (isset($_POST["cL"])) { $_SESSION['cL'] = $_POST['cL']; }
elseif (empty($_SESSION['cL'])) { $_SESSION['cL'] = $language; }
if (!file_exists('lang/ui-'.strtolower($_SESSION['cL']).'.php')) { $_SESSION['cL'] = 'English'; }
require './lang/ui-'.strtolower($_SESSION['cL']).'.php';

//check if Site on maintenance
if ($maintenance_ongoing == TRUE) {
	require('maintenance.php');
	exit();
}

// check if coming from internal wvf site or password already set
 //if (!isset($_COOKIE['is_wvf_internal']))
// {
//		check_WvfPass();
//}
//else {
//	if ($_COOKIE['is_wvf_internal'] != "yes")
//		check_WvfPass();
//}

//establish database connection
$link = mysqli_connect($hn, $un, $pw) or die ("Could not connect to database (server=".$hn." user=".$un." pass=".$pw.", check database credentials in config.php");
if (!mysqli_select_db($link,$db)) die ("Could not select database $db");
//mysqliset_charset('utf8',$link); //support non-Latin char sets

//run upgrade if config.php not current
if (!defined('LCC') or LCC < LCV) { require './upgrade'.str_replace('.','',LCV).'.php'; }

//check for mobile browsers
$mobile = isMobile();
//$mobile = true; // for testing

//get user data & set privs
if (empty($_SESSION['uid'])) { $_SESSION['uid'] = 1; } //public user
while (true) {
	$rSet = dbquery("SELECT user_name, email, firstname, familyname, sedit, privs, language FROM [db]users WHERE user_id = {$_SESSION['uid']}");
	if ($row = mysqli_fetch_assoc($rSet)) { //user id found
		$uname = $row["user_name"];
		$umail = $row["email"];
		$privs = $row["privs"];
		$ufullname = $row['firstname'].' '.$row['familyname'];
		$admin = ($row["sedit"]) ? 1 : 0;
		break;
	} else {
		$_SESSION['uid'] = 1; //public user
	}
}
$amail = getAdminEmail();

if ($_SESSION['uid'] == 1) { $uname = $xx['idx_public_name']; }

//page definitions
$pages = array (
	 "1" => array ("views/year.php", "", "L", ""), //page, special attributes (in PHP fomat), header size, page title
	 "2" => array ("views/month.php", "", "L", ""),
	 "3" => array ("views/week.php", "", "L", ""),
	 "4" => array ("views/day.php", "", "L", ""),
	 "5" => array ("views/upcoming.php", "", "L", $xx['title_upcoming']),
	 "6" => array ("views/changes.php", "", "L", $xx['title_changes']),
	 "7" => array ("views/highscore.php", "", "L", 'Highscore'),

	"10" => array ("pages/event.php", '$_GET["mode"] = "add";', "S", $xx['title_add_event']),
	"11" => array ("pages/event.php", '$_GET["mode"] = "show";', "S", $xx['title_event_details']),
	"12" => array ("pages/event.php", '$_GET["mode"] = "edit";', "S", $xx['title_edit_event']),
	"13" => array ("pages/event.php", '$_GET["mode"] = "showMini";', "S", $xx['title_event_details']),

	"20" => array ("pages/login.php", "", "L", ""),
	"21" => array ("doc/VvfCal_UserManual.pdf", "", "S", $xx["title_user_guide"]),

	"90" => array ("pages/settings.php", "", "L", $xx['title_settings']),
	"91" => array ("pages/resources.php", "", "L", $xx['title_edit_ress']),
	"92" => array ("pages/categories.php", "", "L", $xx['title_edit_cat']),
	"93" => array ("pages/users.php", "", "L", $xx['title_edit_users']),
	"94" => array ("pages/database.php", "", "L", $xx['title_manage_db']),
	"95" => array ("pages/importICS.php", "", "L", $xx['title_ics_import']),
	"96" => array ("pages/exportICS.php", "", "L", $xx['title_ics_export']),
	"97" => array ("pages/importCSV.php", "", "L", $xx['title_csv_import']),
	"98" => array ("pages/emailform.php", "", "S", $xx['title_eml_form']),
	"99" => array ("pages/briefing.php", "", "L", $xx['title_edit_brf'])
);

//set header (nav bar) display
if (isset($_GET['hdr'])) { $_SESSION['hdr'] = $_GET['hdr']; }
elseif (!isset($_SESSION['hdr'])) { $_SESSION['hdr'] = 1; }

//set current page
if (isset($_REQUEST['cP'])) { $_SESSION['cP'] = $_REQUEST['cP']; }
if (empty($_SESSION['cP'])) { $_SESSION['cP'] = $defaultView; }
elseif (!array_key_exists($_SESSION['cP'], $pages) or $pages[$_SESSION['cP']][2] == "S") { $_SESSION['cP'] = $defaultView; }
$cP = (isset($_GET['xP'])) ? $_GET['xP'] : $_SESSION['cP']; //$xP: extra page in separate window

//set user filter
if (isset($_POST['cU'])) { $_SESSION['cU'] = $_POST['cU']; }
elseif (!isset($_SESSION['cU'])) { $_SESSION['cU'] = array(0); }

//set resource filter
if (isset($_POST['cC'])) { $_SESSION['cC'] = $_POST['cC']; }
elseif (!isset($_SESSION['cC'])) { $_SESSION['cC'] = array(0); }

//set current date
if (isset($_POST['newD'])) { $_SESSION['cD'] = DDtoID($_POST['newD']); }
elseif (isset($_GET['cD'])) { $_SESSION['cD'] = $_GET['cD']; }
elseif (empty($_SESSION['cD'])) { $_SESSION['cD'] = date("Y-m-d"); }

if (!$privs) { //if no access, login required
	$cP = 20; //log in
	$msg = $xx['idx_log_in'];
}

eval($pages[$cP][1]); //special attributes
$pageTitle = $pages[$cP][3];
//build page
//header
if (!isset($_GET["PrintPDF"]))  // if printfunction active, there should be no other output
{
	if ($pages[$cP][2] != 'S') {
	//	require './common/retrieve.php';
		if ($_SESSION['hdr'] == 0) {
			require './canvas/header_xs.php';
		} else {
			require './canvas/header.php';
		}
	} else {
		require './canvas/header_s.php';
	}
}
//page
require './'.$pages[$cP][0];
//footer
if (!isset($_GET["PrintPDF"]))  // if printfunction active, there should be no other output
{
	if ($pages[$cP][2] != 'S' and !$mobile) {
		require './canvas/footer.php';
	} else {
		require './canvas/footer_s.php';
	}
}
else {
	unset($_GET["PrintPDF"]);
}
?>
