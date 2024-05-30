<?php
/*
= LuxCal briefing management page =

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
if (!defined('LCC') or
		(isset($_REQUEST['rid']) and !preg_match('%^\d{1,4}$%', $_REQUEST['rid'])) or
		(isset($_GET['act']) and !preg_match('%^(add|edit)$%', $_GET['act'])) or
		(isset($_GET['delExe']) and !preg_match('%^\w$%', $_GET['delExe']))
	) { exit('not permitted (resource)'); }
		

//initialize
$adminLang = (file_exists('lang/ai-'.strtolower($_SESSION['cL']).'.php')) ? $_SESSION['cL'] : "English";
require './lang/ai-'.strtolower($adminLang).'.php';

$cMsg =    isset($_POST['cmsg'])    ? $_POST['cmsg']       : "";
$eMsg =    isset($_POST['emsg'])    ? $_POST['emsg']       : "";
$wMsg =    isset($_POST['wmsg'])    ? $_POST['wmsg']       : "";


// Initialize input field names, get briefing matrix from db
$users = dbGetUsers(2);  				// not guest and not admin
$resources = dbGetResources();
foreach ($users as $user) {
	foreach ($resources as $resource) {
		$referrer = "brf_".$user['user_id']."_".$resource['resource_id'];
		$matrix[$user['user_id']][$resource['resource_id']]['rid'] = $resource['resource_id'];
		$matrix[$user['user_id']][$resource['resource_id']]['uid'] = $user['user_id'];
		$dbdat = dbGetBriefings($user['user_id'], $resource['resource_id']);
		if ($dbdat == true)
			$matrix[$user['user_id']][$resource['resource_id']]['brf_dat'] = 'checked';
		else 
			$matrix[$user['user_id']][$resource['resource_id']]['brf_dat'] = '';
		$matrix[$user['user_id']][$resource['resource_id']]['brf_dlg'] = "brf_".$user['user_id']."_".$resource['resource_id'];
	}
}

// Update DB if save was pressed
if (isset($_POST['save'])) {
	foreach ($users as $user) {
		foreach ($resources as $resource) {
			$ref = 'brf_'.$user['user_id'].'_'.$resource['resource_id'];
			if (isset( $_POST[$ref]))
			{
				$matrix[$user['user_id']][$resource['resource_id']]['brf_dat'] = 'checked';
				if (!dbGetBriefings($user['user_id'], $resource['resource_id'])) {		// entry not there - then insert entry?
					$sql = "INSERT INTO [db]users_resources (user_id, resource_id) VALUES (".$user['user_id'].",".$resource['resource_id'].")";
					$result = dbquery($sql);
					if ($result == true) {
						$cMsg = $ax['brf_saved']; unset($eMsg); }
					else {
						$eMsg = $xx['db_error']." SQL=".$sql; unset($cMsg);  }  //add to events table
				} //else nothing to do here
			}
			else {
				$matrix[$user['user_id']][$resource['resource_id']]['brf_dat'] = '';
				if (dbGetBriefings($user['user_id'], $resource['resource_id'])) { // delete entry
					$sql = "DELETE FROM [db]users_resources WHERE user_id =".$user['user_id']." AND resource_id=".$resource['resource_id'];
					$result = dbquery($sql);
					if ($result == true) {
						$cMsg = $ax['brf_saved']; unset($eMsg); }
											else {
						$eMsg = $xx['db_error']." SQL=".$sql; unset($cMsg); } //add to events table
				}
			}
		}
	}
}

if ($eMsg) echo "<p class=\"center error\">".$eMsg."</p>\n";
if ($wMsg) echo "<p class=\"center warning\">".$wMsg."</p>\n";
if ($cMsg) echo "<p class=\"center confirm\">".$cMsg."</p>\n";


echo '<form action="index.php" method="post" name="briefing">'."\n";

echo '<input type="hidden" name="cmsg" value="'.$cMsg.'" />'."\n";
echo '<input type="hidden" name="emsg" value="'.$eMsg.'" />'."\n";
echo '<input type="hidden" name="wmsg" value="'.$wMsg.'" />'."\n";

echo "<table class=\"fieldBox\">\n";
echo "<tr>\n<td class=\"legend\">&nbsp;".$ax['brf_matrix']."&nbsp;</td>\n</tr>\n";
echo "<tr>\n<td>\n";

echo "<table class=\"etable\">\n";
echo "<thead>\n<tr>\n";

echo '<th>'.$ax['res_nr'].'</th>'."\n";
echo '<th>'.$ax['brf_name'].'</th>'."\n";
echo '<th>'.$ax['usr_bsp_date'].'</th>'."\n";

foreach ($resources as $resource)
{
	echo '<th>'.$resource['name'].'</th>'."\n";
}

echo '</tr>'."\n".'</thead>'."\n";
// echo "</table> \n";

// echo "<div id=\"tableContainer\" class=\"tableContainer\"> \n";

// echo "<table class=\"etable\">\n";

echo "<tbody>\n";
$i=1;
foreach ($users as $user)
{
	echo "<tr>\n";
	echo "<td>".$i++."</td>\n";
	echo "<td  width=\"120px\" align=center style=\"background-color: ".$user['color'].";\">".stripslashes($user['name'])."</td>\n";
	echo "<td  width=\"60px\" align=center >".stripslashes($user['BSP_date'])."</td>\n";
	foreach ($resources as $resource)
	{
    	echo '<td width="70px"><input type="checkbox" name="'.$matrix[$user['user_id']][$resource['resource_id']]['brf_dlg']."\" ";
    	if ($matrix[$user['user_id']][$resource['resource_id']]['brf_dat'] == "checked")
    		echo "checked=\"checked\"";
    	echo "></td> \n";
	}
	echo "</tr>\n";
}

echo "</tbody>\n";

echo "</table>\n";

// echo "</div>\n";
echo "</td></tr>\n";
echo "</table>\n";



echo '<input type="submit" name="save" value="'.$ax['brf_save'].'" />'."\n";
echo "&nbsp;&nbsp;<button onclick=\"javascript:window.open('index.php?cP=2')\">".$ax["brf_close"]."</button>\n";
// http://localhost/WvfCal/index.php?cP=2
echo '</form>'."\n";
?>