<?php
/*
= check calendar inactive user accounts which can be deleted =

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

-------------------------------------------------------------------
 This script depends on and is executed via the file lcalcron.php.
 See lcalcron.php header for details.
 
 This script makes a backup of the wvfcal database and sends it to a email-adress.
 after successful mailing the file is deleted
-------------------------------------------------------------------

This file is part of the LuxCal Web Calendar.

-------- THIS SCRIPT USES THE FOLLOWING CONFIG.PHP PARAMETERS ---------------
$maxNoLogin : Maximum number of 'no login' days for account not to be deleted
-----------------------------------------------------------------------------
*/


/* Backup db tables*/
function backupTables() {
	global $ax, $dbPrefix, $backupEmail;
	//get table names
	$tableSet = dbquery("SHOW TABLES LIKE '".addcslashes($dbPrefix,'_')."%'");
	if ($tableSet) {
		//backup tables
		$sqlScript = '';
		while ($table = mysqli_fetch_row($tableSet)) {
			$rSet = dbquery('SELECT * FROM '.$table[0]);
			$nrFields = mysqlinum_fields($rSet);
			$sqlScript .= 'DROP TABLE '.$table[0].';';
			$createTableCode = mysqli_fetch_row(dbquery('SHOW CREATE TABLE '.$table[0]));
			$sqlScript .= "\n\n".$createTableCode[1].";\n\n";
			for ($i = 0; $i < $nrFields; $i++) {
				while($row = mysqli_fetch_row($rSet)) {
					$sqlScript .= 'INSERT INTO '.$table[0].' VALUES(';
					for($j=0; $j<$nrFields; $j++) {
						$row[$j] = preg_replace("%\n%","\\n",$row[$j]);
						$sqlScript .= isset($row[$j]) ? '"'.addslashes($row[$j]).'"' : '""';
						if ($j < ($nrFields-1)) {
							$sqlScript .= ',';
						}
					}
					$sqlScript .= ");\n";
				}
			}
			$sqlScript .="\n";
		}
	}
	return $sqlScript;
}
//sanity check
if (!defined('LCC')) { exit('not permitted (dbchrbkup)'); } //lounch via script only

//initialize
$sendTo = $backupEmail;
$toDay = mktime(0, 0, 0); //Unix time of today
$fromD = date("Y-m-d", $toDay - $chgNofDays * 86400); //start date
$tStamp = date('Y-m-d_H-i');
$fName = 'wvfcal-backup.sql';

$betreff = "Backup WvfCal Datenbank vom $tStamp"; // Betreff

$hdl = fopen($fName, 'w+');
fwrite($hdl, backupTables());
fclose($hdl);


 // Absender Name und E-Mail Adresse

$summary = "-- Database Backup created in file $fName --\n";
if (wvfcal_email('', $sendTo, '','', $betreff, $summary, $kopf='', "bckup_email.php", $fName)) // E-Mail versenden
{
	$summary .= "File sent successfully to $sendTo !";
}
else
{
	$summary = "Error in sending file to $sendTo !";
}
?>
