<?php
/*
= CSV event file import script =

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
if (!defined('LCC')) { exit('not permitted (imcs)'); } //lounch via script only

//initialize
$adminLang = (file_exists('lang/ai-'.strtolower($_SESSION['cL']).'.php')) ? $_SESSION['cL'] : "English";
require './lang/ai-'.strtolower($adminLang).'.php';

$birthdayID = (isset($_POST["birthdayID"])) ? $_POST["birthdayID"] : 1;
$dFormat = (isset($_POST["dFormat"])) ? $_POST["dFormat"] : 3;
$tFormat = (isset($_POST["tFormat"])) ? $_POST["tFormat"] : 1;


/* sub-functions */

function processEvtFields(&$sDate,&$eDate,&$sTime,&$eTime,&$title,&$catID) {
	global $dFormat, $tFormat;
	
	//Get calendar resource ids
	$rSet = dbquery("SELECT resource_id FROM [db]resources WHERE status >= 0");
	$catIDs = array();
	if ($rSet) {
 		while ($row = mysqli_fetch_assoc($rSet)) {
			$catIDs[] = $row['resource_id'];
		}
	}
	
	//Processing
	$errors = 0;
	$nofDates = count($sDate);
	for ($i = 0; $i < $nofDates; $i++) {
		$error = 0;
		if (($IsDate = DDtoID($sDate[$i],$dFormat)) === false) { $error++; }
		if ($eDate[$i]) {
			if (($IeDate = DDtoID($eDate[$i],$dFormat)) === false) { $error++; }
		}
		if ($sTime[$i]) {
			if (($IsTime = DTtoIT($sTime[$i],$tFormat)) === false) { $error++; }
		}
		if ($eTime[$i]) {
			if (($IeTime = DTtoIT($eTime[$i],$tFormat)) === false) { $error++; }
		}
		if (!$error) {
			if ($eDate[$i]) {
				if ($IsDate == $IeDate) { $eDate[$i] = ""; }
				elseif ($IeDate < $IsDate) {
					$temp = $eDate[$i];
					$eDate[$i] = $sDate[$i];
					$sDate[$i] = $temp;
				}
				elseif ($IeDate > $IsDate and $IsTime == "00:00" and $IeTime == "00:00") {
					$eDate[$i] = IDtoDD(date("Y-m-d",mktime(0, 0, 0, substr($IeDate,5,2) , substr($IeDate,8,2), substr($IeDate,0,4)) - 86400),$dFormat);
					$eTime[$i] = ITtoDT("23:59",$tFormat);
				}
			}
			if (!$sTime[$i] and !$eTime[$i]) { $sTime[$i] = ITtoDT("00:00",$tFormat); $eTime[$i] = ITtoDT("23:59",$tFormat); } //no times: all day
			if (!$sTime[$i] and $eTime[$i]) { $sTime[$i] = $eTime[$i]; }
			if ($sTime[$i] == $eTime[$i]) { $eTime[$i] = ""; }
			if ($eTime[$i]) {
				if ($IeTime < $IsTime) {
					$temp = $eTime[$i];
					$eTime[$i] = $sTime[$i];
					$sTime[$i] = $temp;
				}
			}
		}
		$errors += $error;
		if (!$title[$i]) { $errors++; } //title empty
		if (!in_array($catID[$i], $catIDs)) { $catID[$i] = 0; } //reset non-existing resource IDs
	}
return $errors;
}

function eventInDb($title,$sDate,$eDate,$sTime,$eTime) {
	/* test if event present in db */
	$q =
	"SELECT
		title
	FROM [db]events
	WHERE
		status >= 0
		AND title = '$title'
		AND s_date = '$sDate'
		AND e_date = '$eDate'
		AND s_time = '$sTime'
		AND e_time = '$eTime'
		";
	$rset = dbquery($q);
	return (mysqli_num_rows($rset) > 0 ? true : false);
}


/* main-functions */

function uploadFile() {
global $ax, $msg, $birthdayID, $dFormat, $tFormat;
echo '<div class="sideBar floatR">'."\n";
echo $ax["xpl_import_csv"];
echo '<table class="grid">'."\n";
echo '<tr><th style="width:auto;">ID</th><th style="width:auto;">'.$ax["iex_resource"]."</th></tr>\n";
$rSet = dbquery("SELECT resource_id AS cid, name AS cnm FROM [db]resources WHERE status >= 0 ORDER BY resource_id");
if (!$rSet) {
	echo $ax['iex_db_error'];
} else {
	while ($row = mysqli_fetch_assoc($rSet)) {
		echo "<tr><td style=\"text-align:center\">".$row['cid']."</td><td>&nbsp;".$row['cnm']."</td></tr>\n";
	}
}
echo "</table>\n";
echo "</div>\n";
$separator = (isset($_POST["separator"])) ? $_POST["separator"] : ",";
echo ($msg) ? "<br /><p class=\"error\">".$msg."</p>\n" : "<br /><p class=\"noMessage\">&nbsp;</p>\n";
echo '<div class="container">'."\n";
echo '<form action="index.php" method="post" enctype="multipart/form-data">'."\n";
echo '<table class="fieldBox">'."\n";
echo '<tr><td class="legend" colspan="2">&nbsp;'.$ax["iex_upload_csv"].'&nbsp;</td></tr>'."\n";
echo '<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />'."\n";
echo '<tr><td class="label">'.$ax["iex_file"].':</td><td><input type="file" name="fileName" size="30" /></td></tr>'."\n";
echo '<tr><td class="label">'.$ax["iex_fields_sep_by"].':</td><td><input type="text" name="separator" value="'.$separator.'" size="1" /></td></tr>'."\n";
echo '<tr><td class="label">'.$ax["iex_birthday_res_id"].':</td><td><input type="text" name="birthdayID" value="'.$birthdayID.'" size="1" /> ('.$ax["iex_see_insert"].')</td></tr>'."\n";
echo '<tr><td class="label">'.$ax["iex_date_format"].':</td><td>'."\n";
echo '<input type="radio" name="dFormat" value="1"'.($dFormat == 1 ? 'checked="checked"' : '').' /> '.$ax["dd_mm_yyyy"]."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="dFormat" value="2"'.($dFormat == 2 ? 'checked="checked"' : '').' /> '.$ax["mm_dd_yyyy"]."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="dFormat" value="3"'.($dFormat == 3 ? 'checked="checked"' : '').' /> '.$ax["yyyy_mm_dd"].'</td></tr>'."\n";
echo '<tr><td class="label">'.$ax["iex_time_format"].':</td><td>'."\n";
echo '<input type="radio" name="tFormat" value="0"'.($tFormat == 0 ? 'checked="checked"' : '').' /> '.$ax["time_format_us"]."&nbsp;&nbsp;&nbsp;\n";
echo '<input type="radio" name="tFormat" value="1"'.($tFormat == 1 ? 'checked="checked"' : '').' /> '.$ax["time_format_eu"].'</td></tr>'."\n";
echo "</table>\n";
echo '<input type="submit" name="uploadFile" value="'.$ax["iex_upload_file"].'" />'."\n";
echo "</form>\n";
echo "</div>\n";
echo '<div style="clear:right"></div>'."\n";
}

function processUpload() {
	global $ax;
	$fileName = $_FILES['fileName']['tmp_name'];
	if (!$fileName) { return $ax["iex_no_file_name"]; } //csv file missing
	if (strlen(trim($_POST["separator"])) != 1) { return $ax["iex_inval_field_sep"]; } //invalid date separator
	$fp = fopen($fileName, "r");
	fgetcsv($fp, 10000, trim($_POST["separator"])); //flush header line
//read events from CSV file
	while ((list($title, $venue, $cat, $sDate, $eDate, $sTime, $eTime, $desc) = fgetcsv($fp, 10000, trim($_POST["separator"]))) !== FALSE) {
		if ($title) {
			$_POST["title"][] = $title;
			$_POST["venue"][] = $venue;
			$_POST["catID"][] = $cat;
			$_POST["sDate"][] = $sDate;
			$_POST["eDate"][]= $eDate;
			$_POST["sTime"][] = $sTime;
			$_POST["eTime"][] = $eTime;
			$_POST["descr"][] = $desc;
			$_POST["birthday"][] = 0;
			$_POST["delete"][] = 0;
		}
	}
	fclose($fp);
	unlink($fileName);
	return ""; //no error
}

function addEvents($firstPass) {
	global $ax, $birthdayID, $dFormat, $tFormat;
	$msg = "";
	
	$errors = processEvtFields($_POST["sDate"],$_POST["eDate"],$_POST["sTime"],$_POST["eTime"],$_POST["title"],$_POST["catID"]);
	if ($errors > 0 or $firstPass) {	//date/time errors or initial display
		echo "<p class=\"error\">".$ax['iex_number_of_errors'].": ".$errors." (".$ax['iex_bgnd_highlighted'].")</p><br />\n";
		echo "<div class=\"container\">\n";
		echo "<h4>".$ax['iex_verify_event_list']." \"".$ax['iex_add_events']."\"</h4><br />\n";
		echo $ax['iex_select_birthday_delete']."<br /><br />\n";
//display event list
		echo "<form action=\"index.php\" method=\"post\">\n";
		echo "<input type=\"hidden\" name=\"birthdayID\" value=\"".$birthdayID."\" />\n";
		echo "<input type=\"hidden\" name=\"dFormat\" value=\"".$dFormat."\" />\n";
		echo "<input type=\"hidden\" name=\"tFormat\" value=\"".$tFormat."\" />\n";
		$nofEvents = count($_POST["title"]);
		echo "<table>\n";
		echo "<tr><th>".$ax['iex_delete']."</th><th>".$ax['iex_birthday']."</th><th>".$ax['iex_title']."</th><th>".$ax['iex_venue']."</th><th>".$ax['iex_resource']."</th><th>".$ax['iex_date']."</th><th>".$ax['iex_end_date']."</th><th>".$ax['iex_start_time']."</th><th>".$ax['iex_end_time']."</th><th>".$ax['iex_description']."</th></tr>\n";
		for ($i = 0; $i < $nofEvents; $i++) {
			$tic = (!$_POST["title"][$i]) ? " class=\"inputError\"" : "";
			$sdc = (DDtoID($_POST["sDate"][$i],$dFormat) === false) ? " class=\"inputError\"" : "";
			$edc = (($_POST["eDate"][$i]) and (DDtoID($_POST["eDate"][$i],$dFormat) === false)) ? " class=\"inputError\"" : "";
			$stc = (DTtoIT($_POST["sTime"][$i],$tFormat) === false) ? " class=\"inputError\"" : "";
			$etc = (($_POST["eTime"][$i]) and (DTtoIT($_POST["eTime"][$i],$tFormat) === false)) ? " class=\"inputError\"" : "";
			echo "<tr>\n";
			echo "<td align=\"center\"><input type=\"checkbox\" name=\"delete[".$i."]\" value=\"1\"".(empty($_POST["delete"][$i]) ? "" : " 'checked'")." /></td>\n";
			echo "<td align=\"center\"><input type=\"checkbox\" name=\"birthday[".$i."]\" value=\"1\"".(empty($_POST["birthday"][$i]) ? "" : " 'checked'")." /></td>\n";
			echo "<td><input type=\"text\"".$tic." size=\"20\" name=\"title[]\" value=\"".stripslashes(substr($_POST["title"][$i],0,64))."\" /></td>\n";
			echo "<td><input type=\"text\" size=\"20\" name=\"venue[]\" value=\"".stripslashes(substr($_POST["venue"][$i],0,64))."\" /></td>\n";
			echo "<td><input type=\"text\" size=\"2\" name=\"catID[]\" value=\"".$_POST["catID"][$i]."\" /></td>\n";
			echo "<td><input type=\"text\"".$sdc." size=\"10\" name=\"sDate[]\" value=\"".$_POST["sDate"][$i]."\" /></td>\n";
			echo "<td><input type=\"text\"".$edc." size=\"10\" name=\"eDate[]\" value=\"".$_POST["eDate"][$i]."\" /></td>\n";
			echo "<td><input type=\"text\"".$stc." size=\"5\" name=\"sTime[]\" value=\"".$_POST["sTime"][$i]."\" /></td>\n";
			echo "<td><input type=\"text\"".$etc." size=\"5\" name=\"eTime[]\" value=\"".$_POST["eTime"][$i]."\" /></td>\n";
			echo "<td><textarea cols=\"30\" rows=\"1\" name=\"descr[]\">".stripslashes($_POST["descr"][$i])."</textarea></td>\n";
			echo "</tr>\n";
		}
		echo "</table>\n";
		echo "<br /><input type=\"submit\" name=\"addEvents\" value=\"".$ax["iex_add_events"]."\" />\n";
		echo "</form>\n";
		echo "</div>\n";
	} else {
		$nofEvents = count($_POST["title"]);
		$added = $dropped = 0;
		for ($i = 0; $i < $nofEvents; $i++) {
			if (empty($_POST["delete"][$i])) {
				$title = addslashes(strip_tags(trim($_POST["title"][$i])));
				$venue = addslashes(strip_tags(trim($_POST["venue"][$i])));
				$descr = addslashes(strip_tags(trim($_POST["descr"][$i]),'<a>')); //allow URLs
				$sDate = DDtoID($_POST["sDate"][$i],$dFormat);
				$eDate = ($_POST["eDate"][$i]) ? DDtoID($_POST["eDate"][$i],$dFormat) : "9999-00-00";
				$sTime = DTtoIT($_POST["sTime"][$i],$tFormat);
				$eTime = ($_POST["eTime"][$i]) ? DTtoIT($_POST["eTime"][$i],$tFormat) : "99:00:00";
				$catID = ($_POST["catID"][$i]) ? $_POST["catID"][$i] : 1; //no cat
				$rType = 0;
				$rInterval = 0;
				$rPeriod = 0;
				if (!empty($_POST["birthday"][$i]) or $catID == $birthdayID) { //birthday
					$rType = 1;
					$rInterval = 1;
					$rPeriod = 4;
					$eDate = "9999-00-00";
					$catID = $birthdayID;
				}
				if (!eventInDb($title,$sDate,$eDate,$sTime,$eTime)) {
//update events db
					$q = "INSERT INTO [db]events (title, description, resource_id, venue, user_id, s_date, e_date, s_time, e_time, r_type, r_interval, r_period, a_date, m_date) VALUES ('$title', '$descr', $catID, '$venue', {$_SESSION['uid']}, '$sDate', '$eDate', '$sTime', '$eTime', $rType, $rInterval, $rPeriod, '".date("Y-m-d")."', '".date("Y-m-d")."')";
					$result = dbquery($q);
					if (!$result) { $msg = $ax['iex_db_error']; }
					$added++;
				} else {
					$dropped++;
				}
			}
		}
		if (!$msg) $msg = $added." ".$ax['iex_events_added'].($dropped > 0 ? " / ".$dropped." ".$ax['iex_events_dropped'] : "");
	}
	return $msg;
}


//control logic

$msg = ""; //init
if ($admin) {
	echo ($msg) ? "<p class=\"warningL\">".$msg."</p>\n" : "<p class=\"noWarningL\">&nbsp;</p>\n";
	echo "<div class=\"scrollBoxAd\">\n";
	while (true) {
		if (isset($_POST["uploadFile"])) {
			$msg = processUpload();
			if ($msg) {
				uploadFile(); //error - again
			} else {
				addEvents(true); //success, display events
			}
			break;
		}
		if (isset($_POST["addEvents"])) {
			$msg = addEvents(false);
			if ($msg) echo "<p class=\"error\">".$msg."</p><br />\n";
			echo '<a href="index.php?cP=96"><button>'.$ax['iex_back']."</button></a>\n";
			break;
		}
		if (!isset($_POST["uploadFile"]) and !isset($_POST["addEvents"])) {
			uploadFile();
			break;
		}
	}
	echo "</div>\n";
} else {
	echo "<p class=\"warningL\">".$ax["no_way"]."</p>\n";
}
?>
