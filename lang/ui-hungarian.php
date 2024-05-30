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

$months = array("január","február","március","április","május","június","július","augusztus","szeptember","október","november","december");
$months_m = array("jan","feb","már","ápr","máj","jún","júl","aug","sze","okt","nov","dec");
$wkDays = array("vasárnap","hétfő","kedd","szerda","csütörtök","péntek","szombat","vasárnap");
$wkDays_l = array("vas","hét","ked","sze","csü","pén","szo","vas");
$wkDays_m = array("Vas","Hé","Ke","Sze","Csü","Pé","Szo","Vas");
$wkDays_s = array("V","H","K","SZ","CS","P","SZ","V");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "None.",

//index.php
"title_upcoming" => "Következő események",
"title_add_event" => "Új Esemény",
"title_event_details" => "Esemény Részletei",
"title_edit_event" => "Esemény Módosítása",
"title_log_in" => "Bejelentkezés",
"title_user_guide" => "LuxCal Felhasználói Útmutató",
"title_settings" => "Naptár beállítás",
"title_edit_cats" => "Kategóriák szerkesztése",
"title_edit_users" => "Felhasználók szerkesztése",
"title_manage_db" => "Kezeli database",
"title_changes" => "Hozzáadott / Szerkesztett / Törölt események",
"title_csv_import" => "CSV fájl importálása",
"title_ics_import" => "iCal fájl importálása",
"title_ics_export" => "iCal fájl exportálása",
"idx_log_in" => "Kérem lépjen be, hogy láthassa a naptárat",
"idx_public_name" => "Public View",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_show_opanel" => "Show Options Panel",
"hdr_select_date" => "Dátum kiválasztása",
"hdr_view" => "Nézet",
"hdr_select_view" => "Válasszon nézet",
"hdr_filter" => "Szűrő",
"hdr_select_filter" => "Válasszon szűrő",
"hdr_lang" => "Nyelvet",
"hdr_select_lang" => "Válasszon nyelvet",
"hdr_all_cats" => "Minden kategória",
"hdr_all_users" => "Minden felhasználó",
"hdr_year" => "Év",
"hdr_month" => "Hónap",
"hdr_week" => "Hét",
"hdr_day" => "Nap",
"hdr_upcoming" => "Elkövetkező",
"hdr_changes" => "Változtatás",
"hdr_select_admin_functions" => "Admin funkció kiválasztása",
"hdr_admin" => "Adminisztráció",
"hdr_add_event" => "Esemény hozzáadás",
"hdr_show_sbar" => "Show side bar",//
"hdr_settings" => "Beállítások",
"hdr_categories" => "Kategóriák",
"hdr_users" => "Felhasználók",
"hdr_database" => "Database",
"hdr_import_csv" => "CSV importálása",
"hdr_import_ics" => "iCal importálása",
"hdr_export_ics" => "iCal exportálása",
"hdr_calendar" => "Back to calendar",
"hdr_guide" => "Segítség",
"hdr_log_in" => "Bejelentkezés",
"hdr_log_out" => "Kijelentkezés",
"hdr_today" => "ma", //dtpicker.js
"hdr_clear" => "törli", //dtpicker.js

//header_s.php
"hdr_close_window" => "Ablak bezárása",

//event.php
"evt_no_title" => "Nincs cím",
"evt_no_start_date" => "Nincs kezdő dátum",
"evt_bad_date" => "Rossz dátum",
"evt_bad_rdate" => "Rossz ismételt befejező dátum",
"evt_no_start_time" => "Nincs kezdő időpont",
"evt_bad_time" => "Rossz időpont",
"evt_end_before_start_time" => "A záró időpont megelőzi a kezdő időpontot",
"evt_end_before_start_date" => "A záró dátum megelőzi a kezdő dátumot",
"evt_until_before_start_date" => "Repeat end megelőzi a kezdő dátumot",
"evt_title" => "Cím",
"evt_venue" => "Helyszín",
"evt_resource" => "Kategória",
"evt_description" => "Leírás",
"evt_date_time" => "Dátum / idő",
"evt_mailer" => "postázó",
"evt_private_event" => "Saját esemény",
"evt_start_date" => "Kezdeti",
"evt_end_date" => "Befejező",
"evt_select_date" => "Dátum kiválasztása",
"evt_select_time" => "Select time",
"evt_all_day" => "Egésznapos",
"evt_change" => "Változtatás",
"evt_set_repeat" => "Ismétlődés beállítása",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Specified repetition not supported",
"evt_no_repeat" => "Nincs ismétlődés",
"evt_repeat" => "Ismétlődés",
"evt_repeat_on" => "Ismétel minden",
"evt_until" => "eddig",
"evt_blank_no_end" => "üres: nincs befejezés",
"evt_of_the_month" => "a hónapnak",
"evt_interval1_1" => "minden",
"evt_interval1_2" => "minden másik",
"evt_interval1_3" => "minden harmadik",
"evt_interval1_4" => "minden negyedik",
"evt_interval1_5" => "every fifth",
"evt_interval1_6" => "every sixth",
"evt_interval2_1" => "első",
"evt_interval2_2" => "második",
"evt_interval2_3" => "harmadik",
"evt_interval2_4" => "negyedik",
"evt_interval2_5" => "utolsó",
"evt_period1_1" => "nap",
"evt_period1_2" => "hét",
"evt_period1_3" => "hónap",
"evt_period1_4" => "év",
"evt_notify" => "Email küldés",
"evt_now_and_or" => "now and/or",//
"evt_event_added" => "The following event has been added",//
"evt_event_edited" => "The following event has been modified",//
"evt_event_deleted" => "The following event has been deleted",//
"evt_days_before_event" => "nappal az esemény előtt:",
"evt_notify_eml_list" => "email-címeket pontosvesszővel elválasztva - max. 255 karakterben.",
"evt_eml_list_too_long" => "Email-címek listája túl sok karakterből áll.",
"evt_eml_list_missing" => "Értesítési email címlista hiányzik",
"evt_not_in_past" => "Notification date in past",//
"evt_not_days_invalid" => "Notification days invalid",//
"evt_url_format" => "link a weboldalra: url vagy url [oldal]. Pld. www.google.com [search]",
"evt_confirm_added" => "event added",//
"evt_confirm_saved" => "event saved",//
"evt_confirm_deleted" => "event deleted",//
"evt_add" => "Hozzáadása",
"evt_edit" => "Szerkesztése",
"evt_save_close" => "Mentés és bezárás ",
"evt_save" => "Mentés",
"evt_clone" => "Mentés új",
"evt_delete" => "Törlése",
"evt_close" => "Bezár",
"evt_open_calendar" => "Nyílt naptár",
"evt_owner" => "Owner",
"evt_edited" => "Edited",
"evt_is_repeating" => "is a repeating event.",
"evt_is_multiday" => "is a multi-day event.",
"evt_edit_series_or_occurrence" => "Do you want to edit the series or this occurrence?",
"evt_edit_series" => "Edit the series",
"evt_edit_occurrence" => "Edit this occurrence",

//views
"vws_add_event" => "Esemény hozzáadása",
"vws_view_month" => "Hónap nézet",
"vws_view_week" => "Hét nézet",
"vws_view_day" => "Nap nézet",
"vws_click_for_full" => "for full calendar click month",//
"vws_view_full" => "View full calendar",//
"vws_prev_month" => "Previous month",//
"vws_next_month" => "Next month",//
"vws_today" => "Ma",
"vws_back_to_today" => "Vissza a hónapban a ma",
"vws_week" => "Hét",
"vws_wk" => "hét",
"vws_time" => "idő",
"vws_events" => "Események",
"vws_all_day" => "Egésznapos",
"vws_venue" => "Helyszín",
"vws_owner" => "Owner",
"vws_print" => "Nyomtatás",
"vws_print_today" => "Mai nap nyomtatása",
"vws_print_all" => "Összes nyomtatása",
"vws_events_for_next" => "Következő események a következő",
"vws_days" => "nap",
"vws_edited" => "Edited",
"vws_notify" => "Értesítés",

//changes.php
"chg_from_date" => "Dátumtól",
"chg_select_date" => "Kezdő dátum kiválasztása",
"chg_notify" => "Értesítő",
"chg_days" => "Nap",
"chg_added" => "Hozzáadva",
"chg_edited" => "Szerkesztve",
"chg_deleted" => "Törölve",
"chg_changed_on" => "Módosítása",
"chg_changes" => "Változások",
"chg_no_changes" => "Nincs változás."
);
?>
