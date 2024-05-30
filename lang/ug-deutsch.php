<?php
/*
= LuxCal event calendar on-line user guide =

Ins Deutsche �bersetzt von Ulrich Krause. Kommentare, Verbesserungsvorschl�ge usw. an:
ukrause(at)ukweb.de
2011-05-15 - aktualisiert von Alfred Bruckner

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
<div class="floatR">
<img src="lang/ug-layout.png" alt="LuxCal page layout" /><br />
a: Titelzeile&nbsp;&nbsp;b: Navigationszeile&nbsp;&nbsp;c: Kalender&nbsp;&nbsp;d: Tag
</div>
<br />
<a name="1"></a><h4>Vorwort</h4>
<p><b>Dieses Programm basiert auf der Opensource Software LuxCal v2.5.3 und wurde f�r die speziellen Anforderungen bei der Verwaltung der WVF Vereinsschiffe angepasst.</b></p>
<p>Der WvfCal Kalender l�uft auf einem Webserver und wird �ber einen Webbrowser ausgef�hrt und konfiguriert. Die oberste Zeile, die Titelzeile, zeigt den Kalendernamen, das Datum und den Namen des momentanen Benutzers. Direkt unterhalb erscheint die Navigationszeile mit verschiedenen ausklappbaren Men�s und den Links zur Navigation sowie dem Ein- bzw. Ausloggen, hinzuf�gen von Terminen und den Administratorfunktionen. Welche Men�s angezeigt und ausgew�hlt werden k�nnen h�ngt von der jeweiligen Berechtigung ab. Unterhalb der Navigationszeile werden die verschiedenen Kalenderansichten dargestellt.</p>
<br />

<h4>Inhaltsverzeichnis</h4>
<ol>
<li><p><a href="#1">�bersicht</a></p></li>
<li><p><a href="#2">Einloggen</a></p></li>
<li><p><a href="#3">Termine hinzuf�gen</a></p></li>
<li><p><a href="#4">Termine l�schen und bearbeiten</a></p></li>
<li><p><a href="#5">Kalenderoptionen</a></p></li>
<li><p><a href="#6">Kalenderansichten</a></p></li>
<li><p><a href="#7">Ausloggen</a></p></li>
<li><p><a href="#8">Kalenderadministration</a></p></li>
<li><p><a href="#9">About LuxCal</a></p></li>
</ol>
<br />
<br />
<br />
<br />
<a name="1"></a><h4>1. �bersicht</h4>
<p>Der LuxCal Kalender l�uft auf einem Webserver und wird �ber einen Webbrowser ausgef�hrt und konfiguriert. Die oberste Zeile, die Titelzeile, zeigt den Kalendernamen, das Datum und den Namen des momentanen Benutzers.
Direkt unterhalb erscheint die Navigationszeile mit verschiedenen ausklappbaren Men�s und den Links zur Navigation sowie dem Ein- bzw. Ausloggen, hinzuf�gen von Terminen und den Administratorfunktionen. Welche Men�s angezeigt und ausgew�hlt werden k�nnen h�ngt von der jeweiligen Berechtigung ab. Unterhalb der Navigationszeile werden die verschiedenen Kalenderansichten dargestellt.</p>
<br />
<a name="2"></a><h4>2. Einloggen</h4>
<p>Falls der Kalender vom Administrator f�r �ffentlichen Zugriff (Öffentliche Ansicht) konfiguriert wurde entf�llt das Einloggen.
Ansonsten klickt man auf "Einloggen" auf der rechten oberen Men�leiste. Es erscheint ein Anmeldemen� zur Eingabe des Benutzernamens oder der Emailadresse (nur eines von beiden wird ben�tigt) sowie dem Passwort welches man vom Administrator erhalten hat. Nach Eingabe der Parameter auf das darunterliegende
"Einloggen" klicken. If you select "Remember me" before clicking Log In, next times you launch the calendar you will be automatically logged in. Hat man sein Passwort vergessen, klickt man auf "Einloggen" und danach auf den Link "Sende neues Passwort".
Man kann seine Emailadresse und das Passwort �ndern, indem man auf der rechten Seite eine neue Emailadresse und ein neues Passwort eingibt.
Hat der Administrator Leserechte f�r die "Öffentliche Ansicht" vergeben, kann der Kalender ohne Einloggen eingesehen werden.</p>
<br />
<a name="3"></a><h4>3. Termine hinzuf�gen</h4>
<p>Termine k�nnen auf verschiedene Arten hinzugef�gt werden:</p>
<ul style="margin:0 20px">
<li><p>Durch klicken auf die "Termin hinzuf�gen" Schaltfl�che in der Navigationsleiste</p></li>
<li><p>Durch klicken auf den oberen Teil des betreffenden Tages in der Jahres- oder Monatsansicht</p></li>
<li><p>Durch ziehen der Maus �ber die gew�nschte Dauer des Termins in der Wochen- oder Tagesansicht</p></li>
</ul>
<p>Jede dieser M�glichkeiten �ffnet ein "Terminfenster" zur Eingabe der Termindaten.</p>
Bestimmte Felder sind je nach der oben gew�hlten Art schon vorausgef�llt.
<p>Im ersten Teil des Fensters kann ein Titel, ein Ort und eine Beschreibung eingetragen werden. Hier besteht auch die M�glichkeit durch das Setzen eines H�kchens den Termin als "Privater Termin" zu kennzeichnen Den Titel sollte man kurz halten und bei Bedarf weitere Details im Beschreibungsfeld eintragen. W�hlt man eine bestehende Kategorie wird dieser Termin farblich passend unterlegt. Ort und Beschreibung werden in den Ansichten durch �berfahren mit dem Mauszeiger sichtbar. Private Termine sind nur f�r den jeweiligen autorisierten Benutzer sichtbar.</p>
<p>URLs welche in der Terminbeschreibung im Format: [ url | name ] z.B. [ www.meineseite.com | meinname ] eingegeben sind, werden automatisch zu Hyperlinks konvertiert. Diese k�nnen in der „Monatsansicht“, den „Anstehende Termine“ sowie den Benachrichtigungsemails angew�hlt werden. </p>
<p>Im weitergehenden Teil des Fensters k�nnen das Datum und die Zeiten eingetragen werden. Wird ein "Ganztags" Termin gew�hlt k�nnen keine Zeiten eingetragen werden. Das Enddatum ist optional und wird f�r mehrt�gige Termine verwendet. Datum und Zeit kann entweder von Hand eingetragen werden oder �ber den sich �ffnenden Minikalender und den Zeitvorgaben gew�hlt werden. Anschließend an die Datum und Zeit Felder k�nnen Termine �ber ein weiteres Eingabefenster als wiederkehrend definiert werden. Das Fenster �ffnet sich durch Klicken auf die "�ndern" Schaltfl�che. In diesem Fall wird der Termin vom eingetragenen Start- bis hin zum Enddatum turnusm�ßig wiederholt. Bleibt das Enddatum leer wiederholt sich der Termin f�r immer was z.B. f�r Geburtstage n�tzlich ist.</p>
<p>Im letzten Teil des Fensters kann man �ber eine sog. Benachrichtigungseinrichtung durch Eintragen von einer oder mehreren Emailadressen eine Erinnerungsmail an die betreffende(n) Person(en) senden. Hierzu kann man die Tage im Voraus bestimmen und am Tag des Termins wird zus�tzlich noch eine Erinnerungsmail versendet. Wenn 0 Tage angegeben wird, wird nur am Tag des Termins ein Email verschickt. Dies gilt auch jedes Mal f�r sich wiederholende Termine.</p>
<p>Das Email Feld kann Email Adressen und/oder den Namen (ohne Dateierweiterung) einer vordefinierten Email Liste enthalten. Alle Eintr�ge werden durch ein Semikolon getrennt. Die vordefinierte Email Liste ist eine Text Datei (Dateierweiterung .txt) im "emlists/" Verzeichnis mit einer Email Adresse pro Zeile. Der Dateiname darf kein "@" Zeichen enthalten.</p>
<p>Nach Fertigstellung der Eintragungen auf "Hinzuf�gen" dr�cken.</p>
<br />
<a name="4"></a><h4>4. Termine l�schen und bearbeiten</h4>
<p>In jeder Kalenderansicht kann ein Termin durch Anklicken eingesehen, bearbeitet oder gel�scht werden. Abh�ngig von den Zugriffsrechten kann man eigene, alle, oder sogar Termine anderer Benutzer sehen, bearbeiten und l�schen. F�r eine Beschreibung der Felder siehe oben - "3. Termin hinzuf�gen".
Unten im "Termin bearbeiten" Fenster hat man durch die Schaltfl�chen die M�glichkeit einen ge�nderten Termin zu speichern, als neuen Termin zu speichern (um z.B. einen Termin auf ein neues Datum zu kopieren) oder den Termin zu l�schen.
<strong> ACHTUNG: "Termin l�schen", l�scht diesen ohne vorherige Warnung oder Nachfrage. L�schen eines sich wiederholenden Termins l�scht die ganze Serie.</strong></p>
<p></p>
<br />
<a name="5"></a><h4>5. Kalenderoptionen</h4>
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
<a name="6"></a><h4>6. Kalenderansichten</h4>
<p>In allen Ansichten werden durch �berfahren mit dem Mauszeiger (sog. mouseover) n�here Details des Termins angezeigt. F�r private Terminen wird die Hintergrundfarbe des Popup-Box licht gr�n In der "Anstehend" Ansicht f�hren eventuell im Feld "Beschreibung" angegebene URL's zu den dazugeh�rigen Webseiten.</p>
Mit den korrekten Rechten ist folgendes m�glich:
<ul style="margin:0 20px">
<li><p>In allen Ansichten �ffnet sich durch Anklicken des Termins ein Fenster um diesen Termin anzuschauen, zu bearbeiten oder zu l�schen.</p></li>
<li><p>In der Jahres- und Monatsansicht kann ein Termin durch Klicken auf das gew�nschte Tagesdatum hinzugef�gt werden.</p></li>
<li><p>In der Wochen- und Tagesansicht kann ein Termin durch Ziehen der Maus �ber eine bestimmte Zeitspanne (Termindauer) hinzugef�gt werden.</p></li>
</ul>
<p>In der "�nderungen" Ansicht kann ein Anfangsdatum gew�hlt werden. Eine Liste mit hinzugef�gten, ge�nderten, entfernten Terminen ab dem gew�hlten Datum wird angezeigt.</p>
<p>Um einen Termin zu �ndern kann man durch Anklicken des Eintrages Zeit und/oder Datum anpassen.</p>
<br />
<a name="7"></a><h4>7. Ausloggen</h4>
<p>Um den Kalender zu verlassen klickt man auf "Ausloggen" auf der rechten oberen Menuleiste. Wenn man ohne Ausloggen den Kalender verl�sst, kann es vorkommen, dass dieser beim n�chsten Mal eingeloggt startet. </p>
<br />
<a name="8"></a><h4>8. Kalenderadministration</h4>
<p>- Die folgenden Eigenschaften verlangen Administrationsrechte -</p>
<p>Wenn sich ein Benutzer mit Administrationsrechten einloggt erscheint auf der rechten Seite in der Navigationsleiste das Administrationsmenu.
�ber dieses Men� sind folgende Adminfunktionen verf�gbar:</p>
<br />
<h5>a. Einstellungen</h5>
<p>Dieses Fenster zeigt die gegenw�rtigen Kalender-Einstellungen, die ge�ndert werden k�nnen. Alle m�glichen Einstellungen werden auf dieser Seite erkl�rt.
Die Kalendereinstellungen werden in der "config.php" Datei auf dem Server gespeichert. Es wird empfohlen die ge�nderte config.php Datei zu sichern.</p>
<p></p>
<br />
<h5>b. Kategorien</h5>
<p>Das Hinzuf�gen von Kategorien in verschiedenen Farben (nicht zwingend notwendig) kann die Ansicht des Kalenders �bersichtlicher gestalten. Beispiele von m�glichen Kategorien sind "Urlaub", "Stammtisch", "Geburtstage", "Wichtig", usw.
�ber das Ausw�hlen von "Kategorien" im Administrationsmen� erh�lt man eine Liste aller Kategorien und der M�glichkeit, "neue Kategorien hinzuf�gen" oder vorhandene Kategorien zu bearbeiten bzw. zu l�schen. Die anf�ngliche Installation hat eine Defaultkategorie. Das Bearbeiten bzw. L�schen von bereits vorhandenen Kategorien erfolgt ebenfalls �ber das Administrationsmenu. Die Reihenfolge der Anzeige erfolgt �ber die vergebene Reihenfolgennummer. Mit den Feldern "Text Farbe" und "Hintergrund" kann man die Farben der Kategorien, wie sie im Kalender angezeigt werden sollen, w�hlen.</p>
<p>Es kann eine Wiederholung konfiguriert werden. Termine in dieser Kategorie werden wie gew�hlt automatisch wiederholt.<br />Mit der Checkbox "Public" k�nnen Termine f�r den �ffentlichen Benutzer (nicht eingelogd) verborgen und vom RSS Feed ausgeschlossen werden.</p>
<p>L�scht man eine Kategorie werden alle ihr zugeh�rigen Daten in der Defaultkategorie angezeigt.</p>
<br />
<h5>c. Benutzer</h5>
<p>Das Benutzerfenster erlaubt dem Kalenderadministrator Benutzer und ihre Kalenderzugriffsrechte hinzuzuf�gen und zu bearbeiten. Zwei Hauptparameter k�nnen eingestellt werden: Name / E-Mail / Kennwort des Benutzers und dessen Zugriffsrechte. M�gliche Rechte sind: "Keine Rechte", "Kalender anzeigen", "Erstelle, bearbeite eigene Termine", "Erstelle, bearbeite alle Termine" und "Administrator Funktionen". Weitere Informationen �ber die Rechte erh�lt man bei �ffnen des Fensters "Benutzer hinzuf�gen". Wenn vom Benutzer gew�nscht, muss dessen g�ltige Emailadresse eingetragen werden um ihm Ank�ndigungen von F�lligkeitstagen und Terminen per Email zu senden.</p>
<p>Wenn "Eigene Anmeldung" aktiviert ist, k�nnen sich Benutzer �ber das Web Interface selbst f�r die Kalenderben�tzung registrieren. �ber die Einstellungen kann der Administrator die "Eigene Anmeldung" konfigurieren und die Zugriffsrechte f�r selbst angemeldete Benutzer w�hlen.</p>
<p>Bei einem Kalender ohne �ffentlichem Zugriff (Öffentliche Ansicht) m�ssen sich die Benutzer mit ihrem Benutzernamen oder E-Mail und Kennwort einloggen. Abh�ngig vom Typ des Benutzers k�nnen an einen Benutzer verschiedene Zugriffsrechte vergeben werden.</p>
<p>F�r jeden Benutzer kann eine Sprache f�r die Beutzerschnittstelle voreingestellt werden. Wenn keine Sprache gew�hlt wurde, wird die in den Kalendereinstellungen gew�hlte Sprache verwendet.</p>
<br />
<h5>c. Datenbank</h5>
<p>Die Datenbank Seite erlaubt dem Administrator folgende Funktionen auszuf�hren:</p>
<ul>
<li>Pr�fen und Reparieren der Datenbank um Fehler in den Tabellen zu finden und sie zu reparieren.</li>
<li>Datenbank komprimieren um unbenutzten Speicherplatz freizugeben und Overhead zu vermeiden.</li>
<li>Datenbank Backup, um ein Backup f�r eine allf�llige Wiederherstellung der Tabellenstruktur und Inhalte zu erstellen.</li>
</ul>
<p>Die erste Funktion "Pr�fen und reparieren" braucht nur aufgerufen zu werden, falls die Kalenderanzeige nicht korrekt ist. Die zweite Funktion "Komprimieren" k�nnte j�hrlich aufgerufen werden um die Datenbank zu komprimieren. Die dritte Funktion "Backup" sollte �fters verwendet werden, abh�ngig von der H�ufigkeit der �nderungen der Termine.</p>
<br />
<h5>d. CSV datei importieren</h5>
<p>Diese Funktion kann verwendet werden um in den LuxCal Kalender Termindaten zu importieren welche von anderen Kalendern (z.B. Microsoft Outlook) exportiert worden sind. Weitere Informationen findet man auf der CSV Import Seite.</p>
<br />
<h5>e. iCal File Import</h5>
<p>Diese Funktion kann verwendet werden um Termine von iCal Dateien (Dateierweiterung .ics) in den Kalender zu importieren. Weitere Informationen findet man auf der iCal Import Seite. Nur Termine die mit dem LuxCal Kalender kompatibel sind, k�nnen importiert erden, wie z.B.: To-Do, Journal, Frei / Gebucht. Zeitzone und Alarm werden ignoriert.</p>
<br />
<h5>f. iCal File Export</h5>
<p>Diese Funktion kann verwendet werden um Termine von iCal Dateien (Dateierweiterung .ics) in den Kalender zu exportieren. Weitere Informationen findet man auf der iCal Import Seite.</p>
<br />
<a name="9"></a><h4>9. About LuxCal</h4>
<p>Author: <b>Roel B.</b>&nbsp;&nbsp;&nbsp;&nbsp;Home page: <b><a href="http://www.luxsoft.eu/" target="_blank">http://www.luxsoft.eu/</a></b></p>
<p>This program is free software; you can redistribute it and/or modify it under the terms of the <b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b> as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.</p>
<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.</p>
<br />