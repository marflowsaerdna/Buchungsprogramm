<?php
/*
= Small header for LuxCal event calendar pages (no Top bar, no Nav bar)=

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
if (!defined('LCC')) { exit('not permitted (hdxs)'); } //lounch via script only
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de-DE" xml:lang="de-DE">
<head>
<title><?php echo $calendarTitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="shortcut icon" href="lcal.ico" />
<?php
/* ---- LOAD THEME WITH USER-INTERFACE COLOR DEFINITIONS ---- */
require './css/lctheme.php';
define("CSS","TRUE");
?>
<link rel="stylesheet" type="text/css" href="css/css.php" />
<link rel="stylesheet" type="text/css" href="css/css_xs.php" />
<script type="text/javascript">
<?php //used by dtpicker.js
echo 'var dFormat = ',$dateFormat,';
var dSepar = "',$dateSep,'";
var time24 = ',$time24,';
var wStart = ',$weekStart,';
var dpToday = "',$xx["hdr_today"],'";
var dpClear = "',$xx["hdr_clear"],'";
var dpMonths = new Array("',implode('","',$months),'");
var dpWkdays = new Array("',implode('","',$wkDays_m),'");'."\n";
?>
</script>
<script type="text/javascript" src="common/dtpicker.js"></script>
<script type="text/javascript" src="common/cpicker.js"></script>
<script type="text/javascript" src="common/poptext.js"></script>
<script type="text/javascript" src="common/general.js"></script>
</head>

<body>
<div class="content">
<?php
if ($pageTitle) echo '<br /><h4 class="spaceLL">'.$pageTitle.'</h3>';
?>
</div>