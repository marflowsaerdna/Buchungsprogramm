<?php
/*
= LuxCal resources management page =

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

$rid = isset($_REQUEST['rid']) ? $_REQUEST['rid'] : 0;
$act = isset($_GET['act']) ? $_GET['act'] : "";
$name = isset($_POST['name']) ? trim($_POST['name']) : "";
$tmin = isset($_POST['teamsize_min']) ? trim($_POST['teamsize_min']) : "";
$tmax = isset($_POST['teamsize_max']) ? trim($_POST['teamsize_max']) : "";
$sqnce = isset($_POST['sqnce']) ? $_POST['sqnce'] : 0;
$repeat = isset($_POST['repeat']) ? $_POST['repeat'] : 0;
$public = isset($_POST['public']) ? 1 : 0;
$color = isset($_POST['color']) ? $_POST['color'] : "";
$bgrnd = isset($_POST['bgrnd']) ? $_POST['bgrnd'] : "";

function showResources($edit) {
	global $ax, $sqnce;
	echo '<table class="fieldBox">';
	echo '<tr><td class="legend">&nbsp;'.$ax['res_list'].'&nbsp;</td></tr>';
	$rSet = dbquery("SELECT * FROM [db]resources WHERE status >= 0 ORDER BY sequence");
	if (!$rSet) echo "Database Error.";
	else {
		if (mysqli_num_rows($rSet) > 0) {
			echo "<tr><td>";
			echo '<table class="etable">';
			echo '<thead><tr>';
			echo '<th>&nbsp;'.$ax['res_nr'].'&nbsp;</th>'."\n";
			echo '<th width="120px">'.$ax['res_name'].'</th>'."\n";
			echo '<th>&nbsp;'.$ax['res_repeat'].'</th>'."\n";
			echo '<th>&nbsp;'.$ax['res_teamsize_min'].'</th>'."\n";
			echo '<th>&nbsp;'.$ax['res_teamsize_max'].'&nbsp;</th>'."\n";
			echo '<th>&nbsp;'.$ax['res_public'].'&nbsp;</th><th>'.$ax['res_edit'].'</th><th>'.$ax['res_delete'].'</tr></thead>'."\n";
			echo '<tbody>';
			while ($row=mysqli_fetch_assoc($rSet)) {
				switch ($row['rpeat']) {
					case 0: $repeat = ''; break;
					case 1: $repeat = $ax['res_every_day']; break;
					case 2: $repeat = $ax['res_every_week']; break;
					case 3: $repeat = $ax['res_every_month']; break;
					case 4: $repeat = $ax['res_every_year'];
				}
				echo "<tr><td align=center>".$row['sequence']."</td><td  align=center style=\"color: ".$row['color']."; background-color: ".$row['background'].";\">".stripslashes($row['name'])."</td><td>".$repeat."</td>"."\n";
				echo "<td align=center>".$row['teamsize_min']."</td><td align=center>".$row['teamsize_max']."</td>"."\n";
				echo "<td  align=center>".($row['public'] < 1 ? $ax['no'] : $ax['yes'])."</td>"."\n";
				if (!$edit) {
					echo '<td><span lang="en" title='.$ax['res_edit'].'><a href=index.php?act=edit&amp;rid='.$row['resource_id'].'><img src="images/edit.png" style="valign: middle ; width: 12px; height: 12px;" alt="back" /></a></span></td>'."\n";
//					echo '<td><span lang="en" title='.$ax['res_edit'].'><a href=index.php?act=edit&amp;rid='.$row['resource_id'].'>'.$ax['res_edit'].'</a></span></td>'."\n";
					echo '<td><span lang="en" title='.$ax['res_delete'].'><a href=index.php?delExe=y&amp;rid='.$row['resource_id'].'><img src="images/delete.png" style="valign: middle ; width: 12px; height: 12px;" alt="back" /></a></span></td>'."\n";
					}
					else
					{ echo '<td></td>'; }
				}
				echo '</tr>';
				$sqnce = $row['sequence'];
			}
		}
// letzte Zeile der Tabelle
		echo '<td>';
		echo '<td></td><td></td><td></td><td></td><td></td>';
		echo '<td><span lang="en" title='.$ax['res_add'].'><a href="index.php?act=add&amp;uid=add"><img src="images/plus.png" style="valign: middle ; width: 12px; height: 12px;" alt="back" /></a></span></td>';
		echo '</td><td></td>';
		echo '</tbody>';
		echo "</table>";
		echo "</td></tr>";
	echo '</table>';
	}
	
function editResource($act,$rid) {
	global $ax, $name, $public, $sqnce, $repeat, $color, $bgrnd;
	echo "<table class=\"fieldBox\">\n";
	if ($act != "add") {
		$rSet = dbquery("SELECT * FROM [db]resources WHERE resource_id = $rid LIMIT 1");
		if ($rSet !== false) {
			$row = mysqli_fetch_assoc($rSet);
			$name = stripslashes($row['name']);
			$tmin = $row['teamsize_min'];
			$tmax = $row['teamsize_max'];
			$sqnce = $row['sequence'];
			$repeat = $row['rpeat'];
			$public = $row['public'];
			$color = $row['color'];
			$bgrnd = $row['background'];
		}
		echo '<tr><td class="legend">&nbsp;'.$ax['res_edit_cat'].'&nbsp;</td></tr>'."\n";
	} else {
		echo '<tr><td class="legend">&nbsp;'.$ax['res_add_new'].'&nbsp;</td></tr>'."\n";
		$public = 1; //is default
		$sqnce += 1;
	}
	echo '<form action="index.php" method="post" name="cate">'."\n";
	echo '<input type="hidden" name="rid" id="rid" value="'.$rid.'" />'."\n";
	echo '<tr><td><table cellspacing="10px">'."\n";
	echo '<tr><td>'.$ax['res_name'].':</td><td><input type="text" id="name" name="name" value="'.$name.'" size="20" maxlength="40" style="color: '.$color.'; background-color: '.$bgrnd.'"; /></td></tr>'."\n";
	echo '<tr><td>'.$ax['res_teamsize_min'].':</td><td><input type="text" name="teamsize_min" value="'.$tmin.'" size="1" maxlength="2" /> ('.$ax['res_teamsize_min'].')</td></tr>'."\n";
	echo '<tr><td>'.$ax['res_teamsize_max'].':</td><td><input type="text" name="teamsize_max" value="'.$tmax.'" size="1" maxlength="2" /> ('.$ax['res_teamsize_max'].')</td></tr>'."\n";
	echo '<tr><td>'.$ax['res_repeat'].':</td>';
	echo '<td><select name="repeat">'."\n";
	echo '<option value="0"'.($repeat == "0" ? ' selected="selected"' : '').'>-'."</option>\n";
	echo '<option value="1"'.($repeat == "1" ? ' selected="selected"' : '').'>'.$ax['res_every_day']."</option>\n";
	echo '<option value="2"'.($repeat == "2" ? ' selected="selected"' : '').'>'.$ax['res_every_week']."</option>\n";
	echo '<option value="3"'.($repeat == "3" ? ' selected="selected"' : '').'>'.$ax['res_every_month']."</option>\n";
	echo '<option value="4"'.($repeat == "4" ? ' selected="selected"' : '').'>'.$ax['res_every_year']."</option>\n";
	echo "</select></td></tr>\n";
	echo '<tr><td>'.$ax['res_public'].':</td><td><input type="checkbox" name="public" value="1"'.(($public > 0) ? ' checked="checked" /> ' : ' > ')."</td></tr>\n";
	echo '<tr><td>'.$ax['res_text_color'].':</td><td><input type="text" id="color" name="color" value="'.$color.'" size="8" maxlength="10" /><button title="'.$ax['res_select_color']."\" onclick=\"cPicker('color','name','t'); return false;\">&larr;</button></td></tr>\n";
	echo '<tr><td>'.$ax['res_background'].':</td><td><input type="text" id="bgrnd" name="bgrnd" value="'.$bgrnd.'" size="8" maxlength="10" /><button title="'.$ax['res_select_color']."\" onclick=\"cPicker('bgrnd','name','b'); return false;\">&larr;</button></td></tr>\n";
	echo '<tr><td>'.$ax['res_sequence'].':</td><td><input type="text" name="sqnce" value="'.$sqnce.'" size="1" maxlength="2" /> ('.$ax['res_in_menu'].')</td></tr>'."\n";
	echo "</table>\n";
	echo "</table>\n";
	if ($act == "add") {
		echo '<input type="submit" name="addExe" value="'.$ax['res_add'].'" />';
	} else {
		echo '<input type="submit" name="updExe" value="'.$ax['res_save'].'" />';
	}
	echo '&nbsp;&nbsp;&nbsp;<input type="submit" name="back" value="'.$ax['res_back']."\" />\n";
	echo "</form><br />\n";
	echo "</div>\n";
}


if (isset($_POST['addExe'])) {
	if ((!$color or preg_match("/^#[0-9A-Fa-f]{6}$/", $color)) and (!$bgrnd or preg_match("/^#[0-9A-Fa-f]{6}$/", $bgrnd))) {
		//renumber sequence
		$rSet = dbquery("SELECT resource_id AS rid FROM [db]resources WHERE status >= 0 AND sequence >= $sqnce ORDER BY sequence");
		if ($rSet !== false) {
			$count = $sqnce;
			while ($row = mysqli_fetch_assoc($rSet)) {
				$result = dbquery("UPDATE [db]resources SET sequence = ".++$count." WHERE resource_id = ".$row['rid']);
			}
		}
		//add new resource
		$result = dbquery("INSERT INTO [db]resources (name, teamsize_min, teamsize_max, sequence, rpeat, public, color, background) VALUES ('".mysqli_real_escape_string($link, $name)."', '$tmin', '$tmax', '$sqnce', '$repeat', '$public', '$color', '$bgrnd')");
		if (!$result) { $msg = "Database Error: ".$ax['res_not_added']; }
		else { $msg = $ax['res_added']; }
	} else {
		$msg = $ax['res_invalid_color'];
		$act = "add";
	}
}

if (isset($_POST['updExe'])) {
	if ((!$color or preg_match("/^(#[0-9A-Fa-f]{6})?$/", $color)) and (!$bgrnd or preg_match("/^(#[0-9A-Fa-f]{6})?$/", $bgrnd))) {
		//update resource
		$result = dbquery("UPDATE [db]resources SET name = '".mysqli_real_escape_string($link, $name)."', teamsize_min = '$tmin', teamsize_max = '$tmax', sequence = '$sqnce', rpeat = '$repeat', public = '$public', color = '$color', background = '$bgrnd' WHERE resource_id = $rid");
		if (!$result) { $msg = "Database Error: ".$ax['res_not_updated'];
		} else {
			$msg = $ax['res_updated'];
			//renumber sequence
			$rSet = dbquery("SELECT resource_id AS rid FROM [db]resources WHERE status >= 0 ORDER BY sequence");
			if ($rSet !== false) {
				$count = 0;
				while ($row = mysqli_fetch_assoc($rSet)) {
					if ($row['rid'] != $rid) {
						if ($count == $sqnce) { $count++; }
						$result = dbquery("UPDATE [db]resources SET sequence = ".$count++." WHERE resource_id = ".$row['rid']);
					}
				}
			}
		}
	} else {
		$msg = $ax['res_invalid_color'];
		$act = "edit";
	}
}

if (isset($_GET['delExe'])) {
	//delete resource
	$result = dbquery("UPDATE [db]resources SET sequence = 0, status = -1 WHERE resource_id = $rid");
	if (!$result) { $msg = "Database Error: ".$ax['res_not_deleted'];
	} else {
		$msg = $ax['res_deleted'];
		//renumber sequence
		$rSet = dbquery("SELECT resource_id AS rid FROM [db]resources WHERE status >= 0 ORDER BY sequence");
		if ($rSet !== false) {
			$count = 0;
			while ($row = mysqli_fetch_assoc($rSet)) {
				$result = dbquery("UPDATE [db]resources SET sequence = ".$count++." WHERE resource_id = ".$row['rid']);
			}
		}
	}
}

//Control logc
if ($admin) {
	echo "<br /><p class=".((isset($msg) and $msg) ? '"warningL">'.$msg : '"noWarningL">&nbsp;')."</p>\n";
	if (!$act or isset($_POST['back'])) {
		showResources(false); //no edit
	} else {
//		showResources(true); //edit
		editResource($act,$rid); //action = "add" or "edit"
	}
} else {
	echo "<p class=\"warningL\">".$ax['no_way']."</p>\n";
}
?>