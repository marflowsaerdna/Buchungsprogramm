<?php
/*
= calendar day view =


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
if (!defined('LCC')) { exit('not permitted (day_)'); } //lounch via script only

//initialize
require './views/dw_functions.php';

$cD = $_SESSION['cD'];
$tcDate = mktime( 0, 0, 0, substr($cD,5,2), substr($cD,8,2), substr($cD,0,4) ); //Unix time of cD
$nextDay = date( "Y-m-d", $tcDate + 86400 );
$prevDay = date( "Y-m-d", $tcDate - 86400 );

retrieve($cD,$nextDay); //grab events

/* display header*/
$header = '<span'.($mobile ? '' : ' class="viewhdr"').'>'.makeD($cD,6).'</span>';
echo '<h1 class="floatC"><a href="index.php?cD=',$prevDay,'"><img src="images/left.png" valign="middle" alt="back" /></a><sup>',$header,'</sup><a href="index.php?cD=',$nextDay,'"><img src="images/right.png" valign="middle" alt="forward" /></a></h1>'."\n";
/* display day header */
echo '<table class="grid">'."\n";
echo '<tr><th class="timeh">'.$xx["vws_time"].'</th><th class="dayh">'.$xx["vws_events"]."</th></tr>\n";
echo "</table>\n";

/* display day */
echo '<div'.($mobile ? '' : ' class="scrollBoxDa"').">\n";
echo '<table class="grid">'."\n";
echo '<tr><td class="timex">'."\n";
showHours();
echo '</td><td class="day">'."\n";
$events = getEventReminder($cD);
showDay($cD,$events);
echo '</td></tr></table>';
echo "</div>\n";
?>
