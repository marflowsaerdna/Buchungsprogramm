<?php
/*
= LuxCal event calendar cronjobs =

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file should be executed via a cronjob once a day at 2am user time
=========================================================================

It will subsequently start the following scripts:
1. notify.php: 
	Generate email notifications for events for which the user has asked a 
	notification a certain number of days before the due date of the event.

2. sendchg.php:
	If specified on the admin Settings page, send an email with a summary of 
	calendar changes to the email address list specified on the Settings page.
	If setting $chgNofDays = 0, NO email with calendar changes will be sent.

3. userchk.php:
	If specified in the admin Settings, delete 'inactive' user accounts.
	If setting $maxNoLogin = 0, NO user accounts will be deleted.

---------------------------- CRON JOB SETTINGS --------------------------
General:
  A cron job is defined by 1) a Time setting and 2) a Command to be executed.
	
Time setting for LuxCal (Unix notation):
  Minute Hour Day Month Weekday
    0     2    *    *      *
Command:
  Ask your provider for the command to execute the script lcalcron.php in 
  the root of your calendar installation.
  It should look something like:
  php /home/youraccount/public_html/yoursite.com/calendar/lcalcron.php
	
Note: If the calendar server and the calendar user are in different time 
zones, the time setting should correspond to 2am user time.
-------------------------------------------------------------------------

------------ THIS SCRIPT USES THE FOLLOWING CONFIG.PHP PARAMETERS -------
$timeZone : To get the current time right
The database credentials : to connect to the calendar database
$chgNofDays : Number of days to look back for changes
$maxNoLogin : Number of 'no login' days, before a user account is deleted
$calendarTitle : The calendar title is part of the summary header
$adminCronSum : Send cron job summary to admin (1 = yes, 0 = no)
-------------------------------------------------------------------------
*/

//load calendar settings, toolbox and language files
require 'config.php';
require 'common/toolbox.php';
require 'common/dbbox.php';
require 'lang/ui-'.strtolower($language).'.php';
require 'lang/ai-'.strtolower($language).'.php';

//set timezone
date_default_timezone_set($timeZone);

//connect to database
$link = mysqli_connect($hn, $un, $pw) or die ("Could not connect to database (server=".$hn." user=".$un." pass=".$pw.", check database credentials in config.php");
if (!mysqli_select_db($link,$db)) die ("Could not select database $db");


if ($adminCronSum) { //send summary to admin: summary header
	echo "\n\n=== ".$ax['cro_sum_header']." ".$calendarTitle." ~ ".IDtoDD(date("Y-m-d"))." @ ".date("H:i")." ===\n\n";
}
$summary = "";

//1 - check for email notifications to be sent
include 'cronjobs/notify.php';
if ($adminCronSum) { //send summary to admin
	echo $summary."\n";
}

//2 - check for calendar changes
if ($chgNofDays > 0) {
	include 'cronjobs/sendchg.php';
	if ($adminCronSum) { //send summary to admin
		echo $summary."\n"; //
	}
}

//3 - check for unused user accounts - not used
// if ($maxNoLogin > 0) {
//	include 'cronjobs/userchk.php';
//	if ($adminCronSum) { //send summary to admin
//		echo $summary."\n";
//	}
//}

//4 - send db backup per mail to admin
include 'cronjobs/dbcronbackup.php';
if ($adminCronSum) {
		//send summary to admin
		echo $summary."\n";
}

if ($adminCronSum) { //send summary to admin: summary trailer
	echo "=== ".$ax['cro_sum_trailer']."  ===";
}

mysqliclose($link); //close database
?>