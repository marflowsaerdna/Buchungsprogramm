<?php
/*
!!!!!!! THIS SCRIPT IS LAUNCHED WHEN UPGRADING TO A NEWER LUXCAL VERSION !!!!!!!

© Copyright 2011 LuxSoft - www.LuxSoft.eu
*/

//sanity check
if (!defined('LCC')) { exit('not permitted (upgr)'); } //lounch via script only

//init
if (!$link) { echo "No database connection"; exit; }
if (!isset($dbPrefix)) { $dbPrefix =""; }

/*============================= start upgrading ==============================*/

/* ===== As of LuxCal 1.6 ===== */

//Update MySQL database structure and give administrator full rights
//Test for column 'post' - if found, rename it to 'privs' and drop column 'view'
$result = mysql_query("SELECT post FROM ".$dbPrefix."users");
if ($result) { //column 'post' present - rename 'post' to 'privs'
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."users CHANGE post privs TINYINT(1) UNSIGNED NOT NULL DEFAULT '0'");
	if ($altered) { 
		$result = mysql_query("ALTER TABLE ".$dbPrefix."users DROP view");
		$result = mysql_query("UPDATE ".$dbPrefix."users SET privs = 3 WHERE user_id = 2");
	}
}

/* ===== As of LuxCal 2.0 ===== */

//Update database structure for advanced repeat capability
//Add to dates table: a_date (date added), m_date (date modified) and status (<0: deleted)
$result = mysql_query("SELECT r_type FROM ".$dbPrefix."dates");
if (!$result) { //column 'r_type' not present, create 'repeat' fields
	//add columns for enhanced repeat + deleted field
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."dates 
		ADD r_type TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER e_time,
		ADD r_interval TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER r_type,
		CHANGE recur r_period TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
		ADD r_until DATE NOT NULL DEFAULT '9999-00-00' AFTER r_period,
		ADD a_date DATE NOT NULL DEFAULT '9999-00-00',
		ADD m_date DATE NOT NULL DEFAULT '9999-00-00',
		ADD status TINYINT(1) NOT NULL DEFAULT '0'
	");
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."events
		MODIFY not_mail VARCHAR(255) DEFAULT NULL
	");
	//copy previous repeat values
	$result = mysql_query("UPDATE ".$dbPrefix."dates SET r_type = 1, r_interval = 1, r_until = e_date, e_date = '9999-00-00' WHERE r_period > 0");
}
//Add column to user table: language (user interface language)
$result = mysql_query("SELECT language FROM ".$dbPrefix."users");
if (!$result) { //column 'language' not present; create it
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."users
		ADD language VARCHAR(32) DEFAULT NULL
	");
}

/* ===== As of LuxCal 2.1 ===== */

//Add to dates table: Primary key to optimize speed
$result = mysql_query("SELECT event_id FROM ".$dbPrefix."dates");
if ($result !== false) { //table 'dates' existing
	$flags = mysql_field_flags($result, 0);
	if (strpos($flags, "primary_key") === false) {
		$altered = mysql_query("ALTER TABLE ".$dbPrefix."dates
			ADD PRIMARY KEY (event_id)
		");
	}
}

/* ===== As of LuxCal 2.3 ===== */

//Add columns to users table: login_0 (first login), login_1 (last login) and login_cnt (number of logins)
$result = mysql_query("SELECT login_0 FROM ".$dbPrefix."users");
if (!$result) { //column 'login_0' not present; create login_0 and login_1
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."users
		ADD login_0 DATE NOT NULL DEFAULT '9999-00-00' AFTER privs,
		ADD login_1 DATE NOT NULL DEFAULT '9999-00-00' AFTER login_0,
		ADD login_cnt INT(8) NOT NULL DEFAULT '0' AFTER login_1
	");
}

/* ===== As of LuxCal 2.4 ===== */

//Add columns to resources table: rpeat (4 = repeat every year), rss_feed (> 0 = include in rss_feeds
$result = mysql_query("SELECT repeat FROM ".$dbPrefix."resources");
if (!$result) { //column 'repeat' not present
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."resources
		ADD rpeat TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER sequence,
		ADD rss_feed TINYINT(1) UNSIGNED NOT NULL DEFAULT '1' AFTER rpeat
	");
}
//Add column event_type to events table and change length not_mail field from 256 to 255
$result = mysql_query("SELECT event_type FROM ".$dbPrefix."events");
if (!$result) { //column 'event_type' not present
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."events
		ADD event_type TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER event_id,
		MODIFY not_mail VARCHAR(255) DEFAULT NULL
	");
}
//Add column status to users table
$result = mysql_query("SELECT status FROM ".$dbPrefix."users");
if (!$result) { //column 'status' not present
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."users
		ADD status TINYINT(1) NOT NULL DEFAULT '0' AFTER language
	");
}
//In table dates modify column notify: SIGNED and DEFAULT = -1
$result = mysql_query("DESCRIBE dates");
if ($result !== false) { //table 'dates' existing
	while ($row = mysql_fetch_assoc($result)) {
		if ($row['Field'] == 'notify') {
			if ($row['Default'] == 0) {
				$altered = mysql_query("ALTER TABLE ".$dbPrefix."dates
					MODIFY notify TINYINT(1) NOT NULL DEFAULT '-1'
				");
				//replace all values '0' by '-1'
				$result = mysql_query("UPDATE ".$dbPrefix."dates SET notify = -1 WHERE notify = 0");
			}
			break;
		}
	}
}

/* ===== As of LuxCal 2.5 ===== */
//merge the events and the dates table into a single events table
//add fiels from dates table to events table
$result = mysql_query("SELECT status FROM ".$dbPrefix."events");
if (!$result) { //column 'status' not present, so continue
	//add columns from dates table
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."events
		ADD editor VARCHAR(32) NOT NULL DEFAULT '' AFTER user_id,
		ADD	s_date DATE DEFAULT NULL AFTER private,
		ADD	e_date DATE NOT NULL DEFAULT '9999-00-00' AFTER s_date,
		ADD x_dates TEXT DEFAULT NULL AFTER e_date,
		ADD	s_time TIME DEFAULT NULL AFTER x_dates,
		ADD	e_time TIME NOT NULL DEFAULT '99:00:00' AFTER s_time,
		ADD	r_type TINYINT(1) unsigned NOT NULL DEFAULT '0' AFTER e_time,
		ADD	r_interval TINYINT(1) unsigned NOT NULL DEFAULT '0' AFTER r_type,
		ADD	r_period TINYINT(1) unsigned NOT NULL DEFAULT '0' AFTER r_interval,
		ADD	r_until DATE NOT NULL DEFAULT '9999-00-00' AFTER r_period,
		ADD	notify TINYINT(1) NOT NULL DEFAULT '-1' AFTER r_until,
		ADD	a_date DATE NOT NULL DEFAULT '9999-00-00' AFTER not_mail,
		ADD	m_date DATE NOT NULL DEFAULT '9999-00-00' AFTER a_date,
		ADD	status TINYINT(1) NOT NULL DEFAULT '0' AFTER m_date
	");
	if ($altered) { //columns added successfully
		//copy dates table columns to event table
		$result = mysql_query("UPDATE ".$dbPrefix."events e,".$dbPrefix."dates d
		SET e.s_date = d.s_date,
			e.e_date = d.e_date,
			e.s_time = d.s_time,
			e.e_time = d.e_time,
			e.r_type = d.r_type,
			e.r_interval = d.r_interval,
			e.r_period = d.r_period,
			e.r_until = d.r_until,
			e.notify = d.notify,
			e.a_date = d.a_date,
			e.m_date = d.m_date,
			e.status = d.status
		WHERE e.event_id = d.event_id
		");
		if ($result !== false) { //if copy successful, drop the dates table
			$result = mysql_query("DROP TABLE ".$dbPrefix."dates");
		}
	}
}

//Test for column 'rss_feed' - if found, rename it to 'public'
$result = mysql_query("SELECT rss_feed FROM ".$dbPrefix."resources");
if ($result) { //column 'rss_feed' present - rename it to 'public'
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."resources CHANGE rss_feed public TINYINT(1) UNSIGNED NOT NULL DEFAULT '1'");
}
//Add column color to users table
$result = mysql_query("SELECT color FROM ".$dbPrefix."users");
if (!$result) { //column 'color' not present
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."users
		ADD color VARCHAR(10) DEFAULT NULL AFTER language
	");
}
//Add column status to resources table
$result = mysql_query("SELECT status FROM ".$dbPrefix."resources");
if (!$result) { //column 'status' not present
	$altered = mysql_query("ALTER TABLE ".$dbPrefix."resources
		ADD status TINYINT(1) NOT NULL DEFAULT '0' AFTER background
	");
}

//Validate / set config parameter values
if (!isset($calendarTitle)) { $calendarTitle = "LuxCal Calendar"; }
if (!isset($calendarUrl)) { $calendarUrl = $_SERVER['SERVER_NAME'].preg_replace("%upgrade\d{2,3}\.php$%","",$_SERVER["PHP_SELF"]); }
if (!isset($calendarEmail)) { $calendarEmail = "calendar@email.com"; }
if (!isset($timeZone)) { $timeZone = "Europe/Amsterdam"; }
if (!isset($chgEmailList)) { $chgEmailList = ""; }
if (!isset($chgNofDays) or $chgNofDays < 0 or $chgNofDays > 30) { $chgNofDays = 1; }
if (!isset($adminCronSum) or $adminCronSum < 0 or $adminCronSum > 1) { $adminCronSum = 1; }
if (!isset($oneStepEdit) or $oneStepEdit < 0 or $oneStepEdit > 1) { $oneStepEdit = 1; }
if (!isset($userMenu) or $userMenu < 0 or $userMenu > 1) { $userMenu = 1; }
if (!isset($resMenu) or $resMenu < 0 or $resMenu > 1) { $resMenu = 1; }
if (!isset($langMenu) or $langMenu < 0 or $langMenu > 1) { $langMenu = 0; }
if (!isset($defaultView) or $defaultView < 1 or $defaultView > 5) { $defaultView = 2; }
if (!isset($language)) { $language = "English"; }
if (!isset($selfReg) or $selfReg < 0 or $selfReg > 1) { $selfReg = 0; }
if (!isset($selfRegPrivs) or $selfRegPrivs < 0 or $selfRegPrivs > 3) { $selfRegPrivs = 1; }
if (!isset($maxNoLogin) or $maxNoLogin < 0 or $maxNoLogin > 365) { $maxNoLogin = 0; }
if (!isset($miniCalPost) or $miniCalPost < 0 or $miniCalPost > 1) { $miniCalPost = 0; }
if (!isset($yearStart) or $yearStart < 0 or $yearStart > 12) { $yearStart = 0; }
if (!isset($colsToShow) or $colsToShow < 1 or $colsToShow > 6) { $colsToShow = 3; }
if (!isset($rowsToShow) or $rowsToShow < 1 or $rowsToShow > 10) { $rowsToShow = 4; }
if (!isset($weeksToShow) or $weeksToShow < 0 or $weeksToShow > 20) { $weeksToShow = 10; }
if (!isset($upcomingDays) or $upcomingDays < 1 or $upcomingDays > 30) { $upcomingDays = 14; }
if (!isset($startHour) or $startHour < 0 or $startHour > 10) { $startHour = 6; }
if (!isset($dwTimeSlot) or $dwTimeSlot < 10 and $dwTimeSlot > 60) { $dwTimeSlot = 30; }
if (!isset($dwTsHeight) or $dwTsHeight < 10 or $dwTsHeight > 60) { $dwTsHeight = 20; }
if (!isset($weekNumber) or $weekNumber < 0 or $weekNumber > 1) { $weekNumber = 1; }
if (!isset($showOwner) or $showOwner < 0 or $showOwner > 1) { $showOwner = 1; }
if (!isset($showCatName) or $showCatName < 0 or $showCatName > 1) { $showCatName = 1; }
if (!isset($showLinkInMV) or $showLinkInMV < 0 or $showLinkInMV > 1) { $showLinkInMV = 1; }
if (!isset($eventColor) or $eventColor < 0 or $eventColor > 1) { $eventColor = 1; }
if (!isset($dateFormat) or $dateFormat < 1 or $dateFormat > 3) { $dateFormat = 1; }
if (!isset($dateUSorEU) or $dateUSorEU < 0 or $dateUSorEU > 1) { $dateUSorEU = 1; }
if (!isset($dateSep) or strlen($dateSep) != 1 or strpos(".-/", $dateSep) === false) { $dateSep = "."; }
if (!isset($time24) or $time24 < 0 or $time24 > 1) { $time24 = 1; }
if (!isset($weekStart) or $weekStart < 0 or $weekStart > 1) { $weekStart = 1; }

//Generate config.php content
$config = "<?php\n".
"/*\n= LuxCal event calendar configuration file =\nThe LuxCal event calendar is a LuxSoft product\n*/\n\n".
'//LuxCal config file version'."\n".
'define("LCC","2.5.3");'."\n\n".
'//Database credentials'."\n".
'$hn = "'.$hn.'";'."\n".
'$db = "'.$db.'";'."\n".
'$un = "'.$un.'";'."\n".
'$pw = "'.$pw.'";'."\n\n".
'$dbPrefix = "'.$dbPrefix.'"; //prefix for database table names'."\n\n".
'$calendarTitle = "'.$calendarTitle.'"; //Calendar title displayed in the top bar'."\n\n".
'$calendarUrl = "'.$calendarUrl.'"; //Calendar location (URL)'."\n\n".
'$calendarEmail = "'.$calendarEmail.'"; //Sender in email notifications'."\n\n".
'$timeZone = "'.$timeZone.'"; //Calendar time zone'."\n\n".
'$chgEmailList = "'.$chgEmailList.'"; //Destin. email addresses for calendar changes'."\n\n".
'$chgNofDays = '.$chgNofDays.'; //Number of days to look back for calendar changes'."\n\n".
'$adminCronSum = '.$adminCronSum.'; //Send cron job summary to admin (0: no, 1: yes)'."\n\n".
'$oneStepEdit = '.$oneStepEdit.'; //One-step event editing (0: disabled 1: enabled)'."\n\n".
'$userMenu = '.$userMenu.'; //Display user filter menu'."\n\n".
'$resMenu = '.$resMenu.'; //Display resource filter menu'."\n\n".
'$langMenu = '.$langMenu.'; //Display ui-language selection menu'."\n\n".
'$defaultView = '.$defaultView.'; //Calendar view at start-up (1: year, 2: month, 3: week 4: day, 5: upcoming, 6: changes)'."\n\n".
'$language = "'.$language.'"; //User interface language'."\n\n".
'$selfReg = '.$selfReg.'; //Self-registration (0: disabled 1: enabled)'."\n\n".
'$selfRegPrivs = '.$selfRegPrivs.'; //Self-reg rights (1: view, 2: post self, 3: post all)'."\n\n".
'$maxNoLogin = '.$maxNoLogin.'; //Number of days not logged in, before deleting user account (0: never delete)'."\n\n".
'$miniCalPost = '.$miniCalPost.'; //Mini calendar event posting (0: disabled, 1: enabled)'."\n\n".
'$yearStart = '.$yearStart.'; //Start month in year view (1-12 or 0, 0: current month)'."\n\n".
'$colsToShow = '.$colsToShow.'; //Number of months to show per row in year view'."\n\n".
'$rowsToShow = '.$rowsToShow.'; //Number of rows to show in year view'."\n\n".
'$weeksToShow = '.$weeksToShow.'; //Number of weeks to show in month view'."\n\n".
'$upcomingDays = '.$upcomingDays.'; //Number of days to look ahead in upcoming view'."\n\n".
'$startHour = '.$startHour.'; //Day/week view start hour'."\n\n".
'$dwTimeSlot = '.$dwTimeSlot.'; //Day/week time slot in minutes'."\n\n".
'$dwTsHeight = '.$dwTsHeight.'; //Day/week time slot height in pixels'."\n\n".
'$weekNumber = '.$weekNumber.'; //Display week numbers (0: no, 1: yes)'."\n\n".
'$showOwner = '.$showOwner.'; //Show event owner (0: no, 1: yes)'."\n\n".
'$showCatName = '.$showCatName.'; //Show cat name in various views (0: no, 1: yes)'."\n\n".
'$showLinkInMV = '.$showLinkInMV.'; //Show URL-links in month view (0: no, 1: yes)'."\n\n".
'$eventColor = '.$eventColor.'; //Event color (0: user color, 1: cat color)'."\n\n".
'$dateFormat = '.$dateFormat.'; //Event date format (1: dd-mm-yyyy, 2: mm-dd-yyyy, 3: yyyy-mm-dd)'."\n\n".
'$dateUSorEU = '.$dateUSorEU.'; //Calendar date format (0: Monday, May 16, 2011, 1: Monday 16 May 2011)'."\n\n".
'$dateSep = "'.$dateSep.'"; //Date separator (. - or /)'."\n\n".
'$time24 = '.$time24.'; //Time format (0: 12-hour am/pm, 1: 24-hour)'."\n\n".
'$weekStart = '.$weekStart.'; //Week starts on Sunday(0) or Monday(1)'."\n".
'?>';

//Save config.php
if (file_put_contents("config.php", $config) !== false) {
	chmod("config.php", 0666); //set file permisions
} else {
	echo "Writing the config.php file failed. Check the permissions of your calendar root directory (should be 755)"; exit;
}
?>
