<?php
/*
= LuxCal log in / register / change personal data page =

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
		(isset($_GET['log_out']) and !preg_match('%^\w$%', $_GET['log_out']))
	) { exit('not permitted (logi)'); }
		

//initialize
$adminLang = (file_exists('lang/ai-'.strtolower($_SESSION['cL']).'.php')) ? $_SESSION['cL'] : "English";
require './lang/ai-'.strtolower($adminLang).'.php';

$l_un_em = isset($_POST["l_un_em"]) ? $_POST["l_un_em"] : '';
$l_uname = isset($_POST["l_uname"]) ? trim($_POST["l_uname"]) : '';
$l_pword = isset($_POST["l_pword"]) ? $_POST["l_pword"] : '';
$l_email = isset($_POST["l_email"]) ? trim($_POST["l_email"]) : '';
$l_newun = isset($_POST["l_newun"]) ? trim($_POST["l_newun"]) : '';
$l_newem = isset($_POST["l_newem"]) ? trim($_POST["l_newem"]) : '';
$l_lang = isset($_POST["l_lang"]) ? $_POST["l_lang"] : $language;
$cookie = isset($_POST['cookie']) ? true : false;

if (isset($_POST["exereg"])) { //process registration
	while (true) {
		if (!$l_uname) { $msg = $ax['log_no_un']; break; }
		if (!$l_email) { $msg = $ax['log_no_em']; break; }
		if (!preg_match("/^[\w\s\._-]{2,}$/", $l_uname)) { $msg = $ax['log_un_invalid']; break; }
		if (!preg_match("/^\D\w*?(\.{0,1}(\w|-)+?){0,2}@((\w|-){2,}\.){1,3}\w{2,4}$/", $l_email)) { $msg = $ax['log_em_invalid']; break; }
		$result = dbquery("SELECT user_name FROM [db]users WHERE user_name = '".mysqli_real_escape_string($link, $l_uname)."' AND status='active'");
		if (mysqli_num_rows($result) > 0) { $msg = $ax['log_un_exists']; break; }
//		$result = dbquery("SELECT email FROM [db]users WHERE email = '".mysqli_real_escape_string($link, $l_email)."' AND status=\'active\'");   // no login with email because double email allowed
//		if (mysqli_num_rows($result) > 0) { $msg = $ax['log_em_exists']; break; }
		$newpw = substr(md5($l_uname.microtime()), 0, 8);
		$cryptpw = md5($newpw);
		$result = dbquery("INSERT INTO [db]users (user_name, password, email, privs, language) VALUES ('".mysqli_real_escape_string($link, $l_uname)."', '$cryptpw', '".mysqli_real_escape_string($link, $l_email)."', $selfRegPrivs, '$l_lang')");
		if (!$result) { $msg = "Database Error: ".$ax['log_not_registered']; break; }
		$message = $ax['log_pw_msg'].' '.$calendarTitle.".\n\n".$newpw."\n\n";
		$subject = $ax['log_pw_subject_pre'].' '.$calendarTitle.' '.$ax['log_pw_subject_post'];
		mail($l_email, $subject, $message, "From: \"".$calendarTitle."\" <".$calendarEmail.">"); //send email
		unset($_POST["exereg"]); //go to login
		$_POST["l_un_em"] = $l_uname; //save uname for log in
		$msg = $ax['log_registered'];
		break;
	}
}

if (isset($_POST["exechg"])) { //process changes
	$l_newpw = isset($_POST["l_newpw"]) ? trim($_POST["l_newpw"]) : '';
	while (true) {
		if (!$l_un_em) { $msg = $ax['log_no_un']; break; }
		if (!$l_pword) { $msg = $ax['log_no_pw']; break; }
		$md5_pw = md5($l_pword);
		$result = dbquery("SELECT * FROM [db]users WHERE (user_name = BINARY '".mysqli_real_escape_string($link, $l_un_em)."' OR email = '".mysqli_real_escape_string($link, $l_un_em)."') AND (password = '$md5_pw' OR temp_password = '$md5_pw') AND status='active'");
		if (mysqli_num_rows($result) == 0) { $msg = $ax['log_un_em_pw_invalid']; break; }
		$row = mysqli_fetch_assoc($result); //fetch user details
		if (!$l_newun and !$l_newem and !$l_newpw and $l_lang == $row['language']) { $msg = $ax['log_no_new_data']; break; }
		$update = ''; //db update description
		if ($l_newun) {
			if (!preg_match("/^(\w|-|.){2,}$/", $l_newun)) { $msg = $ax['log_invalid_new_un']; break; }
			$result = dbquery("SELECT user_name FROM [db]users WHERE user_name = '".mysqli_real_escape_string($link, $l_newun)."' AND status=\'active\'");
			if (mysqli_num_rows($result) > 0) { $msg = $ax['log_new_un_exists']; break; }
			$update .= "user_name = '".mysqli_real_escape_string($link, $l_newun)."',";
		}
		if ($l_newem) {
		if (!preg_match("/^\D\w*?(\.{0,1}(\w|-)+?){0,2}@((\w|-){2,}\.){1,2}\D{2,4}$/", $l_newem)) { $msg = $ax['log_invalid_new_em']; break; }
			$result = dbquery("SELECT email FROM [db]users WHERE email = '".mysqli_real_escape_string($link, $l_newem)."' AND status >= 0");
			if (mysqli_num_rows($result) > 0) { $msg = $ax['log_new_em_exists']; break; }
			$update .= "email = '".mysqli_real_escape_string($link, $l_newem)."',";
		}
		if ($l_newpw) {
			$update .= "password = '".md5($l_newpw)."',";
		}
		if ($l_lang) {
			$update .= "language = '".$l_lang."'";
		}
		$update = trim($update, ",");
		$result = dbquery("UPDATE [db]users SET $update WHERE user_id = '{$row['user_id']}'");
		if (!$result) { $msg = "Database Error: ".$ax['usr_not_updated']; break; }
		if ($l_newun) { $l_un_em = $l_newun; }
		$msg = $ax['usr_updated'];
		break;
	}
}

if (isset($_POST["log_in"])) { //process log in
	$l_pword = isset($_POST["l_pword"]) ? $_POST["l_pword"] : "";
	while (true) {
		if (!$l_un_em) { $msg = $ax['log_no_un']; break; }
		if (!$l_pword) { $msg = $ax['log_no_pw']; break; }
		$md5_pw = md5($l_pword);
		$result = dbquery("SELECT * FROM [db]users WHERE (user_name = BINARY '".mysqli_real_escape_string($link, $l_un_em)."' OR email = '".mysqli_real_escape_string($link, $l_un_em)."') AND (password = '$md5_pw' OR temp_password = '$md5_pw') AND status='active'");
		$num_rows = mysqli_num_rows($result);
		if ( $num_rows == 0) {
			$msg = $ax['log_un_em_pw_invalid'];
			 break;
		}
		$row = mysqli_fetch_assoc($result);
		if ($row['privs'] < 1) { $msg = $ax['log_no_rights']; break; }
		if ($row['temp_password'] == $md5_pw) { //new password
			dbquery("UPDATE [db]users SET password = '".$md5_pw."', temp_password = NULL WHERE user_id = '{$row['user_id']}'");
		}
		$today = date('Y-m-d');
		if ($row['login_0'][0] == '9') { //first login
			dbquery("UPDATE [db]users SET login_0 = '".$today."', login_1 = '".$today."', login_cnt = 1 WHERE user_id = '{$row['user_id']}'");
		} else {
			dbquery("UPDATE [db]users SET login_1 = '".$today."', login_cnt = login_cnt+1 WHERE user_id = '{$row['user_id']}'");
		}
		$_SESSION['uid'] = $row['user_id'];
		$_SESSION['cL'] = $row['language'];
		echo '<meta http-equiv="refresh" content="0;url=index.php?cP=0&'.($cookie ? 'bake=1' : 'bake=-1').'">'; //default page
		break;
	}
}

if (isset($_GET["log_out"])) { //process log out
	// for testing
//	unset($_SESSION['wvf_password']);
	$_SESSION['uid'] = 1; //public user
	echo '<meta http-equiv="refresh" content="0;url=index.php?cP=0">'; //default page
}

if (isset($_POST["spw"])) {
	while (true) {
		if (!$l_un_em) { $msg = $ax['log_no_un']; break; }
		$result = dbquery("SELECT email AS eml FROM [db]users WHERE (user_name = BINARY '".mysqli_real_escape_string($link, $l_un_em)."' OR email = '".mysqli_real_escape_string($link, $l_un_em)."') AND status='active'");
		if (mysqli_num_rows($result) == 0) { $msg = $ax['log_un_invalid']; break; }
		$row = mysqli_fetch_assoc($result);
		$sendto = stripslashes($row['eml']);
		$newpw = substr(md5($l_un_em.microtime()), 0, 8);
		$cryptpw = md5($newpw);
		dbquery("UPDATE [db]users SET temp_password = '".$cryptpw."' WHERE user_name = BINARY '".mysqli_real_escape_string($link, $l_un_em)."' OR email = '".mysqli_real_escape_string($link, $l_un_em)."'");
		$message = $ax['log_npw_msg'].' '.$calendarTitle.".\n\n".$newpw."\n\n";
		$subject = $ax['log_npw_subject_pre'].' '.$calendarTitle.' '.$ax['log_npw_subject_post'];
//		if (!wvfcal_email('', $_SESSION['notify'], $subject, $message, $headers, "notify_email.php"))
//			$eMsg = "Benachrichtigungs-Email nicht verschickt!";
		if (!wvfcal_email('', $sendto, '', '',  $subject, $message, "From: \"".$calendarTitle."\" <".$calendarEmail.">", "login_email.php", "")) //send email
			$msg = "Benachrichtigungs-Email nicht verschickt!";
		else 
			$msg = $ax['log_npw_sent'];
		break;
	}
}

echo "<br /><p class=".((isset($msg) and $msg) ? '"center error">'.$msg : '"center noMessage">&nbsp;')."</p>\n";

if (!isset($_SESSION['uid']) or $_SESSION['uid'] != 1) { exit; }
?>
<div class="container">
<br /><br /><br />
<fieldset class="loginBox center">
<?php
if (isset($_POST["reg"]) or isset($_POST["exereg"])) { //register
if (!$l_uname and $l_un_em and !strstr($l_un_em, '@')) { $l_uname = $l_un_em; }
echo '<div class="legendI">&nbsp;'.$ax['log_register'].'&nbsp;</div><br /><br />'."\n";
echo '<form action="index.php" method="post">'."\n";
echo '<input type="hidden" name="l_un_em" value="'.$l_un_em.'" />'."\n";
echo $ax['log_un']."<br />\n";
echo '<input tabindex="1" type="text" name="l_uname" id="start" size="50" value="'.$l_uname.'" /><br /><br />'."\n";
echo $ax['log_em']."<br />\n";
echo '<input tabindex="2" type="text" name="l_email" size="50" value="'.$l_email.'" /><br /><br />'."\n";
// echo $ax['log_ui_language']."<br />\n";
// echo '<select name="l_lang">'."\n";
//	$files = scandir("lang/");
//	foreach ($files as $file) {
//		if (substr($file, 0, 3) == "ui-") {
//			$lang = strtolower(substr($file,3,-4));
//			echo '<option value="'.$lang.'"'.(strtolower($l_lang) == $lang ? ' selected="selected"' : '').'>'.ucfirst($lang)."</option>\n";
//		}
//	}
// echo "</select><br /><br />\n";
echo '<input class="floatR button" type="submit" name="exereg" value="'.$ax['log_register'].'" />'."\n";
echo '<input type="submit" name="back" value="'.$ax['log_back'].'" />'."\n";
echo "</form>\n";
} elseif (isset($_POST["chg"]) or isset($_POST["exechg"])) { //change my data
if ($l_un_em and $l_pword) { 
	$md5_pw = md5($l_pword);
	$result = dbquery("SELECT language AS lng FROM [db]users WHERE (user_name = BINARY '".mysqli_real_escape_string($link, $l_un_em)."' OR email = '".mysqli_real_escape_string($link, $l_un_em)."') AND (password = '$md5_pw' OR temp_password = '$md5_pw')");
	if (mysqli_num_rows($result) == 1) { 
		$row = mysqli_fetch_assoc($result);
		$l_lang = $row['lng'];
	}
}
echo '<div class="legendI">&nbsp;'.$ax['log_change_my_data'].'&nbsp;</div><br /><br />'."\n";
echo '<form action="index.php" method="post">'."\n";
echo $ax['log_un_or_em']."<br />\n";
echo '<input tabindex="1" type="text" name="l_un_em" id="start" size="50" value="'.$l_un_em.'" /><br /><br />'."\n";
echo $ax['log_pw']."<br />\n";
echo '<input tabindex="2" type="password" name="l_pword" size="50" /><br /><br />'."\n";
// echo $ax['log_ui_language']."<br />\n";
// echo '<select name="l_lang">'."\n";
//	$files = scandir("lang/");
//	foreach ($files as $file) {
//		if (substr($file, 0, 3) == "ui-") {
//			$lang = strtolower(substr($file,3,-4));
//			echo '<option value="'.$lang.'"'.(strtolower($l_lang) == $lang ? ' selected="selected"' : '').'>'.ucfirst($lang)."</option>\n";
//		}
//	}
// echo "</select><br /><br />\n";
echo $ax['log_new_un']."<sup>*</sup><br />\n";
echo '<input tabindex="3" type="text" name="l_newun" size="50" value="'.$l_newun.'" /><br /><br />'."\n";
echo $ax['log_new_em']."<sup>*</sup><br />\n";
echo '<input tabindex="4" type="text" name="l_newem" size="50" value="'.$l_newem.'" /><br /><br />'."\n";
echo $ax['log_new_pw']."<sup>*</sup><br />\n";
echo '<input tabindex="5" type="password" name="l_newpw" size="50" /><br />'."\n";
echo '<span class="floatR fontS"><sup>*</sup> '.$ax['log_if_changing'].'</span><br /><br />'."\n";
echo '<input class="floatR button" type="submit" name="exechg" value="'.$ax['log_change'].'" />'."\n";
echo '<input type="submit" name="back" value="'.$ax['log_back'].'" />'."\n";
echo "</form>\n";
} else { //log in
echo '<div class="legendI">&nbsp;'.$ax['log_subscript'].'&nbsp;</div><br /><br />'."\n";
echo '<form action="index.php" method="post">'."\n";
echo $ax['log_un']."<br />\n";
echo '<input tabindex="1" type="text" name="l_un_em" id="start" size="50" value="'.$l_un_em.'" /><br /><br />'."\n";
echo $ax['log_pw'].'<br />'."\n";
echo '<input tabindex="2" type="password" name="l_pword" size="20" />'."\n";
echo '<input type="submit" class="flush" name="log_in" />'."\n"; //dummy input to get ENTER=login right
echo '<input class="floatR noButton fontS" type="submit" name="spw" value="('.$ax['log_send_new_pw'].')" /><br /><br /><br />'."\n";
echo '<input type="submit" name="log_in" value="'.$ax['log_log_in'].'" />'."\n";
echo '<span class="floatR"><input type="checkbox" id="cookie" name="cookie" value="bake" /><label for="cookie"> '.$ax['log_remember_me'].'</label></span>'."\n";
echo "<br /><br /><hr />\n";
echo '<input class="floatL noButton" type="submit" name="chg" value="'.$ax['log_change_my_data'].'" />'."\n";
if ($selfReg) { echo '<input class="floatR noButton" type="submit" name="reg" value="'.$ax['log_register'].'" />'."\n"; }
echo "</form>\n";
}
?>
</fieldset>
</div>
<script type="text/javascript">
document.getElementById("start").focus();
</script>
