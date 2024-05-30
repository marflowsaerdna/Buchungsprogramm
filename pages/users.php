<?php
/*
= LuxCal user management page =

� Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

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
		(isset($_REQUEST['uid']) and !preg_match('%^(add|\d{1,6})$%', $_REQUEST['uid'])) or
		(isset($_REQUEST['editUser']) and !preg_match('%^(y|n)$%', $_REQUEST['editUser'])) or
//		(isset($_GET['delExe']) and !preg_match('%^\w$%', $_GET['delExe']))
		(isset($_GET['delExe']) and !preg_match('%^\w$%', $_GET['delExe']))
) { exit('not permitted (usrs)'); }
		

require('./common/fpdf_x.php');


//initialize
$adminLang = (file_exists('lang/ai-'.strtolower($_SESSION['cL']).'.php')) ? $_SESSION['cL'] : "English";
require './lang/ai-'.strtolower($adminLang).'.php';

$uid = isset($_REQUEST["uid"]) ? $_REQUEST["uid"] : "";
$editUser = isset($_REQUEST["editUser"]) ? $_REQUEST["editUser"] : "";
$uname = isset($_POST["uname"]) ? trim($_POST["uname"]) : '';
$firstname = isset($_POST["firstname"]) ? trim($_POST["firstname"]) : '';
$familyname = isset($_POST["familyname"]) ? trim($_POST["familyname"]) : '';
$phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : '';
$email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
$bsp_date = isset($_POST["bsp_date"]) ? ($_POST["bsp_date"]) : '';
$uiLanguage = isset($_POST["uiLanguage"]) ? $_POST["uiLanguage"] : '';
$bgrnd = isset($_POST['bgrnd']) ? $_POST['bgrnd'] : "";
$userRights = isset($_POST["userRights"]) ? $_POST["userRights"] : 0;
$privPost = ($userRights < 9) ? $userRights : 3; //3: max.
$privAdmin = ($userRights == 9) ? 1 : 0;

function showUsers() {
	global $ax;
	echo "<table class=\"fieldBox\">\n";
	echo '<tr><td class="legend">&nbsp;'.$ax['usr_list_of_users'].'&nbsp;</td></tr>'."\n";
	$rSet = dbquery("SELECT * FROM [db]users WHERE status='active' order by familyname");
	if (!$rSet) echo "Database Error.";
	else {
		if (mysqli_num_rows($rSet) > 0) {
			echo "<tr><td>";
			echo '<table class="etable">'."\n";
			echo "<thead><tr>"."\n";
			echo "<th>".$ax['usr_familyname']."</th>"."\n";
			echo "<th>".$ax['usr_firstname']."</th>"."\n";
			echo "<th>".$ax['usr_phone']." </th>"."\n";
			echo "<th>".$ax['usr_email']."</th>"."\n";
			echo "<th>".$ax['usr_name']."</th>"."\n";
			echo "<th>".$ax['usr_bsp_date']."</th>"."\n";
			echo "<th>".$ax['usr_rights']."</th>"."\n";
			echo "<th>".$ax['usr_language']."</th>"."\n";
			echo "<th>".$ax['usr_login_0']."</th>"."\n";
			echo "<th>".$ax['usr_login_1']."</th>"."\n";
			echo "<th>".$ax['usr_login_cnt']."</th>"."\n";
			echo "<th>".$ax['usr_edit']."</th>"."\n";
			echo "<th>".$ax['usr_delete']."</th>"."\n";
			echo "</tr></thead>\n";

			while ($row = mysqli_fetch_assoc($rSet)) {
				$firstLoginD = ($row['login_0'] != '9999-00-00') ? IDtoDD($row['login_0']) : "";
				$lastLoginD = ($row['login_1'] != '9999-00-00') ? IDtoDD($row['login_1']) : "";
				$style = $row['color'] ?  " style=\"background:".$row['color'].";\"" : '';
				echo '<tbody>'."\n";
				echo '<tr>'."\n";
				echo '<td>'.$row['familyname'].'</td>'."\n";
				echo '<td>'.$row['firstname'].'</td>'."\n";
				echo '<td>'.$row['phone'].'</td>'."\n";
				echo '<td>'.$row['email'].'</td>'."\n";
				echo '<td'.$style.'><b>'.$row['user_name'].'</b></td>'."\n";
				echo '<td>';
				if ($row['BSP_date'] != "0000-00-00")
					echo IDtoDD($row['BSP_date']);
				else 
					echo '-----';
				echo '</td>'."\n";
				if ($row['sedit'] == 1) { echo '<td>'.$ax['usr_admin'].'</td>'."\n";
				} elseif ($row['privs'] == 0) { echo '<td>'.$ax['usr_none'].'</td>'."\n";
				} elseif ($row['privs'] == 1) { echo '<td>'.$ax['usr_view'].'</td>'."\n";
				} elseif ($row['privs'] == 2) { echo '<td>'.$ax['usr_post_own'].'</td>'."\n";
				} elseif ($row['privs'] == 3) { echo '<td>'.$ax['usr_post_all'].'</td>'."\n"; }
				echo "<td>".ucfirst($row['language'])."</td>"."\n";
				echo "<td>".$firstLoginD."</td><td>".$lastLoginD."</td><td>".$row['login_cnt']."</td>"."\n";
    			echo '<td style="background-image: url(../images/edit.png)">'."\n";
				echo '<span lang="en" title='.$ax['usr_edit'].'><a href=index.php?editUser=y&amp;uid='.$row['user_id'].'><img src="images/edit.png" style="valign: middle ; width: 12px; height: 12px;" alt="back" /></a></span>'."\n";
				echo '</td>'."\n";
    			if ($row['user_id'] > 2)
				{
					echo '<td>'."\n";
					echo '<span lang="en" title='.$ax['usr_delete'].'><a href=index.php?delExe=y&amp;uid='.$row['user_id'].'><img src="images/delete.png" style="valign: middle ; width: 12px; height: 12px;" alt="back" /></a></span>'."\n";
//					echo '<input type="submit" name="delExe" value="'.$ax['usr_delete'].'" >';
					echo '</td>'."\n";
				}
				else
				{
					echo '<td>'."\n";
					echo '</td>'."\n";
				}
				echo '</tr></tbody>'."\n";
			}
// letzte Zeile der Tabelle
			echo '<td>'."\n";
			echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>'."\n";
			echo '<span lang="en" title='.$ax['usr_add'].'><a href="index.php?editUser=y&amp;uid=add"><img src="images/plus.png" style="valign: middle ; width: 12px; height: 12px;" alt="back" /></a></span>'."\n";
			echo '</td><td></td>';
			echo "</table>";
			echo "</td></tr>";
		}
	}
	echo "</table>\n";
	echo '</form>';
}

function editUser($uid) {
	global $ax, $language, $uiLanguage, $editUser, $uname, $email, $userRights, $bgrnd;
	echo "<table class=\"fieldBox\">\n";
	if ($uid != "add") {
		$rSet = dbquery("SELECT * FROM [db]users WHERE user_id = $uid limit 1");
		if (mysqli_num_rows($rSet) < 1) {
			echo "<p class=\"warningL\">".$ax['usr_not_found']."</p>\n";
		} else {
			$row = mysqli_fetch_assoc($rSet);
			$uname = stripslashes($row['user_name']);
			$firstname = stripslashes($row['firstname']);
			$famname = stripslashes($row['familyname']);
			$phone = stripslashes($row['phone']);
			$email = stripslashes($row['email']);
			$bsp_date = stripslashes(IDtoDD($row['BSP_date']));
			$userRights = ($row['sedit']) ? 9 : $row['privs'];
			$uiLanguage = $row['language'];
			$bgrnd = $row['color'];
		}
		echo '<tr><td class="legend">&nbsp;'.$ax['usr_edit_user'].'&nbsp;</td></tr>'."\n";
		$pwNote = '<sup>*</sup>:<div style="font-size: .8em"><sup>*</sup> '.$ax['usr_if_changing_pw'].'</div>';
	} else {
		echo '<tr><td class="legend">&nbsp;'.$ax['usr_add'].'&nbsp;</td></tr>'."\n";
		$pwNote = ':';
	}
	if (!$uiLanguage) { $uiLanguage = $language; }
	echo '<form action="index.php" method="post">'."\n";
	echo '<input type="hidden" name="uid" id="uid" value="'.$uid.'" />'."\n";
	echo '<input type="hidden" name="editUser" id="editUser" value="'.$editUser.'" />'."\n";
	echo '<tr><td><table cellspacing="10px">'."\n<tr>";
	echo '<td>'.$ax['usr_name'].':</td><td><input type="text" id="uname" name="uname" size="30" value="'.$uname.'" style="background-color: '.$bgrnd.'";/></td>'."\n</tr>\n";
	if ($uid != 1) { //not public access
		echo '<tr><td>'.$ax['usr_firstname'].':</td><td><input type="text" name="firstname" size="30" value="'.$firstname.'" /></td>'."\n</tr>\n";
		echo '<tr><td>'.$ax['usr_familyname'].':</td><td><input type="text" name="familyname" size="30" value="'.$famname.'" /></td>'."\n</tr>\n";
		echo '<tr><td>'.$ax['usr_phone'].':</td><td><input type="text" name="phone" size="30" value="'.$phone.'" /></td>'."\n</tr>\n";
		echo '<tr><td>'.$ax['usr_email'].':</td><td><input type="text" name="email" size="30" value="'.$email.'" /></td>'."\n</tr>\n";
		echo '<tr><td>'.$ax['usr_bsp_date'].':</td><td><input type="text" name="bsp_date" size="30" value="'.$bsp_date.'" /></td>'."\n</tr>\n";
		echo '<tr><td>'.$ax['usr_password'].$pwNote.'</td><td><input type="password" name="new_pw" size="30" /></td>'."\n</tr>\n";
	}
	echo '<tr><td>'.$ax['usr_rights'].":</td>";
	if ($uid == $_SESSION['uid'] or $uid == 2) {
		echo '<td>'.$ax['usr_admin_functions']."</td>\n";
		echo '<input type="hidden" name="userRights" id="userRights" value="'.$userRights.'" />'."\n";
	} else {
		echo '<td><select name="userRights">'."\n";
			echo '<option value=0'.($userRights == 0 ? ' selected="selected"' : '').'>'.$ax['usr_no_rights']."</option>\n";
			echo '<option value=1'.($userRights == 1 ? ' selected="selected"' : '').'>'.$ax['usr_view_calendar']."</option>\n";
			echo '<option value=2'.($userRights == 2 ? ' selected="selected"' : '').'>'.$ax['usr_post_events_own']."</option>\n";
			echo '<option value=3'.($userRights == 3 ? ' selected="selected"' : '').'>'.$ax['usr_post_events_all']."</option>\n";
			echo '<option value=9'.($userRights == 9 ? ' selected="selected"' : '').'>'.$ax['usr_admin_functions']."</option>\n";
		echo "</select></td>\n";
	}
	echo "</tr>\n";
	echo "<tr><td>".$ax['usr_ui_language'].":</td>\n";
	echo '<td><select name="uiLanguage">'."\n";
		$files = scandir("lang/");
		foreach ($files as $file) {
			if (substr($file, 0, 3) == "ui-") {
				$lang = strtolower(substr($file,3,-4));
				echo '<option value="'.$lang.'"'.(strtolower($uiLanguage) == $lang ? ' selected="selected"' : '').'>'.ucfirst($lang)."</option>\n";
			}
		}
	echo "</select></td></tr>\n";
	echo '<tr><td>'.$ax['usr_background'].':</td><td><input type="text" id="bgrnd" name="bgrnd" value="'.$bgrnd.'" size="8" maxlength="10" /><button title="'.$ax['usr_select_color']."\" onclick=\"cPicker('bgrnd','uname','b'); return false;\">&larr;</button></td></tr>\n";
	echo "</table></td></tr>\n";
	echo "</table>\n";
	if ($uid == "add") {
		echo '<input type="submit" name="addExe" value="'.$ax['usr_add_profile'].'" />';
	} else {
		echo '<input type="submit" name="updExe" value="'.$ax['usr_upd_profile'].'" />';
	}
	echo '&nbsp;&nbsp;&nbsp;<input type="submit" name="back" value="'.$ax['usr_back'].'" />'."\n";
echo "</form>\n";
}

if (isset($_POST['addExe'])) {
	if (!$bgrnd or preg_match("/^#[0-9A-Fa-f]{6}$/", $bgrnd)) {
		while (true) {
			$new_pw = isset($_POST["new_pw"]) ? $_POST["new_pw"] : "";
			if (!$uname or !$email or !$new_pw) { $msg = $ax['usr_cred_required']; break; }
			if (!preg_match("/^[\w\s\._-]{2,}$/", $uname)) { $msg = $ax['usr_un_invalid']; break; }
			if (!preg_match("/^\D\w*?(\.{0,1}(\w|-)+?){0,2}@((\w|-){2,}\.){1,2}\D{2,4}$/", $email)) { $msg = $ax['usr_em_invalid']; break; }
			$rSet = dbquery("SELECT user_name FROM [db]users WHERE user_name = '".mysqli_real_escape_string($link, $uname)."' AND status != 'deleted'");
			if (mysqli_num_rows($rSet) > 0) { $msg = $ax['usr_uname_exists']; break; }
//			$rSet = dbquery("SELECT email FROM [db]users WHERE email = '".mysqli_real_escape_string($link, $email)."' AND status != 'deleted'");   AW: double email allowed
//			if (mysqli_num_rows($rSet) > 0) { $msg = $ax['usr_email_exists']; break; }
			$password = md5($new_pw);
			$dbcmd = "INSERT INTO [db]users (user_name, firstname, familyname, phone, email, BSP_date, password, language, color, status) VALUES ('".mysqli_real_escape_string($link, $uname);
			$dbcmd = $dbcmd."', '".mysqli_real_escape_string($link, $firstname);
			$dbcmd = $dbcmd."', '".mysqli_real_escape_string($link, $familyname);
			$dbcmd = $dbcmd."', '".mysqli_real_escape_string($link, $phone);
			$dbcmd = $dbcmd."', '".mysqli_real_escape_string($link, $email);
			$dbcmd = $dbcmd."', '".DDtoID(mysqli_real_escape_string($link, $bsp_date));
			$dbcmd = $dbcmd."', '$password', '$uiLanguage', '$bgrnd', 'active')";
			$result = dbquery($dbcmd);
//			$result = dbquery("INSERT INTO [db]users (user_name, firstname, familyname, phone, email, BSP_date, password, language, color, status) VALUES ('".mysqli_real_escape_string($link, $uname)."', '".mysqli_real_escape_string($link, firstname)."', '".mysqli_real_escape_string($link, familyname)."', '".mysqli_real_escape_string($link, phone)."', '".mysqli_real_escape_string($link, email)."', '".DDtoID(mysqli_real_escape_string($link, bsp_date))."', '$password', '$uiLanguage', '$bgrnd', 'active')");
			if (!$result) { $msg = "Database Error: ".$ax['usr_not_added']; break; }
			$uid = mysqli_insert_id($link);
			$result = dbquery("UPDATE [db]users SET sedit = $privAdmin, privs = $privPost WHERE user_id = $uid");
			if (!$result) { $msg = "Database Error: ".$ax['usr_not_updated']; break; }
			$msg = $ax['usr_added'];
			$editUser = 'n';
			break;
		}
	} else {
		$msg = $ax['usr_invalid_color'];
	}
}

if (isset($_POST['updExe'])) {
	if (!$bgrnd or preg_match("/^#[0-9A-Fa-f]{6}$/", $bgrnd)) {
		while (true) {
			if (!preg_match("/^[\w\s\._-]{2,}$/", $uname)) { $msg = $ax['usr_un_invalid']; break; }
			if ($uid > 1) { //not Public User
				if (!preg_match("/^\D\w*?(\.{0,1}(\w|-)+?){0,2}@((\w|-){2,}\.){1,2}\D{2,4}$/", $email)) { $msg = $ax['usr_em_invalid']; break; }
			}
			$new_pw = isset($_POST["new_pw"]) ? $_POST["new_pw"] : "";
			if ($new_pw) {
				$password = md5($new_pw);
				$result = dbquery("UPDATE [db]users SET password = '$password' WHERE user_id ='$uid'");
				if (!$result) { $msg = "Database Error: ".$ax['usr_pw_not_updated']; break; }
			}
			$dbcmd = "UPDATE [db]users SET user_name = '".mysqli_real_escape_string($link, $uname);
			$dbcmd = $dbcmd."', firstname = '".mysqli_real_escape_string($link, $firstname);
			$dbcmd = $dbcmd."', familyname = '".mysqli_real_escape_string($link, $familyname);
			$dbcmd = $dbcmd."', phone = '".mysqli_real_escape_string($link, $phone);
			$dbcmd = $dbcmd."', email = '".mysqli_real_escape_string($link, $email);
			$dbcmd = $dbcmd."', BSP_date = '".mysqli_real_escape_string($link, DDtoID($bsp_date));
			$dbcmd = $dbcmd."', sedit = $privAdmin, privs = $privPost, language = '$uiLanguage', color = '$bgrnd' WHERE user_id = $uid";
			$result = dbquery($dbcmd);
			if (!$result) { $msg .= "Database Error: ".$ax['usr_not_updated']; break; }
			$msg = $ax['usr_updated'];
			$editUser = 'n';
			break;
		}
	} else {
		$msg = $ax['usr_invalid_color'];
	}
}

if (isset($_REQUEST["delExe"])) {
	while (true) {
		if ($uid == $_SESSION['uid']) { $msg = $ax['usr_cant_delete_yourself']; break; }
		$result = dbquery("UPDATE [db]users SET status = 'deleted' WHERE user_id = $uid");
		if (!$result) { $msg = "Database Error: ".$ax['usr_not_deleted']; break; }
		$msg = $ax['usr_deleted'];
		break;
	}
}

if (isset($_GET["PrintPDF"]))
{
		$pdf = new cPDFx;
		$pdf->PDFX('L','mm','A4');
		$pdf->SetTitle($ax['usr_list_of_users'], false);
		$pdf->SetLogo('./images/WeisserHai.png');
		// Column headings
		$header = array(array("txt" => 'Name', "width" => 35),
						array("txt" => 'Vorname', "width" => 35),
						array("txt" => 'Telefon', "width" => 35),
						array("txt" => 'email', "width" => 80),
						array("txt" => 'user', "width" => 30),
						array("txt" => 'BS_P', "width" => 30),
						array("txt" => 'Priv', "width" => 15),
						array("txt" => '#logs', "width" => 15)
						);
		// Data loading
		$rSet = dbquery("SELECT * FROM [db]users WHERE status='active' order by familyname");
		if (!$rSet)
			echo "Database Error.";
		else
		{
			$data = array();
			if (mysqli_num_rows($rSet) > 0) {
				while ($row = mysqli_fetch_assoc($rSet))
				{
					$line = array(	'Name' => $row['familyname'],
					'Vorname' => $row['firstname'],
					'Tel' => $row['phone'],
					'email' => $row['email'],
					'user_name' => $row['user_name'],
					'BSP' => $row['BSP_date'],
					'Priv' => $row['privs'],
					'#logs' => $row['login_cnt']
					);
					array_push($data, $line);
				}
			}
		}
		$pdf->SetFont('Arial','',14);
		$pdf->AddPage();
		$pdf->FancyTable($header,$data);
		$pdf->Output();
		exit();
}

//Control logic
if ($admin) {
	echo "<br /><p class=".((isset($msg) and $msg) ? '"warningL">'.$msg : '"noWarningL">&nbsp;')."</p>\n";
	//display header
	if ($editUser != 'y' or isset($_POST["back"])) {
		if (!$mobile) {
			echo "<div class=\"floatM\">\n";
//			echo '<input  type="submit" name="Print PDF" value="Print PDF" />';
//			echo '<button class="floatR noprintx" onclick="printNice(\'noprintx\');">'.$xx["vws_print_all"]."</button>\n";
			echo '<span lang="en" title="Print PDF"><a href=index.php?PrintPDF=y><img src="images/png/PdfIcon.png" style="valign: middle ; width: 40px; height: 40px;" alt="back" /></a></span>'."\n";
			echo "</div>";
		}
		showUsers();
	} else {
		editUser($uid);
	}
} else {
		echo "<p class=\"warningL\">".$ax['no_way']."</p>\n";
}
?>
