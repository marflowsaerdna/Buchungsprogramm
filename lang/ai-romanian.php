<?php
/*
= LuxCal event calendar admin interface language file = ROMANIAN / ROMÂNĂ

Traducerea în limba română realizată de Laurenţiu Florin BUBUIANU (laurfb@gmail.com - laurfb.tk).
This file has been translated in română by Laurenţiu Florin BUBUIANU (laurfb@gmail.com - laurfb.tk).

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.
© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu
*/

//LuxCal ui language file version
define("LAI","2.5.3");

/* -- Admin Interface texts -- */

$ax = array(

//settings.php - fieldset headers + general
"set_general_settings" => "Setări Calendar",
"set_opanel_settings" => "Optiuni",
"set_user_settings" => "Setări Cont Utilizator",
"set_view_settings" => "Setări Vizualizare",
"set_dt_settings" => "Setări Dată/Oră",
"set_save_settings" => "Salvare Setări",
"set_not_valid" => "incorect",
"set_missing" => "lipseşte",
"set_settings_saved" => "Setările au fost salvate",
"set_read_error" => "Încărcarea fişierului de configurare a eşuat",
"set_write_error" => "Salvarea fişierului de configurare a eşuat. Verificati permisiunile pentru folderul radăcină",
"hover_for_details" => "Detalii setări calendar",
"enabled" => "activat",
"disabled" => "dezactivat",
"no" => "nu",
"yes" => "da",
"or" => "sau",
"minutes" => "minute",
"pixels" => "pixeli",
"no_way" => "Nu aveţi drepturi pentru a executa această operaţiune",

//settings.php - calendar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Titlu Calendar",
"calendarTitle_text" => "Text afişat în Titlul Calendarului, utilizat şi în email-ul de notificare.",
"calendarUrl_label" => "URL calendar",
"calendarUrl_text" => "Adresa web a Calendarului.",
"calendarEmail_label" => "email folosit pentru notificări (trimis de)",
"calendarEmail_text" => "Adresa de email folosită în email-urile de notificare.<br />Format: \'email\' sau \'nume&#8249;email&#8250;\'. unde \'nume\' poate fi numele calendarului.",
"timeZone_label" => "Fus Orar",
"timeZone_text" => "Fusul orar al calendarului, folosit pentru afişarea orei curente.",
"see" => "vezi",
"view" => "vizualizare",
"post_own" => 'postare activităţi proprii',
"post_all" => 'postare/editare toate activităţile',
"defaultView_label" => "Mod vizualizare iniţial",
"defaultView_text" => "Modurile de vizualizare implicite la pornire sînt:<br />- Anual<br />- Lunar<br />- Săptămînal<br />- Zilnic<br />- Care Urmează<br />- Modificări<br />Este recomandabil utilizarea modului \'Lunar\' sau \'Care Urmează\'.",
"language_label" => "Limba implicită",
"language_text" => "Fişierele specifice de limbă ui-{limbă}.php, ai-{limbă}.php, ug-{limbă}.php precum şi fişierul ug-layout.png trebuie să fie prezente în directorul \'lang/\'. {limba} reprezintă limba folosită pentru interfaţă, numele (limbii) trebuind să fie scris cu litere mici!",
"userMenu_label" => "Meniu Filtrare Utilizatori",
"userMenu_text" => "Afişare meniu filtrare utilizatori în bara de navigare.<br />Acest filtru poate fi utilizat pentru afişarea doar a evenimentelor corespunzătoare utilizatorului selectat.",
"catMenu_label" => "Meniu Filtrare Categorie",
"catMenu_text" => "Afişare meniu filtrare categorie în bara de navigare.<br />Acest filtru poate fi utilizat pentru afişarea doar a categoriei selectate.",
"langMenu_label" => "Meniu selecţie limbă",
"langMenu_text" => "Afişare opţiune selecţie limbă în bara de navigare.<br />Această opţiune poate fi utilizată pentru selectarea limbii de afişare a calendarului.<br />(util doar dacă se utilizează mai multe limbi)",
"chgEmailList_label" => "Adresa(ele) de email de notificat la apariţia unor modificări",
"chgEmailList_text" => "Adresele de email care vor primi periodic notificări privind modificările din calendar.<br />Adresele trebuiesc separate prin caracterul \';\' (necesită programare prin cron).",
"chgNofDays_label" => "Numărul de zile de urmărit pentru modificări",
"chgNofDays_text" => "Numărul de zile anterioare utilizate pentru sumarul modificărilor.<br />Dacă numărul introdus este \'0\' nu va fi trimis niciun sumar (necesită programare prin cron).",
"cronSummary_label" => "Sumar Cron Job Admin",
"cronSummary_text" => "Trimitere sumar cron job pe email la administratorul calendarului.<br />Opţiunea este utilă doar dacă pe server:<br />- a fost activată o acţiune în cron job<br />- trimiterea acţiunilor cron job pe email este posibilă (verificaţi acest lucru cu ISP-ul dumneavoastră)",
"oneStepEdit_label" => "Editare eveniment într-un singur pas",//
"oneStepEdit_text" => "Opţiune activă: selectarea unui eveniment va deschide direct fereastra \'Editare Eveniment\'.<br />Opţiune dezactivată: selectarea unui eveniment va determina deschiderea ferestrei \'Detalii Eveniment\', după care, folosind butonul Editare se va deschide fereastra \'Editare Eveniment\'.<br />Obs.: Dacă utilizatorul nu are drepturi de editare eveniment, fereastra \'Detalii\' Eveniment va avea butonul \'Editare\' dezactivat.",//

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Auto-înregistrare",
"selfReg_text" => "Permisiune utilizatori de a se auto-înregistra pentru acces la calendar.",
"selfRegPrivs_label" => "Drepturi de auto-înregistrare pentru",
"selfRegPrivs_text" => "Drepturile de acces pentru utilizatorii auto-înregistraţi.<br />- vizualizare: doar vizualizare<br />- postări-proprii: vizualizare şi editări postări proprii.<br />- toate postările: postare şi editare pentru toate evenimentele",
"maxNoLogin_label" => "Numărul maxim de zile acceptat fără logare",
"maxNoLogin_text" => "Dacă un utilizator nu se loghează în timpul numărului specificat de zile, contul corespunzator va fi automat şters.<br />Dacă valoare introdusă este \'0\', contul user-ului corespunzător nu va fi şters niciodată (necesită programare prin cron)",
"miniCalPost_label" => "Postare evenimente tip mini-calendar",
"miniCalPost_text" => "Relevant doar dacă se utilizează mini-calendarul!<br />Dacă opţiunea este activată utilizatorii pot:<br />- posta evenimente noi în minicalendar facînd click pe numărul zilei din celulă<br />- editare/ştergere-modificare evenimente prin click direct pe eveniment",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Luna de start pentru modul de afişare 'Anual'",
"yearStart_text" => "Dacă se specifică o lună de start (1-12) pentru afişare în modul \'Anual\', calendarul va fi afişat mereu pornind de la această lună iar anul următor va fi afişat începînd cu prima zi a lunii specificate (nu din prima zi a lunii ianuarie).<br/>Valoarea \'0\' specifică faptul că afişarea lunilor se va baza pe data curentă.",
"colsToShow_label" => "Numărul de coloane în modul de vizualizare 'Anual'",
"colsToShow_text" => "Numărul de luni de afişat pe fiecare rînd în modul \'Anual\'.<br />Recomandabil 3 sau 4.",
"rowsToShow_label" => "Numărul de luni de afişat în modul 'Anual'",
"rowsToShow_text" => "Numărul de coloane (pentru patru luni) de afişat în modul de vizualizare \'Anual\'.<br />Recomandat 4 (pentru a avea 16 luni de vizualizat în pagină).",
"weeksToShow_label" => "Numărul de săptămîni de afişat în modul 'Lunar'",
"weeksToShow_text" => "Numărul de săptămîni de afişat în modul \'Lunar\'.<br />Recomandabil 10 pentru a avea 2.5 luni de vizualizat în pagină.<br/>Valoarea \'0\' determină afişarea unei singure luni (luna curentă).",
"upcomingDays_label" => "Numărul de zile de afişat în modul 'Care Urmează'",
"upcomingDays_text" => "Numărul de zile de afişat pentru modul evenimente \'Care Urmează\' şi in fluxul RSS.",
"startHour_label" => "Ora de început pentru modul 'Zilnic/Săptămînal'",
"startHour_text" => "Ora de început pentru o zi normală.<br />Spre exemplu, introducerea valorii \'6\' permite evitarea risipei de spaţiu la afişare pentru perioada inactivă miezul nopţii - ora 6.00",
"dwTimeSlot_label" => "Dimensiune rînd în modul 'Zilnic/Săptămînal'",
"dwTimeSlot_text" => "Dimensiune rînd exprimată în minute<br />Această valoare, împreună cu \'Ora de Început\' (vezi mai sus), va determina numărul de linii (rînduri) maxim în modul \'Zilnic/Săptămînal\'.",
"dwTsHeight_label" => "Înălţime rînd",
"dwTsHeight_text" => "Înălţime rînd în modul \'Zilnic/Săptămînal\' (pixeli).",
"weekNumber_label" => "Afişare număr săptămînă",
"weekNumber_text" => "Afişarea numărului săptămînii in modurile \'Anual\', \'Lunar\' sau \'Săptămînal\' poate fi activată/dezactivată",
"showOwner_label" => "Afişarea numelui celui care a introdus evenimentul",
"showOwner_text" => "Dacă este activat, numele celui care a introdus evenimentul va fi afişat în:<br />- fereastra de informaţii pentru diferite moduri de afişare<br />- modul de vizualizare \'Care Urmează\'<br />- modul de vizualizare \'Modificări\'<br />- feed-urile RSS<br />- notificările prin email.",
"showCatName_label" => "Afişare denumire categorie",
"showCatName_text" => "Daca opţiunea este activă, în diferite moduri de vizualizare, pe lîngă afişarea evenimentului în culoarea categoriei selectate va fi afişat şi denumirea categoriei.",
"showLinkInMV_label" => "Afişare link-uri în modul 'Lunar'",
"showLinkInMV_text" => "Daca opţiunea este activă, URL-urile din descrierea evenimentului vor fi convertite şi afişate ca hyperlink-uri în modul de vizualizare \'Lunar\' (cînd se selectează un eveniment, URL-urile sînt întotdeauna afişate ca hyperlink-uri în fereastra \'Eveniment\')",
"eventColor_label" => "Culorile folosite pentru afişare eveniment bazate pe",
"eventColor_text" => "Evenimentele din calendar pot fi afişate folosind palete definite pentru utilizator sau pentru categoria de eveniment.",
"owner_color" => "paletă utilizator",
"res_color" => "paletă categorie",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formatul datei pentru Eveniment",
"dateFormat_text" => "Formatul datei în modul de vizualizare calendar şi modul de introducere evenimente.",
"dateUSorEU_label" => "Formatul de afişare dată/oră",
"dateUSorEU_text" => "Formatul de afişare pentru dată/oră în capul de tabel - modul de vizualizare calendar şi modul de introducere evenimente.",
"dateSep_label" => "Caracter separator dată",
"dateSep_text" => "Caracterul separator pentru Dată în modul vizualizare calendar şi modul de introducere evenimente.",
"time24_label" => "Formatul de timp (12 sau 24 ore)",
"time24_text" => "Formatul de afişare timp în modul de vizualizare calendar şi modul de introducere evenimente.",
"weekStart_label" => "Prima zi a săptămînii",
"weekStart_text" => "O săptămînă poate începe cu Duminică sau Luni.",
"date_format_us" => "Luni, Mai 15, 2010 (US)",
"date_format_eu" => "Luni 15 Mai 2010",
"dot" => "punct",
"slash" => "slash",
"hyphen" => "cratimă",
"time_format_us" => "12-ore AM/PM",
"time_format_eu" => "24-ore",
"sunday" => "Duminică",
"monday" => "Luni",
"time_zones" => "FUS ORAR",
"dd_mm_yyyy" => "zz-ll-aaaa",
"mm_dd_yyyy" => "ll-zz-aaaa",
"yyyy_mm_dd" => "aaaa-ll-zz",

//login.php
"log_log_in" => "Autentificare",
"log_remember_me" => "Memorare utilizator",
"log_register" => "Înregistrare",
"log_change_my_data" => "Modificare date acces",
"log_change" => "Modifică",
"log_back" => "Înapoi",
"log_un_or_em" => "Nume Utilizator sau email",
"log_un" => "Nume Utilizator",
"log_em" => "Email",
"log_pw" => "Parola",
"log_new_un" => "Nume Utilizator Nou",
"log_new_em" => "Adresă Nouă de email",
"log_new_pw" => "Parola Nouă",
"log_pw_msg" => "Aveţi aici parola pentru autentificare:",
"log_pw_subject_pre" => "dvs.",
"log_pw_subject_post" => "Parola",
"log_npw_msg" => "Aveţi aici noua parola pentru autentificare:",
"log_npw_subject_pre" => "Noua dumneavoastră",
"log_npw_subject_post" => "Parola",
"log_npw_sent" => "Noua dumneavoastră parolă a fost trimisă",
"log_registered" => "Înregistrare Corectă - Parola v-a fost trimisă prin email",
"log_not_registered" => "Înregistrarea a eşuat",
"log_un_exists" => "Acest nume de utilizator există deja",
"log_em_exists" => "Această adresă de email există deja",
"log_un_invalid" => "Nume utilizator invalid (nr. minim de caractere - 2. Folosiţi doar caracterele: A-Z, a-z, 0-9, and _-.)  ",
"log_em_invalid" => "Adresă de email incorectă",
"log_un_em_invalid" => "Numele de utilizator / email incorecte",
"log_un_em_pw_invalid" => "Numele de utilizator / email sau parolă incorecte",
"log_no_un_em" => "Introduceţi numele sau adresa de email",
"log_no_un" => "Introduceţi numele",
"log_no_em" => "Introduceţi adresa de email",
"log_no_pw" => "Introduceţi parola",
"log_no_rights" => "Autentificare eşuată: nu aveţi drepturi de vizualizare - Contactaţi administratorul",
"log_send_new_pw" => "trimite parolă nouă",
"log_if_changing" => "Doar dacă se modifică",
"log_no_new_data" => "Nicio modificare",
"log_invalid_new_un" => "Nume utilizator invalid (nr. minim de caractere - 2. Folosiţi doar caracterele: A-Z, a-z, 0-9, and _-.) ",
"log_new_un_exists" => "Numele de Utilizator introdus există deja",
"log_invalid_new_em" => "Adresa de email este incorectă",
"log_new_em_exists" => "Adresa introdusă există deja",
"log_ui_language" => "Limba pentru Interfaţa Utilizator",

//categories.php
"res_list" => "Lista Categoriilor",
"res_edit" => "Editare",
"res_delete" => "Ştergere",
"res_add_new" => "Adăugare Categorie Nouă",
"res_add" => "Adăugare Categorie",
"res_edit_cat" => "Editare Categorie",
"res_back" => "Înapoi",
"res_name" => "Denumire Categorie",
"res_sequence" => "Secvenţă",
"res_in_menu" => "în meniu",
"res_text_color" => "Culoare Text",
"res_background" => "Fundal",
"res_select_color" => "Selecţie Culoare",
"res_save" => "Actualizare Categorie",
"res_added" => "Categorie Adăugată",
"res_updated" => "Categorie Actualizată",
"res_deleted" => "Categorie Ştearsă",
"res_invalid_color" => "Format culoare (#XXXXXX - unde X = valoare HEX)",
"res_not_added" => "Categorie nu a fost Adăugată",
"res_not_updated" => "Categoria nu a fost Actualizată",
"res_not_deleted" => "Categoria nu a fost Ştearsă",
"res_nr" => "#",
"res_repeat" => "Repetare",
"res_every_day" => "în fiecare zi",
"res_every_week" => "în fiecare săptămînă",
"res_every_month" => "în fiecare lună",
"res_every_year" => "în fiecare an",
"res_public" => "Public",

//users.php
"usr_list_of_users" => "Lista Utilizatorilor",
"usr_name" => "Nume Utilizator",
"usr_email" => "Email",
"usr_password" => "Parola",
"usr_rights" => "Drepturi de Acces",
"usr_language" => "Limbă",
"usr_ui_language" => "Limba Interfaţă Utilizator",
"usr_edit_user" => "Editare Profil Utilizator",
"usr_add" => "Adăugare Utilizator",
"usr_edit" => "Editare",
"usr_delete" => "Ştergere",
"usr_none" => "Nici unul",
"usr_view" => "Vizualizare",
"usr_post_own" => "Postări Proprii",
"usr_post_all" => "Toate Postările",
"usr_back" => "Înapoi",
"usr_admin" => "Admin",
"usr_login_0" => "Prima conectare",
"usr_login_1" => "Ultima conectare",
"usr_login_cnt" => "Conectări",
"usr_add_profile" => "Adăugare utilizator",
"usr_upd_profile" => "Actualizare Profil",
"usr_not_found" => "Utilizatorul nu există",
"usr_if_changing_pw" => "Doar dacă se schimbă parola",
"usr_admin_functions" => "Funcţii Administrare",
"usr_no_rights" => "Fără drepturi de acces",
"usr_view_calendar" => "Vizualizare calendar",
"usr_post_events_own" => "Postare + editare evenimente proprii",
"usr_post_events_all" => "Postare + editare toate evenimentele",
"usr_pw_not_updated" => "Parola nu a fost actualizată",
"usr_added" => "Utilizator adăugat",
"usr_updated" => "Profile Utilizatori",
"usr_deleted" => "Utilizator şters",
"usr_not_added" => "Utilizatorul nu a fost adăugat",
"usr_not_updated" => "profilul utilizatorului nu a fost actualizat",
"usr_not_deleted" => "Utilizatorul nu a fost şters",
"usr_cred_required" => "Numele utilizatorului, email-ul şi parola sînt necesare",
"usr_uname_exists" => "Acest nume de utilizator există deja",
"usr_email_exists" => "Această adresă de email există deja",
"usr_un_invalid" => "Nume utilizator invalid (minim \'2\' caractere. Folosiţi doar caracterele: A-Z, a-z, 0-9, and _-.) ",
"usr_em_invalid" => "Adresă de email invalidă",
"usr_cant_delete_yourself" => "Nu vă puteţi şterge propriul cont",
"usr_background" => "Culoare fundal",
"usr_select_color" => "Selectare culoare",
"usr_invalid_color" => "Format culoare invalid (#XXXXXX - X = valoare HEXA)",

//database.php
"mdb_dbm_functions" => "Funcţii pentru Baza de Date",
"mdb_noshow_tables" => "Tabele (din bază) nu pot fi accesate",
"mdb_compact" => "Compactare Bază de Date",
"mdb_compact_table" => "Compactare Tabele",
"mdb_compact_error" => "Eroare",
"mdb_compact_done" => "Gata",
"mdb_purge_done" => "Evenimentele marcate pentru ştergere au fost eliminate definitiv",
"mdb_repair" => "Verificare şi Reparare",
"mdb_check_table" => "Verificare bază",
"mdb_ok" => "OK",
"mdb_nok" => "Eroare",
"mdb_nok_repair" => "Eroare, se încearcă repararea",
"mdb_backup" => "Back-up Bază de Date",
"mdb_backup_table" => "Back-up tabel",
"mdb_backup_done" => "Gata",
"mdb_file_saved" => "Fişier de Back-up salvat.",
"mdb_nume_fişier" => "Nume fişier:",
"mdb_start" => "Start",
"mdb_back" => "Înapoi",
"mdb_no_function_checked" => "Nicio funcţie selectată",
"mdb_write_error" => "Eroare salvare fişier de back-up. <br />Verificaţi drepturile de scriere pentru fişiere în folderul de back-up",

//import/export.php
"iex_file" => "Selecţie Fişier",
"iex_file_name" => "iCal file name",
"iex_file_description" => "Descriere fişier iCal",
"iex_filters" => "Filtru Evenimente",
"iex_upload_ics" => "Import Fişier iCal",
"iex_select_events" => "Selectare evenimente",
"iex_upload_csv" => "Incărcare Fişier CSV",
"iex_upload_file" => "Import Fişier",
"iex_create_file" => "Creare Fişier",
"iex_download_file" => "Descărcare Fişier",
"iex_fields_sep_by" => "Cîmpuri separate prin",
"iex_birthday_res_id" => "ID categorie",
"iex_default_res_id" => "ID categorie implicită",
"iex_if_no_cat" => "dacă nu este gasită nicio categorie",
"iex_import_events_from_date" => "Import evenimente definite pînă la",
"iex_see_insert" => "vezi instrucţiunile în partea dreaptă",
"iex_no_file_name" => "Numele fişierului lipseşte",
"iex_inval_field_sep" => "separator invalid sau lipsă",
"iex_no_begin_tag" => "fişier invalid iCal (lipseşte tag-ul BEGIN)",
"iex_date_format" => "Format dată eveniment",
"iex_time_format" => "Format timp eveniment",
"iex_number_of_errors" => "Numărul erorilor din listă",
"iex_bgnd_highlighted" => "evidenţiere fundal",
"iex_verify_event_list" => "Verificaţi Lista Evenimentelor şi faceţi corecţiile necesare, apoi click",
"iex_add_events" => "Adaugare Evenimente la Baza de Date",
"iex_select_birthday_delete" => "Selectaţi opţiunile Ziua de Naştere şi Ştergere după nevoie",
"iex_select_delete_ignore" => "Selectaţi opţiunea Delete pentru a ignora Evenimentul",
"iex_title" => "Titlu",
"iex_venue" => "Locaţie",
"iex_owner" => "Proprietar",
"iex_resource" => "Categorie",
"iex_date" => "Data",
"iex_end_date" => "Data de sfîrşit",
"iex_start_time" => "Ora de începere",
"iex_end_time" => "Ora de terminare",
"iex_description" => "Descriere",
"iex_birthday" => "data de naştere",
"iex_delete" => "Ştergere",
"iex_events_added" => "evenimente adăugate",
"iex_events_dropped" => "eveniment ignorat (există deja)",
"iex_db_error" => "Eroare în Baza de Date",
"iex_ics_file_error_on_line" => "eroare in fişierul iCal la linia",
"iex_occurring_between" => "apare între",
"iex_changed_between" => "Adăugat/modificat între",
"iex_select_date" => "Selecţie dată",
"iex_all_cats" => "toate categoriile",
"iex_all_users" => "toate utilizatorilor",
"iex_no_events_found" => "Niciun eveniment găsit",
"iex_file_created" => "Fişier creat",
"iex_write error" => "Eroare salvare fişier export. <br />Verificaţi drepturile de scriere pentru fişiere în folderul selectat",
"iex_back" => "Înapoi",

//lcalcron.php
"cro_sum_header" => "SUMAR CRON JOB",
"cro_sum_trailer" => "SFÎRŞIT SUMAR",

//notify.php
"not_sum_title" => "MEMENTO EMAIL",
"not_not_sent_to" => "Memento trimis la",
"not_no_not_dates_due" => "Nicio notificare",
"not_all_day" => "Toate zilele",
"not_mailer" => "mailer",
"not_subject" => "Subjectul",
"not_event_due_in" => "Următorul eveniment este scadent la",
"not_due_in" => "Scadent la",
"not_days" => "zi(zile)",
"not_date_time" => "Dată / oră",
"not_title" => "Titlu",
"not_sender" => "Expeditor",
"not_venue" => "Locaţie",
"not_description" => "Descriere",
"not_resource" => "Categorie",
"not_open_calendar" => "Deschide calendar",

//sendchg.php
"sch_sum_title" => "MODIFICĂRI ÎN CALENDAR",
"sch_nr_changes_last" => "Numărul ultimelor modificări",
"sch_no_changes_last" => "Nicio modificare",
"sch_report_sent_to" => "Raport trimis la",
"sch_no_report_sent" => "Nu a fost trimis niciun raport",
"sch_days" => "zi(le)",

//userchk.php
"usc_sum_title" => "VERIFICARE CONT UTILIZATOR",
"usc_nr_accounts_deleted" => "Numărul de conturi şterse",
"usc_no_accounts_deleted" => "Niciun cont şters",

//explanations
"xpl_manage_db" =>
"<h4>Instrucţiuni de Lucru cu Baza de Date</h4>
<p>În această pagină pot fi selectate următoarele funcţii:</p>
<h5>Verificare şi Reparare</h5>
<p>Această funcţie permite scanarea bazei de date corespunzătoare calendarului pentru depistarea eventualelor erori şi corectarea acestora.</p>
<p>Dacă nu întîlniţi erori în funcţionarea calendarului, utilizarea acestei funcţii o singură dată pe an este suficientă.</p>
<h5>Compactare Bază de Date</h5>
<p>Cînd un utilizator şterge un eveniment, evenimentul este marcat ca 'şters', fără a fi eliminat efectiv din bază.
Utilizarea funcţiei 'Compactare Bază de Date' permite ştergerea permanentă a evenimentelor marcate, cu eliberarea spaţiul ocupat de acestea.</p>
<h5>Backup Bază de Date</h5>
<p>Această funcţie crează un back-up al întregii baze de date (structură tabele şi conţinut) în format .sql.
Fişierul de back-up este salvat în directorul <strong>files/</strong>, numele fişierului fiind de forma: 
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (unde 'yyyymmdd' reprezintă 'an, lună, zi', iar hhmmss = 'ore, minute, secunde'.</p>
<p>Acest fişier de back-up permite re-crearea bazei de date, în cazul unui accident (pierderea bazei de date) spre exemplu, folosind opţiunile de import ale  <strong>phpMyAdmin</strong> (acest pachet software, extrem de util, fiind preinstalat în majoritatea serverelor web actuale).</p>",

"xpl_import_csv" =>
"<h4>Instrucţiuni pentru Import CSV</h4>
<p>Acest formular permite importul de text formatat <strong>CVS (Comma Separated Values)</strong> pentru introducerea de evenimente în Calendar.</p>
<p>Ordinea coloanelor în fişierul CSV trebuie să fie: titlu, locaţie, ID categorie (vezi mai jos), data, data finală, ora de început şi de sfîrşit precum şi descrierea evenimentului. Prima linie din fişierul CSV, (capul de tabel), este ignorată.</p>
<h5>Model Fişier CSV</h5>
<p>Un model de fişier CVS (fişier cu extensia .cvs) poate fi găsit în folderul '<strong>files/</strong>' al distribuţiei LuxCal.</p>
<h5>Formatul pentru dată şi oră</h5>
<p>Formatul selectat pentru dată şi oră trebuie să corespundă formatului folosit în fişierul CVS importat.</p>
<h5>Tabelul Categoriilor</h5>
<p>Calendarul utilizează numere (ID-uri) pentru specificarea categoriilor. ID-urile categoriilor din fişierul CVS trebuie să corespundă cu cele definite în calendar sau pot fi nule.</p>
<p>Spre exemplu, dacă doriţi ca toate evenimentele să fie marcate ca 'important', ID-ul <strong>IMPORTANT</strong> trebuie să fie definit conform ID-ului din listă.</p>
<br />
<p>Pentru calendarul dumneavoastră, pînă acum, au fost definite următoarele categorii:</p>",

"xpl_import_ical" =>
"<h4>Instrucţiuni pentru Import iCalendar </h4>
<p>Acest formular permite importul fişierelor de tipul <strong>iCalendar</strong> pentru introducerea de evenimente in Calendarul LuxCal.</p>
<p>Fişierul trebuie să respecte specificaţiile prevăzute în  standardul [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545</a></u>] al Internet Engineering Task Force.</p>
<p>Vor fi importate doar evenimentele importante; toate celelalte componente iCal components, ca: 'De Făcut', 'Jurnal', 'Liber / 
Ocupat', 'Fus Orar' şi 'Alarme' vor fi ignorate.</p>
<h5>Model de fişier iCal</h5>
<p>Un exemplu de fişier iCalendar (fişier cu extensia .ics) poate fi găsit în folderul '<strong>files/</strong>' al distribuţiei LuxCal.</p>
<h5>Tabelul Categoriilor</h5>
<p>Calendarul utilizează numere (ID-uri) pentru specificarea categoriilor. ID-urile categoriilor din fişierul iCalendar trebuie să corespundă cu cele definite în calendar sau pot fi nule.</p>
<br />
<p>Pentru calendarul dumneavoastră, pînă acum, au fost definite următoarele categorii:</p>",

"xpl_export_ical" =>
"<h4>Exportul fişierelor iCalendar</h4>
<p>Acest formular permite exportul evenimentelor din calendar în formatul <strong>iCalendar</strong>.</p>
<p>Numele fişierului<b>iCal nume fişier</b> (fără extensie) este opţional. Fişierul creat va fi  
salvat în directorul \"files/\" în server cu numele specificat sau dacă nu, cu numele  
implicit \"luxcal\". Extensia fişierului va fi <b>.ics</b>.
Dacă în folderul \"files/\" există deja un fişier cu ecest nume acesta va fi suprascris.
<p>Opţional se poate adăuga şi o descriere a fişierului (ex. 'Activităţi 2011') care va apare în head-erul fişierului iCal exportat.</p>
<p><b>Filtru</b>: Evenimentele exportate pot fi filtrate după:</p>
<ul>
<li>proprietar eveniment</li>
<li>categorie</li>
<li>data de început</li>
<li>data adăugării/modificării</li>
</ul>
<p>Fiecare filtru este opţional, lipsa filtrului însemnînd că vor fi exportate toate evenimentele</p>
<br />
<p>Fişierul exportat respectă specificaţiile prevăzute în  standardul [<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545</a></u>] al Internet Engineering Task Force</p>
<p>Cînd se descarcă fişierul iCal exportat, la numele acestuia va fi adăugat în mod automat data şi ora..</p>
<h5>Exemplu de fişier iCal</h5>
<p>Un exemplu de fişier iCalendar (fişier cu extensia .ics) poate fi găsit în folderul '<strong>files/</strong>' al distribuţiei LuxCal.</p>"
);
?>
