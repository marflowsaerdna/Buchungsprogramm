<?php
/*
= LuxCal event calendar lamguage file =

Översatt till svenska av Thomas "Morgoo" Karlsson. Skicka gärna kommentarer, förslag på förbättringar m.m till thomas.virserum@telia.com.

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.5.3");

/* -- Titles on the Header of the Calendar -- */

$months = array("Januari","Februari","Mars","April","Maj","Juni","Juli","Augusti","September","Oktober","November","December");
$months_m = array("Jan","Feb","Mar","Apr","Maj","Jun","Jul","Aug","Sep","Okt","Nov","Dec");
$wkDays = array("Söndag","Måndag","Tisdag","Onsdag","Torsdag","Fredag","Lördag","Söndag");
$wkDays_l = array("Sön","Mån","Tis","Ons","Tor","Fre","Lör","Sön");
$wkDays_m = array("Sö","Må","Ti","On","To","Fr","Lö","Sö");
$wkDays_s = array("S","M","T","O","T","F","L","S");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "None.",

//index.php
"title_upcoming" => "Kommande händelser",
"title_add_event" => "Lägg till Händelser",
"title_event_details" => "Uppgifter om Händelser",
"title_edit_event" => "Redigera Händelser",
"title_log_in" => "Logga In",
"title_user_guide" => "Kalender användarhandbok",
"title_settings" => "Kalenderinställningar",
"title_edit_cats" => "Redigera kategorier",
"title_edit_users" => "Redigera användare",
"title_manage_db" => "Klara av databasen",
"title_changes" => "Lägg till / ändra / radera händelser",
"title_csv_import" => "CSV fil-import",
"title_ics_import" => "iCal fil-import",
"title_ics_export" => "iCal fil-export",
"idx_log_in" => "Logga in för att se denna kalender",
"idx_public_name" => "Offentlig visning",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_show_opanel" => "Show Options Panel",
"hdr_select_date" => "Gå; till datum ",
"hdr_view" => "Visningstyp",
"hdr_select_view" => "Välj typer",
"hdr_filter" => "Filter",
"hdr_select_filter" => "Välj filter",
"hdr_lang" => "Språk",
"hdr_select_lang" => "Välj språk",
"hdr_all_cats" => "Alla kategorier",
"hdr_all_users" => "Alla användare",
"hdr_year" => "År",
"hdr_month" => "Månad",
"hdr_week" => "Vecka",
"hdr_day" => "Dag",
"hdr_upcoming" => "Kommande",
"hdr_changes" => "Ändringar",
"hdr_select_admin_functions" => "Välj admin funktion",
"hdr_admin" => "Administration",
"hdr_add_event" => "Lägg till händelse",
"hdr_show_sbar" => "Show side bar",//
"hdr_settings" => "Inställningar",
"hdr_categories" => "Kategorier",
"hdr_users" => "Användare",
"hdr_database" => "Databasen",
"hdr_import_csv" => "CSV import",
"hdr_import_ics" => "iCal import",
"hdr_export_ics" => "iCal export",
"hdr_calendar" => "Back to calendar",
"hdr_guide" => "<strong>Hjälp</strong>",
"hdr_log_in" => "<strong>Logga in</strong>",
"hdr_log_out" => "<strong>Logga ut</strong>",
"hdr_today" => "i dag", //dtpicker.js
"hdr_clear" => "radera", //dtpicker.js

//header_s.php
"hdr_close_window" => "Stäng fönstret",

//event.php
"evt_no_title" => "Ditt namn saknas",
"evt_no_start_date" => "Inget startdatum",
"evt_bad_date" => "Fel datum",
"evt_bad_rdate" => "Felaktigt upprepa slutdatum",
"evt_no_start_time" => "Ingen starttid",
"evt_bad_time" => "Fel tid",
"evt_end_before_start_time" => "Sluttid före starttid",
"evt_end_before_start_date" => "Slutdatum före startdatum",
"evt_until_before_start_date" => "Upprepa slut före startdatum",
"evt_title" => "<strong>Ditt namn</strong>",
"evt_venue" => "Plats",
"evt_resource" => "Kategori",
"evt_description" => "Beskrivning",
"evt_date_time" => "Datum / tid",
"evt_mailer" => "skickat av ",
"evt_private_event" => "Privat händelse",
"evt_start_date" => "<strong>Start</strong>",
"evt_end_date" => "<strong>Slut</strong>",
"evt_select_date" => "Välj datum",
"evt_select_time" => "Välj tid",
"evt_all_day" => "Hela dagen",
"evt_change" => "Ändra",
"evt_set_repeat" => "Ställ in upprepning",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Angiven upprepning stöds inte",
"evt_no_repeat" => "Ingen upprepning",
"evt_repeat" => "Upprepa",
"evt_repeat_on" => "Upprepa varje",
"evt_until" => "tills",
"evt_blank_no_end" => "blank: tills vidare",
"evt_of_the_month" => "i månaden",
"evt_interval1_1" => "varje",
"evt_interval1_2" => "var annan",
"evt_interval1_3" => "var tredje",
"evt_interval1_4" => "var fjärde",
"evt_interval1_5" => "every fifth",
"evt_interval1_6" => "every sixth",
"evt_interval2_1" => "första",
"evt_interval2_2" => "andra",
"evt_interval2_3" => "tredje",
"evt_interval2_4" => "fjärde",
"evt_interval2_5" => "sista",
"evt_period1_1" => "dag",
"evt_period1_2" => "vecka",
"evt_period1_3" => "månad",
"evt_period1_4" => "år",
"evt_notify" => "<strong>Påminnelse per e-post</strong>",
"evt_now_and_or" => "nu och/eller",
"evt_event_added" => "Händelse tillagt",
"evt_event_edited" => "Händelse ändrad",
"evt_event_deleted" => "Händelse raderad",
"evt_days_before_event" => "dag(ar) före händelsen.   Skickas till nedanstående adress:",
"evt_notify_eml_list" => "Bekräftelse på tillagd händelse,ändring eller radering skickas automatiskt per e-post, välj ovan i rullgardinsmenyn om du vill ha påminnelse 1-30 dagar innan händelsen (valfritt)",
"evt_eml_list_too_long" => "E-postadresslistan är för lång.",
"evt_eml_list_missing" => "Det saknas en e-postadress för bekräftelse",
"evt_not_in_past" => "Notification date in past",//
"evt_not_days_invalid" => "Notification days invalid",//
"evt_url_format" => "länk till webbsida: url eller url [navn]. T.ex. www.google.se [sökning]",
"evt_confirm_added" => "händelse la",
"evt_confirm_saved" => "händelse sparas",
"evt_confirm_deleted" => "händelse raderas",
"evt_add" => "Lägg",
"evt_edit" => "Redigera",
"evt_save_close" => "Spara och stäng",
"evt_save" => "Spara",
"evt_clone" => "Spara som ny",
"evt_delete" => "Radera",
"evt_close" => "Stäng",
"evt_open_calendar" => "Öppna kalender",
"evt_owner" => "Ägare",
"evt_edited" => "Edited",
"evt_is_repeating" => "is a repeating event.",
"evt_is_multiday" => "is a multi-day event.",
"evt_edit_series_or_occurrence" => "Do you want to edit the series or this occurrence?",
"evt_edit_series" => "Edit the series",
"evt_edit_occurrence" => "Edit this occurrence",

//views
"vws_add_event" => "Lägg till händelse",
"vws_view_month" => "Visa månad",
"vws_view_week" => "Visa vecka",
"vws_view_day" => "Visa dag",
"vws_click_for_full" => "för hela kalender klickar månad",
"vws_view_full" => "Visa hela kalendern",
"vws_prev_month" => "Föregående månad",
"vws_next_month" => "Nästa månad",
"vws_today" => "Idag",
"vws_back_to_today" => "Tillbaka till den månad idag",
"vws_week" => "vecka",
"vws_wk" => "v.",
"vws_time" => "tid",
"vws_events" => "Händelser",
"vws_all_day" => "Hela dagen",
"vws_venue" => "Plats",
"vws_owner" => "Kund",
"vws_print" => "Skriv ut",
"vws_print_today" => "Skriv ut dag",
"vws_print_all" => "Skriv ut alla",
"vws_events_for_next" => "Kommande händelser för nästa",
"vws_days" => "dag(ar)",
"vws_edited" => "Redigerad",
"vws_notify" => "Påminnelse",

//changes.php
"chg_from_date" => "Från datum",
"chg_select_date" => "Händelse startdatum",
"chg_notify" => "Påminnelse",
"chg_days" => "Dag(ar)",
"chg_added" => "Tillagt",
"chg_edited" => "Redigerad",
"chg_deleted" => "Raderad",
"chg_changed_on" => "Ändrad",
"chg_changes" => "Ändringar",
"chg_no_changes" => "Inga ändringar."
);
?>
