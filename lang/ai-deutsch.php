<?php
/*
= LuxCal event calendar admin interface language file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.
2011-05-31 - &uuml;bersetzt von Alfred Bruckner

Â© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu
This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.5.3");

/* -- Admin Interface texts -- */

$ax = array(

//settings.php - fieldset headers + general
"set_general_settings" => "Allgemein",
"set_opanel_settings" => "Options Panel",
"set_user_settings" => "Benutzer",
"set_view_settings" => "Anzeige",
"set_dt_settings" => "Datum/Zeit",
"set_save_settings" => "Speichern",
"set_not_valid" => "ung&uuml;ltig",
"set_missing" => "fehlt",
"set_settings_saved" => "Einstellungen gespeichert",
"set_read_error" => "Einlesen der Konfigurationsdatei fehlgeschlagen",
"set_write_error" => "Schreiben der Konfigurationsdatei fehlgeschlagen. Check permissions of root directory",
"hover_for_details" => "F&uuml;r Hilfe Mauszeiger &uuml;ber die Beschreibung bewegen",
"enabled" => "Aktiviert",
"disabled" => "Deaktiviert",
"no" => "Nein",
"yes" => "Ja",
"or" => "Oder",
"minutes" => "Minuten",
"pixels" => "Pixel",
"no_way" => "Sie haben keine Rechte f&uuml;r diese Aktion",

//settings.php - calendar settings
"calendarTitle_label" => "Titel",
"calendarTitle_text" => "Wird in der Kopfzeile angezeigt und in Email Benachrichtigungen verwendet.",
"calendarUrl_label" => "URL",
"calendarUrl_text" => "Die Web Seite des Kalenders.",
"calendarEmail_label" => "Email (Absender)",
"backupEmail_label" => "Zieladresse für Datenbank-Backup",
"calendarEmail_text" => "Email Absender Adresse f&uuml;r Benachrichtigungs Emails.<br />Format: \'Email\' or \'Name&#8249;Email&#8250;\'. \'Name\' k&ouml;nnte der Kalender Name sein.",
"timeZone_label" => "Zeitzone",
"timeZone_text" => "Die Zeitzone die zur Berechnung der aktuellen Zeit verwendet wird.",
"see" => "siehe",
"view" => "Anschauen",
"post_own" => "Eigene",
"post_all" => "Alle",
"defaultView_label" => "Ansicht beim Start",
"defaultView_text" => "M&ouml;gliche Ansichten nach dem Start sind:<br />- Jahr<br />- Monat<br />- Woche<br />- Tag<br />- Anstehend<br />- &auml;nderungen<br />Empfehlung: Monat oder Anstehend.",
"language_label" => "Benutzer Sprache",
"language_text" => "Die Dateien ui-{sprache}.php, ai-{sprache}.php, ug-{sprache}.php und ug-layout.png m&uuml;ssen in dem lang/ Verzeichnis vorhanden sein. {sprache} = ausgew&auml;hlte Sprache. Dateinamen m&uuml;ssen in Kleinbuchstaben sein!",
"userMenu_label" => "User filter menu",
"userMenu_text" => "Display the user filter menu in the options panel.<br />This filter can be used to only display events created by one specific user.",
"resMenu_label" => "Resource filter menu",
"resMenu_text" => "Display the event resource filter menu in the options panel.<br />This filter can be used to only display events belonging to a specific event resource.",
"langMenu_label" => "Men&uuml; zur Sprachauswahl",
"langMenu_text" => "Zeige die Sprachauswahl in der Navigationsleiste an.<br />This menu can be used to select the user interface language.<br />(Eine Aktivierung ist nur sinnvoll wenn Sprachen installiert sind)",
"chgEmailList_label" => "Email Adresse f&uuml;r Benachrichtigung &uuml;ber &auml;nderungen",
"chgEmailList_text" => "An diese Adresse(n) wird periodisch eine Benachrichtigung &uuml;ber &auml;nderungen geschickt. Email Adressen mit Semikolon trennen.<br />(ben&ouml;tigt einen cron job)",
"backupEmail_label" => "Email Adresse f&uuml;r Sicherung der Datenbank",
"backupEmail_text" => "An diese Adresse wird ein SQL-File zur Sicherung der Datenbank geschickt",
"chgNofDays_label" => "Anzahl der Tage die zur&uuml;ck geschaut wird",
"chgNofDays_text" => "Anzahl der Tage die f&uuml;r &auml;nderungen zur&uuml;ck geschaut wird.<br />Bei 0 wird keine Email versandt.<br />(ben&ouml;tigt einen cron job)",
"cronSummary_label" => "Admin cron job summary",//
"cronSummary_text" => "Send a cron job summary to the calendar administrator.<br />Enabling is only useful if on your server:<br />- a cron job has been activated<br />- emailing cron job output is enabled (check with your ISP)",//
"oneStepEdit_label" => "One-step event editing",//
"oneStepEdit_text" => "If enabled: clicking an event will directly open the Edit Event window.<br />If disabled: clicking an event will always first open the Event Details window where the Edit button has to be selected to open the Edit Event window.<br />Note: If the user has no rights to edit an event, the Event Details window will open with the Edit button disabled.",//

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Eigene Anmeldung",
"selfReg_text" => "Erlaubt Benutzern sich selbst anzumelden um Zugriff auf den Kalender zu haben.",
"selfRegPrivs_label" => "Berechtigung",
"selfRegPrivs_text" => "Berechtigung f&uuml;r selbst angemeldete Benutzer.<br />- anschauen: nur anschauen<br />- eigene: Termine erstellen und eigene bearbeiten<br />- alle: Termine erstellen, eigene und fremde bearbeiten",
"maxNoLogin_label" => "Max. Anzahl an Tagen ohne sich einzuloggen",
"maxNoLogin_text" => "Wenn sich ein Benutzer l&auml;nger als diese Zeit nicht einloggt, wird der Benutzer automatisch wieder gel&ouml;scht.<br />Wenn der Wert au 0 gesetzt wird, werden keine Benutzer automatisch gel&ouml;scht.<br />(ben&ouml;tigt einen cron job)",
"miniCalPost_label" => "Mini Kalender Termin erstellen",
"miniCalPost_text" => "Ist nur von Bedeutung wenn der Mini Kalender verwendet wird!<br />Autorisierte Benutzer k&ouml;nnen:<br />- neue Termine durch Anklicken der Kopfzeile einer Kalenderzelle einen neuen Termin erstellen<br />- bearbeiten/l&ouml;schen eines Termins durch klicken auf das Quadrat",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Start month in Year view",
"yearStart_text" => "If a start month has been specified (1 - 12), in Year view the calendar will always start with this month and the year of this first month will only change as of the first day of the same month in the next year.<br />The value 0 has a special meaning: the start month is based on the current date and will fall in the first row of months.",
"colsToShow_label" => "Spalten f&uuml;r Jahresansicht",
"colsToShow_text" => "Anzahl der angezeigten Monate in einer Reihe der Jahresansicht.<br />Empfehlung: 3 oder 4.",
"rowsToShow_label" => "Reihen f&uuml;r Jahresansicht",
"rowsToShow_text" => "Anzahl der angezeigten Reihen der Jahresansicht.<br />Empfehlung: 4, wodurch 12 oder 16 Monate angezeigt werden.",
"weeksToShow_label" => "Anzahl der angezeigten Wochen in der Monatsansicht",
"weeksToShow_text" => "Anzahl der in der Monatsansicht angezeigten Wochen.<br />Empfehlung: 10, wodurch 2.5 Monate angezeigt werden.<br />0 hat eine spezielle Bedeutung: Anzeige exakt eines Monats",
"upcomingDays_label" => "Vorschau auf anstehende Termine",
"upcomingDays_text" => "Anzahl der Tage die zur Ermittlung der anstehenden Termine und RSS feeds verwendet wird.",
"startHour_label" => "Erste Stunde in Tag/Wochen-Ansicht.",
"startHour_text" => "Uhrzeit zu der ein normaler Termin beginnt.<br />Eine Einstellung auf z.B. 6 vermeidet in der Woche/Tag-Ansicht die Anzeige der ungen&uuml;tzten Zeit zwischen Mitternacht und 6:00.",
"dwTimeSlot_label" => "Zeitraster in der Tag/Wochen-Ansicht",
"dwTimeSlot_text" => "Zeitraster der Tag/Wochen-Ansicht in Minuten.<br />Dieser Wert bestimmt zusammen mit der &quotErste Stunde&quot Einstellung die Anzahl der Zeilen in der Tag/Wochen-Ansicht",
"dwTsHeight_label" => "Zeitraster H&ouml;he",
"dwTsHeight_text" => "H&ouml;he einer Zeile des Zeitrasters der Tag/Wochen-Ansicht in Pixel.",
"weekNumber_label" => "Wochennummern",
"weekNumber_text" => "Anzeige der Wochennummern in Jahr, Monat und Tag-Ansicht.",
"showOwner_label" => "Ersteller",
"showOwner_text" => "Falls aktiviert, wird in der Ersteller eines Termins angezeigt:<br />- in der Informationsbox beim Bewegen des Mauszeigers in den verschiedenen Ansichten<br />- der Ansicht &quotAnstehend&quot<br />- der Ansicht &quot&auml;nderungen&quot<br />- RSS Feeds<br />- Email Benachrichtigungen.",
"showCatName_label" => "Kategorie Name",
"showCatName_text" => "In den verschiedenen Ansichten kann zus&auml;tzlich zu der Kategorie Farbe auch der Name angezeigt werden.",
"showLinkInMV_label" => "Links in der Monatsansicht",
"showLinkInMV_text" => "In der Monatsansicht k&ouml;nnen eingetragene URLs in der Terminbeschreibung als Hyperlink angezeigt werden. (Wenn ein Termin ge&ouml;ffnet wird, werden URLs immer als Hyperlink angezeigt)",
"eventColor_label" => "Event colors based on",
"eventColor_text" => "Events in the various calendar views can displayed in the color assigned to the user who created the event or the color of the event resource.",
"owner_color" => "owner color",
"res_color" => "resource color",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Datum Format",
"dateFormat_text" => "Format des Datums f&uuml;r Termine in der Kalenderanzeige und Eingabefelder.",
"dateUSorEU_label" => "Datum/Zeit Format",
"dateUSorEU_text" => "Format der Datum/Zeit Anzeige in den Kopfzeilen der Kalderanzeige.",
"dateSep_label" => "Datum Trennzeichen",
"dateSep_text" => "Datum Trennzeichen f&uuml;r Termine in der Kalenderanzeige und Eingabefelder.",
"time24_label" => "Zeitformat (12 oder 24 Stunden)",
"time24_text" => "Zeitformat f&uuml;r Termine in der Kalenderanzeige und Eingabefelder.",
"weekStart_label" => "Erster Tag der Woche",
"weekStart_text" => "Erster Tag der Woche.",
"date_format_us" => "Montag, Mai 15, 2010 (US)",
"date_format_eu" => "Montag 15 Mai 2010",
"dot" => "Punkt",
"slash" => "Schr&auml;gstrich",
"hyphen" => "Bindestrich",
"time_format_us" => "12-Stunden AM/PM",
"time_format_eu" => "24-Stunden",
"sunday" => "Sonntag",
"monday" => "Montag",
"time_zones" => "TIME ZONES",
"dd_mm_yyyy" => "tt-mm-jjjj",
"mm_dd_yyyy" => "mm-tt-jjjj",
"yyyy_mm_dd" => "jjjj-mm-tt",

//login.php
"log_log_in" => "Einloggen",
"log_subscript" => "Persönlicher Kalender-Login",
"log_remember_me" => "Remember me",
"log_register" => "Registrieren",
"log_change_my_data" => "Meine Daten &auml;ndern",
"log_change" => "&auml;ndern",
"log_back" => "Zur&uuml;ck",
"log_un_or_em" => "Benutzername oder Email",
"log_un" => "Benutzername",
"log_em" => "Email",
"log_pw" => "Passwort",
"log_new_un" => "Neuer Benutzername",
"log_new_em" => "Neue Email",
"log_new_pw" => "Neues Passwort",
"log_pw_msg" => "Hier ist Ihr Passwort zum Einloggen:",
"log_pw_subject_pre" => "Ihr",
"log_pw_subject_post" => "Passwort",
"log_npw_msg" => "Hier ist Ihr neues Passwort zum Einloggen:",
"log_npw_subject_pre" => "Ihr neues",
"log_npw_subject_post" => "Passwort",
"log_npw_sent" => "Ihr neues Passwort wurde gesendet",
"log_registered" => "Registrierung erfolgreich - Ihr Passwort wurde per Email gesendet",
"log_not_registered" => "Registrierung war nicht erfolgreich",
"log_un_exists" => "Benutzername existiert schon",
"log_em_exists" => "Email Adresse existiert schon",
"log_un_invalid" => "Ung&uuml;ltiger Benutzername (min. L&auml;nge 2: A-Z, a-z, 0-9, und _-.)",
"log_em_invalid" => "Ung&uuml;ltige Email Adresse",
"log_un_em_invalid" => "Dieser Benutzername/Email ist ung&uuml;ltig",
"log_un_em_pw_invalid" => "Ihr Benutzername/Email oder Passwort ist falsch",
"log_no_un_em" => "Bitte Benutzernamen oder Email eingeben",
"log_no_un" => "Bitte Benutzername eingeben",
"log_no_em" => "Bitte Email eingeben",
"log_no_pw" => "Bitte Passwort eingeben",
"log_no_rights" => "Einloggen nicht m&ouml;glich: keine Berechtigung --> Administrator kontaktieren",
"log_send_new_pw" => "Passwort vergessen",
"log_if_changing" => "Nur wenn Sie es &auml;ndern m&ouml;chten",
"log_no_new_data" => "Keine Datei zu &auml;ndern",
"log_invalid_new_un" => "Ung&uuml;ltiger neuer Benutzername (min. L&auml;nge 2: A-Z, a-z, 0-9, und _-.)",
"log_new_un_exists" => "Neuer Benutzername existiert schon",
"log_invalid_new_em" => "Neue Email Adresse ist ung&uuml;ltig",
"log_new_em_exists" => "Neue Email Adresse existiert schon",
"log_ui_language" => "Sprache der Benutzeroberfl&auml;che",

//resources.php
"res_list" => "Ressourcenliste",
"res_edit" => "Bearbeiten",
"res_delete" => "L&ouml;schen",
"res_add_new" => "Neue Ressource anlegen",
"res_add" => "Hinzuf&uuml;gen",
"res_edit_cat" => "Ressource bearbeiten",
"res_back" => "Zur&uuml;ck",
"res_name" => "Bezeichnung",
"res_teamsize_min" => "Besatzung min",
"res_teamsize_max" => "Besatzung max",
"res_sequence" => "Reihenfolge",
"res_in_menu" => "In der Liste",
"res_text_color" => "Text Farbe",
"res_background" => "Hintergrund",
"res_select_color" => "W&auml;hle Farbe",
"res_save" => "Aktualisieren",
"res_added" => "Ressource hinzugef&uuml;gt",
"res_updated" => "Ressource aktualisiert",
"res_deleted" => "Ressource gel&ouml;scht",
"res_invalid_color" => "Ung&uuml;ltiges Farbformat (#XXXXXX - X = HEX-Wert)",
"res_not_added" => "Ressource nicht hinzugef&uuml;gt",
"res_not_updated" => "Ressource nicht aktualisiert",
"res_not_deleted" => "Ressource nicht gel&ouml;scht",
"res_nr" => "#",
"res_repeat" => "Wiederholung",
"res_every_day" => "T&auml;glich",
"res_every_week" => "W&ouml;chentlich",
"res_every_month" => "Monatlich",
"res_every_year" => "J&auml;hrlich",
"res_public" => "&ouml;ffentlich",

//categories.php
"cat_list" => "Kategorienliste",
"cat_edit" => "Bearbeiten",
"cat_delete" => "L&ouml;schen",
"cat_add_new" => "Neue Kategorie anlegen",
"cat_add" => "Hinzuf&uuml;gen",
"cat_edit_cat" => "Kategorie bearbeiten",
"cat_back" => "Zur&uuml;ck",
"cat_name" => "Bezeichnung",
"cat_sequence" => "Reihenfolge",
"cat_in_menu" => "In der Liste",
"cat_text_color" => "Text Farbe",
"cat_background" => "Hintergrund",
"cat_select_color" => "W&auml;hle Farbe",
"cat_save" => "Aktualisieren",
"cat_added" => "Kategorie hinzugef&uuml;gt",
"cat_updated" => "Kategorie aktualisiert",
"cat_deleted" => "Kategorie gel&ouml;scht",
"cat_invalid_color" => "Ung&uuml;ltiges Farbformat (#XXXXXX - X = HEX-Wert)",
"cat_not_added" => "Kategorie nicht hinzugef&uuml;gt",
"cat_not_updated" => "Kategorie nicht aktualisiert",
"cat_not_deleted" => "Kategorie nicht gel&ouml;scht",
"cat_nr" => "#",
"cat_repeat" => "Wiederholung",
"cat_every_day" => "T&auml;glich",
"cat_every_week" => "W&ouml;chentlich",
"cat_every_month" => "Monatlich",
"cat_every_year" => "J&auml;hrlich",
"cat_public" => "&ouml;ffentlich",

//users.php
"usr_list_of_users" => "Benutzerliste",
"usr_name" => "Benutzername",
"usr_firstname" => "Vorname",
"usr_familyname" => "Nachname",
"usr_phone" => "Telefon",
"usr_email" => "Email",
"usr_password" => "Passwort",
"usr_rights" => "Rechte",
"usr_language" => "Sprache",
"usr_ui_language" => "Sprache der Benutzeroberfl&auml;che",
"usr_edit_user" => "Benutzer Profil bearbeiten",
"usr_add" => "hinzuf&uuml;gen",
"usr_edit" => "Bearbeiten",
"usr_delete" => "L&ouml;schen",
"usr_none" => "Keine",
"usr_view" => "Anzeigen",
"usr_post_own" => "Setze&nbsp;Eigene",
"usr_post_all" => "Setze&nbsp;Alle",
"usr_back" => "Zur&uuml;ck",
"usr_admin" => "Admin",
"usr_login_0" => "1.&nbsp;login",
"usr_login_1" => "Letztes",
"usr_login_cnt" => "Anzahl",
"usr_add_profile" => "Profil&nbsp;anlegen",
"usr_upd_profile" => "Profil&nbsp;aktualisieren",
"usr_not_found" => "Benutzer nicht gefunden",
"usr_if_changing_pw" => "Nur f&uuml;r Passwort&auml;nderung",
"usr_admin_functions" => "Administrator Funktionen",
"usr_no_rights" => "Keine Rechte",
"usr_view_calendar" => "Kalender anzeigen",
"usr_post_events_own" => "Erstelle, bearbeite eigene Termine",
"usr_post_events_all" => "Erstelle, bearbeite alle Termine",
"usr_pw_not_updated" => "Passwort nicht erneuert",
"usr_added" => "Benutzer angelegt",
"usr_updated" => "Benutzerprofil aktualisiert",
"usr_deleted" => "Benutzer gel&ouml;scht",
"usr_not_added" => "Benutzer nicht hinzugef&uuml;gt",
"usr_not_updated" => "Benutzer nicht aktualisiert",
"usr_not_deleted" => "Benutzer nicht gel&ouml;scht",
"usr_cred_required" => "Benutzername, Email und Passwort werden ben&ouml;tigt",
"usr_uname_exists" => "Benutzername existiert schon",
"usr_email_exists" => "Email Adresse existiert schon",
"usr_un_invalid" => "Ung&uuml;ltiger Benutzername (min. L&auml;nge 2: A-Z, a-z, 0-9, und _-.)",
"usr_em_invalid" => "Email Adresse ist ung&uuml;ltig",
"usr_cant_delete_yourself" => "Sie k&ouml;nnen sich nicht selbst l&ouml;schen",
"usr_background" => "Background color",
"usr_select_color" => "Select Color",
"usr_invalid_color" => "Color format invalid (#XXXXXX - X = HEX-value)",
"usr_bsp_date" => "BSP (datum)",

//briefing.php
"brf_matrix" => "Einweisungsmatrix",
"brf_name" => "Benutzername",
"brf_patent" => "BSP",
"brf_save" => "Speichern",
"brf_delete" => "Löschen",
"brf_close" => "Schließen",
"brf_saved" => "Einweisungen gespeichert",

//database.php
"mdb_dbm_functions" => "Aufgaben",
"mdb_noshow_tables" => "Tabellen k&ouml;nnen nicht gelesen werden",
"mdb_compact" => "Komprimieren",
"mdb_compact_table" => "Tabelle Komprimieren",
"mdb_compact_error" => "Fehler",
"mdb_compact_done" => "abgeschlossen",
"mdb_purge_done" => "Gel&ouml;schte Termine endg&uuml;ltig gel&ouml;scht",
"mdb_repair" => "Pr&uuml;fen und reparieren",
"mdb_check_table" => "Pf&uuml;fe Tabelle",
"mdb_ok" => "OK",
"mdb_nok" => "Nicht OK",
"mdb_nok_repair" => "Nicht OK, reparieren",
"mdb_backup" => "Backup",
"mdb_backup_table" => "Backup der Tabelle",
"mdb_backup_done" => "abgeschlossen",
"mdb_file_saved" => "Backup Datei gespeichert.",
"mdb_file_name" => "Datei Name:",
"mdb_start" => "Start",
"mdb_back" => "Zur&uuml;ck",
"mdb_no_function_checked" => "Keine Operation(en) ausgew&auml;hlt",
"mdb_write_error" => "Writing backup file failed<br />Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "Ausgew&auml;hlte Datei",
"iex_file_name" => "iCal Dateiname",
"iex_file_description" => "iCal Datei Beschreibung",
"iex_filters" => "Termin Filter",
"iex_upload_ics" => "iCal Datei hochladen",
"iex_select_events" => "Termine ausw&auml;hlen",
"iex_upload_csv" => "CSV Datei hochladen",
"iex_upload_file" => "Datei hochladen",
"iex_create_file" => "Datei generieren",
"iex_download_file" => "Datei herunterladen",
"iex_fields_sep_by" => "Felder getrennt durch",
"iex_birthday_res_id" => "Geburtstags Kategorie ID",
"iex_default_res_id" => "Kategorie ID",
"iex_if_no_cat" => "wenn keine Kategorie gefunden wird",
"iex_import_events_from_date" => "Termine importieren ab:",
"iex_see_insert" => "Siehe Beschreibung rechts",
"iex_no_file_name" => "Dateiname fehlt",
"iex_inval_field_sep" => "Ung&uuml;ltiges oder kein Feld Trennzeichen",
"iex_no_begin_tag" => "Ung&uuml;ltige iCal Datei (BEGIN-tag fehlt)",
"iex_date_format" => "Datum Format",
"iex_time_format" => "Zeit Format",
"iex_number_of_errors" => "Anzahl der Fehler in der Liste",
"iex_bgnd_highlighted" => "Hintergrund hervorgehoben",
"iex_verify_event_list" => "&uuml;berpr&uuml;fe Termin Liste, korrigiere Fehler und w&auml;hle",
"iex_add_events" => "Termine zur Datenbank hinzuf&uuml;gen",
"iex_select_birthday_delete" => "W&auml;hle Geburtstag aus und l&ouml;sche Checkbox wie gew&uuml;nscht",
"iex_select_delete_ignore" => "W&auml;hle L&ouml;schen Checkbox um den Termin zu ignorieren",
"iex_title" => "Titel",
"iex_venue" => "Ort",
"iex_owner" => "Ersteller",
"iex_resource" => "Kategorie",
"iex_date" => "Datum",
"iex_end_date" => "Ende",
"iex_start_time" => "Anfang",
"iex_end_time" => "Endzeit",
"iex_description" => "Beschreibung",
"iex_birthday" => "Geburtstag",
"iex_delete" => "L&ouml;schen",
"iex_events_added" => "Termine hinzugef&uuml;gt",
"iex_events_dropped" => "Termine &uuml;bersprungen (bereits vorhanden)",
"iex_db_error" => "Datenbank Fehler",
"iex_ics_file_error_on_line" => "iCal Datei Fehler in Zeile",
"iex_occurring_between" => "von - bis",
"iex_changed_between" => "Erstellt/Ge&auml;ndert von - bis",
"iex_select_date" => "Datum ausw&auml;hlen",
"iex_all_cats" => "Alle Kategorien",
"iex_all_users" => "Alle Benutzer",
"iex_no_events_found" => "Keine Termine gefunden",
"iex_file_created" => "Datei generiert",
"iex_write error" => "Writing export file failed<br />Check permissions of 'files/' directory",
"iex_back" => "Zur&uuml;ck",

//lcalcron.php
"cro_sum_header" => "CRON JOB SUMMARY",
"cro_sum_trailer" => "END OF SUMMARY",

//notify.php
"not_sum_title" => "EMAIL REMINDERS",
"not_not_sent_to" => "Reminders sent to",
"not_no_not_dates_due" => "No notification dates due",
"not_all_day" => "Ganztags",
"not_mailer" => "Mailer",
"not_subject" => "Betreff",
"not_event_due_in" => "Termin f&auml;llig in",
"not_due_in" => "F&auml;llig in",
"not_days" => "Tag(en)",
"not_date_time" => "Datum / Zeit",
"not_title" => "Titel",
"not_sender" => "Absender",
"not_venue" => "Ort",
"not_description" => "Beschreibung",
"not_resource" => "Boot",
"not_open_calendar" => "Kalender &ouml;ffnen",

//sendchg.php
"sch_sum_title" => "CALENDAR CHANGES",
"sch_nr_changes_last" => "Number of changes last",
"sch_no_changes_last" => "No changes last",
"sch_report_sent_to" => "Report sent to",
"sch_no_report_sent" => "No report emailed",
"sch_days" => "day(s)",

//userchk.php
"usc_sum_title" => "USER ACCOUNT CHECK",
"usc_nr_accounts_deleted" => "Number of accounts deleted",
"usc_no_accounts_deleted" => "No accounts deleted",

//explanations
"xpl_manage_db" =>
"<h4>Datenbank Wartung</h4>
<p>Auf dieser Seite k&ouml;nnen folgende Aufgaben ausgew&auml;hlt werden:</p>
<h5>Pr&uuml;fen und reparieren</h5>
<p>Die Datenbank Tabellen werden auf Fehler gepr&uuml;ft. Fehler werden wenn m&ouml;glich repariert.</p>
<p>Wenn keine Ungereimtheiten bei der Anzeige auftreten, sollte eine j&auml;hrliche Pr&uuml;fung
ausreichen.</p>
<h5>Komprimieren</h5>
<p>Wenn ein Termin gel&ouml;scht wird, wird dieser nur als 'gel&ouml;scht' markiert, wird aber
nicht aus der Datenbank gel&ouml;scht. Diese Funktion l&ouml;scht Termine endg&uuml;ltig aus der Datenbank
die vor l&auml;nger als 30 Tagen gel&ouml;scht wurden und gibt den belegten Speicher wieder frei.</p>
<h5>Backup</h5>
<p>Diese Funktion generiert ein Backup der kompletten Datenbank (Struktur und Inhalt) im .sql Format.</p>
Das Backup wird in dem Verzeichnis <strong>files/</strong> mit dem Namen:
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (wobei 'yyyymmdd' = Jahr, Monat, und
Tag, und hhmmss = Stunde, Minuten und Sekunden gespeichert.</p>
<p>Die Backup Datei kann zur Wiederherstellung der Datenbank (Struktur und Inhalt) verwendet werden,
z.B. durch Einlesen der Datei mit dem <strong>phpMyAdmin</strong>
Programm, welches auf den meisten Webservern verf&uuml;gbar ist.</p>",

"xpl_import_csv" =>
"<h4>CSV Import Anleitung</h4>
<p>Diese Seite dient zum Hochladen und Einlesen von Terminen in den Kalender mit Hilfe einer
<strong>'Comma Separated Values (CSV)'</strong> Text Datei.</p>
<p>Die Reihenfolge der Spalten in der CSV Datei muss wie folgt sein: Titel, Ort, Kategorie ID (siehe unterhalb),
Anfang, Ende Datum, Anfang, Ende Zeit und Beschreibung. Die erste Zeile der CSV Datei dient als Beschreibung f&uuml;r
die Spalten und wird ignoriert.</p>
<h5>Beispiel CSV Datei</h5>
<p>Beispiel CSV Dateien befinden sich in dem Verzeichnis 'files/' der LuxCal Installation.</p>
<h5>Datum und Zeit Format</h5>
<p>Das links ausgew&auml;hlte Format f&uuml;r das Datum und die Zeit muss den Eintr&auml;gen in der zu verarbeiteten
CSV Datei entsprechen.</p>
<h5>Kategorien Tabelle</h5>
<p>Der Kalender verwendet ID Nummern um diese zu definieren. Die Kategorie IDs in der CSV
Datei sollten mit denen des Kalenders &uuml;bereinstimmen oder leer sein.</p>
<p>Wenn im n&auml;chsten Schritt ein Termin als 'Geburtstag' gekennzeichnet werden soll, muss die <strong>Geburtstag
Kategorie ID</strong> entsprechend der nachfolgenden Liste gesetzt werden.</p>
<br />
<p>F&uuml;r diesen Kalender sind folgende Kategorien definiert:</p>",

"xpl_import_ical" =>
"<h4>iCalendar Import Anleitung</h4>
<p>Diese Seite dient zum Hochladen und Einlesen von einer <strong>iCalendar</strong> Datei mit Terminen
in den LuxCal Kalender.</p>
<p>Der Datei Inhalt muss dem [<u><a href='http://tools.ietf.org/html/rfc5545'
target='_blank'>RFC5545 Standard</a></u>] der 'Internet Engineering Task Force' entsprechen.</p>
<p>Nur Termine werden importiert; andere iCal Elemente wie: To-Do, Journal, Frei /
Belegt, Zeitzone und Alarm werden ignoriert.</p>
<p>Beispiel iCalendar Dateien sind im Verzeichnis 'files/' der LuxCal Installation zu finden.</p>
<h5>Kategorien Tabelle</h5>
<p>Der Kalender verwendet ID Nummern um diese zu definieren. Die Kategorie IDs in der CSV
Datei sollten mit denen des Kalenders &uuml;bereinstimmen oder leer sein.</p>
<br />
<p>F&uuml;r diesen Kalender sind folgende Kategorien definiert:</p>",

"xpl_export_ical" =>
"<h4>iCalendar Export Anleitung</h4>
<p>Diese Seite dient zum Erzeugen und Herunterladen von einer <strong>iCalendar</strong> Datei mit Terminen
aus dem LuxCal Kalender.</p>
<p>Der <b>iCal Dateiname</b> (ohne Erweiterung) ist optional. Generierte Dateien werden am Server mit dem angegebenen Dateinamen, oder mit dem Namen \"luxcal\" im Verzeichnis  \"files/\" gespeichert.
Die Dateierweiterung ist <b>.ics</b>.
Am Server im Verzeichnis \"files/\" gespeicherte Dateien mit dem selben Namen werden durch die neue Datei &uuml;berschrieben.
<p>Die <b>iCal Datei Beschreibung</b> (z.B. 'Besprechungen 2011') ist optional. Wenn sie angegeben ist,
wird sie in die exportierte iCal Datei eingetragen.</p>
<p><b>Termin Filter</b><br />
Die zu exportierenden Termine k&ouml;nnen gefiltert werden nach:</p>
<ul>
<li>dem Ersteller</li>
<li>der Kategorie</li>
<li>dem Anfang Datum</li>
<li>hinzugef&uuml;gt/zuletzt ge&auml;ndert Datum</li>
</ul>
<p>Jeder Filter ist optional.<br />
Ein leeres Datum bedeutet: keine Filterung</p>
<br />
<p>Der Inhalt der Datei entspricht dem [<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 Standard</a></u>]
der 'Internet Engineering Task Force'.</p>
<p>Beim <b>Herunterladen</b> der exportierten iCal Datei wird das Datum und die Uhrzeit zum Namen hinzugef&uuml;gt.</p>
<p>Beispiel iCalendar Dateien sind im Verzeichnis 'files/' der LuxCal Installation zu finden.</p>"
);
?>
