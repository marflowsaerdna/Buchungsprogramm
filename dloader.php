<?php
/*= file downloader script =

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.

this script tells the http server and client browser that the requested file is coming 
back as an application attachment to be saved as a file rather than to be rendered.
*/

//sanity check
if (!isset($_GET['file']) or !preg_match('%^[^+,()|&@<>\s]{1,40}\.[\w]{3}$%', $_GET['file'])) { exit('not permitted (dldr)'); } //no or invalid argument

require './config.php';
date_default_timezone_set($timeZone); //set time zone

$fName = $_GET['file'];
$dName = 'files/';
$dloadfname = str_replace('.','-'.date("Ymd-Hi").'.',$fName);
if (file_exists($dName.$fName)) { //file valid
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=$dloadfname");
	readfile($dName.$fName); //send download
} else {
	echo "File not present";
}
?>
