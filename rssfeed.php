<?php
/*
= LuxCal RSS feeder =

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

header("Content-Type: application/rss+xml; charset=utf-8");

//set session params
$_SESSION['uid'] = 1; //public access
$_SESSION['cC'] = array(0); //all resources

//get settings and common functions
$evtList = array();
require './config.php';
require './common/toolbox.php';
require './common/retrieve.php';

//set time zone
date_default_timezone_set($timeZone);

//set language
require './lang/ui-'.strtolower($language).'.php';

//send feeds header
echo '<?xml version="1.0" encoding="utf-8" ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="'.$calendarUrl.'rssfeed.php" rel="self" type="application/rss+xml" />
<title>'.htmlspecialchars($calendarTitle).' - RSS feed</title>
<link>'.$calendarUrl.'</link>
<description>'.$xx['vws_events_for_next'].' '.$upcomingDays.' '.$xx['vws_days'].'</description>
<language>en-us</language>
<resource>Calendar events</resource>
<pubDate>'.date("D, d M Y G:i:s",time()).' GMT</pubDate>
<generator>LuxCal Web calendar</generator>'."\n";

$fromDate = date("Y-m-d", time() - 14*86400); //14 days back

$link = mysqli_connect ($hn, $un, $pw) or die ("Could not connect to database");
if (!mysqli_select_db($link,$db)) die ("Could not select database $db");

$sDate = date("Y-m-d");
$eTime = time() + (($upcomingDays-1) * 86400); //Unix time of end date
$eDate = date("Y-m-d", $eTime);

retrieve($sDate, $eDate);

//process events and send feeds
if ($evtList) {
	foreach($evtList as $date => &$events) {
		foreach ($events as &$evt) {
			switch ($evt["r_t"]) { //make repeat text
				case 0: $repeat = ""; break;
				case 1: $repeat = $xx['evt_repeat'].' '.$xx['evt_interval1_'.$evt["r_i"]].' '.$xx['evt_period1_'.$evt["r_p"]]; break;
				case 2: $repeat = $xx['evt_repeat_on'].' '.$xx['evt_interval2_'.$evt["r_i"]].' '.$wkDays[$evt["r_p"]].' '.$xx['evt_of_the_month'];
			}
			if ($evt["r_t"] > 0 and $evt["r_u"]) {
				$repeat .= ' '.$xx['evt_until'].' '.IDtoDD($evt["r_u"]);
			}
			$feed  = "<item>\n";
			$feed .= "<title>".makeD($date,6).": ".htmlspecialchars($evt["tit"])."</title>\n";
			$feed .= "<description>\n<![CDATA[\n";
			$feed .= ($evt['sti'] == "" and $evt['eti'] == "") ? $xx['vws_all_day'] : $xx['vws_time'].": ".ITtoDT($evt['sti']);
			$feed .= ($evt['eti']) ? " - ".ITtoDT($evt['eti'])."\n" : "\n";
			if ($repeat) { $feed .= "<br />{$repeat}\n"; }
			if ($evt['ven']) { $feed .= "<br />{$xx['vws_venue']}: {$evt['ven']}\n"; }
			if ($evt['des']) { $feed .= "<br />{$evt['des']}\n"; }
			if ($showCatName) { $feed .= "<br />{$xx['evt_resource']}: {$evt['cnm']}\n"; }
			if ($showOwner) { $feed .= "<br />{$xx['vws_owner']}: {$evt['una']}\n"; }
			$feed .= "]]>\n</description>\n";
			$feed .= "</item>\n";
			echo $feed;
		}
	}
} else {
	echo "<item>\nNo events due in the next ".$upcomingDays." days.\n</item>\n";
}
echo "</channel>\n</rss>";
?>