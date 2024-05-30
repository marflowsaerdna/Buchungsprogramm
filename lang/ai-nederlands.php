<?php
/*
= LuxCal event calendar admin interface language file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.5.3");

/* -- Admin Interface texts -- */

$ax = array(

//settings.php - fieldset headers + general
"set_general_settings" => "Kalender algemeen",
"set_opanel_settings" => "Options Panel",
"set_user_settings" => "Gebruikers",
"set_view_settings" => "Weergave",
"set_dt_settings" => "Datum/Tijd",
"set_save_settings" => "Instellingen opslaan",
"set_not_valid" => "niet geldig",
"set_missing" => "ontbreekt",
"set_settings_saved" => "Kalender instellingen opgeslagen",
"set_read_error" => "Lezen configuratiebestand mislukt",
"set_write_error" => "Schrijven configuratiebestand mislukt. Check permissions of root directory",
"hover_for_details" => "Ga met de muis over de beschrijving voor details",
"enabled" => "ingeschakeld",
"disabled" => "uitgeschakeld",
"no" => "nee",
"yes" => "ja",
"or" => "of",
"minutes" => "minuten",
"pixels" => "pixels",
"no_way" => "U bent niet bevoegd tot deze actie.",

//settings.php - calendar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Kalendertitel",
"calendarTitle_text" => "Weergegeven in de titelbalk van de kalender en gebruikt in mail herinneringen",
"calendarUrl_label" => "Kalender-URL",
"calendarUrl_text" => "Website-adres van de kalender",
"calendarEmail_label" => "Kalender mail (afzender)",
"calendarEmail_text" => "Het mailadres van de afzender, gebruikt in mailherinneringen<br />Formaat: \'mail\' of \'naam&#8249;mail&#8250;\'. \'naam\' kan bijv. de kalendertitel zijn",
"timeZone_label" => "Tijdzone",
"timeZone_text" => "De door de kalender gebruikte tijdzone voor het berekenen van de huidige tijd",
"see" => "zie",
"view" => "bekijken",
"post_own" => 'eigen invoer',
"post_all" => 'alle invoeren',
"defaultView_label" => "Standaardweergave bij opstarten",
"defaultView_text" => "Mogelijke standaardweergaven bij opstarten van de kalender zijn:<br />- Jaar<br />- Maand<br />- Week<br />- Dag<br />- Binnenkort<br />- Wijzigingen<br />Aanbevolen: Maand of Binnenkort",
"language_label" => "Standaard taal voor user interface",
"language_text" => "De bestanden ui-{language}.php, ai-{language}.php, ug-{language}.php and ug-layout.png moeten in de lang/ map aanwezig zijn. {language} = taal gekozen voor de user interface. Bestandsnamen in kleine letter!",
"userMenu_label" => "User filter menu",
"userMenu_text" => "Display the user filter menu in the options panel.<br />This filter can be used to only display events created by one specific user.",
"catMenu_label" => "Resource filter menu",
"catMenu_text" => "Display the event resource filter menu in the options panel.<br />This filter can be used to only display events belonging to a specific event resource.",
"langMenu_label" => "Taalkeuzemenu",
"langMenu_text" => "Taalkeuzemenu weergeven in de navigatiebalk<br />This menu can be used to select the user interface language.<br />(inschakelen alleen zinvol als meerdere talen zijn geïnstalleerd)",
"chgEmailList_label" => "Mailadressen voor wijzigingen",
"chgEmailList_text" => "Mailadressen die periodiek een mail krijgen met wijzigingen in de kalender<br />Mail adressen gescheiden door puntkomma\'s.<br />(deze funktie werkt via een cron job)",
"chgNofDays_label" => "Aantal dagen teruggaan voor wijzigingen",
"chgNofDays_text" => "Aantal dagen dat wordt teruggegaan voor het overzicht met kalenderwijzigingen<br />Als het aantal dagen 0 is, wordt er geen overzicht met kalenderwijzigingen verstuurd.<br />(deze funktie werkt via een cron job)",
"cronSummary_label" => "Admin cronjob samenvatting",//
"cronSummary_text" => "Email een cronjob samenvatting naar de kalenderbeheerder.<br />Inschakelen is alleen zinvol als op je server:<br />- een cronjob is geactiveerd<br />- het e-mailen van cronjob output is is geactiveerd (vraag je ISP)",//
"oneStepEdit_label" => "One-step event editing",//
"oneStepEdit_text" => "If enabled: clicking an event will directly open the Edit Event window.<br />If disabled: clicking an event will always first open the Event Details window where the Edit button has to be selected to open the Edit Event window.<br />Note: If the user has no rights to edit an event, the Event Details window will open with the Edit button disabled.",//

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Zelf-registratie",
"selfReg_text" => "Gebruikers toestaan zich te registreren en toegang tot de kalender te krijgen",
"selfRegPrivs_label" => "Zelf-registratierechten",
"selfRegPrivs_text" => "Toegangsrechten tot de kalender voor gebruikers die zich hebben geregistreerd<br />- view: alleen zien<br />- post-self: gebeurtenissen toevoegen en eigen gebeurtenissen wijzigen<br />- post-all: gebeurtenissen toevoegen en eigen gebeurtenissen en die van anderen wijzigen",
"maxNoLogin_label" => "Max. aantal dagen niet ingelogd",
"maxNoLogin_text" => "Als een gebruiker gedurende dit aantal dagen niet is ingelogd, dan wordt zijn/haar account automatisch verwijderd.<br />Als het aantal dagen 0 is, zullen gebruikersaccounts nooit worden verwijderd<br />(deze funktie werkt via a cron job)",
"miniCalPost_label" => "Minikalender interactief",
"miniCalPost_text" => "Alleen van toepassing bij gebruik van de minikalender!<br />Indien ingeschakeld kunnen gebruikers:<br />- nieuwe gebeurtenissen aan de kalender toevoegen door boven in een dag cel te klikken<br />- gebeurtenissen wijzigen/verwijderen door op een gebeurtenis (vierkantje) te klikken",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Start month in Year view",
"yearStart_text" => "If a start month has been specified (1 - 12), in Year view the calendar will always start with this month and the year of this first month will only change as of the first day of the same month in the next year.<br />The value 0 has a special meaning: the start month is based on the current date and will fall in the first row of months.",
"colsToShow_label" => "Aantal kolommen in Jaar-weergave",
"colsToShow_text" => "Aantal maanden weer te geven in elke rij in Jaar-weergave<br />Aanbevolen: 3 of 4",
"rowsToShow_label" => "Aantal rijen in Jaar-weergave",
"rowsToShow_text" => "Aantal rijen van telkens vier maanden weer te geven in Jaar-weergave<br />Aanbevolen: 4, zodat door 16 maanden kan worden gescrolld",
"weeksToShow_label" => "Aantal weken in Maand-weergave",
"weeksToShow_text" => "Aantal weken weer te geven in Maand-weergave<br />Aanbevolen: 10, zodat door 2.5 maand kan worden gescrolld<br />De waarde 0 heeft speciale betekenis: geef precies 1 maand weer",
"upcomingDays_label" => "Aantal dagen vooruitkijken",
"upcomingDays_text" => "Aantal dagen dat moet worden vooruitgekeken naar komende gebeurtenissen in Binnenkort en in de RSS feeds",
"startHour_label" => "Beginuur in Dag/Week-weergave",
"startHour_text" => "Uur waarop een normale dag begint<br />Wanneer deze waarde op bijv. 6 wordt gesteld, wordt in de Dag/Week-weergave niet nodeloos ruimte gebruikt voor de tijd tussen middernacht en 6:00 uur waarop normaal niet veel wordt uitgevoerd",
"dwTimeSlot_label" => "Tijd slot in Day/Week weergave",
"dwTimeSlot_text" => "Dag/Week weergave tijd slot in aantal minuten.<br />Deze waarde, samen met het uur waarop de normale dag begint (zie hier boven) bepalen het aantal rijen in Dag/Week weergave.",
"dwTsHeight_label" => "Tijd slot hoogte",
"dwTsHeight_text" => "Day/Week weergave tijd slot wergave hoogte in aantal pixels.",
"weekNumber_label" => "Geef weeknummers weer",
"weekNumber_text" => "De weergave van weeknummers in Jaar, Maand en Week view kan aan- of uitgezet worden",
"showOwner_label" => "Geef eigenaar van de gebeurtenissen weer",
"showOwner_text" => "If switched on, the owner (creator) of an event will be displayed in:<br />- the hover box in the various views<br />- the Upcoming view<br />- the Changes view<br />- rss feeds<br />- email notifications.",
"showCatName_label" => "Geef categorie naam weer",//
"showCatName_text" => "If switched on, in various views, apart from displaying the event description in the event resource color, the resource name will also be displayed.",//
"showLinkInMV_label" => "Geef links in maand overzicht weer",//
"showLinkInMV_text" => "If switched on, URLs in the event description will be displayed as hyperlink in month view (when an event is clicked, URLs will always be displayed as hyperlink in the Event window)",//
"eventColor_label" => "Event colors based on",
"eventColor_text" => "Events in the various calendar views can displayed in the color assigned to the user who created the event or the color of the event resource.",
"owner_color" => "owner color",
"res_color" => "resource color",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Datumformaat van gebeurtenissen",
"dateFormat_text" => "Datumformaat van gebeurtenissen in de kalenderweergaven en invoervelden",
"dateUSorEU_label" => "Datum/Tijd-formaat",
"dateUSorEU_text" => "Datum/Tijd-formaat in de kop van de kalenderweergaven",
"dateSep_label" => "Datumscheidingsteken",
"dateSep_text" => "Datumscheidingsteken voor datums in de kalenderweergaven en invoervelden",
"time24_label" => "Tijdformaat (12 of 24 uur)",
"time24_text" => "Formaat van tijden in de kalenderweergaven en invoervelden",
"weekStart_label" => "Eerste dag van de week",
"weekStart_text" => "Eerste dag van de week",
"date_format_us" => "Maandag, mei 15, 2010 (US)",
"date_format_eu" => "Maandag 15 mei 2010",
"dot" => "punt",
"slash" => "schuine streep",
"hyphen" => "liggend streepje",
"time_format_us" => "12 uur AM/PM",
"time_format_eu" => "24 uur",
"sunday" => "zondag",
"monday" => "maandag",
"time_zones" => "TIJD ZONES",
"dd_mm_yyyy" => "dd-mm-jjjj",
"mm_dd_yyyy" => "mm-dd-jjjj",
"yyyy_mm_dd" => "jjjj-mm-dd",

//login.php
"log_log_in" => "Inloggen",
"log_remember_me" => "Onthoud mij",
"log_register" => "Registreren",
"log_change_my_data" => "Mijn gegevens wijzigen",
"log_change" => "Wijzig",
"log_back" => "Terug",
"log_un_or_em" => "Gebruikersnaam of mailadres",
"log_un" => "Gebruikersnaam",
"log_em" => "Mailadres",
"log_pw" => "Wachtwoord",
"log_new_un" => "Nieuwe gebruikersnaam",
"log_new_em" => "Nieuw mailadres",
"log_new_pw" => "Nieuw wachtwoord",
"log_pw_msg" => "Hier is uw wachtwoord om in te loggen:",
"log_pw_subject_pre" => "Uw",
"log_pw_subject_post" => "Wachtwoord",
"log_npw_msg" => "Hier is uw nieuwe wachtwoord om in te loggen:",
"log_npw_subject_pre" => "Uw nieuwe",
"log_npw_subject_post" => "Wachtwoord",
"log_npw_sent" => "Uw nieuwe wachtwoord is verstuurd",
"log_registered" => "Registratie gelukt - Uw wachtwoord is per mail verstuurd",
"log_not_registered" => "Registratie mislukt",
"log_un_exists" => "Gebruikersnaam bestaat al",
"log_em_exists" => "Mailadres bestaat al",
"log_un_invalid" => "Gebruikersnaam ongeldig (min length 2: A-Z, a-z, 0-9, and _-.) ",
"log_em_invalid" => "Mailadres ongeldig",
"log_un_em_invalid" => "Gebruikersnaam of wachtwoord onjuist",
"log_un_em_pw_invalid" => "Uw gebruikersnaam/mailadres of wachtwoord is onjuist",
"log_no_un_em" => "U hebt uw gebruikersnaam of mailadres niet ingevoerd",
"log_no_un" => "Voer uw gebruikersnaam in",
"log_no_em" => "Voer uw mailadres in",
"log_no_pw" => "U hebt uw wachtwoord niet ingevoerd",
"log_no_rights" => "Login afgewezen: u heeft geen toegangsrechten - Vraag de administrator",
"log_send_new_pw" => "Stuur mij een nieuw wachtwoord",
"log_if_changing" => "Alleen indien gewijzigd",
"log_no_new_data" => "Geen gegevens te wijzigen",
"log_invalid_new_un" => "Nieuwe gebruikersnaam ongeldig (min lengte 2: A-Z, a-z, 0-9, en _-.) ",
"log_new_un_exists" => "Uw nieuwe gebruikersnaam bestaat al",
"log_invalid_new_em" => "Uw nieuwe mailadres is onjuist",
"log_new_em_exists" => "Uw nieuwe mailadres bestaat al",
"log_ui_language" => "User interface-taal",

//categories.php
"res_list" => "Categorieën",
"res_edit" => "Wijzigen",
"res_delete" => "Verwijderen",
"res_add_new" => "Nieuwe categorie toevoegen",
"res_add" => "Toevoegen",
"res_edit_cat" => "Categorie wijzigen",
"res_back" => "Terug",
"res_name" => "Naam categorie",
"res_sequence" => "Volgorde",
"res_in_menu" => "in menu",
"res_text_color" => "Tekstkleur",
"res_background" => "Achtergrond",
"res_select_color" => "Kies kleur",
"res_save" => "Opslaan",
"res_added" => "Categorie toegevoegd",
"res_updated" => "Categorie gewijzigd",
"res_deleted" => "Categorie verwijderd",
"res_invalid_color" => "Kleurformaat ongeldig (#XXXXXX - X = HEX-waarde)",
"res_not_added" => "Categorie niet toegevoegd",
"res_not_updated" => "Categorie niet gewijzigd",
"res_not_deleted" => "Categorie niet verwijderd",
"res_nr" => "#",
"res_repeat" => "Herhalen",
"res_every_day" => "elke dag",
"res_every_week" => "elke week",
"res_every_month" => "elke maand",
"res_every_year" => "elk jaar",
"res_public" => "Public",

//users.php
"usr_list_of_users" => "Lijst van gebruikers",
"usr_name" => "Gebruikersnaam",
"usr_email" => "Mailadres",
"usr_password" => "Wachtwoord",
"usr_rights" => "Rechten",
"usr_language" => "Taal",
"usr_ui_language" => "User interface-taal",
"usr_edit_user" => "Gebruikersprofiel wijzigen",
"usr_add" => "Gebruiker toevoegen",
"usr_edit" => "Wijzigen",
"usr_delete" => "Verwijderen",
"usr_none" => "Geen",
"usr_view" => "Bekijken",
"usr_post_own" => "Eigen invoer",
"usr_post_all" => "Alle invoeren",
"usr_back" => "Terug",
"usr_admin" => "Admin",
"usr_login_0" => "Eerste login",
"usr_login_1" => "Laatste login",
"usr_login_cnt" => "Logins",
"usr_add_profile" => "Profiel toevoegen",
"usr_upd_profile" => "Profiel wijzigen",
"usr_not_found" => "Gebruiker niet gevonden",
"usr_if_changing_pw" => "Alleen als het wachtwoord verandert",
"usr_admin_functions" => "Admin-functies",
"usr_no_rights" => "Geen rechten",
"usr_view_calendar" => "Kalender bekijken",
"usr_post_events_own" => "Invoeren + wijzigen eigen gebeurtenissen",
"usr_post_events_all" => "Invoeren + wijzigen alle gebeurtenissen",
"usr_pw_not_updated" => "Wachtwoord niet gewijzigd",
"usr_added" => "Gebruiker toegevoegd",
"usr_updated" => "Gebruikersprofiel gewijzigd",
"usr_deleted" => "Gebruiker verwijderd",
"usr_not_added" => "Gebruiker niet toegevoegd",
"usr_not_updated" => "Gebruiker niet gewijzigd",
"usr_not_deleted" => "Gebruiker niet verwijderd",
"usr_cred_required" => "Gebruikersnaam, mailadres en wachtwoord zijn verplicht",
"usr_uname_exists" => "Gebruikersnaam bestaat al",
"usr_email_exists" => "Mailadres bestaat al",
"usr_un_invalid" => "Gebruikersnaam ongeldig (min lengte 2: A-Z, a-z, 0-9, en _-.) ",
"usr_em_invalid" => "Mailadres ongeldig",
"usr_cant_delete_yourself" => "Je kunt jezelf niet verwijderen",
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
"iex_file" => "Gekozen bestand",
"iex_file_name" => "iCal file name",
"iex_file_description" => "Beschrijving iCal bestand",
"iex_filters" => "Event Filters",
"iex_upload_ics" => "Upload iCal bestand",
"iex_select_events" => "Kies gebeurtenissen",
"iex_upload_csv" => "Upload CSV bestand",
"iex_upload_file" => "Upload bestand",
"iex_create_file" => "Maak bestand",
"iex_download_file" => "Download bestand",
"iex_fields_sep_by" => "Velden gescheiden door",
"iex_birthday_res_id" => "ID verjaardag categorie",
"iex_default_res_id" => "ID standaard categorie",
"iex_if_no_cat" => "indien geen categorie gevonden",
"iex_import_events_from_date" => "Importeer gebeurtenissen die plaatsvinden vanaf",
"iex_see_insert" => "zie aanwijzingen aan de rechterzijde",
"iex_no_file_name" => "Bestandsnaam ontbreekt",
"iex_inval_field_sep" => "ongeldig of geen veldscheidingsteken",
"iex_no_begin_tag" => "ongeldig iCal bestand",
"iex_date_format" => "Event date format",
"iex_time_format" => "Event time format",
"iex_number_of_errors" => "Aantal fouten in de lijst",
"iex_bgnd_highlighted" => "achtergrond gemarkeerd",
"iex_verify_event_list" => "Lijst van gebeurtenissen verifiëren, fouten verbeteren en klik op",
"iex_add_events" => "Gebeurtenissen aan database toevoegen",
"iex_select_birthday_delete" => "Vink eventueel Verjaardag en/of Wissen aan",
"iex_select_delete_ignore" => "Vink Wissen aan om gebeurtenis over te slaan",
"iex_title" => "Titel",
"iex_venue" => "Plaats",
"iex_owner" => "Owner",
"iex_resource" => "Categorie",
"iex_date" => "Datum",
"iex_end_date" => "Einddatum",
"iex_start_time" => "Begintijd",
"iex_end_time" => "Eindtijd",
"iex_description" => "Omschrijving",
"iex_birthday" => "Verjaardag",
"iex_delete" => "Wissen",
"iex_events_added" => "gebeurtenissen toegevoegd",
"iex_events_dropped" => "gebeurtenissen overgeslagen (al aanwezig)",
"iex_db_error" => "Database fout",
"iex_ics_file_error_on_line" => "iCal bestandsfout op regel",
"iex_occurring_between" => "Plaatsvindend tussen",
"iex_changed_between" => "Toegevoegd/gewijzigd tussen",
"iex_select_date" => "Kies datum",
"iex_all_cats" => "alle categorieën",
"iex_all_users" => "all users",
"iex_no_events_found" => "Geen gebeurtenissen gevonden",
"iex_file_created" => "Bestand aangemaakt",
"iex_write error" => "Writing export file failed<br />Check permissions of 'files/' directory",
"iex_back" => "Terug",

//lcalcron.php
"cro_sum_header" => "CRONJOB SAMENVATTING",
"cro_sum_trailer" => "EINDE SAMENVATTING",

//notify.php
"not_sum_title" => "E-MAIL HERINNERINGEN",
"not_not_sent_to" => "Herinnering gestuurd naar",
"not_no_not_dates_due" => "No notification dates due",
"not_all_day" => "Hele dag",
"not_mailer" => "mailer",
"not_subject" => "Onderwerp",
"not_event_due_in" => "Deze gebeurtenis staat op het programma over",
"not_due_in" => "Op het programma over",
"not_days" => "dag(en)",
"not_date_time" => "Datum / tijd",
"not_title" => "Titel",
"not_sender" => "Afzender",
"not_venue" => "Locatie",
"not_description" => "Omschrijving",
"not_resource" => "Categorie",
"not_open_calendar" => "Kalender openen",

//sendchg.php
"sch_sum_title" => "KALENDER WIJZIGINGEN",
"sch_nr_changes_last" => "Aantal wijzigingen laatste",
"sch_no_changes_last" => "Geen wijzigingen laatste",
"sch_report_sent_to" => "Rapport gestuurd naar",
"sch_no_report_sent" => "Geen rapport geë-maild",
"sch_days" => "dag(en)",

//userchk.php
"usc_sum_title" => "GEBRUIKERSACCOUNT CHECK",
"usc_nr_accounts_deleted" => "Aantal accounts verwijderd",
"usc_no_accounts_deleted" => "Geen accounts verwijderd",

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
"<h4>CSV Import Instructions</h4>
<p>This form is used to import a <strong>Comma Separated Values (CSV)</strong> text 
file with event data into the LuxCal Calendar.</p>
<p>The order of columns in the CSV file must be: title, venue, resource id (see 
below), date, end date, start time, end time and description. The first row of the 
CSV file, used for column descriptions, is ignored.</p>
<h5>Sample CSV files</h5>
<p>Sample CSV files can be found in the 'files/' directory of your LuxCal download.</p>
<h5>Date and time format</h5>
<p>The selected event date format and event time format on the left must match the 
format of the dates and times in the uploaded CSV file.</p>
<h5>Table of Categories</h5>
<p>The calendar uses ID numbers to specify categories. The resource IDs in the CSV 
file should correspond to the categories used in your calendar or be blank.</p>
<p>If in the next step you want to earmark events as 'birthday', the <strong>Birthday 
resource ID</strong> must be set to the corresponding ID in the resource list below.</p>
<br />
<p>For your calendar, the following categories have currently been defined:</p>",

"xpl_import_ical" =>
"<h4>iCalendar Import Instructions</h4>
<p>This form is used to extract and export <strong>iCalendar</strong> events from 
the LuxCal Calendar.</p>
<p>The <b>iCal file name</b> (without extension) is optional. Created files will 
be stored in the \"files/\" directory on the server with the specified file name, 
or otherwise with the name \"luxcal\". The file extension will be <b>.ics</b>.
Existing files in the \"files/\" directory on the server with the same name will 
be overwritten by the new file.
<p>The <b>iCal file description</b> (e.g. 'Meetings 2011') is optional. If 
entered, it will be added to the header of the exported iCal file.</p>
<p><b>Event filters</b>: The events to be extracted can be filtered by:</p>
<ul>
<li>event owner</li>
<li>event resource</li>
<li>event start date</li>
<li>event added/last modified date</li>
</ul>
<p>Each filter is optional. A blank date means: no limit</p>
<br />
<p>The content of the file with extracted events will meet the 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>] 
of the Internet Engineering Task Force.</p>
<p>When <b>downloading</b> the exported iCal file, the date and time will be 
added to the name of the downloaded file.</p>
<h5>Sample iCal files</h5>
<p>Sample iCalendar files (file extension .ics) can be found in the 'files/' 
directory of your LuxCal download.</p>"
);
?>
