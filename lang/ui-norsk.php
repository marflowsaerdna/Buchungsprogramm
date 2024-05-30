<?php
/*
= LuxCal event calendar lamguage file =

Oversatt til norsk av Ove Almåsbakk. Kommentarer, forbedringsforslag osv kan sendes til ovealmasbakk@yahoo.no

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.5.3");

/* -- Titles on the Header of the Calendar -- */

$months = array("Januar","Februar","Marts","April","Maj","Juni","Juli","August","September","Oktober","November","December");
$months_m = array("Jan","Feb","Mar","Apri","Maj","Jun","Jul","Aug","Sep","Okt","Nov","Dec");
$wkDays = array("Søndag","Mandag","Tirsdag","Onsdag","Torsdag","Fredag","Lørdag","Søndag");
$wkDays_l = array("Søn","Man","Tir","Ons","Tor","Fre","Lør","Søn");
$wkDays_m = array("Sø","Ma","Ti","On","To","Fr","Lø","Sø");
$wkDays_s = array("S","M","T","O","T","F","L","S");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "None.",

//index.php
"title_upcoming" => "Kommende begivenheter",
"title_add_event" => "Legge til Begivenhet",
"title_event_details" => "Opplysninger om Begivenhet",
"title_edit_event" => "Rediger Begivenhet",
"title_log_in" => "Logg In",
"title_user_guide" => "LuxCal brukerveiledning",
"title_settings" => "Kalenderinnstillinger",
"title_edit_cats" => "Editer kategorier",
"title_edit_users" => "Editer brukere",
"title_manage_db" => "Manage databasen",
"title_changes" => "Legge til / endre / slette begivenheter",
"title_csv_import" => "CSV fil-import",
"title_ics_import" => "iCal fil-import",
"title_ics_export" => "iCal fil-eksport",
"idx_log_in" => "Logg inn for og se denne kalenderer",
"idx_public_name" => "Offentlig visning",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_show_opanel" => "Show Options Panel",
"hdr_select_date" => "Gå til dato ",
"hdr_view" => "Type",
"hdr_select_view" => "Velg type",
"hdr_filter" => "Filter",
"hdr_select_filter" => "Velg filter",
"hdr_lang" => "Språk",
"hdr_select_lang" => "Velg språk",
"hdr_all_cats" => "Alle kategorier",
"hdr_all_users" => "Alle brukere",
"hdr_year" => "År",
"hdr_month" => "Måned",
"hdr_week" => "Uke",
"hdr_day" => "Dag",
"hdr_upcoming" => "Kommende",
"hdr_changes" => "Endringer",
"hdr_select_admin_functions" => "Velg admin funksjon",
"hdr_admin" => "Administrasjon",
"hdr_add_event" => "Legge til begivenheter",
"hdr_show_sbar" => "Vis side bar",
"hdr_settings" => "Innstillinger",
"hdr_categories" => "Kategorier",
"hdr_users" => "Brukere",
"hdr_database" => "Database",
"hdr_import_csv" => "CSV import",
"hdr_import_ics" => "iCal import",
"hdr_export_ics" => "iCal export",
"hdr_calendar" => "Back to calendar",
"hdr_guide" => "Hjelp",
"hdr_log_in" => "Logg inn",
"hdr_log_out" => "Logg ut",
"hdr_today" => "i dag", //dtpicker.js
"hdr_clear" => "slette", //dtpicker.js

//header_s.php
"hdr_close_window" => "Lukk vinduet",

//event.php
"evt_no_title" => "Ingen tittel",
"evt_no_start_date" => "Ingen startdato",
"evt_bad_date" => "Feil dato",
"evt_bad_rdate" => "Feil repeter slutt dato",
"evt_no_start_time" => "Ingen starttid",
"evt_bad_time" => "Feil tid",
"evt_end_before_start_time" => "Sluttid før starttid",
"evt_end_before_start_date" => "Sluttdato før startdato",
"evt_until_before_start_date" => "Repeat end før startdato",
"evt_title" => "Tittel",
"evt_venue" => "Sted",
"evt_resource" => "Kategori",
"evt_description" => "Beskrivelse",
"evt_date_time" => "Dato / tid",
"evt_mailer" => "mailer",
"evt_private_event" => "Privat begivenhet",
"evt_start_date" => "Start",
"evt_end_date" => "Slutt",
"evt_select_date" => "Velg dato",
"evt_select_time" => "Velg tid",
"evt_all_day" => "Hele dagen",
"evt_change" => "Endre",
"evt_set_repeat" => "Sett på gjentakelse",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Angivelige gjentakelse ikke støttet",
"evt_no_repeat" => "Ingen gjentakelse",
"evt_repeat" => "Gjenta",
"evt_repeat_on" => "Gjenta hver",
"evt_until" => "inntil",
"evt_blank_no_end" => "blank: ingen ende",
"evt_of_the_month" => "i måneden",
"evt_interval1_1" => "hver",
"evt_interval1_2" => "hver andre",
"evt_interval1_3" => "hver tredje",
"evt_interval1_4" => "hver fjerde",
"evt_interval1_5" => "hver femte",
"evt_interval1_6" => "hver sjette",
"evt_interval2_1" => "første",
"evt_interval2_2" => "andre",
"evt_interval2_3" => "tredje",
"evt_interval2_4" => "fjerde",
"evt_interval2_5" => "siste",
"evt_period1_1" => "dag",
"evt_period1_2" => "uke",
"evt_period1_3" => "måned",
"evt_period1_4" => "år",
"evt_notify" => "Alarmer",
"evt_now_and_or" => "Nå og/eller",
"evt_event_added" => "Den følgende eventen har blitt lagret",
"evt_event_edited" => "Den følgende eventen har blitt endret",
"evt_event_deleted" => "Den følgende eventen har blitt slettet",
"evt_days_before_event" => "dag(er) før begivenheten",
"evt_notify_eml_list" => "emailadresser som skal alarmeres - Adskilt av Semikolon(eks. mail@mail.no; mail@mail.no) - max. 255 tegn.",
"evt_eml_list_too_long" => "Email-adresselisten er for lang.",
"evt_eml_list_missing" => "Det mangler en alarm-email",
"evt_not_in_past" => "Notifikasjons datoen har vært",
"evt_not_days_invalid" => "Notifikasjons dagene er feil",
"evt_url_format" => "link til webside: url eller url [navn]. f.eks. www.google.com [søke]",
"evt_confirm_added" => "begivenhet lagt til",
"evt_confirm_saved" => "begivenhet lagret",
"evt_confirm_deleted" => "begivenhet slettet",
"evt_add" => "Lagt til",
"evt_edit" => "Edit",
"evt_save_close" => "Lagre og legge ned",
"evt_save" => "Lagre",
"evt_clone" => "Lagre som ny",
"evt_delete" => "Slett",
"evt_close" => "Steng",
"evt_open_calendar" => "Åpne kalender",
"evt_owner" => "Eier",
"evt_edited" => "Endret",
"evt_is_repeating" => "er en repeterende begivenhet.",
"evt_is_multiday" => "er en begivenhet som går over flere dager.",
"evt_edit_series_or_occurrence" => "Vil du editere denne serien eller begivenheten?",
"evt_edit_series" => "Editere denne serien",
"evt_edit_occurrence" => "Editere denne begivenheten",

//views
"vws_add_event" => "Legge til begivenhet",
"vws_view_month" => "Vis måned",
"vws_view_week" => "Vis uke",
"vws_view_day" => "Vis dag",
"vws_click_for_full" => "For full kalender, klikk på måned",
"vws_view_full" => "Vis full kalender",
"vws_prev_month" => "Forrige måned",
"vws_next_month" => "Neste måned",
"vws_today" => "Dag",
"vws_back_to_today" => "Tilbake til dagens måned",
"vws_week" => "Uke",
"vws_wk" => "Uke",
"vws_time" => "Tid",
"vws_events" => "Begivenheter",
"vws_all_day" => "Hele dagen",
"vws_venue" => "Sted",
"vws_owner" => "Eier",
"vws_print" => "Skriv ut",
"vws_print_today" => "Skriv ut dag",
"vws_print_all" => "Skriv ut alle",
"vws_events_for_next" => "Kommende begivenheter for de neste",
"vws_days" => "dag(er)",
"vws_edited" => "Edited",
"vws_notify" => "Alarmer",

//changes.php
"chg_from_date" => "Fra dato",
"chg_select_date" => "Velg start dato",
"chg_notify" => "Alarmer",
"chg_days" => "Dag(er)",
"chg_added" => "Lagt til",
"chg_edited" => "Edited",
"chg_deleted" => "Slettet",
"chg_changed_on" => "Forrandret den",
"chg_changes" => "Endringer",
"chg_no_changes" => "Ingen endringer."
);
?>
