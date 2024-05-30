<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//DE"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de-DE" xml:lang="de-DE">
<head>
<title><?php echo $calendarTitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="LuxCal mini web calendar - a LuxSoft product" />
<meta name="author" content="Roel Buining" />
<meta name="robots" content="nofollow" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="canonical" href="<?php echo $calendarUrl; ?>" />
<link rel="stylesheet" type="text/css" href="css/css.php" />

<style>
body
{
	background-image:url(images/repair.jpg);
	background-size: cover;
	background-repeat:no-repeat;
}
.div1
{
	padding:10% 10%;
	font:bold 25px/28px arial,sans-serif;
	font-size:5em;
	text-shadow:white 0 0 0.3em;
	text-align:center;
	size: 100% 100%;
	vertical-align:middle;
	color:red;
}
</style>
</head>

<body>
<div class="div1">
	Wegen Wartungsarbeiten <br></br> ist die Buchungsseite <br></br> momentan nicht erreichbar !
	
	<div style="font-size:large; padding:100px 20px; text-shadow:white 0px 0px 5px; color:black">
	Bitte haben Sie ein wenig Geduld <br></br>und versuchen Sie es später noch einmal. <br></br>
	In dringenden Fällen wenden Sie sich an den Administrator<br></br> admin_Buchung@wvf.de</div>
</div>
<?php

echo '<span class="floatL">'.$calendarTitle.'</span>'.makeD(date("Y-m-d"),6)."\n";
?>
</body>
</html>