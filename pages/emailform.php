<?php
//sanity check
if (!defined('LCC')) { exit('not permitted (emf)'); } //lounch via script only

if ( isset($_GET['from']) )
	$from = trim($_GET['from']);
else 
	$from = isset($_POST['from'])      ? trim($_POST['from'])   : "";

if ( isset($_GET['to']) )  // if set on first call, only user_ids are submitted, find email adresses
	$to = trim($_GET['to']);
else 
	$to = isset($_POST['to'])      ? trim($_POST['to'])   : "";

if ( isset($_GET['subject']) )
	$subject = $_GET['subject'];
else 
	$subject = isset($_POST['subject'])      ? trim($_POST['subject'])   : "";

$send =  isset($_POST['eml_send'])? trim($_POST['eml_send'])   : "";
$add_rcv =  isset($_POST['eml_add_rcv'])? trim($_POST['eml_add_rcv'])   : "";
$cc =      isset($_POST['cc'])      ? $_POST['cc']         : "";
$bcc =     isset($_POST['bcc'])     ? $_POST['bcc']        : "";
$text =    isset($_POST['text'])    ? $_POST['text']       : "";
$cMsg =    isset($_POST['cmsg'])    ? $_POST['cmsg']       : "";
$eMsg =    isset($_POST['emsg'])    ? $_POST['emsg']       : "";
$wMsg =    isset($_POST['wmsg'])    ? $_POST['wmsg']       : "";

//send email(s) with calendar changes
global $xx, $calendarTitle, $calendarEmail;

if ($send == $xx['eml_send'])
{
	$headers = "MIME-Version: 1.0\n" ;
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
	$headers .= "Content-Transfer-Encoding: quoted-printable\n";
	$headers .= "Return-Path: $from\n";
	$headers .= "X-Sender: <$from>\n";
	$headers .= "X-Mailer: wvfischbach.de\n";
//	$header .= "X-Sender-IP: 212.1.208.191\n";
	
	//email address(es) to notify
	$textb = nl2br($text);
	if (wvfcal_email(trim($from), trim($to), trim($bc), trim($bcc), $subject, $textb.$xx['eml_msg_footer'], $headers, "user_email.php",'')) {
			$cMsg = $xx['eml_msg_sent'];
			$eMsg = '';
	}
	else {
		$eMsg = $xx['eml_msg_err'];	
		$cMsg = '';			
	}
}

if ($eMsg) echo "<p class=\"center error\">".$eMsg."</p>\n";
if ($wMsg) echo "<p class=\"center warning\">".$wMsg."</p>\n";
if ($cMsg) echo "<p class=\"center confirm\">".$cMsg."</p>\n";
echo "<br>Email-host:".$_SERVER["REMOTE_ADDR"]."<br>";


if ($add_rcv == $xx['eml_add_all'])
	$bcc = getAllUsersEmail();
elseif ($add_rcv == $xx['eml_add_adm'])
	$to .= ",".getAdminEmail();

?>

<form id="event" name="event" method="post"  action="index.php?xP=98" >
<input type="hidden" name="id" value="<?php echo $eid; ?>" />
<input type="hidden" name="emsg" value="<?php echo $eMsg; ?>" />
<input type="hidden" name="wmsg" value="<?php echo $wMsg; ?>" />
<input type="hidden" name="cmsg" value="<?php echo $cMsg; ?>" />
<input type="hidden" name="refresh" value="true" />

<div class="fontS">(<?php echo $xx['evt_notify_eml_list']; ?>)</div>

<table class="evtForm">
	<col width='30px'><col width='200px'><col width='10px'><col width='5px'>
	<tr>
		<td><?php echo $xx['eml_sender'];?>:</td>
		<td><input type="text" name="from" id="from" style="width:100%" value="<?php echo $from; ?>" /></td>
	</tr>
	<tr>
		<td><?php echo $xx['eml_receiver'];?>:</td>
		<td><input type="text" name="to" id="to" style="width:100%" value="<?php echo $to; ?>" /></td>
		<td></td>
<?php 
		if ($privs<3) {
			echo '<td><input type="submit" name="eml_add_rcv" value="'.$xx['eml_add_adm'].'" /></td>';
		}
?>
	</tr>
 	<tr>
		<td><?php echo $xx['eml_cc'];?>:</td>
		<td><input type="text" name="cc" id="cc" style="width:100%" value="<?php echo $cc; ?>" /></td>
		<td></td>
	</tr>
 	<tr>
		<td><?php echo $xx['eml_bcc'];?>:</td>
		<td><input type="text" name="bcc" id="bcc" style="width:100%" value="<?php echo $bcc; ?>" /></td>
		<td></td>
<?php 
		if ($privs>=3) /* admins and calender admins */ {
			echo '<td><input type="submit" name="eml_add_rcv" value="'.$xx['eml_add_all'].'" /></td>';
		}
?>
	</tr>
	<tr><td colspan="4"><hr /></td></tr>
	<tr>
		<td><?php echo $xx['eml_subject'];?>:</td>
		<td colspan="2"><input type="text" name="subject" id="subject" style="width:100%" value="<?php echo $subject; ?>" /></td>
	</tr>
	
	<tr>
		<td><?php echo $xx['eml_text'];?>:</td>
		<td colspan="2">
		<textarea name="text" id="text" rows="8" style="width:100%"><?php echo str_replace( "<br />", "\n", $text); ?></textarea>
	</td>
	</tr>
</table>

<?php
echo "<div class=\"floatC\">\n";
echo '<input type="submit" name="eml_send" value="'.$xx['eml_send'].'" />';
echo '&nbsp;&nbsp;<button onClick="javascript:self.close()">'.$xx["evt_close"]."</button>\n";
echo "</div>\n";

?>
</form>
