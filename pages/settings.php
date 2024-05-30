<?php
/*
= Change Calendar Settings page =

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
if (!defined('LCC')) { exit('not permitted (sett)'); } //lounch via script only

//initialize
$adminLang = (file_exists('lang/ai-'.strtolower($_SESSION['cL']).'.php')) ? $_SESSION['cL'] : "English";
require './lang/ai-'.strtolower($adminLang).'.php';

$msg = "";

if (!$admin) {
	echo "<p class=\"warningL\">".$ax["no_way"]."</p>\n"; exit;
}

if (isset($_POST["save"])) { //get posted settings
	$newCalendarTitle = stripslashes(trim($_POST["newCalendarTitle"]));
	$newCalendarUrl = trim($_POST["newCalendarUrl"]);
	$newCalendarEmail = stripslashes(trim($_POST["newCalendarEmail"]));
	$newBackupEmail = stripslashes(trim($_POST["newBackupEmail"]));
	$newTimeZone = trim($_POST["newTimeZone"]);
	$newDefaultView = intval($_POST["newDefaultView"]);
	$newLanguage = trim($_POST["newLanguage"]);
	$newUserMenu = intval($_POST["newUserMenu"]);
	$newCatMenu = intval($_POST["newCatMenu"]);
	$newLangMenu = intval($_POST["newLangMenu"]);
	$newChgEmailList = trim($_POST["newChgEmailList"]);
	$newChgNofDays = intval($_POST["newChgNofDays"]);
	$newAdminCronSum = intval($_POST["newAdminCronSum"]);
	$newOneStepEdit = intval($_POST["newOneStepEdit"]);
	$newSelfReg = intval($_POST["newSelfReg"]);
	$newSelfRegPrivs = intval($_POST["newSelfRegPrivs"]);
	$newMaxNoLogin = intval($_POST["newMaxNoLogin"]);
	$newMiniCalPost = intval($_POST["newMiniCalPost"]);
	$newYearStart = intval($_POST["newYearStart"]);
	$newColsToShow = intval($_POST["newColsToShow"]);
	$newRowsToShow = intval($_POST["newRowsToShow"]);
	$newWeeksToShow = intval($_POST["newWeeksToShow"]);
	$newUpcomingDays = intval($_POST["newUpcomingDays"]);
	$newStartHour = intval($_POST["newStartHour"]);
	$newDwTimeSlot = intval($_POST["newDwTimeSlot"]);
	$newDwTsHeight = intval($_POST["newDwTsHeight"]);
	$newShowOwner = intval($_POST["newShowOwner"]);
	$newShowCatName = intval($_POST["newShowCatName"]);
	$newShowLinkInMV = intval($_POST["newShowLinkInMV"]);
	$newEventColor = intval($_POST["newEventColor"]);
	$newDateFormat = intval($_POST["newDateFormat"]);
	$newDateUSorEU = intval($_POST["newDateUSorEU"]);
	$newDateSep = trim($_POST["newDateSep"]);
	$newTime24 = intval($_POST["newTime24"]);
	$newWeekStart = intval($_POST["newWeekStart"]);
	$newWeekNumber = intval($_POST["newWeekNumber"]);
} else { //get current settings
	$newCalendarTitle = $calendarTitle;
	$newCalendarUrl = $calendarUrl;
	$newCalendarEmail = $calendarEmail;
	$newBackupEmail = $backupEmail;
	$newTimeZone = $timeZone;
	$newDefaultView = $defaultView;
	$newLanguage = $language;
	$newUserMenu = $userMenu;
	$newResMenu = $resMenu;
	$newLangMenu = $langMenu;
	$newChgEmailList = $chgEmailList;
	$newChgNofDays = $chgNofDays;
	$newAdminCronSum = $adminCronSum;
	$newOneStepEdit = $oneStepEdit;
	$newSelfReg = $selfReg;
	$newSelfRegPrivs = $selfRegPrivs;
	$newMaxNoLogin = $maxNoLogin;
	$newMiniCalPost = $miniCalPost;
	$newYearStart = $yearStart;
	$newColsToShow = $colsToShow;
	$newRowsToShow = $rowsToShow;
	$newWeeksToShow = $weeksToShow;
	$newUpcomingDays = $upcomingDays;
	$newStartHour = $startHour;
	$newDwTimeSlot = $dwTimeSlot;
	$newDwTsHeight = $dwTsHeight;
	$newShowOwner = $showOwner;
	$newShowCatName = $showCatName;
	$newShowLinkInMV = $showLinkInMV;
	$newEventColor = $eventColor;
	$newDateFormat = $dateFormat;
	$newDateUSorEU = $dateUSorEU;
	$newDateSep = $dateSep;
	$newTime24 = $time24;
	$newWeekStart = $weekStart;
	$newWeekNumber = $weekNumber;
}

if (isset($_POST["save"])) { //validate settings
	if (!$newCalendarTitle) { $msg .= $ax['calendarTitle_label'].' '.$ax['set_missing'].'<br />'; }
	if (!$newCalendarUrl) { $msg .= $ax['calendarUrl_label'].' '.$ax['set_missing'].'<br />'; }
	if (!$newCalendarEmail) { $msg .= $ax['calendarEmail_label'].' '.$ax['set_missing'].'<br />'; }
	if (!$newBackupEmail) { $msg .= $ax['backupEmail_label'].' '.$ax['set_missing'].'<br />'; }
	if (!$newTimeZone) { $msg .= $ax['timeZone_label'].' '.$ax['set_missing'].'<br />'; }
	if ($newChgNofDays < 0 or $newChgNofDays > 30) { $msg .= $ax['chgNofDays_label'].' '.$ax['set_not_valid'].'<br />'; }
	if ($newMaxNoLogin < 0 or $newMaxNoLogin > 365) { $msg .= $ax['maxNoLogin_label'].' '.$ax['set_not_valid'].'<br />'; }
	if ($newYearStart < 0 or $newYearStart > 12) { $msg .= $ax['yearStart_label'].' '.$ax['set_not_valid'].'<br />'; }
	if ($newColsToShow < 1 or $newColsToShow > 6) { $msg .= $ax['colsToShow_label'].' '.$ax['set_not_valid'].'<br />'; }
	if ($newRowsToShow < 1 or $newRowsToShow > 10) { $msg .= $ax['rowsToShow_label'].' '.$ax['set_not_valid'].'<br />'; }
	if ($newWeeksToShow != 0 and ($newWeeksToShow < 2 or $newWeeksToShow > 20)) { $msg .= $ax['weeksToShow_label'].' '.$ax['set_not_valid'].'<br />'; }
	if ($newUpcomingDays < 0 or $newUpcomingDays > 365) { $msg .= $ax['upcomingDays_label'].' '.$ax['set_not_valid'].'<br />'; }
	if ($newStartHour < 0 or $newStartHour > 18) { $msg .= $ax['startHour_label'].' '.$ax['set_not_valid'].'<br />'; }
	if ($newDwTsHeight < 10 or $newDwTsHeight > 60) { $msg .= $ax['dwTsHeight_label'].' '.$ax['set_not_valid'].'<br />'; }

	if (!$msg) { //no errors save settings;
	while (true) {
		$config = file_get_contents("config.php");
		if ($config === false) { $msg = $ax['set_read_error']; break; }
		$pos = stripos($config, '$calendarTitle');
		$config = substr($config,0,$pos).
		'$calendarTitle = "'.$newCalendarTitle.'"; //Calendar title displayed in the top bar'."\n\n".
		'$calendarUrl = "'.$newCalendarUrl.'"; //Calendar location (URL)'."\n\n".
		'$calendarEmail = "'.$newCalendarEmail.'"; //Sender in email notifications'."\n\n".
		'$backupEmail = "'.$newBackupEmail.'"; //Destin. email address for Cronjobs'."\n\n".
		'$timeZone = "'.$newTimeZone.'"; //Calendar time zone'."\n\n".
		'$chgEmailList = "'.$newChgEmailList.'"; //Destin. email addresses for calendar changes'."\n\n".
		'$chgNofDays = '.$newChgNofDays.'; //Number of days to look back for calendar changes'."\n\n".
		'$adminCronSum = '.$newAdminCronSum.'; //Send cron job summary to admin (0: no, 1: yes)'."\n\n".
		'$oneStepEdit = '.$newOneStepEdit.'; //One-step event editing (0: disabled 1: enabled)'."\n\n".
		'$userMenu = '.$newUserMenu.'; //Display user filter menu'."\n\n".
		'$catMenu = '.$newCatMenu.'; //Display resource filter menu'."\n\n".
		'$langMenu = '.$newLangMenu.'; //Display ui-language selection menu'."\n\n".
		'$defaultView = '.$newDefaultView.'; //Calendar view at start-up (1: year, 2: month, 3: week 4: day, 5: upcoming, 6: changes)'."\n\n".
		'$language = "'.$newLanguage.'"; //User interface language'."\n\n".
		'$selfReg = '.$newSelfReg.'; //Self-registration (0: disabled, 1: enabled)'."\n\n".
		'$selfRegPrivs = '.$newSelfRegPrivs.'; //Self-reg rights (1: view, 2: post own, 3: post all)'."\n\n".
		'$maxNoLogin = '.$newMaxNoLogin.'; //Number of days not logged in, before deleting user account (0: never delete)'."\n\n".
		'$miniCalPost = '.$newMiniCalPost.'; //Mini calendar event posting (0: disabled, 1: enabled)'."\n\n".
		'$yearStart = '.$newYearStart.'; //Start month in year view (1-12 or 0, 0: current month)'."\n\n".
		'$colsToShow = '.$newColsToShow.'; //Number of months to show per row in year view'."\n\n".
		'$rowsToShow = '.$newRowsToShow.'; //Number of rows to show in year view'."\n\n".
		'$weeksToShow = '.$newWeeksToShow.'; //Number of weeks to show in month view'."\n\n".
		'$upcomingDays = '.$newUpcomingDays.'; //Number of days to look ahead in upcoming view'."\n\n".
		'$startHour = '.$newStartHour.'; //Day/week view start hour'."\n\n".
		'$dwTimeSlot = '.$newDwTimeSlot.'; //Day/week time slot in minutes'."\n\n".
		'$dwTsHeight = '.$newDwTsHeight.'; //Day/week time slot height in pixels'."\n\n".
		'$weekNumber = '.$newWeekNumber.'; //Display week numbers (0: no, 1: yes)'."\n\n".
		'$showOwner = '.$newShowOwner.'; //Show event owner (0: no, 1: yes)'."\n\n".
		'$showCatName = '.$newShowCatName.'; //Show cat name in various views (0: no, 1: yes)'."\n\n".
		'$showLinkInMV = '.$newShowLinkInMV.'; //Show URL-links in month view (0: no, 1: yes)'."\n\n".
		'$eventColor = '.$newEventColor.'; //Event color (0: user color, 1: cat color)'."\n\n".
		'$dateFormat = '.$newDateFormat.'; //Event date format (1: dd-mm-yyyy, 2: mm-dd-yyyy, 3: yyyy-mm-dd)'."\n\n".
		'$dateUSorEU = '.$newDateUSorEU.'; //Calendar date format (0: Monday, May 16, 2011, 1: Monday 16 May 2011)'."\n\n".
		'$dateSep = "'.$newDateSep.'"; //Date separator (. - or /)'."\n\n".
		'$time24 = '.$newTime24.'; //Time format (0: 12-hour am/pm, 1: 24-hour)'."\n\n".
		'$weekStart = '.$newWeekStart.'; //Week starts on Sunday(0) or Monday(1)'."\n".
		'?>';
		//save updated config.php file
		if (file_put_contents("config.php", $config) === false) { $msg = $ax['set_write_error']; break; }
		$msg = $ax['set_settings_saved'];
		break;
		}
	}
}

echo "<br /><p class=\"warningL\">".(($msg) ? $msg : $ax['hover_for_details'])."</p>\n";
?>
<!-- display form fields -->
<form action="index.php" method="post">
<div class="scrollBoxSe">
<table>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_general_settings'].'&nbsp;</td><tr>'."\n";
echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['calendarTitle_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['calendarTitle_label'].":</td>\n";
echo '<td><input type="text" name="newCalendarTitle" size="45" value="'.$newCalendarTitle.'" /></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['calendarUrl_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['calendarUrl_label'].":</td>\n";
echo '<td><input type="text" name="newCalendarUrl" size="45" value="'.$newCalendarUrl.'" /></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['calendarEmail_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['calendarEmail_label'].":</td>\n";
echo '<td><input type="text" name="newCalendarEmail" size="45" value="'.$newCalendarEmail.'" /></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['backupEmail_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['backupEmail_label'].":</td>\n";
echo '<td><input type="text" name="newBackupEmail" size="45" value="'.$newBackupEmail.'" /></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['timeZone_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['timeZone_label'].":</td>\n";
echo '<td><input type="text" name="newTimeZone" size="24" value="'.$newTimeZone.'" /> '.$ax['see'].': <strong>[<a href="http://us3.php.net/manual/en/timezones.php" target="_blank">'.$ax['time_zones'].'</a>]</strong></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['chgEmailList_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['chgEmailList_label'].":</td>\n";
echo '<td><input type="text" name="newChgEmailList" size="45" value="'.$newChgEmailList.'" /></td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['chgNofDays_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['chgNofDays_label'].":</td>\n";
echo '<td><input type="text" name="newChgNofDays" size="1" value="'.$newChgNofDays.'" /> (0 - 30)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['cronSummary_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['cronSummary_label'].":</td>\n";
echo '<td><input type="radio" name="newAdminCronSum" value="0"'.($newAdminCronSum == 0 ? 'checked="checked"' : '').' /> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newAdminCronSum" value="1"'.($newAdminCronSum == 1 ? 'checked="checked"' : '').' /> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['oneStepEdit_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['oneStepEdit_label'].":</td>\n";
echo '<td><input type="radio" name="newOneStepEdit" value="0"'.($newOneStepEdit == 0 ? 'checked="checked"' : '').' /> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newOneStepEdit" value="1"'.($newOneStepEdit == 1 ? 'checked="checked"' : '').' /> '.$ax['enabled'].'</td></tr>'."\n";
?>
</table></td></tr>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_opanel_settings'].'&nbsp;</td><tr>'."\n";
echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['userMenu_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['userMenu_label'].":</td>\n";
echo '<td><input type="radio" name="newUserMenu" value="0"'.($newUserMenu == 0 ? 'checked="checked"' : '').' /> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newUserMenu" value="1"'.($newUserMenu == 1 ? 'checked="checked"' : '').' /> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['catMenu_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['catMenu_label'].":</td>\n";
echo '<td><input type="radio" name="newCatMenu" value="0"'.($newCatMenu == 0 ? 'checked="checked"' : '').' /> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newCatMenu" value="1"'.($newCatMenu == 1 ? 'checked="checked"' : '').' /> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['langMenu_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['langMenu_label'].":</td>\n";
echo '<td><input type="radio" name="newLangMenu" value="0"'.($newLangMenu == 0 ? 'checked="checked"' : '').' /> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newLangMenu" value="1"'.($newLangMenu == 1 ? 'checked="checked"' : '').' /> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['defaultView_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['defaultView_label'].":</td>\n";
echo '<td><select name="newDefaultView">'."\n";
echo '<option value="1"'.($newDefaultView == "1" ? ' selected="selected"' : '').'>'.$xx['hdr_year']."</option>\n";
echo '<option value="2"'.($newDefaultView == "2" ? ' selected="selected"' : '').'>'.$xx['hdr_month']."</option>\n";
echo '<option value="3"'.($newDefaultView == "3" ? ' selected="selected"' : '').'>'.$xx['hdr_week']."</option>\n";
echo '<option value="4"'.($newDefaultView == "4" ? ' selected="selected"' : '').'>'.$xx['hdr_day']."</option>\n";
echo '<option value="5"'.($newDefaultView == "5" ? ' selected="selected"' : '').'>'.$xx['hdr_upcoming']."</option>\n";
echo '<option value="6"'.($newDefaultView == "6" ? ' selected="selected"' : '').'>'.$xx['hdr_changes']."</option>\n";
echo "</select></td></tr>\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['language_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['language_label'].":</td>\n";
echo '<td><select name="newLanguage">'."\n";
	$files = scandir("lang/");
	foreach ($files as $file) {
		if (substr($file, 0, 3) == "ui-") {
			$lang = strtolower(substr($file,3,-4));
			echo '<option value="'.$lang.'"'.(strtolower($newLanguage) == $lang ? ' selected="selected"' : '').'>'.ucfirst($lang)."</option>\n";
		}
	}
echo "</select></td></tr>\n";
?>
</table></td></tr>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_user_settings'].'&nbsp;</td><tr>'."\n";
echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['selfReg_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['selfReg_label'].":</td>\n";
echo '<td><input type="radio" name="newSelfReg" value="0"'.($newSelfReg == 0 ? 'checked="checked"' : '').' /> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newSelfReg" value="1"'.($newSelfReg == 1 ? 'checked="checked"' : '').' /> '.$ax['enabled'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['selfRegPrivs_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['selfRegPrivs_label'].":</td>\n";
echo '<td><input type="radio" name="newSelfRegPrivs" value="1"'.($newSelfRegPrivs == 1 ? 'checked="checked"' : '').' /> '.$ax['view']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newSelfRegPrivs" value="2"'.($newSelfRegPrivs == 2 ? 'checked="checked"' : '').' /> '.$ax['post_own']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newSelfRegPrivs" value="3"'.($newSelfRegPrivs == 3 ? 'checked="checked"' : '').' /> '.$ax['post_all']."</td></tr>\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['maxNoLogin_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['maxNoLogin_label'].":</td>\n";
echo '<td><input type="text" name="newMaxNoLogin" size="1" value="'.$newMaxNoLogin.'" /> (0 - 365)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['miniCalPost_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['miniCalPost_label'].":</td>\n";
echo '<td><input type="radio" name="newMiniCalPost" value="0"'.($newMiniCalPost == 0 ? 'checked="checked"' : '').' /> '.$ax['disabled']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newMiniCalPost" value="1"'.($newMiniCalPost == 1 ? 'checked="checked"' : '').' /> '.$ax['enabled'].'</td></tr>'."\n";
?>
</table></td></tr>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_view_settings'].'&nbsp;</td><tr>'."\n";
echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['yearStart_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['yearStart_label'].":</td>\n";
echo '<td><input type="text" name="newYearStart" size="1" value="'.$newYearStart.'" /> (1 - 12 '.$ax['or'].' 0)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['colsToShow_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['colsToShow_label'].":</td>\n";
echo '<td><input type="text" name="newColsToShow" size="1" value="'.$newColsToShow.'" /> (1 - 6)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['rowsToShow_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['rowsToShow_label'].":</td>\n";
echo '<td><input type="text" name="newRowsToShow" size="1" value="'.$newRowsToShow.'" /> (1 - 10)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['weeksToShow_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['weeksToShow_label'].":</td>\n";
echo '<td><input type="text" name="newWeeksToShow" size="1" value="'.$newWeeksToShow.'" /> (2 - 20 '.$ax['or'].' 0)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['upcomingDays_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['upcomingDays_label'].":</td>\n";
echo '<td><input type="text" name="newUpcomingDays" size="1" value="'.$newUpcomingDays.'" /> (1 - 365)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['startHour_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['startHour_label'].":</td>\n";
echo '<td><input type="text" name="newStartHour" size="1" value="'.$newStartHour.'" /> (0 - 18)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['dwTimeSlot_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['dwTimeSlot_label'].":</td>\n";
echo '<td><select name="newDwTimeSlot">'."\n";
echo '<option value="10"'.($newDwTimeSlot == "10" ? ' selected="selected"' : '').'>10</option>'."\n";
echo '<option value="15"'.($newDwTimeSlot == "15" ? ' selected="selected"' : '').'>15</option>'."\n";
echo '<option value="20"'.($newDwTimeSlot == "20" ? ' selected="selected"' : '').'>20</option>'."\n";
echo '<option value="30"'.($newDwTimeSlot == "30" ? ' selected="selected"' : '').'>30</option>'."\n";
echo '<option value="60"'.($newDwTimeSlot == "60" ? ' selected="selected"' : '').'>60</option>'."\n";
echo '</select> '.$ax['minutes']."</td></tr>\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['dwTsHeight_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['dwTsHeight_label'].":</td>\n";
echo '<td><input type="text" name="newDwTsHeight" size="1" value="'.$newDwTsHeight.'" /> '.$ax['pixels'].' (10 - 60)</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['weekNumber_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['weekNumber_label'].":</td>\n";
echo '<td><input type="radio" name="newWeekNumber" value="0"'.($newWeekNumber == 0 ? 'checked="checked"' : '').' /> '.$ax['no']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newWeekNumber" value="1"'.($newWeekNumber == 1 ? 'checked="checked"' : '').' /> '.$ax['yes'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['showOwner_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['showOwner_label'].":</td>\n";
echo '<td><input type="radio" name="newShowOwner" value="0"'.($newShowOwner == 0 ? 'checked="checked"' : '').' /> '.$ax['no']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newShowOwner" value="1"'.($newShowOwner == 1 ? 'checked="checked"' : '').' /> '.$ax['yes'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['showCatName_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['showCatName_label'].":</td>\n";
echo '<td><input type="radio" name="newShowCatName" value="0"'.($newShowCatName == 0 ? 'checked="checked"' : '').' /> '.$ax['no']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newShowCatName" value="1"'.($newShowCatName == 1 ? 'checked="checked"' : '').' /> '.$ax['yes'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['showLinkInMV_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['showLinkInMV_label'].":</td>\n";
echo '<td><input type="radio" name="newShowLinkInMV" value="0"'.($newShowLinkInMV == 0 ? 'checked="checked"' : '').' /> '.$ax['no']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newShowLinkInMV" value="1"'.($newShowLinkInMV == 1 ? 'checked="checked"' : '').' /> '.$ax['yes'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['eventColor_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['eventColor_label'].":</td>\n";
echo '<td><input type="radio" name="newEventColor" value="0"'.($newEventColor == 0 ? 'checked="checked"' : '').' /> '.$ax['owner_color']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newEventColor" value="1"'.($newEventColor == 1 ? 'checked="checked"' : '').' /> '.$ax['res_color'].'</td></tr>'."\n";
?>
</table></td></tr>
<tr><td><table class="fieldBoxFix">
<?php
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax['set_dt_settings'].'&nbsp;</td><tr>'."\n";
echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['dateFormat_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['dateFormat_label'].":</td>\n";
echo '<td><input type="radio" name="newDateFormat" value="1"'.($newDateFormat == 1 ? 'checked="checked"' : '').' /> '.$ax['dd_mm_yyyy']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newDateFormat" value="2"'.($newDateFormat == 2 ? 'checked="checked"' : '').' /> '.$ax['mm_dd_yyyy']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newDateFormat" value="3"'.($newDateFormat == 3 ? 'checked="checked"' : '').' /> '.$ax['yyyy_mm_dd'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['dateUSorEU_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['dateUSorEU_label'].":</td>\n";
echo '<td><input type="radio" name="newDateUSorEU" value="0"'.($newDateUSorEU == 0 ? 'checked="checked"' : '').' /> '.$ax['date_format_us']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newDateUSorEU" value="1"'.($newDateUSorEU == 1 ? 'checked="checked"' : '').' /> '.$ax['date_format_eu'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['dateSep_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['dateSep_label'].":</td>\n";
echo '<td><input type="radio" name="newDateSep" value="."'.($newDateSep == "." ? 'checked="checked"' : '').' /> '.$ax['dot'].' ( . )'."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newDateSep" value="/"'.($newDateSep == "/" ? 'checked="checked"' : '').' /> '.$ax['slash'].' ( / )'."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newDateSep" value="-"'.($newDateSep == "-" ? 'checked="checked"' : '').' /> '.$ax['hyphen'].' ( - )</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['time24_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['time24_label'].":</td>\n";
echo '<td><input type="radio" name="newTime24" value="0"'.($newTime24 == 0 ? 'checked="checked"' : '').' /> '.$ax['time_format_us']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newTime24" value="1"'.($newTime24 == 1 ? 'checked="checked"' : '').' /> '.$ax['time_format_eu'].'</td></tr>'."\n";

echo "<tr><td class=\"labelFix\" onmouseover=\"popon('".$ax['weekStart_text']."', 'normal')\" onmouseout=\"popoff()\">".$ax['weekStart_label'].":</td>\n";
echo '<td><input type="radio" name="newWeekStart" value="0"'.($newWeekStart == 0 ? 'checked="checked"' : '').' /> '.$ax['sunday']."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="newWeekStart" value="1"'.($newWeekStart == 1 ? 'checked="checked"' : '').' /> '.$ax['monday'].'</td></tr>'."\n";
?>
</table></td></tr>
</table>
</div>
<input class="button saveSettings" type="submit" name="save" value="<?php echo $ax['set_save_settings']; ?>" />
</form>
