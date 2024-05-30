<?php
/*
= LuxCal event calendar on-line user guide =

Ins Deutsche übersetzt von Ulrich Krause. Kommentare, Verbesserungsvorschläge usw. an:
ukrause(at)ukweb.de
2011-05-15 - aktualisiert von Alfred Bruckner

Â© Copyright 2009-2011 LuxSoft - www.LuxSoft.eu
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
<p><b>Dieses Programm basiert auf der Opensource Software LuxCal v2.5.3 und wurde für die speziellen Anforderungen bei der Verwaltung der WVF Vereinsschiffe angepasst.</b></p>
<p>Der WvfCal Kalender läuft auf einem Webserver und wird über einen Webbrowser ausgeführt und konfiguriert. Die oberste Zeile, die Titelzeile, zeigt den Kalendernamen, das Datum und den Namen des momentanen Benutzers. Direkt unterhalb erscheint die Navigationszeile mit verschiedenen ausklappbaren Menüs und den Links zur Navigation sowie dem Ein- bzw. Ausloggen, hinzufügen von Terminen und den Administratorfunktionen. Welche Menüs angezeigt und ausgewählt werden können hängt von der jeweiligen Berechtigung ab. Unterhalb der Navigationszeile werden die verschiedenen Kalenderansichten dargestellt.</p>
<br />

<h4>Inhaltsverzeichnis</h4>
<ol>
<li><p><a href="#1">Übersicht</a></p></li>
<li><p><a href="#2">Einloggen</a></p></li>
<li><p><a href="#3">Termine hinzufügen</a></p></li>
<li><p><a href="#4">Termine löschen und bearbeiten</a></p></li>
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
<a name="1"></a><h4>1. Übersicht</h4>
<p>Der LuxCal Kalender läuft auf einem Webserver und wird über einen Webbrowser ausgeführt und konfiguriert. Die oberste Zeile, die Titelzeile, zeigt den Kalendernamen, das Datum und den Namen des momentanen Benutzers.
Direkt unterhalb erscheint die Navigationszeile mit verschiedenen ausklappbaren Menüs und den Links zur Navigation sowie dem Ein- bzw. Ausloggen, hinzufügen von Terminen und den Administratorfunktionen. Welche Menüs angezeigt und ausgewählt werden können hängt von der jeweiligen Berechtigung ab. Unterhalb der Navigationszeile werden die verschiedenen Kalenderansichten dargestellt.</p>
<br />
<a name="2"></a><h4>2. Einloggen</h4>
<p>Falls der Kalender vom Administrator für öffentlichen Zugriff (Ã–ffentliche Ansicht) konfiguriert wurde entfällt das Einloggen.
Ansonsten klickt man auf "Einloggen" auf der rechten oberen Menüleiste. Es erscheint ein Anmeldemenü zur Eingabe des Benutzernamens oder der Emailadresse (nur eines von beiden wird benötigt) sowie dem Passwort welches man vom Administrator erhalten hat. Nach Eingabe der Parameter auf das darunterliegende
"Einloggen" klicken. If you select "Remember me" before clicking Log In, next times you launch the calendar you will be automatically logged in. Hat man sein Passwort vergessen, klickt man auf "Einloggen" und danach auf den Link "Sende neues Passwort".
Man kann seine Emailadresse und das Passwort ändern, indem man auf der rechten Seite eine neue Emailadresse und ein neues Passwort eingibt.
Hat der Administrator Leserechte für die "Ã–ffentliche Ansicht" vergeben, kann der Kalender ohne Einloggen eingesehen werden.</p>
<br />
<a name="3"></a><h4>3. Termine hinzufügen</h4>
<p>Termine können auf verschiedene Arten hinzugefügt werden:</p>
<ul style="margin:0 20px">
<li><p>Durch klicken auf die "Termin hinzufügen" Schaltfläche in der Navigationsleiste</p></li>
<li><p>Durch klicken auf den oberen Teil des betreffenden Tages in der Jahres- oder Monatsansicht</p></li>
<li><p>Durch ziehen der Maus über die gewünschte Dauer des Termins in der Wochen- oder Tagesansicht</p></li>
</ul>
<p>Jede dieser Möglichkeiten öffnet ein "Terminfenster" zur Eingabe der Termindaten.</p>
Bestimmte Felder sind je nach der oben gewählten Art schon vorausgefüllt.
<p>Im ersten Teil des Fensters kann ein Titel, ein Ort und eine Beschreibung eingetragen werden. Hier besteht auch die Möglichkeit durch das Setzen eines Häkchens den Termin als "Privater Termin" zu kennzeichnen Den Titel sollte man kurz halten und bei Bedarf weitere Details im Beschreibungsfeld eintragen. Wählt man eine bestehende Kategorie wird dieser Termin farblich passend unterlegt. Ort und Beschreibung werden in den Ansichten durch Überfahren mit dem Mauszeiger sichtbar. Private Termine sind nur für den jeweiligen autorisierten Benutzer sichtbar.</p>
<p>URLs welche in der Terminbeschreibung im Format: [ url | name ] z.B. [ www.meineseite.com | meinname ] eingegeben sind, werden automatisch zu Hyperlinks konvertiert. Diese können in der â€žMonatsansichtâ€œ, den â€žAnstehende Termineâ€œ sowie den Benachrichtigungsemails angewählt werden. </p>
<p>Im weitergehenden Teil des Fensters können das Datum und die Zeiten eingetragen werden. Wird ein "Ganztags" Termin gewählt können keine Zeiten eingetragen werden. Das Enddatum ist optional und wird für mehrtägige Termine verwendet. Datum und Zeit kann entweder von Hand eingetragen werden oder über den sich öffnenden Minikalender und den Zeitvorgaben gewählt werden. AnschlieÃŸend an die Datum und Zeit Felder können Termine über ein weiteres Eingabefenster als wiederkehrend definiert werden. Das Fenster öffnet sich durch Klicken auf die "Ändern" Schaltfläche. In diesem Fall wird der Termin vom eingetragenen Start- bis hin zum Enddatum turnusmäÃŸig wiederholt. Bleibt das Enddatum leer wiederholt sich der Termin für immer was z.B. für Geburtstage nützlich ist.</p>
<p>Im letzten Teil des Fensters kann man über eine sog. Benachrichtigungseinrichtung durch Eintragen von einer oder mehreren Emailadressen eine Erinnerungsmail an die betreffende(n) Person(en) senden. Hierzu kann man die Tage im Voraus bestimmen und am Tag des Termins wird zusätzlich noch eine Erinnerungsmail versendet. Wenn 0 Tage angegeben wird, wird nur am Tag des Termins ein Email verschickt. Dies gilt auch jedes Mal für sich wiederholende Termine.</p>
<p>Das Email Feld kann Email Adressen und/oder den Namen (ohne Dateierweiterung) einer vordefinierten Email Liste enthalten. Alle Einträge werden durch ein Semikolon getrennt. Die vordefinierte Email Liste ist eine Text Datei (Dateierweiterung .txt) im "emlists/" Verzeichnis mit einer Email Adresse pro Zeile. Der Dateiname darf kein "@" Zeichen enthalten.</p>
<p>Nach Fertigstellung der Eintragungen auf "Hinzufügen" drücken.</p>
<br />
<a name="4"></a><h4>4. Termine löschen und bearbeiten</h4>
<p>In jeder Kalenderansicht kann ein Termin durch Anklicken eingesehen, bearbeitet oder gelöscht werden. Abhängig von den Zugriffsrechten kann man eigene, alle, oder sogar Termine anderer Benutzer sehen, bearbeiten und löschen. Für eine Beschreibung der Felder siehe oben - "3. Termin hinzufügen".
Unten im "Termin bearbeiten" Fenster hat man durch die Schaltflächen die Möglichkeit einen geänderten Termin zu speichern, als neuen Termin zu speichern (um z.B. einen Termin auf ein neues Datum zu kopieren) oder den Termin zu löschen.
<strong> ACHTUNG: "Termin löschen", löscht diesen ohne vorherige Warnung oder Nachfrage. Löschen eines sich wiederholenden Termins löscht die ganze Serie.</strong></p>
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
<p>In allen Ansichten werden durch überfahren mit dem Mauszeiger (sog. mouseover) nähere Details des Termins angezeigt. Für private Terminen wird die Hintergrundfarbe des Popup-Box licht grün In der "Anstehend" Ansicht führen eventuell im Feld "Beschreibung" angegebene URL's zu den dazugehörigen Webseiten.</p>
Mit den korrekten Rechten ist folgendes möglich:
<ul style="margin:0 20px">
<li><p>In allen Ansichten öffnet sich durch Anklicken des Termins ein Fenster um diesen Termin anzuschauen, zu bearbeiten oder zu löschen.</p></li>
<li><p>In der Jahres- und Monatsansicht kann ein Termin durch Klicken auf das gewünschte Tagesdatum hinzugefügt werden.</p></li>
<li><p>In der Wochen- und Tagesansicht kann ein Termin durch Ziehen der Maus über eine bestimmte Zeitspanne (Termindauer) hinzugefügt werden.</p></li>
</ul>
<p>In der "Änderungen" Ansicht kann ein Anfangsdatum gewählt werden. Eine Liste mit hinzugefügten, geänderten, entfernten Terminen ab dem gewählten Datum wird angezeigt.</p>
<p>Um einen Termin zu ändern kann man durch Anklicken des Eintrages Zeit und/oder Datum anpassen.</p>
<br />
<a name="7"></a><h4>7. Ausloggen</h4>
<p>Um den Kalender zu verlassen klickt man auf "Ausloggen" auf der rechten oberen Menuleiste. Wenn man ohne Ausloggen den Kalender verlässt, kann es vorkommen, dass dieser beim nächsten Mal eingeloggt startet. </p>
<br />
<a name="8"></a><h4>8. Kalenderadministration</h4>
<p>- Die folgenden Eigenschaften verlangen Administrationsrechte -</p>
<p>Wenn sich ein Benutzer mit Administrationsrechten einloggt erscheint auf der rechten Seite in der Navigationsleiste das Administrationsmenu.
Über dieses Menü sind folgende Adminfunktionen verfügbar:</p>
<br />
<h5>a. Einstellungen</h5>
<p>Dieses Fenster zeigt die gegenwärtigen Kalender-Einstellungen, die geändert werden können. Alle möglichen Einstellungen werden auf dieser Seite erklärt.
Die Kalendereinstellungen werden in der "config.php" Datei auf dem Server gespeichert. Es wird empfohlen die geänderte config.php Datei zu sichern.</p>
<p></p>
<br />
<h5>b. Kategorien</h5>
<p>Das Hinzufügen von Kategorien in verschiedenen Farben (nicht zwingend notwendig) kann die Ansicht des Kalenders übersichtlicher gestalten. Beispiele von möglichen Kategorien sind "Urlaub", "Stammtisch", "Geburtstage", "Wichtig", usw.
Über das Auswählen von "Kategorien" im Administrationsmenü erhält man eine Liste aller Kategorien und der Möglichkeit, "neue Kategorien hinzufügen" oder vorhandene Kategorien zu bearbeiten bzw. zu löschen. Die anfängliche Installation hat eine Defaultkategorie. Das Bearbeiten bzw. Löschen von bereits vorhandenen Kategorien erfolgt ebenfalls über das Administrationsmenu. Die Reihenfolge der Anzeige erfolgt über die vergebene Reihenfolgennummer. Mit den Feldern "Text Farbe" und "Hintergrund" kann man die Farben der Kategorien, wie sie im Kalender angezeigt werden sollen, wählen.</p>
<p>Es kann eine Wiederholung konfiguriert werden. Termine in dieser Kategorie werden wie gewählt automatisch wiederholt.<br />Mit der Checkbox "Public" können Termine für den öffentlichen Benutzer (nicht eingelogd) verborgen und vom RSS Feed ausgeschlossen werden.</p>
<p>Löscht man eine Kategorie werden alle ihr zugehörigen Daten in der Defaultkategorie angezeigt.</p>
<br />
<h5>c. Benutzer</h5>
<p>Das Benutzerfenster erlaubt dem Kalenderadministrator Benutzer und ihre Kalenderzugriffsrechte hinzuzufügen und zu bearbeiten. Zwei Hauptparameter können eingestellt werden: Name / E-Mail / Kennwort des Benutzers und dessen Zugriffsrechte. Mögliche Rechte sind: "Keine Rechte", "Kalender anzeigen", "Erstelle, bearbeite eigene Termine", "Erstelle, bearbeite alle Termine" und "Administrator Funktionen". Weitere Informationen über die Rechte erhält man bei öffnen des Fensters "Benutzer hinzufügen". Wenn vom Benutzer gewünscht, muss dessen gültige Emailadresse eingetragen werden um ihm Ankündigungen von Fälligkeitstagen und Terminen per Email zu senden.</p>
<p>Wenn "Eigene Anmeldung" aktiviert ist, können sich Benutzer über das Web Interface selbst für die Kalenderbenützung registrieren. Über die Einstellungen kann der Administrator die "Eigene Anmeldung" konfigurieren und die Zugriffsrechte für selbst angemeldete Benutzer wählen.</p>
<p>Bei einem Kalender ohne öffentlichem Zugriff (Ã–ffentliche Ansicht) müssen sich die Benutzer mit ihrem Benutzernamen oder E-Mail und Kennwort einloggen. Abhängig vom Typ des Benutzers können an einen Benutzer verschiedene Zugriffsrechte vergeben werden.</p>
<p>Für jeden Benutzer kann eine Sprache für die Beutzerschnittstelle voreingestellt werden. Wenn keine Sprache gewählt wurde, wird die in den Kalendereinstellungen gewählte Sprache verwendet.</p>
<br />
<h5>c. Datenbank</h5>
<p>Die Datenbank Seite erlaubt dem Administrator folgende Funktionen auszuführen:</p>
<ul>
<li>Prüfen und Reparieren der Datenbank um Fehler in den Tabellen zu finden und sie zu reparieren.</li>
<li>Datenbank komprimieren um unbenutzten Speicherplatz freizugeben und Overhead zu vermeiden.</li>
<li>Datenbank Backup, um ein Backup für eine allfällige Wiederherstellung der Tabellenstruktur und Inhalte zu erstellen.</li>
</ul>
<p>Die erste Funktion "Prüfen und reparieren" braucht nur aufgerufen zu werden, falls die Kalenderanzeige nicht korrekt ist. Die zweite Funktion "Komprimieren" könnte jährlich aufgerufen werden um die Datenbank zu komprimieren. Die dritte Funktion "Backup" sollte öfters verwendet werden, abhängig von der Häufigkeit der Änderungen der Termine.</p>
<br />
<h5>d. CSV datei importieren</h5>
<p>Diese Funktion kann verwendet werden um in den LuxCal Kalender Termindaten zu importieren welche von anderen Kalendern (z.B. Microsoft Outlook) exportiert worden sind. Weitere Informationen findet man auf der CSV Import Seite.</p>
<br />
<h5>e. iCal File Import</h5>
<p>Diese Funktion kann verwendet werden um Termine von iCal Dateien (Dateierweiterung .ics) in den Kalender zu importieren. Weitere Informationen findet man auf der iCal Import Seite. Nur Termine die mit dem LuxCal Kalender kompatibel sind, können importiert erden, wie z.B.: To-Do, Journal, Frei / Gebucht. Zeitzone und Alarm werden ignoriert.</p>
<br />
<h5>f. iCal File Export</h5>
<p>Diese Funktion kann verwendet werden um Termine von iCal Dateien (Dateierweiterung .ics) in den Kalender zu exportieren. Weitere Informationen findet man auf der iCal Import Seite.</p>
<br />
<a name="9"></a><h4>9. About LuxCal</h4>
<p>Author: <b>Roel B.</b>&nbsp;&nbsp;&nbsp;&nbsp;Home page: <b><a href="http://www.luxsoft.eu/" target="_blank">http://www.luxsoft.eu/</a></b></p>
<p>This program is free software; you can redistribute it and/or modify it under the terms of the <b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b> as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.</p>
<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.</p>
<br />