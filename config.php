<?php
/*
= LuxCal event calendar configuration file =
The LuxCal event calendar is a LuxSoft product
*/

//LuxCal config file version
define("LCC","2.5.3");

//Database credentials
// Werte auf lokalem System einstellen!,
if (getenv("SERVER_NAME") != 'localhost') {	// WOLFRAMA 	FNL7108G
	$hn = "rdbms.strato.de";
	$db = "DB1162353";
	$un = "U1162353";
	$pw = "Buchung03";
}
else {
	$hn = "localhost";
	$db = "buchungssystem";
	$un = "root";
	$pw = "nimda";
	}
	
$maintenance_ongoing = FALSE;  // Display only Maintenance Site, value = TRUE, FALSE	
	
$dbPrefix = "wvf_"; //prefix for database table names

$calendarTitle = "WVF Schiffe Buchungskalender"; //Calendar title displayed in the top bar

$calendarUrl = "http://www.wvfischbach.de/Buchungssystem/Buchungssystem/"; //Calendar location (URL)

$calendarEmail = "buchung@wvfischbach.de"; //Sender in email notifications

$backupEmail = "wolfram.andreas@freenet.de"; //Destin. email address for Cronjobs

$timeZone = "Europe/Berlin"; //Calendar time zone

$chgEmailList = "webmaster@wvfischbach.de"; //Destin. email addresses for calendar changes

$chgNofDays = 1; //Number of days to look back for calendar changes

$adminCronSum = 1; //Send cron job summary to admin (0: no, 1: yes)

$oneStepEdit = 1; //One-step event editing (0: disabled 1: enabled)

$userMenu = 0; //Display user filter menu

$catMenu = 0; //Display resource filter menu

$langMenu = 0; //Display ui-language selection menu

$defaultView = 2; //Calendar view at start-up (1: year, 2: month, 3: week 4: day, 5: upcoming, 6: changes)

$language = "deutsch"; //User interface language

$selfReg = 0; //Self-registration (0: disabled, 1: enabled)

$selfRegPrivs = 1; //Self-reg rights (1: view, 2: post own, 3: post all)

$maxNoLogin = 0; //Number of days not logged in, before deleting user account (0: never delete)

$miniCalPost = 1; //Mini calendar event posting (0: disabled, 1: enabled)

$yearStart = 0; //Start month in year view (1-12 or 0, 0: current month)

$colsToShow = 3; //Number of months to show per row in year view

$rowsToShow = 4; //Number of rows to show in year view

$weeksToShow = 0; //Number of weeks to show in month view

$upcomingDays = 60; //Number of days to look ahead in upcoming view

$startHour = 0; //Day/week view start hour

$dwTimeSlot = 60; //Day/week time slot in minutes

$dwTsHeight = 16; //Day/week time slot height in pixels

$weekNumber = 1; //Display week numbers (0: no, 1: yes)

$showOwner = 1; //Show event owner (0: no, 1: yes)

$showCatName = 1; //Show cat name in various views (0: no, 1: yes)

$showLinkInMV = 1; //Show URL-links in month view (0: no, 1: yes)

$eventColor = 1; //Event color (0: user color, 1: cat color)

$dateFormat = 1; //Event date format (1: dd-mm-yyyy, 2: mm-dd-yyyy, 3: yyyy-mm-dd)

$dateUSorEU = 1; //Calendar date format (0: Monday, May 16, 2011, 1: Monday 16 May 2011)

$dateSep = "."; //Date separator (. - or /)

$time24 = 1; //Time format (0: 12-hour am/pm, 1: 24-hour)

$weekStart = 1; //Week starts on Sunday(0) or Monday(1)
?>