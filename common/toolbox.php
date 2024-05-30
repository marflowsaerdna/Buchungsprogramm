<?php

//sanity check
if (!defined('LCC')) { exit('not permitted (tbox)'); } //lounch via script only

require_once('class.phpmailer.php');

function check_compatibility(){
	
	setcookie("test", "test", time() + (365*24*60*60));

	if (isset ($_COOKIE['test']))
	{
		return true;
	}

	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"';
	echo '	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	echo '<html xmlns="http://www.w3.org/1999/xhtml">';  
	echo '<link rel="stylesheet" type="text/css" href="css/css.php" />';
	echo "\n";
	echo "<title>WVF Buchungsprogramm Check</title>";
	
	echo "<head>\n";
	echo "<br><br>";
	echo '</head>';
	echo '<body>';
	echo '<div class="container" style="vertical-align:center">';
	echo '<fieldset class="loginBox center middle">';
	echo '<div class="legendI">&nbsp;Kompatibilitäts-Check&nbsp;</div><br /><br />'."\n";
	echo "<form action=\"index.php\" method=\"post\" style=\"vertical-align:center\">"."\n";
	echo "Das Buchungsprogramm testet nun die Kompatibilität ihres Browsers. ";
	echo "Dies wird einmalig durchgeführt.<br> <br>Sollte sich diese Seite nach Clicken von 'OK' erneut öffnen, bedeutet dies, dass Ihr Browser keine Cookies akzeptiert.";
	echo "Um mit dem Buchungsprogramm arbeiten zu können, müssen Sie mit ihrem Browser cookies akzeptieren. ";
	echo "Bitte passen Sie die Einstellungen ihres Browsers für COOKIES an (s. Hilfe) !<br><br>\n";
	echo '<a href="http://hilfe.telekom.de/hsp/cms/content/HSP/de/3378/FAQ/theme-45858870/Internet/theme-45858729/Software/theme-45858727/Browser-6.0/faq-45855764">Hilfe zu Cookie-Einstellungen</a>';
	echo "\n";
	echo "<br><br><noscript>Um alle Funktionen reibungslos nutzen zu können muss Javascript aktiviert sein. Bitte passen Sie die Einstellungen für Javascript an.<br><br>\n";
	echo '<a href="http://www.gailer-net.de/html/javascript.html">Hilfe zu Javascript-Einstellungen</a>';
	echo "<br><br></noscript>\n";
	
	echo '<input class="floatR button" type="submit" name="OK" value="OK" />'."\n";
	echo "<br><br>";
	echo "<a href=http://www.wvfischbach.de>WVF Homepage</a>";
	
	echo "</form>\n";
	echo '</fieldset>';
	echo '</div>';
	echo '</body>';
		
	exit();
}

function check_WvfPass()
{
	// if coming from internal WVF-site, set password without login
	
	if ($_SERVER['HTTP_REFERER'] == "http://www.wvfischbach.de/passw_cgi/wvfintern.html")
	{
		setcookie("is_wvf_internal","yes", time()+(60*60));
		return;
	}
	// if coming already from login page, check username and password
	if (($_POST['wvfname'] == 'wvf') && md5($_POST['wvfpass'] == '3c5da1bf82d1d59f15c8a4cbf3686ea2'))
	{
		setcookie("is_wvf_internal","yes", time()+(60*60));
		return;
	}
	
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"';
	echo '	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	echo '<html xmlns="http://www.w3.org/1999/xhtml">';  
	echo '<link rel="stylesheet" type="text/css" href="css/css.php" />';
	echo "\n";
	echo "<title>WVF interne Seiten</title>";
	
	echo "<head>\n";
	echo "<br><br>";
	echo '</head>';
	echo '<body>';
	echo '<div class="container" style="vertical-align:center">';
	echo '<fieldset class="loginBox center middle">';
	echo '<div class="legendI">&nbsp;Login WVF interne Seiten&nbsp;</div><br /><br />'."\n";
	echo "<form action=\"index.php\" method=\"post\" style=\"vertical-align:center\">"."\n";
	echo "Sie haben die Seite direkt aufgerufen.<br>";
	echo "Um auf die öffentliche Ansicht der Buchungsseite zu gelangen, ";
	echo "geben Sie bitte zunächst Username und Passwort für die internen WVF Seiten ein !\n";
	echo "<br><br>\n";
	echo "Referrer=".$_SERVER['HTTP_REFERER']."<br>";
	echo 'Username: <input type="text"     name="wvfname" id="wvfname" size="50" value="'.$wvfname.'" /><br /><br />'."\n";
	echo 'Passwort: <input type="password" name="wvfpass" id="wvfpass" size="50" value="'.$wvfpass.'" /><br /><br />'."\n";
	echo '<input class="floatR button" type="submit" name="exereg" value="login" />'."\n";
	echo "</form>\n";
	echo '</fieldset>';
	echo '</div>';
	echo '</body>';
	
		
	exit();
}
function getPopText($evt, $team, $time)
{
	global $evtList, $privs, $showOwner, $showCatName, $showLinkInMV, $eventColor, $xx;
	$popText  = '<table class="evpop">';
	$popText .= '<thead><tr><td colspan="2">';
	$popText .= IDtoDD($evt['sda']).' ';
	if (($evt['sti'] == '00:00') && ($evt['eti'] == '23:59'))
	{
		$popText .= $xx['evt_all_day'];
	}
	else
	{
		$popText .=  $evt['sti'].'-'.$evt['eti'];
	}
	$popText .= '</td>';
	switch ($evt['cid'])
	{
		case 4: // Sperrung
			{
				$popText .= '<td>'.$evt['rnm'].'</td></tr></thead>';
				$popText .= '<tbody><tr><td colspan="3" align="center">'.$evt['tit'].'</td></tr>';
				if ($evt['des'] != '')
					$popText .= '<tr><td colspan="4" align="center">'.$evt['des'].'</td></tr>';
				$popText .= '<tr><td>'.$xx['evt_skipper'].':</td><td>'.$evt['oname'].'</td><td>'.$evt['phone'].'</td></tr>';
				$popText .= '</td></tr>';
				$popText .= '</tbody>';
				$popText .= '<tfoot><tr><td colspan="3">';
				$popText .= 'Schiff nicht einsatzbereit!';
				$popText .= '</td></tr></tfoot>';
			} break;
		case 3: // boat event
			{
				$popText .= '<td>'.$evt['rnm'].'</td></tr></thead>';
				$popText .= '<tbody><tr><td colspan="3" align="center">'.$evt['tit'].'</td></tr>';
				if ($evt['des'] != '')
					$popText .= '<tr><td colspan="4" align="center">'.$evt['des'].'</td></tr>';
				$popText .= '<tr><td>'.$xx['evt_skipper'].':</td><td>'.$evt['oname'].'</td><td>'.$evt['phone'].'</td></tr>';
				if ( is_array($team['name']) ) {   // this had to be done because of PHP update to 7.2
				    
				    $teamsize = sizeof($team['name']);
				    
				} else {
				    
				    $teamsize = 0;
				    
				}
				for ($i=0; $i<$number; $i++)
				{
					if ($i == 0)
					$popText .= "<tr><td>Team:</td>";
					$popText .=  "<td>".$team['name'][$i]."</td><td>".$team['phone'][$i]."</td></tr><tr><td></td>";
				}
				$popText .= '</td></tr>';
				$popText .= '</tbody>';
				$popText .= '<tfoot><tr><td colspan="3">';
				if ($evt['free'])
				$popText .= $xx['evt_free_event'];
				else {
					if (!$evt['pri'] and ($evt['maxteam'] > $teamsize+1)) // event open and max number of teamsize not reached
					$popText .= $xx['evt_join_possible'];
					else
					$popText .= $xx['evt_join_not_possible'];
				}
				$popText .= '</td></tr></tfoot>';
			} break;
		case 2: // reminder
			{
				$popText .= '<tbody><tr><td colspan="4" align="center">'.$evt['tit'].'</td></tr>';
				$popText .= '<tr><td colspan="4" align="center">'.$evt['des'].'</td></tr>';
				$popText .= '<tfoot><tr><td colspan="3">';
				$popText .= 'bitte vormerken !';
				$popText .= '</td></tr></tfoot>';
				
				
			} break;
	}
	$popText .= '</table>';
	$popText = htmlspecialchars($popText,ENT_COMPAT,"iso-8859-1");

return($popText);
}

// removes elements of one list from another list
function removeElements(array $a, array $b)
{
	for ($i1=0;$i1<count($a);$i1++)
	{
			for ($i2=0;$i2<count($b);$i2++)
			{
				if ($a[$i1] == $b[$i2])
				{
				    unset( $a[$i1] );
				    for ($i3=$i1;$i3<count($a);$i3++)
				    {
				    	$a[$i3]=$a[$i3+1];
				    }
				    $i1--;
				}
			}
	}
	return $a;
}

function removeElement(array $a, $b)
{
	$i1 = array_search($b, $a, TRUE);
	{
		unset( $a[$i1] );
	    for ($i2=$i1;$i2<count($a);$i2++)
	    {
	    	$a[$i2]=$a[$i2+1];
	    }
	}
	return $a;
}

function addElement(array $a, $b)
{
	$a[count($a)] = $b;
	return $a;
}
function removeString(array $a, $b)
{
	$i1 = array_search($b, $a, TRUE);
	{
		$a[$i1] = "";
		for ($i2=$i1;$i2<count($a);$i2++)
		{
		$a[$i2]=$a[$i2+1];
		}
		}
		return $a;
}

function addString(array $a, $b)
	{
	for($i=0;$i<10; $i++)
		{
		if ($a[$i] == "")
		{
			$a[$i] = $b;
			return $a;
		}
	}
}
function setNotifyAdresses($adr)
{
	$adr1 = (ISSET($_SESSION['notify']) ? $_SESSION['notify'] : '');
	$merge1 = explode(",", $adr1);
	$merge2 = explode(",", $adr);
	$merge3 = array_merge($merge2,$merge1);
	$merge3 = array_unique($merge3);
	
	foreach ($merge3 as $eml)
	{
		if ($eml != '')
		{
			if ($emlstr != '')
				$emlstr .= ",";
			$emlstr .= $eml;
		}
	}	
	$_SESSION['notify'] = $emlstr;
}

// check if resource is free in the given timeframe
function checkResourceBooked($sda, $sti, $eda, $eti, $resid, $eid)
{
	global $evtList;
	$booked = false;
	(!$eda)?  $eda = $sda: $eda;
	$sdatetime = $datetime = new DateTime($sda.$sti);
	$edatetime = new DateTime($eda.$eti);
//	echo 'Startdate ='.$sdatetime->format('d.m.Y H:i').'<br>';
//	echo 'Enddate ='.$edatetime->format('d.m.Y H:i');

	retrieve(DDtoID($sda), DDtoID($eda), '');
	foreach ($evtList as $evtday)
	{
		foreach ($evtday as $event)
		{
			if (($event['eid'] != $eid) && ($event['rid'] == $resid)) {       // if event is edited, own event is always available
				for ($datetime = $sdatetime; $datetime < $edatetime; $datetime->modify('+15 min'))
				{
//				echo 'Datetime ='.$datetime->format('d.m.Y H:i').'   ';
					$timestring = $datetime->format('H:i');
					if (($timestring >= $event['sti']) and ($timestring < $event['eti']))
						$booked |= true;
				}
			}
		}
	}
	return $booked;
}

// calculate string representing free booking time, quarterhour is booked => 1, quarterhour is free => 0
function getBookedTime($date, $resid, $event_id)
{
	$time = new DateTime('0-1-0 00:00');
	$qhour = new DateTime('0-1-0 00:15');
	$time->setTime(0,0,0);   // fill array with time entries as key
	$timestring = $time->format('H:i');
	$dayBook = '000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';   // 24h, every quarter one digit

	// events von dieser resource an diesem Datum suchen, der eigene, aktuelle event werden ausgeblendet
	$q ='SELECT * FROM [db]events WHERE event_id != '.$event_id.' and resource_id ='.$resid.' and s_date = "'.DDtoID($date,1).'" and status != -1';
	$rSet = dbquery($q);
	while($row=mysqli_fetch_assoc($rSet)){
		$i=0;
		for($i=0; $i<(24*4);$i++) {
			$timestring = $time->format('H:i');
			if (($timestring.':00') >= $row['s_time'] and ($timestring.':00') < $row['e_time']) {
				$dayBook[$i] = '1';
			}
			$time->modify('+15 min');
		}
	}
	return $dayBook;
}


// resource functions
function GetTeamsize($resid)    // Get Teamsize max depending on selected resource
{
	$daybooking = array();
	$rSet = dbquery("SELECT * FROM [db]resources WHERE resource_id = $resid");
	if (!$rSet) {}// no event on this date
	else {
			$row=mysqli_fetch_assoc($rSet);
	}
	return($row['teamsize_max']);
}

//Time formatting

function ITtoDWT($time) { //convert hh:mm to time for the dw column
	global $dateUSorEU;
	return ($dateUSorEU) ? substr($time,0,5) : date("g:iA", strtotime($time));
}

function ITtoDT($time,$format = -1) { //convert hh:mm(:ss) to display time
	global $time24;
	if (!$time) { return ""; }
	if ($format < 0) { $format = $time24; }
	return ($format) ? substr($time,0,5) : ($time == '24:00' ? '12:00AM' : date("g:iA", strtotime($time)));
}

function DTtoIT($time,$format = -1) { //convert Display Time to ISO Time hh:mm
	global $time24;
	$time = trim($time);
	if (!$time) { return ""; }
	if ($format < 0) { $format = $time24; }
	if ($format) {
		if (!preg_match("%^(0{0,1}[0-9]|1[0-9]|2[0-4])[:.][0-5][0-9]([:.][0-5][0-9]){0,1}$%",$time)) {
			return false;
		}
	} else {
		if (!preg_match("%^(0{0,1}[0-9]|1[0-2])[:.][0-5][0-9]\s*(a|A|p|P)(m|M)$%",$time)) {
			return false;
		}
	}
	$tStamp = strtotime($time);
	return ($tStamp < 1) ? false : date("H:i", $tStamp);
}


//Date formatting

function IDtoDD($date,$format = -1) { //convert yyyy mm dd to display date
	global $dateFormat, $dateSep;
	if (!$date) { return ""; }
	if ($format < 0) { $format = $dateFormat; }
	switch ($format) {
	case 1: //dd mm yyyy
		return substr($date,8,2).$dateSep.substr($date,5,2).$dateSep.substr($date,0,4);
	case 2: //mm dd yyyy
		return substr($date,5,2).$dateSep.substr($date,8,2).$dateSep.substr($date,0,4);
	case 3: //yyyy mm dd
		return substr($date,0,4).$dateSep.substr($date,5,2).$dateSep.substr($date,8,2);
	case 4: //dd.mm.
		return substr($date,8,2).$dateSep.substr($date,5,2).$dateSep;
	}
}

function DDtoID($date,$format = -1) { //validate display date and convert to ISO date yyyy-mm-dd
	global $dateFormat;
	$date = trim($date);
	if (!$date) { return ""; }
	if ($format < 0) { $format = $dateFormat; }
	switch ($format) {
	case 1: //dd mm yyyy
		if (!preg_match("%^(0{0,1}[1-9]|[1-2][0-9]|3[0-1])[\/\.-](0{0,1}[1-9]|1[0-2])[\/\.-]((?:19|20)[0-9]{2})$%",$date,$hits)) { return false; }
		if (!checkdate(intval($hits[2]),intval($hits[1]),intval($hits[3]))) { return false; }
		return $hits[3]."-".str_pad($hits[2], 2, "0", STR_PAD_LEFT)."-".str_pad($hits[1], 2, "0", STR_PAD_LEFT);
	case 2: //mm dd yyyy
		if (!preg_match("%^(0{0,1}[1-9]|1[0-2])[\/\.-](0{0,1}[1-9]|[1-2][0-9]|3[0-1])[\/\.-]((?:19|20)[0-9]{2})$%",$date,$hits)) { return false; }
		if (!checkdate(intval($hits[1]),intval($hits[2]),intval($hits[3]))) { return false; }
		return $hits[3]."-".str_pad($hits[1], 2, "0", STR_PAD_LEFT)."-".str_pad($hits[2], 2, "0", STR_PAD_LEFT);
	case 3: //yyyy mm dd
		if (!preg_match("%^((?:19|20)[0-9]{2})[\/\.-](0{0,1}[1-9]|1[0-2])[\/\.-](0{0,1}[1-9]|[1-2][0-9]|3[0-1])$%",$date,$hits)) { return false; }
		if (!checkdate(intval($hits[2]),intval($hits[3]),intval($hits[1]))) { return false; }
		return $hits[1]."-".str_pad($hits[2], 2, "0", STR_PAD_LEFT)."-".str_pad($hits[3], 2, "0", STR_PAD_LEFT);
	}
}


function makeD($date,$format,$m3 = '') { //make long date
	global $dateUSorEU, $months, $months_m, $wkDays, $wkDays_l;
	$d = ltrim(substr($date, 8, 2),"0");
	$mN = ltrim(substr($date, 5, 2),"0");
	$m = ($m3 == 'm3') ? $months_m[$mN - 1] : $months[$mN - 1];
	$y = substr($date, 0, 4);
	switch ($format) {
	case 1: //Dec... 9 / 9 dec...
		return ($dateUSorEU) ? $d.'. '.$m : $m.' '.$d;
	case 2: //Dec... 9, 2010 / 9 dec... 2010
		return ($dateUSorEU) ? $d.'. '.$m.' '.$y : $m.' '.$d.', '.$y;
	case 3: //Dec... 2010 / dec... 2010
		return ($dateUSorEU) ? $m.' '.$y : $m.' '.$y;
	case 4: //Monday, Dec... 9 / monday 9 dec...
		$wd = $wkDays[date("N", mktime(0,0,0,substr($date,5,2),substr($date,8,2),substr($date,0,4)))];
		return ($dateUSorEU) ? $wd.' '.$d.' '.$m : $wd.', '.$m.' '.$d;
	case 5: //Mon, Dec 9 / mon 9 dec
		$wd = $wkDays_l[date("N", mktime(0,0,0,substr($date,5,2),substr($date,8,2),substr($date,0,4)))];
		return ($dateUSorEU) ? $wd.' '.$d.' '.$m : $wd.', '.$m.' '.$d;
	case 6: //Monday, Dec... 9, 2010 / monday 9 dec... 2010
		$wd = $wkDays[date("N", mktime(0,0,0,substr($date,5,2),substr($date,8,2),substr($date,0,4)))];
		return ($dateUSorEU) ? $wd.' '.$d.' '.$m.' '.$y : $wd.', '.$m.' '.$d.', '.$y;
	}
}




//Check for mobile browser

function isMobile() {
//echo $_SERVER['HTTP_USER_AGENT'];
	$mobBrowser = '0';
	$allHttp = isset($_SERVER['ALL_HTTP']) ? strtolower($_SERVER['ALL_HTTP']) : '';
	$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
	$mobileAgents = array(
		'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
		'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
		'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
		'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
		'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
		'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
		'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
		'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
		'wapr','webc','winw','winw','xda','xda-'
	);

	if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i',$userAgent)) {
		$mobBrowser++;
	} elseif ((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false)) {
		$mobBrowser++;
	} elseif (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
		$mobBrowser++;
	} elseif (isset($_SERVER['HTTP_PROFILE'])) {
		$mobBrowser++;
	} elseif (in_array((substr($userAgent,0,4)),$mobileAgents)) {
		$mobBrowser++;
	} elseif (strpos($allHttp,'operamini') !== false) {
		$mobBrowser++;
	}
	if (strpos($userAgent,'windows') !== false) { //reset all if on Windows
		$mobBrowser = 0;
	} elseif (strpos($userAgent,'iemobile') !== false) {
		$mobBrowser++;
	} elseif (strpos($userAgent,'windows phone') !== false) { //WP7 is Windows too, but followed by 'phone'
		$mobBrowser++;
	}
	return ($mobBrowser > 0) ? true : false;
}
function wvfcal_email($from, $to, $cc, $bcc, $subject, $message, $headers, $filename, $attachment)
{
	global $calendarTitle;
	
		//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
		
		$mail = new cPHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
		
		$mail->IsSMTP(); // telling the class to use SMTP
		
		try {
			$mail->SetFrom('Buchung@wvfischbach.de', $calendarTitle);
			$mail->SMTPDebug  = 0;                         // enables SMTP debug information (for testing)
			$mail->SMTPAuth   = true;                      // enable SMTP authentication
			$mail->Host       = 'smtp.strato.de';          // sets the SMTP server
			$mail->Port       = 587;                       // set the SMTP port for the GMAIL server
			$mail->Username   = 'Buchung@wvfischbach.de';  // SMTP account username
			$mail->Password   = 'Buchung03';               // SMTP account password
			if ($from != '')
			{
				$mail->SetFrom($from, $calendarTitle);
				$mail->AddReplyTo($from, $calendarTitle);
			}
			if ($to != '')
			{
				$allAdresses = explode(",", $to);
				foreach($allAdresses as $adress)
				{
					$mail->AddAddress($adress);
				}
			}
			else
			{
				$mail->AddAddress('Buchung@wvfischbach.de');
			}
			if ($cc != '')
			{
				$allAdresses = explode(",", $cc);
				foreach($allAdresses as $adress)
				{
					$mail->AddCC($adress);
				}
			}

			if ($bcc != '')
			{
				$allAdresses = explode(",", $bcc);
				foreach($allAdresses as $adress)
				{
					$mail->AddBCC($adress);
				}
			}

			$mail->Subject = $subject;
			$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
			$mail->MsgHTML($message);
			if (is_file($attachment)) {
				$mail->addAttachment($attachment);
			}
//			$mail->AddAttachment('images/phpmailer.gif');      // attachment
			if ($_SERVER['HTTP_HOST'] == 'localhost')
			{
				// write email to file
				//		$toAdr = str_replace(",","<br>\n",$sendTo);
				file_put_contents ( $filename, "From:".$mail->From."<br> \n>");
				file_put_contents ( $filename, "To:".$mail->Sender."<br> \n>");
				file_put_contents ( $filename, "cc:".$cc."<br> \n>",  FILE_APPEND );
				file_put_contents ( $filename, "bcc:".$bcc."<br> \n>",  FILE_APPEND );
				file_put_contents ( $filename, "Subject=".$subject."<br> \n>",  FILE_APPEND );
				file_put_contents ( $filename, "Headers=".$headers."<br> \n>",  FILE_APPEND );
				file_put_contents ( $filename, "Message=".$message,  FILE_APPEND );
				echo "email gesendet an:".$to;
				return true;
			}
			else
			{
				if ($mail->Send() == false)
				$eMsg = "Fehler bei Email Versand an:".$toAdr;
				else
				$cMsg = "Email gesendet an:".$sendTo;
				return true;
			}
		} catch (phpmailerException $e) {
			echo $e->errorMessage(); //Pretty error messages from PHPMailer

	}
}

?>