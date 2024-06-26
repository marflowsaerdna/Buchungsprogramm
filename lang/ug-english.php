<?php
/*
= LuxCal event calendar on-line user guide =

This user guide has been produced by LuxSoft - please send your comments/improvements to 
rb@luxsoft.eu.

© Copyright 2009-2011 LuxSoft - www.LuxSoft.eu

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

//LuxCal ug language file version
define("LUG","2.5.3");

?>
<div  class="floatR">
<img src="lang/ug-layout.png" alt="LuxCal page layout" /><br />
a: title bar&nbsp;&nbsp;b: navigation bar&nbsp;&nbsp;c: calendar&nbsp;&nbsp;d: day
</div>
<br />
<h4>Table of Content</h4>
<ol>
<li><p><a href="#1">Overview</a></p></li>
<li><p><a href="#2">Logging In</a></p></li>
<li><p><a href="#3">Add Event</a></p></li>
<li><p><a href="#4">Edit / Delete Event</a></p></li>
<li><p><a href="#5">Calendar Options</a></p></li>
<li><p><a href="#6">Calendar Views</a></p></li>
<li><p><a href="#7">Logging Out</a></p></li>
<li><p><a href="#8">Calendar Administration</a></p></li>
<li><p><a href="#9">About LuxCal</a></p></li>
</ol>
<br />
<br />
<br />
<br />
<a name="1"></a><h4>1. Overview</h4>
<p>The LuxCal calendar is running on a web server and can be viewed and managed via your web browser.</p>
<p>The title bar displays the calendar title, the date and the name of the current user.
Directly below the title bar, the navigation bar contains several drop-down menus and links, to navigate, to log in / log out, to add an event and to select administrator functions. Which menus and links are displayed depends on the user's access rights.
Below the navigation bar the various calendar views are displayed</p>
<br />
<a name="2"></a><h4>2. Logging In</h4>
<p>To use the calendar click Log In at the right of the navigation bar. This takes you to the log in screen. Enter your username or email address (one of the two) and the password received from your administrator and click Log In. If you select "Remember me" before clicking Log In, next times you launch the calendar you will be automatically logged in. If you forgot your password, click Log In and thereafter click on the link to have a new password emailed to you.</p>
<p>You can change your personal log-in data by selecting 'Change my data' on the log in page.</p>
<p>If you are not registered yet and the calendar administrator has enabled self-registration, you can click on 'Register' on the log in page; otherwise the calendar administrator can create an account for you.</p>
<p>If the calendar administrator has given View rights to public access users, the calendar can be viewed without logging in.</p>
<br />
<a name="3"></a><h4>3. Add Event</h4>
<p>Events can be added in several ways:</p>
<ul style="margin:0 20px">
<li><p>by clicking the Add Event button in the navigation bar</p></li>
<li><p>by clicking the top of a day cell in year or month views, which is most used</p></li>
<li><p>by dragging a certain part of the day in week or day views</p></li>
</ul>
<p>Each way will bring up the Add Event window with a form to enter the event data. Certain fields in the form will be pre-filled, depending on which of the above ways is used to add an event.</p>
<p>In the first part of the form the title, venue, resource and a description can be entered, and the option Private Event can be selected. It is good practice to keep the title short and use the description field for details. The venue and resource fields are optional. Selecting a resource will color-code the event in all views according to the resource colors. The venue and description will pop up onmouseover later in the various calendar views. A private event will only be visible to you, and not to others.</p>
<p>URLs added in the event description will be automatically converted to hyperlinks which can be selected in month view, upcoming events view, in the Event window and in notification emails. The format of URL links can be either 'url' or 'url [link name]', for example www.google.com or www.google.com [search]. If no link name is specified, the full URL will be the link name.</p>
<p>In the second part of the form, dates and times can be specified. If All Day Event is selected, no times will be displayed in the calendar views. The End Date is optional and can be used for multi-day events. Dates and times can be entered manually or via the date and time picker buttons. Following the date and time fields, events can be defined as recurring via a separate dialogue box, which opens when clicking the Change button. In this case the event will be repeated as specified from start to until date. If no until date is specified, the event will repeat for ever, which is particularly useful for birthdays.</p>
<p>In the last part of the form, via the Notify feature, you can select to send an email reminder to one or more email addresses directly, if the 'now' checkbox is selected, and/or a number of days before the due date of the event. In addition, an email reminder will automatically be sent on the date of the event. If the specified number of days is "0", a reminder will be sent on the event day only. For recurring events an email reminder will be sent the selected number of days before each occurrence of the event and on the date of each occurrence of the event.</p>
<p>The email list can contain email addresses and/or the name (without file extension) of a predefined email list file, all separated by a semicolon. The predefined email list must be a text file with extension ".txt" in the "emlists/" directory with an email address on each line. The file name may not contain the "@" character.</p>
<p>Upon completion, press Add Event.</p>
<br />
<a name="4"></a><h4>4. Edit / Delete Event</h4>
<p>In each of the calendar views an event can be clicked to open a window with all event details. If you have sufficient rights, you can click the 'Edit Event' button to edit, duplicate or delete the event. This will bring up the Edit Event window, which opens an editable form with all event details.</p>
<p>Depending on your access rights, you can view events, view/edit/delete your own events or view/edit/delete all events, including the events of other users. If you have no rights for the opened event, the 'Edit Event' button is greyed out.</p>
<p>For a description of the fields, see the description for Add Event above.</p>
<p>In the Edit Event window, the buttons at the bottom offer the possibility to save an edited event, to save an edited event as a new event (for instance to duplicate the event on an other date) and to delete the event.</p>
<p>Please note that selecting Delete will instantly delete the event from the calendar, <strong>without asking for confirmation</strong>.</p>
<p>Deleting a recurring event will delete all instances of the event, not just one specific date.</p>
<br />
<a name="5"></a><h4>5. Calendar Options</h4>
<p>Clicking the Options button on the navigation bar will open the calendar's Options Panel. On this panel you can select the following via check boxes:</p>
<ul style="margin:0 20px">
<li><p>The calendar view (year, month, week, day, upcoming or changes).</p></li>
<li><p>An event filter based on event owners. Events of one single owner or multiple owners can be selected.</p></li>
<li><p>An event filter based on event categories. Events in one single resource or multiple categories can be selected.</p></li>
<li><p>The user interface language.</p></li>
</ul>
<p>Note: The display of the event filter menus and the language menu can be enabled/disabled by the calendar administrator.</p>
<p>After having made your choices in the Options Panel, the Options button in the navigation bar should be clicked again to activate your choices.</p> 
<br />
<a name="6"></a><h4>6. Calendar Views</h4>
<p>In all views, further details of the event will pop up onmouseover. For private events the background color of the pop up box will be light green and for repeating or multi-day events the border of the pop up box will be red. In Upcoming view, URLs in the description field of events will automatically become hyperlinks to the related websites.</p>
<p>When having sufficient access rights:</p>
<ul style="margin:0 20px">
<li><p>In all views clicking an event will open the Edit Event window for the event, which can be used to view, edit or delete the event.</p></li>
<li><p>In year and month views a new event can be added for a certain date by clicking the top of a day cell (line where the day of the month is displayed).</p></li>
<li><p>In week and day views, an Add Event window can be opened by dragging the cursor over a certain time span; the date and time fields will be preloaded with the selected time span.</p></li>
</ul>
<p>In changes view, a start date can be specified. A list with all events added, edited or deleted since the specified start date will be displayed</p>
<p>To move an event to a new date or time, open the Event window by clicking the event, select Edit Event and change the date and or time. Events cannot be dragged to new dates or times.</p>
<br />
<a name="7"></a><h4>7. Logging Out</h4>
<p>To log out, click Log Out in the navigation bar. If you close the calendar without logging out, the next time the calendar is opened, it may start without asking for a log in.</p>
<br />
<a name="8"></a><h4>8. Calendar Administration</h4>
<p>- the following features require administrator rights -</p>
<p>When a user logs in with administrator rights, a drop down menu, called Administration, will appear on the right side in the navigation bar. Via this menu the following administrator functions will be available:</p>
<br />
<h5>a. Settings</h5>
<p>This page displays the current calendar settings which subsequently can be changed. All settings are explained on the Settings page by hovering the title of each setting.</p>
<p>The Calendar settings are stored in the config.php file on the server. It is good practice to backup the changed config.php file.</p>
<br />
<h5>b. Categories</h5>
<p>Adding event categories with different colors - though not required - will greatly enhance the views of the calendar. Examples of possible Categories are 'holidays', 'appointment', 'birthday', 'important', etc.</p>
<p>The initial installation has only one resource, named 'no cat'. Selecting Categories from the administration menu takes you to a page with a list of all categories, with the possibility to add new categories or to edit/delete existing categories.</p>
<p>When adding / editing events the defined categories can be selected from a drop down list. The order in which categories are displayed in the drop down list is determined by the Sequence field. </p>
<p>When adding / editing categories a 'repeat' value can be set; events in this resource will automatically repeat as specified. The checkbox 'Public' can be used to hide events belonging to this resource from being viewed by public access users (not logged in users) and exclude them from the RSS feeds. The fields Text Color and Background define the colors used to display events in the calendar belonging to this resource.</p>
<p>When deleting a resource, the events belonging to this resource will be reset to the resource 'no cat'.</p>
<br />
<h5>c. Users</h5>
<p>The users page allows the calendar administrator to view, add and edit users and their calendar access rights, their default user-interface language, the date of first log in and the date of last log in. Two main areas can be edited: the user's name/email/password and the user's access rights and interface language. Possible access rights are: View, Post own, Post all and Admin. It is important to use a valid email address, to allow the user to receive email notifications of due dates of events.</p>
<p>Via the Settings page, the administrator can enable "user self-registration" and set the access rights for self registered users. When self-registration is enabled, users can register to the calendar via the browser interface.</p> 
<p>Unless the calendar administrator has given View access to public access users, users must log in, using their username or email and password. Depending on the type of user, a user can be given different access rights.</p>
<p>For each user the default user-interface language on log-in can be specified. If no language is specified, the default calendar language specified on the Settings page will be used.</p>
<br />
<h5>c. Database</h5>
<p>The database page allows the calendar administrator to execute the following functions:</p>
<ul>
<li>Check and Repair the database, to find and solve inconsistencies in the database tables.</li>
<li>Compact database, to free unused space and to avoid overhead. This function will permanently remove events which have been deleted more than 30 days ago.</li>
<li>Backup database, to create a backup file which can be used to recreate the database tables structure and content.</li>
</ul>
<p>The first function, Check and Repair database, only needs to be run when the calendar views don't work properly. The second function, Compact database, could be run once a year to clean up the database, and the third function, Backup database, should be run more frequently, depending on the number of calendar updates.</p>
<br />
<h5>d. CSV File Import</h5>
<p>This function can be used to import into the LuxCal Calendar event data that has been exported from other calendars (e.g. MS Outlook). Further instructions are given on the CSV Import page.</p>
<br />
<h5>e. iCal File Import</h5>
<p>This function can be used to import events from iCal files (file extension .ics) into the LuxCal Calendar. Further instructions are given on the iCal Import page. Only events which are compatible with the LuxCal calendar will be imported. Other components, like: To-Do, Journal, Free / Busy, Time zone and Alarm, will be ignored.</p>
<br />
<h5>f. iCal File Export</h5>
<p>This function can be used to export LuxCal events into iCal files (file extension .ics). Further instructions are given on the iCal Export page.</p>
<br />
<a name="9"></a><h4>9. About LuxCal</h4>
<p>Author: <b>Roel B.</b>&nbsp;&nbsp;&nbsp;&nbsp;Home page: <b><a href="http://www.luxsoft.eu/" target="_blank">http://www.luxsoft.eu/</a></b></p>
<p>This program is free software; you can redistribute it and/or modify it under the terms of the <b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b> as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.</p>
<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.</p>
<br />