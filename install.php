<?php
/*
= LuxCal event calendar installation script =

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
if (file_exists("config.php")) exit("<br /><br /><br /><br />
<b>Configuration file already exists - installation aborted</b><br /><br />
For new installations:<br />
<ul>
<li>no 'config.php' file should be present in the root directory and</li>
<li>the MySQL database should contain no LuxCal calendar tables</li>
</ul>
During the installation the content of the configuration file will be generated and the database tables will be created.
"
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>LuxCal Event Calendar - Installation</title>
<link rel="stylesheet" type="text/css" href="css/css.php"/>
</head>

<body>
<div class="topBar">
<h4 class="spaceL">LuxCal Event Calendar</h4>
</div>

<div class="navBar">&nbsp;</div>
<div class="content">
<?php
if (!$_POST["install"]) {
?>
<div class="sideBar floatR">
<h4>Instructions</h4>
<p>After successful installation, all data entered in this form are stored in the <kbd>config.php</kbd> file and can be changed, if needed, later.</p>
<br />
<p>Enter in the <b>database server</b> field the name of the server hosting the database. This could for example be 'localhost'.</p>
<p>The <b>database name</b>, <b>username</b> and <b>password</b> are the values used when the database was created on the server. If the values are entered incorrectly, this installation script will not be able to create the database tables and the installation will fail.</p>
<p>The <b>database prefix</b> is optional. It is a text string which will be added to the beginning of each database table name. This may be useful if you want to share the database for more than one installation. Only lowercase alphanumeric characters are allowed, optionally followed by an underscore character. The default string will be "" (no prefix).</p>
<br />
<p>The <b>calendar title</b> will later be displayed in the header of the various calendar views.</p>
<p>The <b>calendar url</b> will be used for notification purposes.</p>
<br />
<p>The <b>administrator name</b>, <b>email</b> and <b>password</b> should be remembered. They will be required later to log in to the calendar.</p>
</div>
<?php
}
?>
<div class="container spaceLL">
<h3>Calendar Configuration and Installation</h3>
<br /><br />
<?php
if ($_POST["install"]) {
	while (true) {
		$error_msg = array();
		//check for missing/invalid fields
		if (!$_POST["server"]) $error_msg[] = "server name";
		if (!$_POST["database"]) $error_msg[] = "database name";
		if (!$_POST["username"]) $error_msg[] = "database username";
		if (!$_POST["title"]) $error_msg[] = "calendar title";
		if (!$_POST["admin_username"]) $error_msg[] = "administrator username";
		if (!$_POST["admin_email"]) $error_msg[] = "administrator email";
		if (!$_POST["admin_password"]) $error_msg[] = "administrator password";
		if ($_POST["db_prefix"] and !preg_match("/^[a-z,0-9]+_?$/",$_POST["db_prefix"])) $error_msg[] = "database prefix invalid";
		if ($error_msg) {
			echo "<br /><br /><h5 class=\"hilight\">Error: Missing / Invalid Fields</h5><br /><br />\n";
			echo "<p>The following fields are missing or not valid:<br />";
			for( $i=0; $error_msg[$i]; $i++ )  {
				echo "<span class=\"hilight\">- ".$error_msg[$i]."</span><br />";
			}
			echo "<br />Please go <a href=\"javascript:history.back()\">[BACK]</a> and fill in this information.</p>\n";
			break;
		}
		//Connect to Database
		if (!$_POST["password"]) {
			$link = mysqliconnect ($_POST["server"], $_POST["username"]);
		} else {
			$link = mysqliconnect ($_POST["server"], $_POST["username"], $_POST["password"]);
		}
		if (!$link) {
			echo "<br /><h5 class=\"hilight\">Error: Unable to connect to MySQL</h5><br />\n";
			echo "<p>Unable to connect to the database server, please go <a href=\"javascript:history.back()\">back</a> and check the database server, username and password</p>.\n";
			break;
		}
		$connect = mysqliselect_db($_POST["database"],$link);
		if (!$connect) {
			echo "<br /><h5 class=\"hilight\">Error: Unable to select the database</h5><br />\n";
			echo "<p>Unable to select the database ".$_POST["database"].", please go <a href=\"javascript:history.back()\">back</a> and check the database name</p>.\n";
			break;
		}
		//check for existing installation
		$query = mysqliquery("SELECT count(*) FROM ".$_POST["db_prefix"]."users");
		if ($query) {
			echo "<br /><h5 class=\"hilight\">Error: Existing Calendar</h5><br />\n";
			echo "<p>There exists already a calendar with this name, please go <a href=\"javascript:history.back()\">back</a> and remove existing calendar.</p>\n";
			break;
		}
		//Create database tables
		$users = mysqliquery("CREATE TABLE ".$_POST["db_prefix"]."users (
				  `user_id` int(6) unsigned NOT NULL auto_increment,
				  `user_name` varchar(32) NOT NULL,
				  `password` varchar(32) NOT NULL,
				  `firstname` varchar(32) NOT NULL,
				  `familyname` varchar(32) NOT NULL,
				  `phone` varchar(20) NOT NULL,
				  `temp_password` varchar(32) default NULL,
				  `email` varchar(64) NOT NULL default '',
				  `sedit` tinyint(1) unsigned NOT NULL default '0',
				  `privs` tinyint(1) unsigned NOT NULL default '0',
				  `login_0` date NOT NULL default '9999-00-00',
				  `login_1` date NOT NULL default '9999-00-00',
				  `login_cnt` int(8) NOT NULL default '0',
				  `language` varchar(32) default NULL,
				  `color` varchar(10) default NULL,
				  `status` enum('user=1','obmann=2','Hafenmeister=3') NOT NULL default 'user=1',
					PRIMARY KEY (user_id)
			)");
		$categories = mysqliquery("CREATE TABLE ".$_POST["db_prefix"]."categories (
					`category_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
					`name` varchar(40) NOT NULL DEFAULT '',
					`sequence` int(2) unsigned NOT NULL DEFAULT '1',
					`rpeat` tinyint(1) unsigned NOT NULL DEFAULT '0',
					`public` tinyint(1) unsigned NOT NULL DEFAULT '1',
					`color` varchar(10) DEFAULT NULL,
					`background` varchar(10) DEFAULT NULL,
					`status` tinyint(1) NOT NULL DEFAULT '0',
					PRIMARY KEY (category_id)
					)");
		
		$resources = mysqliquery("CREATE TABLE ".$_POST["db_prefix"]."resources (
				  `resource_id` int(4) unsigned NOT NULL auto_increment,
				  `name` varchar(40) NOT NULL default '',
				  `sequence` int(2) unsigned NOT NULL default '1',
				  `teamsize_min` int(11) NOT NULL,
				  `teamsize_max` int(11) NOT NULL,
				  `rpeat` tinyint(1) unsigned NOT NULL default '0',
				  `public` tinyint(1) unsigned NOT NULL default '1',
				  `color` varchar(10) default NULL,
				  `background` varchar(10) default NULL,
				  `status` tinyint(1) NOT NULL default '0',
				  PRIMARY KEY  (`resource_id`)
					)");
		$events = mysqliquery("CREATE TABLE ".$_POST["db_prefix"]."events (
				  `event_id` int(8) unsigned NOT NULL auto_increment,
				  `category_id` int(2) unsigned NOT NULL default '0',
				  `title` varchar(64) default NULL,
				  `description` text,
				  `resource_id` int(4) unsigned NOT NULL default '1',
				  `venue` varchar(64) default NULL,
				  `owner_id` int(6) unsigned default NULL,
				  `editor` varchar(32) NOT NULL default '',
				  `private` tinyint(1) unsigned NOT NULL default '0',
				  `s_date` date default NULL,
				  `e_date` date NOT NULL default '9999-00-00',
				  `x_dates` text,
				  `s_time` time default NULL,
				  `e_time` time NOT NULL default '99:00:00',
				  `r_type` tinyint(1) unsigned NOT NULL default '0',
				  `r_interval` tinyint(1) unsigned NOT NULL default '0',
				  `r_period` tinyint(1) unsigned NOT NULL default '0',
				  `r_until` date NOT NULL default '9999-00-00',
				  `notify` tinyint(1) NOT NULL default '-1',
				  `not_mail` varchar(255) default NULL,
				  `a_date` date NOT NULL default '9999-00-00',
				  `m_date` date NOT NULL default '9999-00-00',
				  `status` tinyint(1) NOT NULL default '0',
				  PRIMARY KEY  (`event_id`)
					)");

		$event_users = mysqliquery("CREATE TABLE ".$_POST["db_prefix"]."event_users (
				  `event_id` int(11) default NULL,
				  `event_date` date default NULL,
				  `user_id` int(11) default NULL
					)");
		
		if (!$users or !$resources or !$events or !$event_users) {
			echo "<br /><h5 class=\"hilight\">Error: Problem Writing Tables</h5><br />\n";
			echo "<p>Can not create tables, please check your database permissions and go <a href=\"javascript:history.back()\">back</a> to try again.</p>\n";
			break;
		}
		//insert initial data
		$crypt_pw=md5($_POST["admin_password"]);
		$resource = mysqliquery("INSERT INTO ".$_POST["db_prefix"]."resources (resource_id, name, sequence) VALUES (1,'no cat',1)");
		$public_user = mysqliquery("INSERT INTO ".$_POST["db_prefix"]."users (user_id, user_name, email, privs) VALUES (1,'Public Access',' ',1)");
		$admin_user = mysqliquery("INSERT INTO ".$_POST["db_prefix"]."users (user_id, user_name, email, password, sedit, privs) VALUES (NULL,'".$_POST["admin_username"]."','".$_POST["admin_email"]."','".$crypt_pw."',1,3)");
		if (!$resource or !$public_user or !$admin_user) {
			echo "<br /><h5 class=\"hilight\">Error: Problem Writing to Tables</h5><br />\n";
			echo "<p>Created tables, but can not write to tables. Please check your database permissions. You will need to clean out the tables in the database and try again.</p>\n";
			break;
		}
		//Success
		echo "<h3>Installation Successful</h3>\n";
		echo "<p>The database has been created successfully. To finalize the installation:</p>\n";
		echo "<ol>\n";
		echo "<li><strong>copy and paste the text in the text box below into a file called <kbd>config.php</kbd></strong></li>\n";
		echo "<li><strong>then upload this file to the root directory of your LuxCal installation</strong></li>\n";
		echo "<li><strong>take care that the config.php file is writable by the calendar user (file permissions)</strong></li>\n";
		echo "</ol>\n";
		echo "<p>You can later edit the settings in <kbd>config.php</kbd> (e.g. change the calendar title, the default view, the date format, etc.) via Settings <br />in the Navigation Bar on the top right of the calendar.</p>\n";
		echo "<br />";
		echo "<p><strong>Please note that it is good practice to directly . . .</strong></p>\n";
		echo "<p>- delete the file <kbd>install.php</kbd> from the server</p>\n";
		echo "<p>Log in to the calendar, go to the administration menu (top right) and:</p>\n";
		echo "<p>- on the Settings page set the timeZone to your local time zone</p>\n";
		echo "<p>- on the Settings page choose your preferred settings</p>\n";
		echo "<p>- on the Categories page define a number of useful event categories</p>\n";

		//Generate config.php content
		$config = "<?php\n".
		"/*\n= LuxCal event calendar configuration file =\nThe LuxCal event calendar is a LuxSoft product\n*/\n\n".
		'//LuxCal config file version'."\n".
		'define("LCC","2.5.3");'."\n\n".
		'//Database credentials'."\n".
		'$hn = "'.$_POST["server"].'";'."\n".
		'$db = "'.$_POST["database"].'";'."\n".
		'$un = "'.$_POST["username"].'";'."\n".
		'$pw = "'.$_POST["password"].'";'."\n\n".
		'$dbPrefix = "'.$_POST["db_prefix"].'"; //prefix for database table names'."\n\n".
		'$calendarTitle = "'.$_POST["title"].'"; //Calendar title displayed in the top bar'."\n\n".
		'$calendarUrl = "'.$_POST["url"].'"; //Calendar location (URL)'."\n\n".
		'$calendarEmail = "'.$_POST["admin_email"].'"; //Sender in email notifications'."\n\n".
		'$timeZone = "Europe/Amsterdam"; //Calendar time zone'."\n\n".
		'$chgEmailList = ""; //Destin. email addresses for calendar changes'."\n\n".
		'$chgNofDays = 1; //Number of days to look back for calendar changes'."\n\n".
		'$adminCronSum = 1; //Send cron job summary to admin (0: no, 1: yes)'."\n\n".
		'$oneStepEdit = 1; //One-step event editing (0: disabled 1: enabled)'."\n\n".
		'$userMenu = 0; //Display user filter menu'."\n\n".
		'$resMenu = 1; //Display resource filter menu'."\n\n".
		'$langMenu = 0; //Display ui-language selection menu'."\n\n".
		'$defaultView = 2; //Calendar view at start-up (1: year, 2: month, 3: week 4: day, 5: upcoming, 6: changes)'."\n\n".
		'$language = "English"; //User interface language'."\n\n".
		'$selfReg = 0; //Self-registration (0: disabled, 1: enabled)'."\n\n".
		'$selfRegPrivs = 1; //Self-reg rights (1: view, 2: post self, 3: post all)'."\n\n".
		'$maxNoLogin = 0; //Number of days not logged in, before deleting user account (0: never delete)'."\n\n".
		'$miniCalPost = 0; //Mini calendar event posting (0: disabled, 1: enabled)'."\n\n".
		'$yearStart = 0; //Start month in year view (1-12 or 0, 0: current month)'."\n\n".
		'$colsToShow = 3; //Number of months to show per row in year view'."\n\n".
		'$rowsToShow = 4; //Number of rows to show in year view'."\n\n".
		'$weeksToShow = 10; //Number of weeks to show in month view'."\n\n".
		'$upcomingDays = 7; //Number of days to look ahead in upcoming view'."\n\n".
		'$startHour = 6; //Day/week view start hour'."\n\n".
		'$dwTimeSlot = 30; //Day/week time slot in minutes'."\n\n".
		'$dwTsHeight = 20; //Day/week time slot height in pixels'."\n\n".
		'$weekNumber = 1; //Week numbers on(1) or off(0)'."\n\n".
		'$showOwner = 1; //Show event owner (0: no, 1: yes)'."\n\n".
		'$showCatName = 1; //Show cat name in various views (0: no, 1: yes)'."\n\n".
		'$showLinkInMV = 1; //Show URL-links in month view (0: no, 1: yes)'."\n\n".
		'$eventColor = 1; //Event colors (0: user color, 1: cat color)'."\n\n".
		'$dateFormat = 1; //Event date format (1: dd-mm-yyyy, 2: mm-dd-yyyy, 3: yyyy-mm-dd)'."\n\n".
		'$dateUSorEU = 1; //Calendar date format (0: Monday, May 16, 2011, 1: Monday 16 May 2011)'."\n\n".
		'$dateSep = "."; //Date separator (. - or /)'."\n\n".
		'$time24 = 1; //Time format (0: 12-hour am/pm, 1: 24-hour)'."\n\n".
		'$weekStart = 1; //Week starts on Sunday(0) or Monday(1)'."\n".
		'?>';

		//show config.php
		echo "<br />";
		echo "<form>\n<textarea cols=\"80\" rows=\"25\">".htmlspecialchars($config)."</textarea>\n</form>\n";
		echo "<br /><p>After the file <kbd>config.php</kbd> has been uploaded, click <strong>[<a href=\"".$_POST["url"]."\">HERE</a>]</strong> to start the calendar</p>\n";
		break;
	}
	if ($link) { mysqliclose($link); }
} else {
	$calURL = $_SERVER['SERVER_NAME'].str_replace("install.php","",$_SERVER["PHP_SELF"]);
?>

<p>Please enter the following information to install the LuxCal Event Calendar:</p>
<br />
<div class="floatL">
<?php
echo '<form action= "'.$_SERVER['PHP_SELF'],'" method="POST">';
?>
<div class="fieldBox">
<h4 class="hilight">Read Instructions</h4>
<table>
<tr><td colspan="2"><h4>MySQL Database Information</h4></td></tr>
<tr><td>Database Server:</td><td><input type="text" name="server" /></td></tr>
<tr><td>Database Name:</td><td><input type="text" name="database" /></td></tr>
<tr><td>Database Username:</td><td><input type="text" name="username" /></td></tr>
<tr><td>Database Password:</td><td><input type="text" name="password" /></td></tr>
<tr><td>Database Prefix:</td><td><input type="text" name="db_prefix" /></td></tr>
<tr><td colspan="2"><br /><h4>Calendar Information</h4></td></tr>
<tr><td>Calendar Title:</td><td><input type="text" name="title" value="LuxCal Web Calendar" /></td></tr>
<tr><td>Calendar URL:</td><td><input type="text" name="url" size="30" value="http://<?php echo $calURL; ?>" /></td></tr>
<tr><td colspan="2"><br /><h4>Administrator Information</h4></td></tr>
<tr><td>Administrator Name:</td><td><input type="text" name="admin_username" /></td></tr>
<tr><td>Administrator Email:</td><td><input type="text" name="admin_email" /></td></tr>
<tr><td>Administrator Password:</td><td><input type="text" name="admin_password" /></td></tr>
</table>
</div>
<?php
echo '<input type="submit" name="install" value="Install" ></form>';
echo '<br />';
}
?>
</div>
<div class="endBar">
<font size='1'>design 2011 - powered by </font>
<font size='2' color='#660066'><b><i>LuxSoft</i></b></font>
</div>
</div>
</div>
</body>
</html>
