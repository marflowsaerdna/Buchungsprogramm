<?php
/*
= LuxCal event calendar admin interface language file =

Översatt till svenska av Thomas "Morgoo" Karlsson. Skicka gärna kommentarer, förslag på förbättringar m.m till thomas.virserum@telia.com.

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.5.3");

/* -- Admin Interface texts -- */

$ax = array(

//settings.php - fieldset headers + general
"set_general_settings" => "Kalenderinställningar",
"set_opanel_settings" => "Options Panel",
"set_user_settings" => "Användareinställningar",
"set_view_settings" => "Visningsinställningar",
"set_dt_settings" => "Datum/tid inställningar",
"set_save_settings" => "Spara inställningar",
"set_not_valid" => "ogiltig",
"set_missing" => "saknas",
"set_settings_saved" => "Kalenderinställningar sparade",
"set_read_error" => "Läsning av konfigurationsfil misslyckades",
"set_write_error" => "Skrivning av konfigurationsfil misslyckades. Check permissions of root directory",
"hover_for_details" => "Peka på beskrivning för detaljer",
"enabled" => "aktiverat",
"disabled" => "avaktiverat",
"no" => "nei",
"yes" => "ja",
"or" => "eller",
"minutes" => "minuter",
"pixels" => "pixels",
"no_way" => "Du har ej behörighet att utföra denna funktion",

//settings.php - calendar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Kalendertitel",
"calendarTitle_text" => "Visas i kalenderns topplist och används vid bekräftelse.",
"calendarUrl_label" => "Kalender URL",
"calendarUrl_text" => "Kalenderns web-adress.",
"calendarEmail_label" => "Kalender e-post (avsändare)",
"calendarEmail_text" => "Avsändarens e-postadress används i bekräftelse-mejl.<br />Format: \'e-post\' eller \'namn&#8249;e-post&#8250;\'. \'namn\' kan vara kalenderns namn.",
"timeZone_label" => "Tidszon",
"timeZone_text" => "Kalenderns tidszon, används till att beräkna tidpunkt.",                 
"see" => "se",
"view" => "visa",
"post_own" => "skicka egen",
"post_all" => "skicka alla",
"defaultView_label" => "Standardvisning vid start",
"defaultView_text" => "Tillgängliga standardvisningar vid starten av kalendern är:<br />- Ã…r<br />- Månad<br />- Vecka<br />- Dag<br />- Kommande<br />- Ã„ndringar<br />Rekommenderat val: Månad eller Kommande.",
"language_label" => "Standard användargränssnitt-språk",
"language_text" => "Filerna ui-{språ}.php, ai-{språ}.php, ug-{språ}.php och ug-layout.png ska finnas i lang/ foldern. {språk} = det valda språket till användargr&auml;nssnittet. Filnamnet ska skrivas med små bokstäver!",
"userMenu_label" => "User filter menu",
"userMenu_text" => "Display the user filter menu in the options panel.<br />This filter can be used to only display events created by one specific user.",
"catMenu_label" => "Resource filter menu",
"catMenu_text" => "Display the event resource filter menu in the options panel.<br />This filter can be used to only display events belonging to a specific event resource.",
"langMenu_label" => "Språkvalsmenu",
"langMenu_text" => "Visa språkvalgsmenu i navigationslisten.<br />This menu can be used to select the user interface language.<br />(aktivering behövs endast om flera språk är installerade)",
"chgEmailList_label" => "E-postmottagare för ändringar",
"chgEmailList_text" => "E-postmottagare, som regelbundet mottager ett e-postmeddelande med kalenderändringar.<br />E-postadresser som avskiljs av semikolon.<br />(kräver ett cron-job)",
"chgNofDays_label" => "Dagar att se tillbaka efter ändringar",
"chgNofDays_text" => "Antal dagar att se tillbaka i tiden efter kalender-ändringar.<br />If the number of days is set to 0 no summary of changes will be sent.<br />(kräver ett cron-job)",
"cronSummary_label" => "Admin cron job summary",//
"cronSummary_text" => "Send a cron job summary to the calendar administrator.<br />Enabling is only useful if on your server:<br />- a cron job has been activated<br />- emailing cron job output is enabled (check with your ISP)",//
"oneStepEdit_label" => "One-step event editing",//
"oneStepEdit_text" => "If enabled: clicking an event will directly open the Edit Event window.<br />If disabled: clicking an event will always first open the Event Details window where the Edit button has to be selected to open the Edit Event window.<br />Note: If the user has no rights to edit an event, the Event Details window will open with the Edit button disabled.",//

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Självregistrering",
"selfReg_text" => "Tillåt användare att registrera sig själv f&ouml;r att få tillgång till kalendern.",
"selfRegPrivs_label" => "Självregistrering rättigheter",
"selfRegPrivs_text" => "Kalender Nyttjanderätt för själv-registrerade användare.<br />- visa: bara visning<br />- skicka-själv: skicka händelser och redigera egna händelser<br />- skicka-alla: skicka händelser och redigera sina egna och andras evenemang",
"maxNoLogin_label" => "Max. nr of days not logged in",
"maxNoLogin_text" => "If a user has not logged in during this number of days, his/her account will be automatically deleted.<br />If this value is set to 0, user accounts will never be deleted.<br />(kräver ett cron-job)",
"miniCalPost_label" => "Mini calendar event posting",
"miniCalPost_text" => "Only relevant if the mini calendar is used!<br />If enabled users can:<br />- post new events in the mini calendar by clicking the top bar of a day cell<br />- edit/delete events by clicking an event square",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Start month in Year view",
"yearStart_text" => "If a start month has been specified (1 - 12), in Year view the calendar will always start with this month and the year of this first month will only change as of the first day of the same month in the next year.<br />The value 0 has a special meaning: the start month is based on the current date and will fall in the first row of months.",
"colsToShow_label" => "Kolumner som ska visas i år-visning",
"colsToShow_text" => "Antal månader som ska visas i varje rad i års-visning.<br />Rekommenderat val: 3 eller 4.",
"rowsToShow_label" => "Rader som ska visas i års-visning",
"rowsToShow_text" => "Antal rader av  månader som ska visas i års-visningen.<br />Rekommenderat val: 4, vilket ger 16 månader, att scrolla igenom.",
"weeksToShow_label" => "Veckor som ska visaa i månads-visning",
"weeksToShow_text" => "Antal veckor som ska visas i månadsvisning.<br />Rekommenderat val: 10, vilket ger 2,5 månader att scrolla igenom.<br />Värdet 0 har en särskild betydelse: visa exakt 1 månad.",
"upcomingDays_label" => "Dagar som ska visas framåt",
"upcomingDays_text" => "Antal dagar som ska ses framåt i visningen kommande händelser and in the RSS feeds.",
"startHour_label" => "Starttid i dag-/veckovisning",
"startHour_text" => "Tid när en normal dags händelser startar.<br />Sätt detta värde till t.ex. 6, för att undvika att slösa utrymme i Vecka/Dag för den ej bokningsbara tiden mellan midnatt och 6:00.",
"dwTimeSlot_label" => "Time slot in Day/Week view",
"dwTimeSlot_text" => "Day/Week view time slot in number of minutes.<br />This value, together with the Start hour (see above) will determine the number of rows in Day/Week view.",
"dwTsHeight_label" => "Time slot height",
"dwTsHeight_text" => "Day/Week view time slot display height in number of pixels.",
"weekNumber_label" => "Display week numbers",
"weekNumber_text" => "The display of week numbers in Year, Month and Week view can be switched on or off",//
"showOwner_label" => "Visa ägare av händelser",
"showOwner_text" => "If switched on, the owner (creator) of an event will be displayed in:<br />- the hover box in the various views<br />- the Upcoming view<br />- the Changes view<br />- rss feeds<br />- email notifications.",
"showCatName_label" => "Show resource name",
"showCatName_text" => "If switched on, in various views, apart from displaying the event description in the event resource color, the resource name will also be displayed.",//
"showLinkInMV_label" => "Show links in month view",
"showLinkInMV_text" => "If switched on, URLs in the event description will be displayed as hyperlink in month view (when an event is clicked, URLs will always be displayed as hyperlink in the Event window)",//
"eventColor_label" => "Event colors based on",
"eventColor_text" => "Events in the various calendar views can displayed in the color assigned to the user who created the event or the color of the event resource.",
"owner_color" => "owner color",
"res_color" => "resource color",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Händelsedatum-format",
"dateFormat_text" => "Format för händelsedatum i kalendervisning och inmatningsfält.",
"dateUSorEU_label" => "Kalender datum-/tidsformat",
"dateUSorEU_text" => "Format för datum och tider i rubrikerna för olika visningar",
"dateSep_label" => "Datumavskiljare",
"dateSep_text" => "Datumavskiljare för datum i kalendern visningar och inmatningsfält.",
"time24_label" => "Tidsformat (12 eller 24-timmar)",
"time24_text" => "Format tid i kalendern visningar och inmatningsfält. ",
"weekStart_label" => "Veckans första dag",
"weekStart_text" => "Veckans första dag.",
"date_format_us" => "Måndag, maj 15, 2010 (US)",
"date_format_eu" => "Måndag 15 maj 2010",
"dot" => "punkt",
"slash" => "snedstreck",
"hyphen" => "bindestreck",
"time_format_us" => "12-timmar AM/PM",
"time_format_eu" => "24-timmar",
"sunday" => "Söndag",
"monday" => "Måndag",
"time_zones" => "TIDZONER",
"dd_mm_yyyy" => "dd-mm-yyyy",
"mm_dd_yyyy" => "mm-dd-yyyy",
"yyyy_mm_dd" => "yyyy-mm-dd",

//login.php
"log_log_in" => "Logga in",
"log_remember_me" => "Remember me",
"log_register" => "Registrera",
"log_change_my_data" => "Ã„ndra mina data",   
"log_change" => "Ã„ndra",                                                                    
"log_back" => "Tillbaka",
"log_un_or_em" => "Användarnamn eller e-post",
"log_un" => "Användarnamn",
"log_em" => "E-post",
"log_pw" => "Lösenord",
"log_new_un" => "Nytt användarnamn",
"log_new_em" => "Ny e-postadress",
"log_new_pw" => "Nytt Lösenord",
"log_pw_msg" => "Här är ditt lösenord för att logga in till:",
"log_pw_subject_pre" => "Ditt",
"log_pw_subject_post" => "Lösenord",
"log_npw_msg" => "Här är ditt lösenord för att logga in till:",
"log_npw_subject_pre" => "Ditt nya",
"log_npw_subject_post" => "Lösenord",
"log_npw_sent" => "Ditt nya lösenord har skickats.",
"log_registered" => "Registrering lyckades - ditt lösenord har skickats till dig med e-post.",  
"log_not_registered" => "Registrering misslyckades",
"log_un_exists" => "Användanamnet är upptaget",
"log_em_exists" => "E-postadressen används redan",
"log_un_invalid" => "Ogiltigt användarnamn (min. längd 2: A-Z, a-z, 0-9, och _-.) ",
"log_em_invalid" => "Ogiltig e-postadress",
"log_un_em_invalid" => "Användarnamn/e-post/ är inte giltigt",
"log_un_em_pw_invalid" => "Ditt användarnamn/e-post eller lösenord är fel",
"log_no_un_em" => "Du fyllde inte i användarnamn/e-post",                  
"log_no_un" => "Fyll i ditt användarnamn",
"log_no_em" => "Fyll i din e-postadress",
"log_no_pw" => "Du fyllde inte i ditt lösenord",
"log_no_rights" => "Login rejected: you have no view rights - Contact the administrator",//
"log_send_new_pw" => "Skicka nytt lösenord",
"log_if_changing" => "Bara om det ändras",
"log_no_new_data" => "Ingen data ändrad",
"log_invalid_new_un" => "Ogiltigt användarnamn (min. längd 2: A-Z, a-z, 0-9, og _-.) ",
"log_new_un_exists" => "Nytt användarnamn finns redan",
"log_invalid_new_em" => "Ny e-postadress ogiltig",
"log_new_em_exists" => "Ny e-postadress finns redan",
"log_ui_language" => "User interface språk",

//categories.php
"res_list" => "Lista med kategorier",
"res_edit" => "Redigera",
"res_delete" => "Radera",
"res_add_new" => "Lägg till ny kategori",
"res_add" => "Lägg till kategori",
"res_edit_cat" => "Redigera kategori",
"res_back" => "Bakåt",
"res_name" => "Kategorinamn",             
"res_sequence" => "Sekvens",
"res_in_menu" => "i meny",
"res_text_color" => "Textfärg",
"res_background" => "Bakgrund",
"res_select_color" => "Välj färg",
"res_save" => "Uppdatera kategori",
"res_added" => "Kategori tillagd",
"res_updated" => "Kategori uppdaterad",
"res_deleted" => "Kategori raderad",
"res_invalid_color" => "Färgformat ogiltigt (#XXXXXX - X = HEX-value)",
"res_not_added" => "Kategori ej tillagd",
"res_not_updated" => "Kategori ej uppdaterad",
"res_not_deleted" => "Kategori ej raderad",
"res_nr" => "#",
"res_repeat" => "Repeat",
"res_every_day" => "every day",
"res_every_week" => "every week",
"res_every_month" => "every month",
"res_every_year" => "every year",
"res_public" => "Public",

//users.php
"usr_list_of_users" => "Lista med användare",
"usr_name" => "Användarnamn",
"usr_email" => "E-post",
"usr_password" => "Lösenord",
"usr_rights" => "Rättigheter",
"usr_language" => "Språk",
"usr_ui_language" => "User interface språk",
"usr_edit_user" => "Redigera användarprofil",
"usr_add" => "Lägg till användare",          
"usr_edit" => "Redigera",
"usr_delete" => "Radera",
"usr_none" => "Inga",
"usr_view" => "Visa",
"usr_post_own" => "Skicka egna",
"usr_post_all" => "Skicka alla",
"usr_back" => "Bakåt",
"usr_admin" => "Admin",
"usr_login_0" => "Första login",
"usr_login_1" => "Senaste login",
"usr_login_cnt" => "Logins",
"usr_add_profile" => "Lägg till profil",
"usr_upd_profile" => "Uppdatera profiler",
"usr_not_found" => "Användare finns ej",
"usr_if_changing_pw" => "Bara om lösenord ska ändras",
"usr_admin_functions" => "Administrativa funktioner",
"usr_no_rights" => "Inga rättigheter",
"usr_view_calendar" => "Se kalender",
"usr_post_events_own" => "Skicka + redigera egna händelser",
"usr_post_events_all" => "Skicka + redigera alla händelser",
"usr_pw_not_updated" => "Lösenord ej uppdaterat",
"usr_added" => "Användare tillagd",
"usr_updated" => "Användareprofil uppdaterad",
"usr_deleted" => "Användare raderad",
"usr_not_added" => "Användare ej tillagd",
"usr_not_updated" => "Användare ej uppdaterad",
"usr_not_deleted" => "Användare ej raderad",
"usr_cred_required" => "Användarnamn, e-post och lösenord krävs",
"usr_uname_exists" => "Användarnamn finns redan",
"usr_email_exists" => "E-postadress finns redan",
"usr_un_invalid" => "Ogiltigt användarnamn (min. längd 2: A-Z, a-z, 0-9, and _-.) ", //
"usr_em_invalid" => "Ogiltig e-postadress",
"usr_cant_delete_yourself" => "Du kan inte radera dig själv",
"usr_background" => "Background color",
"usr_select_color" => "Select Color",
"usr_invalid_color" => "Color format invalid (#XXXXXX - X = HEX-value)",

//database.php
"mdb_dbm_functions" => "Database Functions",
"mdb_noshow_tables" => "Cannot get table(s)",
"mdb_compact" => "Compact database",
"mdb_compact_table" => "Compact table",
"mdb_compact_error" => "Error",
"mdb_compact_done" => "Done",
"mdb_purge_done" => "Deleted events definitively removed",
"mdb_repair" => "Check and repair database",
"mdb_check_table" => "Check table",
"mdb_ok" => "OK",
"mdb_nok" => "Not OK",
"mdb_nok_repair" => "Not OK, repair started",
"mdb_backup" => "Backup database",
"mdb_backup_table" => "Backup table",
"mdb_backup_done" => "Done",
"mdb_file_saved" => "Backup file saved on server.",
"mdb_file_name" => "File name:",
"mdb_start" => "Start",
"mdb_back" => "Back",
"mdb_no_function_checked" => "No function(s) selected",
"mdb_write_error" => "Writing backup file failed<br />Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "Vald fil",
"iex_file_name" => "iCal file name",
"iex_file_description" => "iCal fil-beskrivning",
"iex_filters" => "Event Filters",
"iex_upload_ics" => "Ladda upp iCal-fil",
"iex_select_events" => "Välj; h&auml;ndelser",
"iex_upload_csv" => "Ladda upp CSV-fil",
"iex_upload_file" => "Ladda upp fil",
"iex_create_file" => "Skapa fil",
"iex_download_file" => "Ladda ner fil",
"iex_fields_sep_by" => "Fälten avskilda av",
"iex_birthday_res_id" => "Födelsedagskategori ID",
"iex_default_res_id" => "Standardkategori ID",
"iex_if_no_cat" => "om ingen kategori finns",
"iex_import_events_from_date" => "Importera händelser som sker efter",
"iex_see_insert" => "se instruktion till höger p&aring; sidan",
"iex_no_file_name" => "Filnamn saknas",
"iex_inval_field_sep" => "ogiltig eller saknad fält-avskiljare",
"iex_no_begin_tag" => "ogiltig iCal-fil (START-tag saknas)",
"iex_date_format" => "Händelse-datum-format",
"iex_time_format" => "Händelse-tids-format",
"iex_number_of_errors" => "Antal fel i listan",
"iex_bgnd_highlighted" => "bakgrund markerad",
"iex_verify_event_list" => "Verifiera händelselista, korrigera fel och klick",
"iex_add_events" => "Lägg till händelser till databasen",
"iex_select_birthday_delete" => "Välj födelsedag och radera checkbox som önskat",
"iex_select_delete_ignore" => "Välj radera markeringsbox f&ouml;r att ignorera händelser",
"iex_title" => "Titel",
"iex_venue" => "Plats",
"iex_owner" => "Owner",
"iex_resource" => "Kategori",
"iex_date" => "Datum",
"iex_end_date" => "Slutdatum",
"iex_start_time" => "Starttid",
"iex_end_time" => "Sluttid",
"iex_description" => "Beskrivning",
"iex_birthday" => "Födelsedag",
"iex_delete" => "Radera",
"iex_events_added" => "händelser tillagda",
"iex_events_dropped" => "händelser ignorerade (finns redan)",
"iex_db_error" => "Databas fel",
"iex_ics_file_error_on_line" => "iCal-filfel på rad",
"iex_occurring_between" => "Inträffar mellan",
"iex_changed_between" => "Tillagd/ändrad mellan",
"iex_select_date" => "Välj datum",
"iex_all_cats" => "alla kategorier",
"iex_all_users" => "alla användare",
"iex_no_events_found" => "Inga händelser funna",  
"iex_file_created" => "Fil skapad",
"iex_write error" => "Writing export file failed<br />Check permissions of 'files/' directory",
"iex_back" => "Bakåt",

//lcalcron.php
"cro_sum_header" => "CRON JOB SUMMARY",
"cro_sum_trailer" => "END OF SUMMARY",

//notify.php
"not_sum_title" => "EMAIL REMINDERS",
"not_not_sent_to" => "Reminders sent to",
"not_no_not_dates_due" => "No notification dates due",
"not_all_day" => "Hela dagen",
"not_mailer" => "Skickat av",
"not_subject" => "Ämne",
"not_event_due_in" => "Följande händelse sker om",
"not_due_in" => "Påminnelse om",
"not_days" => "dag(ar)",
"not_date_time" => "Datum / tid",
"not_title" => "Titel",
"not_sender" => "Avsändare", 
"not_venue" => "Plats",
"not_description" => "Beskrivning",
"not_resource" => "Kategori",
"not_open_calendar" => "Öppna kalender",

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
"<h4>Manage Database Instructions</h4>
<p>On this page the following functions can be selected:</p>
<h5>Check and repair database</h5>
<p>This function will scan the calendar tables and check for errors. If an error
is found, the error will be repaired, if possible.</p>
<p>If the calendar views don't show any problems, running this function once a 
year should be sufficient.</p>
<h5>Compact database</h5>
<p>When a user deletes an event, the event will be marked as 'deleted', but will 
not be removed from the database. The Compact Database function will permanently 
remove events deleted more than 30 days ago from the database and free the space 
occupied by these events.</p>
<h5>Backup database</h5>
<p>This function wil create a backup of the full calendar database (tables 
structure and contents) in .sql format. The backup will be saved in the 
<strong>files/</strong> directory with file name: 
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (where 'yyyymmdd' = year, month, and 
day, and hhmmss = hour, minutes and seconds.</p>
<p>This backup file can be used to re-create the database tables structure and 
contents, for instance by importing the file in the <strong>phpMyAdmin</strong> 
tool which is available on the server of most web hosts.</p>",

"xpl_import_csv" =>
"<h4>CSV Import Instruktioner</h4>
<p>Detta formulär används till att importera en <strong>Comma Separated Values (CSV)</strong> textfil med händelse-data till LuxCal Kalendern.</p>
<p>Ordningen på kolumnerna i CSV filen måste vara: titel, plats, kategori id, datum, slutdatum, starttid, sluttid och beskrivning. Den första raden i  
CSV filen, används för sid-huvud, och ignoreras.</p>
<h5>Test CSV fil</h5>
<p>Test CSV fil (filändelse .cvs) kan hittas i mappen 'files/'  
i din nerladdade LuxCal katalog.</p>
<h5>Datum och tid format</h5>
<p>Den valda händelsens datumformat och evenemang tidsformat till vänster måste matcha
formatet på de datum och tider i den uppladdade CSV-filen.</p>
<h5>Tabell med Kategorier</h5>
<p>Kalendern använder ID-nummer för att ange kategorier. Det kategori ID i CSV
filen bör motsvara de kategorier som används i din kalender eller vara tom.</p>
<p>Om du i nästa steg vill öronmärka händelser som 'födelsedag', <strong>Födelsedagens 
kategori ID</strong> måste vara satt till motsvarande ID i kategorin listan nedan.</p>
<br />
<p>För din kalender har följande kategorier för närvarande definierats:</p>",  

"xpl_import_ical" =>
"<h4>iCalendar Import Instruktioner</h4>
<p>Detta formulär används till att importera en <strong>iCalendar</strong> fil med händelser in till 
LuxCal Kalendern.</p>
<p>Innehållet i filen måste vara enligt  [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545 standard</a></u>] of the Internet Engineering Task Force.</p>
<p>Bara händelser importeras, andra iCal komponenter, som t.ex: Att-Göra, Journal, Ledig / 
Upptagen, Tidzon och Påminnelse ignoreras.</p>
<h5>Test iCal fil</h5>
 <p>Test iCalendar fil (filändelse .ics) kan hittas i mappen 'files/'  
i din nerladdade LuxCal katalog.</p>
<h5>Tabell med Kategorier</h5>
<p>Kalendern använder ID nummer för att specifiera kategorier. Kategori IDs i 
iCalendar filen bör motsvara till kategorin som används i din kalender eller vara tom .</p>
<br />
<p>För din kalender har följande kategorier för närvarande definierats:</p>", 

"xpl_export_ical" =>
"<h4>iCalendar Export Instruktioner</h4>
<p>Detta formulär används till att extrahera och exportera en<strong>iCalendar</strong> händelse från 
LuxCal Kalendern.</p>
<p>The <b>iCal file name</b> (without extension) is optional. Created files will 
be stored in the \"files/\" directory on the server with the specified file name, 
or otherwise with the name \"luxcal\". The file extension will be <b>.ics</b>.
Existing files in the \"files/\" directory on the server with the same name will 
be overwritten by the new file.
<p><b>iCal filens beskrivning</b> (t.ex. 'Möte 2011') är valfritt. Om du anger den, 
läggs den till i sid-huvudet på den exporterade iCal filen.</p>
<p><b>Filter</b>: Händelserna som extraheras kan filtreras som:</p>
<ul>
<li>händelse owner</li>
<li>händelse kategori</li>
<li>händelse startdatum</li>
<li>händelse tillagd/senast ändrad datum</li>
</ul>
<p>Varje filter är valfritt. Ett blankt datum avser: ingen gräns</p>
<br />
<p>Innehållet i den extraherade filen måste vara enligt  
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>] 
of the Internet Engineering Task Force.</p>
<p>When <b>downloading</b> the exported iCal file, the date and time will be 
added to the name of the downloaded file.</p>
<h5>Test iCal fil</h5>
 <p>Test iCalendar-fil (filändelse .ics) kan hittas i mappen 'files/'  
i din nerladdade LuxCal katalog.</p>"
);
?>
