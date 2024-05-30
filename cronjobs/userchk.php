<?php
/*
= check calendar inactive user accounts which can be deleted =

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

-------------------------------------------------------------------
 This script depends on and is executed via the file lcalcron.php.
 See lcalcron.php header for details.
-------------------------------------------------------------------

This file is part of the LuxCal Web Calendar.

-------- THIS SCRIPT USES THE FOLLOWING CONFIG.PHP PARAMETERS ---------------
$maxNoLogin : Maximum number of 'no login' days for account not to be deleted
-----------------------------------------------------------------------------
*/

//sanity check
if (!defined('LCC')) { exit('not permitted (uchk)'); } //lounch via script only

//calculate minimum last login date required to keep account
$minLoginDate = date("Y-m-d", time() - $maxNoLogin * 86400);

//delete user accounts for users not logged in since $minLoginDate
//but never delete the public access and admin users!
$result = dbquery("DELETE FROM [db]users WHERE user_id > 2 AND login_1 < '$minLoginDate'");

$summary = "-- ".$ax['usc_sum_title']." --\n";
$summary .= (mysqliaffected_rows() > 0) ? $ax['usc_nr_accounts_deleted'].": ".mysqliaffected_rows()."\n" : $ax['usc_no_accounts_deleted'].".\n";
?>
