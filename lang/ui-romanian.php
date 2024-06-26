<?php
/*
= LuxCal event calendar user interface language file = ROMANIAN / ROMÂNĂ

Traducerea în limba română realizată de Laurenţiu Florin BUBUIANU (laurfb@gmail.com - laurfb.tk).
This file has been translated in română by Laurenţiu Florin BUBUIANU (laurfb@gmail.com - laurfb.tk).

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu
This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.5.3");

/* -- Titles on the Header of the Calendar and Date Picker -- */

$months = array("Ianuarie","Februarie","Martie","Aprilie","Mai","Iunie","Iulie","August","Septembrie","Octombrie","Noiembrie","Decembrie");
$months_m = array("Ian","Feb","Mar","Apr","Mai","Iun","Iul","Aug","Sep","Oct","Noi","Dec");
$wkDays = array("Duminică","Luni","Marţi","Miercuri","Joi","Vineri","Sîmbătă","Duminică");
$wkDays_l = array("Dum","Lun","Mar","Mie","Joi","Vin","Sîm","Dum");
$wkDays_m = array("D","L","Ma","Mi","J","V","S","D");
$wkDays_s = array("D","L","Ma","M","J","V","S","D");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Trimitere",
"none" => "Niciunul.",

//index.php
"title_upcoming" => "Evenimente care Urmează",
"title_add_event" => "Adaugă Eveniment",
"title_event_details" => "Detalii Eveniment",
"title_edit_event" => "Editare Eveniment",
"title_log_in" => "Autentificare",
"title_user_guide" => "Ghid de Utilizare",
"title_settings" => "Setări Generale Calendar",
"title_edit_cats" => "Editare Categorii",
"title_edit_users" => "Editare Utilizatori",
"title_manage_db" => "Setări Bază de Date",
"title_changes" => "Adăugare/Editare/Ştergere Evenimente",
"title_csv_import" => "Import fisier CSV",
"title_ics_import" => "Import fişier iCal",
"title_ics_export" => "Export fişier iCal",
"idx_log_in" => "Trebuie să vă autentificaţi pentru a putea vizualiza calendarul",
"idx_public_name" => "Acces Public (doar vizualizare)",

//header.php
"hdr_options" => "Opţiuni",
"hdr_options_submit" => "După selecţie apăsaţi butonul 'Opţiuni'",
"hdr_show_opanel" => "Afişare meniu Opţiuni",
"hdr_select_date" => "Selecţie Dată",
"hdr_view" => "Mod Vizualizare",
"hdr_select_view" => "Selecţie Mod Vizualizare",
"hdr_filter" => "Filtrul",
"hdr_select_filter" => "Selecţie filtrul",
"hdr_lang" => "Limbă",
"hdr_select_lang" => "Selecţie Limbă",
"hdr_all_cats" => "Toate categoriile",
"hdr_all_users" => "Toţi utilizatorii",
"hdr_year" => "Anual",
"hdr_month" => "Lunar",
"hdr_week" => "Săptămînal",
"hdr_day" => "Zilnic",
"hdr_upcoming" => "Care Urmează",
"hdr_changes" => "Modificări",
"hdr_select_admin_functions" => "Selecţie Opţiune Administrare",
"hdr_admin" => "Administrare",
"hdr_add_event" => "Adăugare Eveniment",
"hdr_show_sbar" => "Evenimente Care Urmează (afişare în bara laterală)",
"hdr_settings" => "Setări",
"hdr_categories" => "Categorii",
"hdr_users" => "Utilizatori",
"hdr_database" => "Bază de Date",
"hdr_import_csv" => "Import CSV",
"hdr_import_ics" => "Import iCal",
"hdr_export_ics" => "Export iCal",
"hdr_calendar" => "Revenire la calendar",
"hdr_guide" => "Ajutor",
"hdr_log_in" => "Log In",
"hdr_log_out" => "Log Out",
"hdr_today" => "astăzi", //dtpicker.js
"hdr_clear" => "şterge", //dtpicker.js

//header_s.php
"hdr_close_window" => "Închide Fereastra",

//event.php
"evt_no_title" => "Fără Titlu",
"evt_no_start_date" => "Fără Dată de Start",
"evt_bad_date" => "Dată Greşită",
"evt_bad_rdate" => "Dată Finală Greşită",
"evt_no_start_time" => "Fără Timp Iniţial",
"evt_bad_time" => "Timp Greşit",
"evt_end_before_start_time" => "Ora de Final definită înaintea Orei de Început",
"evt_end_before_start_date" => "Data finală este definită înaintea datei de pornire",
"evt_until_before_start_date" => "Data finală pentru repetare este definită înaintea datei de pornire",
"evt_title" => "Titlu",
"evt_venue" => "Locaţie",
"evt_resource" => "Categorie",
"evt_description" => "Descriere",
"evt_date_time" => "Dată/Oră",
"evt_mailer" => "mailer",
"evt_private_event" => "Eveniment Privat",
"evt_start_date" => "Începe la",
"evt_end_date" => "Se termină la",
"evt_select_date" => "Selectare dată",
"evt_select_time" => "Selectare oră",
"evt_all_day" => "Zilnic",
"evt_change" => "Modificare",
"evt_set_repeat" => "Setare Repetiţie",
"evt_set" => "OK",
"evt_repeat_not_supported" => "repetiţia specificată este incorectă",
"evt_no_repeat" => "Fără repetare",
"evt_repeat" => "Repetă",
"evt_repeat_on" => "Repetă",
"evt_until" => "pînă cînd",
"evt_blank_no_end" => "cîmp gol = fără sfîrşit",
"evt_of_the_month" => "a lunii",
"evt_interval1_1" => "în fiecare",
"evt_interval1_2" => "în oricare altă",
"evt_interval1_3" => "la fiecare a treia",
"evt_interval1_4" => "la fiecare a patra",
"evt_interval1_5" => "la fiecare a cincea",
"evt_interval1_6" => "la fiecare a şasea",
"evt_interval2_1" => "în prima",
"evt_interval2_2" => "în a doua",
"evt_interval2_3" => "în a treia",
"evt_interval2_4" => "în a patra",
"evt_interval2_5" => "ultima",
"evt_period1_1" => "zi",
"evt_period1_2" => "săptămînă",
"evt_period1_3" => "lună",
"evt_period1_4" => "an",
"evt_notify" => "Trimite email",
"evt_now_and_or" => "acum şi/sau cu",
"evt_event_added" => "Următorul eveniment a fost adăugat",
"evt_event_edited" => "Următorul eveniment a fost modificat",
"evt_event_deleted" => "Următorul eveniment a fost şters",
"evt_days_before_event" => "zi(le) înainte de eveniment:",
"evt_notify_eml_list" => "adresele de email trebuiesc separate prin caracterul ; - max. 255 caractere.",
"evt_eml_list_too_long" => "Lista de adrese este prea mare.",
"evt_eml_list_missing" => "Lipseşte adresa de email",
"evt_not_in_past" => "Data de notificare este incorectă (expirată deja)",
"evt_not_days_invalid" => "Zile de notificare invalide",
"evt_url_format" => "ptr. adăugare link la site: url sau url [name]. Ex. www.google.com [search]",
"evt_confirm_added" => "eveniment adăugat",
"evt_confirm_saved" => "eveniment salvat",
"evt_confirm_deleted" => "eveniment şters",
"evt_add" => "Adăugare",
"evt_edit" => "Modificare",
"evt_save_close" => "Salvare şi închidere",
"evt_save" => "Salvare",
"evt_clone" => "Salvare ca Nou",
"evt_delete" => "Ştergere",
"evt_close" => "Inchidere",
"evt_open_calendar" => "Deschide calendar",
"evt_owner" => "Adăugat de",
"evt_edited" => "Modificat de",
"evt_is_repeating" => "este un eveniment repetitiv.",
"evt_is_multiday" => "este un eveniment pe mai multe zile.",
"evt_edit_series_or_occurrence" => "Doriţi să modificaţi seria repetiţiilor sau doar acest eveniment?",
"evt_edit_series" => "Modificare serie evenimente",
"evt_edit_occurrence" => "Modificare eveniment singular",

//views
"vws_add_event" => "Adăugare Eveniment",
"vws_view_month" => "Vizualizare Lună",
"vws_view_week" => "Vizualizare Săptămînă",
"vws_view_day" => "Vizualizare Zi",
"vws_click_for_full" => "pentru calendar complet selectaţi luna",
"vws_view_full" => "Vizualizare Completă Calendar",
"vws_prev_month" => "Luna anterioară",
"vws_next_month" => "Luna următoare",
"vws_today" => "Astăzi",
"vws_back_to_today" => "Salt la luna curentă",
"vws_week" => "săptămîna",
"vws_wk" => "săpt.",
"vws_time" => "Timp",
"vws_events" => "Evenimente",
"vws_all_day" => "În fiecare Zi",
"vws_venue" => "Locaţie",
"vws_owner" => "Adăugat de",
"vws_print" => "Tipăreşte",
"vws_print_today" => "Tipăreşte Ziua Curentă",
"vws_print_all" => "Tipăreşte Tot",
"vws_events_for_next" => "Evenimentele pentru următoarele",
"vws_days" => "zi(le)",
"vws_edited" => "Modificat de",
"vws_notify" => "Notificare",

//changes.php
"chg_from_date" => "De la",
"chg_select_date" => "Selectare data iniţială",
"chg_notify" => "Notificare",
"chg_days" => "Zi(le)",
"chg_added" => "Adăugat",
"chg_edited" => "Modificat",
"chg_deleted" => "Şters",
"chg_changed_on" => "Modificat la",
"chg_changes" => "Modificări",
"chg_no_changes" => "Nicio Modificare."
);
?>
