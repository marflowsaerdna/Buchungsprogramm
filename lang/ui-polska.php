<?php
/*
= LuxCal event calendar lamguage file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.5.3");

/* -- Titles on the Header of the Calendar and Date Picker -- */

$months = array("Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień");
$months_m = array("Sty","Lut","Mar","Kwi","Maj","Cze","Lip","Sie","Wrz","Paź","Lis","Gru");
$wkDays = array("Niedziela","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota","Niedziela");
$wkDays_l = array("Nie","Pon","Wto","Śro","Czw","Pią","Sob","Nie");
$wkDays_m = array("Nie","Pon","Wto","Śro","Czw","Pią","Sob","Nie");
$wkDays_s = array("N","P","W","Ś","C","P","S","N");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "None.",

//index.php
"title_upcoming" => "Nadchodzące Wydarzenia",
"title_add_event" => "Dodaj Wydarzenie",
"title_event_details" => "Szczegóły Wydarzenia",
"title_edit_event" => "Edytuj Wydarzenie",
"title_log_in" => "Logowanie",
"title_user_guide" => "Poradnik Użytkownika LuxCal",
"title_settings" => "Ustawień Kalendarza",
"title_edit_cats" => "Edycja Kategorie",
"title_edit_users" => "Edycja Użytkowników ",
"title_manage_db" => "Zarządzanie bazy danych",
"title_changes" => "Dodane / Edytowane / Usuniete Wydarzenia", 
"title_csv_import" => "Import Plików CSV",
"title_ics_import" => "Import Plików iCal",
"title_ics_export" => "Export Plików iCal",
"idx_log_in" => "Zaloguj się żeby obejrzeć ten kalendarz",
"idx_public_name" => "Public View",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_show_opanel" => "Show Options Panel",
"hdr_select_date" => "Idź do Datę",
"hdr_view" => "Widok",
"hdr_select_view" => "Wybierz widok",
"hdr_filter" => "Filtr",
"hdr_select_filter" => "Wybierz filtr",
"hdr_lang" => "Język",
"hdr_select_lang" => "Wybierz język",
"hdr_all_cats" => "wszystkich kategorii",
"hdr_all_users" => "wszyscy użytkownicy",
"hdr_year" => "Rok",
"hdr_month" => "Miesiąc",
"hdr_week" => "Tydzień",
"hdr_day" => "Dzień",
"hdr_upcoming" => "Nadchodzące",
"hdr_changes" => "Zmiany", 
"hdr_select_admin_functions" => "Wybierz funkcie admin",
"hdr_admin" => "Zarządzanie",
"hdr_add_event" => "Dodaj Wydarzenie",
"hdr_show_sbar" => "Show side bar",//
"hdr_settings" => "Ustawienia",
"hdr_categories" => "Kategorie",
"hdr_users" => "Użytkownicy",
"hdr_database" => "Bazy danych",
"hdr_import_csv" => "Import CSV",
"hdr_import_ics" => "Import iCal",
"hdr_export_ics" => "Export iCal",
"hdr_calendar" => "Back to calendar",
"hdr_guide" => "Pomoc",
"hdr_log_in" => "Zaloguj",
"hdr_log_out" => "Wyloguj",
"hdr_today" => "dzisiaj", //dtpicker.js
"hdr_clear" => "kasuje", //dtpicker.js

//header_s.php
"hdr_close_window" => "Zamknij Okno",

//event.php
"evt_no_title" => "Brak tytułu",
"evt_no_start_date" => "Brak daty rozpoczęcia",
"evt_bad_date" => "Zła data",
"evt_bad_rdate" => "Zła repeat end data",//
"evt_no_start_time" => "Brak czasu rozpoczęcia",
"evt_bad_time" => "Zła godzina",
"evt_end_before_start_time" => "Czas zakończenia przed czasem rozpoczęcia",
"evt_end_before_start_date" => "Data zakończenia przed datą rozpoczęcia",
"evt_until_before_start_date" => "Repeat end przed datą rozpoczęcia",//
"evt_title" => "Tytuł",
"evt_venue" => "Miejsce",
"evt_resource" => "Kategoria",
"evt_description" => "Opis",
"evt_date_time" => "Data / godzina",
"evt_mailer" => "mailer",
"evt_private_event" => "Wydarzenie prywatne",
"evt_start_date" => "Początek",
"evt_end_date" => "Koniec",
"evt_select_date" => "Wybierz datę",
"evt_select_time" => "Wybierz czas",
"evt_all_day" => "Całodniowe",
"evt_change" => "Zmień",
"evt_set_repeat" => "Ustaw powtórzenie",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Specified repetition not supported",//
"evt_no_repeat" => "Bez powtórzeń",
"evt_repeat" => "Powtórz",
"evt_repeat_on" => "Powtarzaj każde",
"evt_until" => "Aż do",
"evt_blank_no_end" => "Puste: bez końca",
"evt_of_the_month" => "miesiąca",
"evt_interval1_1" => "Każdy",
"evt_interval1_2" => "Każdy inny",
"evt_interval1_3" => "Każdy trzeci",
"evt_interval1_4" => "Każdy czwarty",
"evt_interval1_5" => "every fifth",
"evt_interval1_6" => "every sixth",
"evt_interval2_1" => "Pierwszy", 
"evt_interval2_2" => "Drugi", 
"evt_interval2_3" => "Trzeci", 
"evt_interval2_4" => "Czwarty", 
"evt_interval2_5" => "Ostatni", 
"evt_period1_1" => "Dzień", 
"evt_period1_2" => "Tydzień", 
"evt_period1_3" => "Miesiąc", 
"evt_period1_4" => "Rok", 
"evt_notify" => "Wyślij maila",
"evt_now_and_or" => "now and/or",//
"evt_event_added" => "The following event has been added",//
"evt_event_edited" => "The following event has been modified",//
"evt_event_deleted" => "The following event has been deleted",//
"evt_days_before_event" => "dni przed wydarzeniem do:",
"evt_notify_eml_list" => "adresy email rozdzielone średnikiem - maks. 255 znaków",
"evt_eml_list_too_long" => "Lista adresów zawiera zbyt dużo znaków",
"evt_eml_list_missing" => "Brak powiadamiającego adresu/adresów mailowych",
"evt_not_in_past" => "Notification date in past",//
"evt_not_days_invalid" => "Notification days invalid",//
"evt_url_format" => "odnośnik do strony: url lub url [nazwa]. N.p. www.google.com [szukaj]",
"evt_confirm_added" => "wydarzenie dodał",
"evt_confirm_saved" => "wydarzenie zapisane",
"evt_confirm_deleted" => "wydarzenie usunieta",
"evt_add" => "Dodaj",
"evt_edit" => "Edycja",
"evt_save_close" => "Zapisz i zamknij",
"evt_save" => "Zapisz",
"evt_clone" => "Zapisz jako nowy ",
"evt_delete" => "Usuń",
"evt_close" => "Zamknij",
"evt_open_calendar" => "Otwórz kalendarz",
"evt_owner" => "Owner",
"evt_edited" => "Edited",
"evt_is_repeating" => "is a repeating event.",
"evt_is_multiday" => "is a multi-day event.",
"evt_edit_series_or_occurrence" => "Do you want to edit the series or this occurrence?",
"evt_edit_series" => "Edit the series",
"evt_edit_occurrence" => "Edit this occurrence",

//views
"vws_add_event" => "Dodaj Wydarzenie",
"vws_view_month" => "Podgląd Miesięczny",
"vws_view_week" => "Podgląd Tygodniowy",
"vws_view_day" => "Podgląd Dzienny",
"vws_click_for_full" => "for full calendar click month",//
"vws_view_full" => "View full calendar",//
"vws_prev_month" => "Previous month",//
"vws_next_month" => "Next month",//
"vws_today" => "Dziś",
"vws_back_to_today" => "Powrót na miesiąc dzisiaj",
"vws_week" => "Tydzień",
"vws_wk" => "ty",
"vws_time" => "godzina",
"vws_events" => "Wydarzenia",
"vws_all_day" => "Cały Dzień",
"vws_venue" => "Miejsce",
"vws_owner" => "Owner",
"vws_print" => "Pokaż",
"vws_print_today" => "Pokaż dzisiejsze",
"vws_print_all" => "Pokaż wszystkie",
"vws_events_for_next" => "Nadchodzące Wydarzenia na następne",
"vws_days" => "dzień/dni",
"vws_edited" => "Uaktualniony",
"vws_notify" => "Powiadom",

//changes.php
"chg_from_date" => "Data początkowa",
"chg_select_date" => "Wybierz datę początkową", 
"chg_notify" => "Powiadom",
"chg_days" => "Dzień/Dni",
"chg_added" => "Dodany",
"chg_edited" => "Uaktualniony",
"chg_deleted" => "Usunięty",
"chg_changed_on" => "Changed on",//
"chg_changes" => "Changes",//
"chg_no_changes" => "Brak changes."//
);
?>
