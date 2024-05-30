<?php
/*
= LuxCal categories management page =

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
		(isset($_REQUEST['cid']) and !preg_match('%^\d{1,4}$%', $_REQUEST['cid'])) or
		(isset($_GET['act']) and !preg_match('%^(add|edit)$%', $_GET['act'])) or
		(isset($_GET['delExe']) and !preg_match('%^(yes|no)$%', $_GET['delExe']))
	) { exit('not permitted (cgry)'); }
		

//initialize
$adminLang = (file_exists('lang/ai-'.strtolower($_SESSION['cL']).'.php')) ? $_SESSION['cL'] : "English";
require './lang/ai-'.strtolower($adminLang).'.php';

$cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;
$act = isset($_GET['act']) ? $_GET['act'] : "";
$name = isset($_POST['name']) ? trim($_POST['name']) : "";
$sqnce = isset($_POST['sqnce']) ? $_POST['sqnce'] : 0;
$repeat = isset($_POST['repeat']) ? $_POST['repeat'] : 0;
$public = isset($_POST['public']) ? 1 : 0;
$color = isset($_POST['color']) ? $_POST['color'] : "";
$bgrnd = isset($_POST['bgrnd']) ? $_POST['bgrnd'] : "";

function showCategories($edit) {
	global $ax, $sqnce;
	echo "<table class=\"fieldBox\">\n";
	echo "<tr><td class=\"legend\">&nbsp;".$ax['cat_list']."&nbsp;</td></tr>\n";
	$rSet = dbquery("SELECT * FROM [db]categories WHERE status >= 0 ORDER BY sequence");
	if (!$rSet) echo "Database Error.";
	else {
		if (mysqli_num_rows($rSet) > 0) {
			echo "<tr><td>\n";
			echo "<table class=\"etable\">\n";
			echo "<thead><tr>\n";
			echo "   <th>&nbsp;".$ax['cat_nr']."&nbsp;</th>\n";
			echo "   <th width=\"120px\">".$ax['cat_name']."</th>\n";
			echo "   <th>&nbsp;".$ax['cat_repeat']."</th>\n";
			echo "   <th>&nbsp;".$ax['cat_public']."&nbsp;</th>\n";
			echo "   <th>".$ax['cat_edit']."</th>\n";
			echo "   <th>".$ax['cat_delete']."</th>\n";
			echo "</tr></thead>\n";
			echo "<tbody>\n";
			while ($row=mysqli_fetch_assoc($rSet)) {
				switch ($row['rpeat']) {
					case 0: $repeat = ''; break;
					case 1: $repeat = $ax['cat_every_day']; break;
					case 2: $repeat = $ax['cat_every_week']; break;
					case 3: $repeat = $ax['cat_every_month']; break;
					case 4: $repeat = $ax['cat_every_year'];
				}
				echo "<tr>\n";
				echo "   <td align=center>".$row['sequence']."</td>\n";
				echo "   <td  align=center style=\"color: ".$row['color']."; background-color: ".$row['background'].";\">".stripslashes($row['name'])."</td>\n";
				echo "   <td>".$repeat."</td>\n";
				echo "   <td  align=center>".($row['public'] < 1 ? $ax['no'] : $ax['yes'])."</td>\n";
				if (!$edit) {
					echo "   <td><span lang=\"en\" title=".$ax['cat_edit']."><a href=index.php?act=edit&amp;cid=".$row['category_id']."><img src=\"images/edit.png\" style=\"valign: middle ; width: 12px; height: 12px;\" alt=\"back\" /></a></span></td>\n";
					echo "   <td><span lang=\"en\" title=".$ax['cat_delete']."><a href=index.php?delExe=yes&amp;cid=".$row['category_id']."><img src=\"images/delete.png\" style=\"valign: middle ; width: 12px; height: 12px;\" alt=\"back\" /></a></span></td>\n";
					}
					else
					{ echo "   <td></td>\n"; }
				echo "</tr>\n";
				}
				$sqnce = $row['sequence'];
			}
		}
// letzte Zeile der Tabelle
		echo "<tr>\n   <td></td>\n";
		echo "   <td></td>\n";
		echo "   <td></td>\n";
		echo "   <td></td>\n";
		echo "   <td><span lang=\"en\" title=".$ax['cat_add']."><a href=\"index.php?act=add&amp;uid=add\"><img src=\"images/plus.png\" style=\"valign: middle ; width: 12px; height: 12px;\" alt=\"back\" /></a></span></td>\n";
		echo "   <td></td>\n";
		echo "</tr></tbody>\n";
		echo "</table>";
	echo '</table>';
	}
	

function editCategory($act,$cid) {
	global $ax, $name, $public, $sqnce, $repeat, $color, $bgrnd;
	echo "<table class=\"fieldBox\">\n";
	if ($act != "add") {
		$rSet = dbquery("SELECT * FROM [db]categories WHERE category_id = $cid LIMIT 1");
		if ($rSet !== false) {
			$row = mysqli_fetch_assoc($rSet);
			$name = stripslashes($row['name']);
			$sqnce = $row['sequence'];
			$repeat = $row['rpeat'];
			$public = $row['public'];
			$color = $row['color'];
			$bgrnd = $row['background'];
		}
		echo '<tr><td class="legend">&nbsp;'.$ax['cat_edit_cat'].'&nbsp;</td></tr>'."\n";
	} else {
		echo '<tr><td class="legend">&nbsp;'.$ax['cat_add_new'].'&nbsp;</td></tr>'."\n";
		$public = 1; //is default
		$sqnce += 1;
	}
	echo '<form action="index.php" method="post" name="cate">'."\n";
	echo '<input type="hidden" name="cid" id="cid" value="'.$cid.'" />'."\n";
	echo '<tr><td><table cellspacing="10px">'."\n";
	echo '<tr><td>'.$ax['cat_name'].':</td><td><input type="text" id="name" name="name" value="'.$name.'" size="20" maxlength="40" style="color: '.$color.'; background-color: '.$bgrnd.'"; /></td></tr>'."\n";
	echo '<tr><td>'.$ax['cat_repeat'].':</td>';
	echo '<td><select name="repeat">'."\n";
	echo '<option value="0"'.($repeat == "0" ? ' selected="selected"' : '').'>-'."</option>\n";
	echo '<option value="1"'.($repeat == "1" ? ' selected="selected"' : '').'>'.$ax['cat_every_day']."</option>\n";
	echo '<option value="2"'.($repeat == "2" ? ' selected="selected"' : '').'>'.$ax['cat_every_week']."</option>\n";
	echo '<option value="3"'.($repeat == "3" ? ' selected="selected"' : '').'>'.$ax['cat_every_month']."</option>\n";
	echo '<option value="4"'.($repeat == "4" ? ' selected="selected"' : '').'>'.$ax['cat_every_year']."</option>\n";
	echo "</select></td></tr>\n";
	echo '<tr><td>'.$ax['cat_public'].':</td><td><input type="checkbox" name="public" value="1"'.(($public > 0) ? ' checked="checked" /> ' : ' > ')."</td></tr>\n";
	echo '<tr><td>'.$ax['cat_text_color'].':</td><td><input type="text" id="color" name="color" value="'.$color.'" size="8" maxlength="10" /><button title="'.$ax['cat_select_color']."\" onclick=\"cPicker('color','name','t'); return false;\">&larr;</button></td></tr>\n";
	echo '<tr><td>'.$ax['cat_background'].':</td><td><input type="text" id="bgrnd" name="bgrnd" value="'.$bgrnd.'" size="8" maxlength="10" /><button title="'.$ax['cat_select_color']."\" onclick=\"cPicker('bgrnd','name','b'); return false;\">&larr;</button></td></tr>\n";
	echo '<tr><td>'.$ax['cat_sequence'].':</td><td><input type="text" name="sqnce" value="'.$sqnce.'" size="1" maxlength="2" /> ('.$ax['cat_in_menu'].')</td></tr>'."\n";
	echo "</table>\n";
	echo "</table>\n";  // fieldbox

	if ($act == "add") {
		echo '<input type="submit" name="addExe" value="'.$ax['cat_add'].'" />';
	} else {
		echo '<input type="submit" name="updExe" value="'.$ax['cat_save'].'" />';
	}
	echo '&nbsp;&nbsp;&nbsp;<input type="submit" name="back" value="'.$ax['cat_back']."\" />\n";
	echo "</form><br />\n";
}


if (isset($_POST['addExe'])) {
	if ((!$color or preg_match("/^#[0-9A-Fa-f]{6}$/", $color)) and (!$bgrnd or preg_match("/^#[0-9A-Fa-f]{6}$/", $bgrnd))) {
		//renumber sequence
		$rSet = dbquery("SELECT category_id AS cid FROM [db]categories WHERE status >= 0 AND sequence >= $sqnce ORDER BY sequence");
		if ($rSet !== false) {
			$count = $sqnce;
			while ($row = mysqli_fetch_assoc($rSet)) {
				$result = dbquery("UPDATE [db]categories SET sequence = ".++$count." WHERE category_id = ".$row['cid']);
			}
		}
		//add new category
		$result = dbquery("INSERT INTO [db]categories (name, sequence, rpeat, public, color, background) VALUES ('".mysqli_real_escape_string($link, $name)."', '$sqnce', '$repeat', '$public', '$color', '$bgrnd')");
		if (!$result) { $msg = "Database Error: ".$ax['cat_not_added']; }
		else { $msg = $ax['cat_added']; }
	} else {
		$msg = $ax['cat_invalid_color'];
		$act = "add";
	}
}

if (isset($_POST['updExe'])) {
	if ((!$color or preg_match("/^(#[0-9A-Fa-f]{6})?$/", $color)) and (!$bgrnd or preg_match("/^(#[0-9A-Fa-f]{6})?$/", $bgrnd))) {
		//update category
		$result = dbquery("UPDATE [db]categories SET name = '".mysqli_real_escape_string($link, $name)."', sequence = '$sqnce', rpeat = '$repeat', public = '$public', color = '$color', background = '$bgrnd' WHERE category_id = $cid");
		if (!$result) { $msg = "Database Error: ".$ax['cat_not_updated'];
		} else {
			$msg = $ax['cat_updated'];
			//renumber sequence
			$rSet = dbquery("SELECT category_id AS cid FROM [db]categories WHERE status >= 0 ORDER BY sequence");
			if ($rSet !== false) {
				$count = 0;
				while ($row = mysqli_fetch_assoc($rSet)) {
					if ($row['cid'] != $cid) {
						if ($count == $sqnce) { $count++; }
						$result = dbquery("UPDATE [db]categories SET sequence = ".$count++." WHERE category_id = ".$row['cid']);
					}
				}
			}
		}
	} else {
		$msg = $ax['cat_invalid_color'];
		$act = "edit";
	}
}

if (isset($_GET['delExe'])) {
	//delete category
	$result = dbquery("UPDATE [db]categories SET sequence = 0, status = -1 WHERE category_id = $cid");
	if (!$result) { $msg = "Database Error: ".$ax['cat_not_deleted'];
	} else {
		$msg = $ax['cat_deleted'];
		//renumber sequence
		$rSet = dbquery("SELECT category_id AS cid FROM [db]categories WHERE status >= 0 ORDER BY sequence");
		if ($rSet !== false) {
			$count = 0;
			while ($row = mysqli_fetch_assoc($rSet)) {
				$result = dbquery("UPDATE [db]categories SET sequence = ".$count++." WHERE category_id = ".$row['cid']);
			}
		}
	}
}

//Control logc
if ($admin) {
	echo "<br /><p class=".((isset($msg) and $msg) ? '"warningL">'.$msg : '"noWarningL">&nbsp;')."</p>\n";
	if (!$act or isset($_POST['back'])) {
		showCategories(false); //no edit
	} else {
//		showCategories(true); //edit
		editCategory($act,$cid); //action = "add" or "edit"
	}
} else {
	echo "<p class=\"warningL\">".$ax['no_way']."</p>\n";
}
?>