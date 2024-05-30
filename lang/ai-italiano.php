<?php
/*
= LuxCal event calendar admin interface language file =

Tradotto in Italiano da Angelo.G. - per commenti contattare elghisa@gmail.com

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LAI","2.5.3");

/* -- Admin Interface texts -- */

$ax = array(

//settings.php - fieldset headers + general
"set_general_settings" => "Calendario",
"set_opanel_settings" => "Options Panel",
"set_user_settings" => "Utenti",
"set_view_settings" => "Visualizzazione",
"set_dt_settings" => "Data/Ora",
"set_save_settings" => "Salva Impostazioni",
"set_not_valid" => "non valido",
"set_missing" => "mancante",
"set_settings_saved" => "Impostazioni Calendario salvate",
"set_read_error" => "Lettura del file di configurazione non riuscita",
"set_write_error" => "Scrittura del file di configurazione non riuscita. Check permissions of root directory",
"hover_for_details" => "Passare con il mouse sopra le descrizioni per spiegazioni dettagliate",
"enabled" => "abilitato",
"disabled" => "disabilitato",
"no" => "no",
"yes" => "sì",
"or" => "o",
"minutes" => "minutes",
"pixels" => "pixels",
"no_way" => "Non siete autorizzato ad eseguire quest'azione.",

//settings.php - calendar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Titolo del Calendario",
"calendarTitle_text" => "Mostrato nella barra superiore del calendario e usato nelle notifiche via email.",
"calendarUrl_label" => "URL del Calendario",
"calendarUrl_text" => "L\'indirizzo del sito web del Calendario.",
"calendarEmail_label" => "Email del Calendario (mittente)",
"calendarEmail_text" => "L\'indirizzo email del mittente usato nelle notifiche via email.<br />Formato: \'email\' o \'nome&#8249;email&#8250;\'. \'nome\' può essere il nome del calendario.",
"timeZone_label" => "Fuso orario",
"timeZone_text" => "Il fuso orario del calendario, usato per calcolare l\'ora corrente.",
"see" => "vedi",
"view" => "Vedi",
"post_own" => "Crea i propri eventi",
"post_all" => "Crea tutti gli eventi",
"defaultView_label" => "Vista predefinita all'avvio",
"defaultView_text" => "Le viste possibili all\'avvio del calendario sono:<br />- Anno<br />- Mese<br />- Settimana<br />- Giorno<br />- Eventi futuri<br />- Modifiche<br />Scelta consigliata: Mese o Eventi futuri.",
"language_label" => "Lingua predefinita dell'interfaccia utente",
"language_text" => "I file ui-{lingua}.php, ai-{lingua}.php, ug-{lingua}.php e ug-layout.png devono essere presenti nella directory lang/. {lingua} = lingua dell\'interfaccia utente selezionata. I nomi dei file devono essere tutti minuscoli !",
"userMenu_label" => "User filter menu",
"userMenu_text" => "Display the user filter menu in the options panel.<br />This filter can be used to only display events created by one specific user.",
"catMenu_label" => "Resource filter menu",
"catMenu_text" => "Display the event resource filter menu in the options panel.<br />This filter can be used to only display events belonging to a specific event resource.",
"langMenu_label" => "Menu selezione lingua",
"langMenu_text" => "Mostra il menu di selezione della lingua nella barra di navigazione.<br />This menu can be used to select the user interface language.<br />(utile solo se ci sono molte lingue installate)",
"chgEmailList_label" => "Email di destinazione per le modifiche",
"chgEmailList_text" => "Indirizzi email di destinatione che periodicamente ricevono una email con le modifiche al calendario.<br />Gli indirizzi email devono essere separati da punti e virgola.<br />(avviato da un cron job)",
"chgNofDays_label" => "Giorni indietro da controllare per le modifiche",
"chgNofDays_text" => "Numero di giorni passati da controllare per le modifiche al calendario.<br />Se il numero di giorni è impostato a 0 non sarà inviato alcun sommario delle modifiche.<br />(avviato da un cron job)",
"cronSummary_label" => "Admin cron job summary",//
"cronSummary_text" => "Send a cron job summary to the calendar administrator.<br />Enabling is only useful if on your server:<br />- a cron job has been activated<br />- emailing cron job output is enabled (check with your ISP)",//
"oneStepEdit_label" => "One-step event editing",//
"oneStepEdit_text" => "If enabled: clicking an event will directly open the Edit Event window.<br />If disabled: clicking an event will always first open the Event Details window where the Edit button has to be selected to open the Edit Event window.<br />Note: If the user has no rights to edit an event, the Event Details window will open with the Edit button disabled.",//

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Auto registrazione",
"selfReg_text" => "Consente agli utenti di registrarsi e di avere accesso al calendario.",
"selfRegPrivs_label" => "Diritti per chi si registra da solo",
"selfRegPrivs_text" => "Diritti di accesso per gli utenti che si autoregistrano.<br />- vedi: vedi solamente<br />- crea i propri eventi: crea e modifica solo i propri eventi<br />- crea tutti gli eventi: crea e modifica gli eventi propri e quelli degli altri",
"maxNoLogin_label" => "Num. max. di giorni senza aver fatto il log in",
"maxNoLogin_text" => "Se un utente non ha effettuato il log in per un tenmpo pari a questo numero di giorni, il suo account sarà cancellato automaticamente.<br />Se il valore è impostato a 0, gli account utente non saranno mai cancellati.<br />(avviato da un cron job)",
"miniCalPost_label" => "Creazione di eventi nella mini agenda",
"miniCalPost_text" => "Importante solo se si usa la mini agenda!<br />Se abilitato gli utenti possono:<br />- creare nuovi eventi nella mini agenda cliccando la barra superiore di una casella di un giorno<br />- modificare/cancellare eventi cliccando il quadratino che rappresenta l\'evento",

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Start month in Year view",
"yearStart_text" => "If a start month has been specified (1 - 12), in Year view the calendar will always start with this month and the year of this first month will only change as of the first day of the same month in the next year.<br />The value 0 has a special meaning: the start month is based on the current date and will fall in the first row of months.",
"colsToShow_label" => "Colonne da mostrare nella vista Anno",
"colsToShow_text" => "Numero di mesi da mostrare in ciascuna riga nella vista Anno.<br />Scelta consigliata: 3 o 4.",
"rowsToShow_label" => "Righe da mostrare nella vista Anno",
"rowsToShow_text" => "Numero di righe da quattro mesi ciascuna da mostrare nella vista Anno.<br />Scelta consigliata: 4, che consente di vedere assieme 16 mesi.",
"weeksToShow_label" => "Settimane da mostrare nella vista Mese",
"weeksToShow_text" => "Numero di settimane da mostrare nella vista Mese.<br />Scelta consigliata: 10, che consente di avere sotto mano 2,5 mesi.<br />Il valore 0 ha un significato particolare: mostra esattamente 1 mese.",
"upcomingDays_label" => "Giorni da guardare avanti",
"upcomingDays_text" => "Numero di giorni futuri da considerare per gli eventi futuri nella vista Eventi futuri and in the RSS feeds.",
"startHour_label" => "Ora d'inizio per le viste Giorno/Settimana",
"startHour_text" => "L\'ora d\'inizio in cui considerare l\'inizio degli eventi giornalieri.<br />L\'impostazione di questo valore, per es., a 6, consente di non sprecare spazio nelle viste Giorno/Settimana per i periodi di riposo tra mezzanotte e le 6 del mattino.",
"dwTimeSlot_label" => "Time slot in Day/Week view",
"dwTimeSlot_text" => "Day/Week view time slot in number of minutes.<br />This value, together with the Start hour (see above) will determine the number of rows in Day/Week view.",
"dwTsHeight_label" => "Time slot height",
"dwTsHeight_text" => "Day/Week view time slot display height in number of pixels.",
"weekNumber_label" => "Mostra il numero delle settimane",
"weekNumber_text" => "La visualizzazione dei numeri delle settimane nelle viste Anno, Mese e Settimana può essere attivata o no",
"showOwner_label" => "Mostra il proprietario degli eventi",
"showOwner_text" => "Se attivato, il proprietario (creatore) di un evento sarà visualizzato:<br />- nelle caselle a comparsa nelle varie viste<br />- Nella vista Eventi futuri<br />- Nella vista Modifiche<br />- nei feed rss<br />- nelle notifiche via email.",
"showCatName_label" => "Show resource name",//
"showCatName_text" => "If switched on, in various views, apart from displaying the event description in the event resource color, the resource name will also be displayed.",//
"showLinkInMV_label" => "Show links in month view",//
"showLinkInMV_text" => "If switched on, URLs in the event description will be displayed as hyperlink in month view (when an event is clicked, URLs will always be displayed as hyperlink in the Event window)",//
"eventColor_label" => "Event colors based on",
"eventColor_text" => "Events in the various calendar views can displayed in the color assigned to the user who created the event or the color of the event resource.",
"owner_color" => "owner color",
"res_color" => "resource color",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formato data dell\'evento",
"dateFormat_text" => "Formato della data per gli eventi nelle viste del calendario e nei campi d\'immissione.",
"dateUSorEU_label" => "Formato data/ora del calendario",
"dateUSorEU_text" => "Formato della data e dell\'ora nelle intestazioni delle viste del calendario.",
"dateSep_label" => "Separatore data",
"dateSep_text" => "Separatore della data nelle viste del calendario e nei campi d\'immissione.",
"time24_label" => "Formato ora (12 o 24 ore)",
"time24_text" => "Formato dell\'ora nelle viste del calendario e nei campi d\'immissione.",
"weekStart_label" => "Primo giorno della settimana",
"weekStart_text" => "Primo giorno della settimana.",
"date_format_us" => "Lunedì, Maggio 15, 2010 (US)",
"date_format_eu" => "Lunedì 15 Maggio 2010",
"dot" => "punto",
"slash" => "barra",
"hyphen" => "lineetta",
"time_format_us" => "12-ore AM/PM",
"time_format_eu" => "24-ore",
"sunday" => "Domenica",
"monday" => "Lunedì",
"time_zones" => "FUSI ORARI",
"dd_mm_yyyy" => "gg-mm-aaaa",
"mm_dd_yyyy" => "mm-gg-aaaa",
"yyyy_mm_dd" => "aaaa-mm-gg",

//login.php
"log_log_in" => "Log In",
"log_remember_me" => "Ricordami",
"log_register" => "Registrazione",
"log_change_my_data" => "Modifica i dati",
"log_change" => "Modifica",
"log_back" => "Indietro",
"log_un_or_em" => "Nome Utente o Indirizzo e-mail",
"log_un" => "Nome utente",
"log_em" => "Email",
"log_pw" => "Password",
"log_new_un" => "Nuovo Nome Utente",
"log_new_em" => "Nuovo indirizzo email",
"log_new_pw" => "Nuova password",
"log_pw_msg" => "Questa e' la password per fare il login in:",
"log_pw_subject_pre" => "La",
"log_pw_subject_post" => "Password",
"log_npw_msg" => "Questa e' la nuova password per fare il login in:",
"log_npw_subject_pre" => "La nuova",
"log_npw_subject_post" => "Password",
"log_npw_sent" => "La nuova password è stata inviata.",
"log_registered" => "Registrazione avvenuta - La password è stata inviata per email",
"log_not_registered" => "Registrazione fallita",
"log_un_exists" => "Il nome utente esiste già",
"log_em_exists" => "L'indirizzo email esiste già",
"log_un_invalid" => "Nome utente non valido (lunghezza min 2: A-Z, a-z, 0-9, e _-.) ",
"log_em_invalid" => "Indirizzo email non valido",
"log_un_em_invalid" => "Il nome utente/email non è valido",
"log_un_em_pw_invalid" => "Il nome utente/email o password non è corretto",
"log_no_un_em" => "Non è stato inserito il nome utente/email",
"log_no_un" => "Inserire il nome utente",
"log_no_em" => "Inserire l'indirizzo email",
"log_no_pw" => "Non è stata inserita la password",
"log_no_rights" => "Login rejected: you have no view rights - Contact the administrator",//
"log_send_new_pw" => "Invia una nuova password",
"log_if_changing" => "Solo se cambia",
"log_no_new_data" => "Nessun dato da modificare",
"log_invalid_new_un" => "Nuovo nome utente non valido (lunghezza min 2: A-Z, a-z, 0-9, e _-.) ",
"log_new_un_exists" => "Il nuovo nome utente esiste già",
"log_invalid_new_em" => "Il nuovo indirizzo email non è valido",
"log_new_em_exists" => "Il nuovo indirizzo email esiste già",
"log_ui_language" => "Lingua dell'interfaccia utente",

//categories.php
"res_list" => "Elenco delle Categorie",
"res_edit" => "Modifica",
"res_delete" => "Elimina",
"res_add_new" => "Aggiungi una nuova categoria",
"res_add" => "Aggiungi",
"res_edit_cat" => "Modifica categoria",
"res_back" => "Indietro",
"res_name" => "Nome categoria",
"res_sequence" => "Sequenza",
"res_in_menu" => "nel menu",
"res_text_color" => "Colore del testo",
"res_background" => "Colore di fondo",
"res_select_color" => "Selezione colore",
"res_save" => "Aggiorna",
"res_added" => "Categoria aggiunta",
"res_updated" => "Categoria aggiornata",
"res_deleted" => "Categoria eliminata",
"res_invalid_color" => "Formato colore non valido (#XXXXXX - X = HEX-value)",
"res_not_added" => "Categoria non aggiunta",
"res_not_updated" => "Categoria non aggiornata",
"res_not_deleted" => "Categoria non eliminata",
"res_nr" => "n.",
"res_repeat" => "Ripeti",
"res_every_day" => "ogni giorno",
"res_every_week" => "ogni settimana",
"res_every_month" => "ogni mese",
"res_every_year" => "ogni anno",
"res_public" => "Pubblico",

//users.php
"usr_list_of_users" => "Elenco Utenti",
"usr_name" => "Nome Utente",
"usr_email" => "Indirizzo email",
"usr_password" => "Password",
"usr_rights" => "Diritti",
"usr_language" => "Lingua",
"usr_ui_language" => "Lingua dell'interfaccia utente",
"usr_edit_user" => "Modifica profilo utente",
"usr_add" => "Aggiungi un nuovo utente",
"usr_edit" => "Modifica",
"usr_delete" => "Elimina",
"usr_none" => "Nessuno",
"usr_view" => "Vedi",
"usr_post_own" => "Crea solo i propri eventi",
"usr_post_all" => "Crea eventi di tutti",
"usr_back" => "Indietro",
"usr_admin" => "Amministratore",
"usr_login_0" => "Primo login",
"usr_login_1" => "Ultimo login",
"usr_login_cnt" => "N. di Login",
"usr_add_profile" => "Aggiungi profilo",
"usr_upd_profile" => "Aggiorna profilo",
"usr_not_found" => "Utente non trovato",
"usr_if_changing_pw" => "Solo se si cambia la password",
"usr_admin_functions" => "Funzioni d'amministrazione",
"usr_no_rights" => "Nessun diritto di accesso",
"usr_view_calendar" => "Vedi il calendario",
"usr_post_events_own" => "Crea + Modifica i propri eventi",
"usr_post_events_all" => "Crea + Modifica tutti gli eventi",
"usr_pw_not_updated" => "Password non aggiornata",
"usr_added" => "Utente aggiunto",
"usr_updated" => "Profilo utente aggiornato",
"usr_deleted" => "Utente eliminato",
"usr_not_added" => "Utente non aggiunto",
"usr_not_updated" => "Utente non modificato",
"usr_not_deleted" => "Utente non eliminato",
"usr_cred_required" => "Sono richiesti il nome utente, indirizzo email e password",
"usr_uname_exists" => "Nome utente esistente",
"usr_email_exists" => "Indirizzo email esistente",
"usr_un_invalid" => "Nome utente non valido (lunghezza min. 2: A-Z, a-z, 0-9, e _-.) ",
"usr_em_invalid" => "Indirizzo email non valido",
"usr_cant_delete_yourself" => "Impossibile eliminare sè stessi",
"usr_background" => "Background color",
"usr_select_color" => "Select Color",
"usr_invalid_color" => "Color format invalid (#XXXXXX - X = HEX-value)",

//database.php
"mdb_dbm_functions" => "Funzioni del Database",
"mdb_noshow_tables" => "Impossibile aprire le tabelle",
"mdb_compact" => "Compatta il database",
"mdb_compact_table" => "Compatta le tabelle",
"mdb_compact_error" => "Errore",
"mdb_compact_done" => "Fatto",
"mdb_purge_done" => "Eventi cancellati eliminati definitivamente",
"mdb_repair" => "Verifica e ripara il database",
"mdb_check_table" => "Check table",
"mdb_ok" => "OK",
"mdb_nok" => "Not OK",
"mdb_nok_repair" => "Not OK, repair started",
"mdb_backup" => "Backup del database",
"mdb_backup_table" => "Backup della tabella",
"mdb_backup_done" => "Fatto",
"mdb_file_saved" => "File di backup salvato.",
"mdb_file_name" => "Nome file:",
"mdb_start" => "Avvio",
"mdb_back" => "Indietro",
"mdb_no_function_checked" => "Nessuna funzione selezionata",
"mdb_write_error" => "Writing backup file failed<br />Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "File selezionato",
"iex_file_name" => "iCal file name",
"iex_file_description" => "Descrizione file iCal",
"iex_filters" => "Event Filters",
"iex_upload_ics" => "Upload del file iCal",
"iex_select_events" => "Selezione eventi",
"iex_upload_csv" => "Upload file CSV",
"iex_upload_file" => "Upload File",
"iex_create_file" => "Crea File",
"iex_download_file" => "Download File",
"iex_fields_sep_by" => "Campi separati da",
"iex_birthday_res_id" => "ID della categoria Compleanni",
"iex_default_res_id" => "ID categoria predefinita",
"iex_if_no_cat" => "se non si trova alcuna categoria",
"iex_import_events_from_date" => "Importare gli eventi in agenda a partire dal",
"iex_see_insert" => "vedi istruzioni a destra",
"iex_no_file_name" => "Manca il nome del file",
"iex_inval_field_sep" => "separatore campi mancante o non valido",
"iex_no_begin_tag" => "file iCal non valido (manca BEGIN-tag)",
"iex_date_format" => "Formato data evento",
"iex_time_format" => "Formato ora evento",
"iex_number_of_errors" => "Numero di errori nell'elenco",
"iex_bgnd_highlighted" => "sfondo evidenziato",
"iex_verify_event_list" => "Verificare l'elenco eventi, correggere gli errori e cliccare",
"iex_add_events" => "Aggiungi Eventi al Database",
"iex_select_birthday_delete" => "Selezionare Compleanno e le caselle Elimina come si desidera",
"iex_select_delete_ignore" => "Selezionare le caselle Elimina per ignorare l'evento",
"iex_title" => "Titolo",
"iex_venue" => "Sede",
"iex_owner" => "Owner",
"iex_resource" => "Categoria",
"iex_date" => "Data",
"iex_end_date" => "Data fine",
"iex_start_time" => "Ora inizio",
"iex_end_time" => "Ora fine",
"iex_description" => "Descrizione",
"iex_birthday" => "Compleanno",
"iex_delete" => "Elimina",
"iex_events_added" => "eventi aggiunti",
"iex_events_dropped" => "eventi ignorati (già presenti)",
"iex_db_error" => "Errore database",
"iex_ics_file_error_on_line" => "Errore file iCal alla riga",
"iex_occuring_between" => "In agenda tra le date",
"iex_changed_between" => "Aggiunti/modificati tra",
"iex_select_date" => "Selezione data",
"iex_all_cats" => "tutte le categorie",
"iex_all_users" => "tutte le users",
"iex_no_events_found" => "Nessun evento trovato",
"iex_file_created" => "File creato",
"iex_write error" => "Writing export file failed<br />Check permissions of 'files/' directory",
"iex_back" => "Indietro",

//lcalcron.php
"cro_sum_header" => "CRON JOB SUMMARY",
"cro_sum_trailer" => "END OF SUMMARY",

//notify.php
"not_sum_title" => "EMAIL REMINDERS",
"not_not_sent_to" => "Reminders sent to",
"not_no_not_dates_due" => "No notification dates due",
"not_all_day" => "Tutto il giorno",
"not_mailer" => "mailer",
"not_subject" => "Oggetto",
"not_event_due_in" => "L'evento seguente e' previsto tra ",
"not_due_in" => "e' previsto tra ",
"not_days" => "giorno(i)",
"not_date_time" => "Data / ora",
"not_title" => "Titolo",
"not_sender" => "Mittente",
"not_venue" => "Sede",
"not_description" => "Descrizione",
"not_resource" => "Categoria",
"not_open_calendar" => "Apri il calendario",

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
"<h4>Istruzioni per la Gestione del Database</h4>
<p>In questa pagina è possibile selezionare le seguenti funzioni:</p>
<h5>Compatta il database</h5>
<p>Quando un utente cancella un evento, l'evento è segnato come 'cancellato', ma 
non è rimosso dal database. La funzione Compatta il database elimina fisicamente 
questi eventi cancellati e libera lo spazio occupato dall'evento.</p>
<h5>Verifica e ripara il database</h5>
<p>Questa funzione esegue una scansione del database del calendario e controlla eventuali incoerenze.</p>
<p>Le incoerenze saranno poi riparate, se possibile.</p>
<p>Se non ci sono particolari problemi nelle viste del calendario, è sufficiente lanciare queste 
funzioni una volta all'anno.</p>
<h5>Backup del database</h5>
<p>Questa funzione crea un backup completo del database del calendario (tabelle 
struttura e contenuti) in formato .sql. Il backup sarà salvato nella cartella 
<strong>/files</strong> con il nome:</p> 
<p><kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (dove 'yyyymmdd' = anno, mese e 
giorno, e hhmmss = ora, minuti e secondi.</p>
<p>Questo file di backup si può usare per ri-creare le tabelle, la struttuta e i dati del 
database, per esempio importando il file tramite <strong>phpMyAdmin</strong>, 
strumento disponibile sulla maggior parte dei server web.</p>",

"xpl_import_csv" =>
"<h4>Istruzioni per l'Import dei file CSV</h4>
<p>Si usa questo modulo per importare nel Calendario Luxcal un file di testo 
<strong>Comma Separated Values (CSV)</strong> con i dati di eventi.</p>
<p>L'ordine delle colonne nel file CSV deve essere: titolo, sede, id categoria (vedi 
poi), data inizio, data fine, ora inizio, ora fine e descrizione. La prima riga del file CSV, 
usata per la descrizione delle colonne, &egrave; ignorata.</p>
<h5>File CSV di esempio</h5>
<p>File CSV d'esempio si possono trovare nella subdirectory '/files' della propria 
installazione di LuxCal.</p>
<h5>Formato data e ora</h5>
<p>Il formato data e ora dell'evento a sinistra deve corrispondere al 
formato della data e ora del file CSV di cui si sta facendo l'upload.</p>
<h5>Tabella delle Categorie</h5>
<p>Il calendario usa dei numeri ID per specificare le categorie. Gli ID delle categorie nel file CSV 
devono corrispondere alle categorie usate nel proprio calendario o essere vuoti.</p>
<p>Se in seguito si vogliono rimarcare degli eventi come 'compleanno', l'<strong>ID della categoria 
Compleanno</strong> deve essere impostato al corrispondente ID nell'elenco delle categorie seguente.</p>
<br />
<p>Nel calendario attuale, sono state definite le seguenti categorie:</p>",

"xpl_import_ical" =>
"<h4>Istruzioni per l'Import di file iCalendar</h4>
<p>Si usa questo modulo per importare nel Calendario Luxcal un file <strong>iCalendar</strong> 
con i dati degli eventi.</p>
<p>I contentuti del file devono soddisfare gli standard [<u><a href='http://tools.ietf.org/html/rfc5545' 
target='_blank'>RFC5545 </a></u>] dell'Internet Engineering Task Force.</p>
<p>Saranno importati solo gli eventi; altri componenti iCal, come: To-Do, Journal, Free / 
Busy, Time zone e Alarm, saranni ignorati.</p>
<h5>Esempi di file iCal</h5>
<p>Esempi di file iCalendar (estensione .ics) si possono trovare nella subdirectory '/files' 
della propria installazione di LuxCal.</p>
<h5>Tabella delle Categorie</h5>
<p>Il calendario usa dei numeri ID per specificare le categorie. Gli ID delle categorie nel file 
iCalendar devono corrispondere alle categorie usate nel proprio calendario 
o essere vuoti.</p>
<br />
<p>Nel calendario attuale, sono state definite le seguenti categorie:</p>",

"xpl_export_ical" =>
"<h4>Istruzioni per l'esportazione di file iCalendar</h4>
<p>Si usa questo modulo per estrarre ed esportare un file di eventi <strong>iCalendar</strong> dal 
Calendario LuxCal.</p>
<p>The <b>iCal file name</b> (without extension) is optional. Created files will 
be stored in the \"files/\" directory on the server with the specified file name, 
or otherwise with the name \"luxcal\". The file extension will be <b>.ics</b>.
Existing files in the \"files/\" directory on the server with the same name will 
be overwritten by the new file.
<p>La <b>descrizione del file iCal</b> (per es. 'Meetings 2011') &egrave; opzionale. Se viene inserita, 
essa viene aggiunta all'intestazione del file iCal esportato.</p>
<p><b>Filtri</b>: Gli eventi da estrarre possono essere filtrati per:</p>
<ul>
<li>event owner</li>
<li>categoria evento</li>
<li>data inizio evento</li>
<li>data aggiunta/ultima modifica evento</li>
</ul>
<p>I filtri sono opzionali. Una campo data vuoto significa: nessun limite</p>
<br />
<p>Il contenuto del file con gli eventi estratti sar&agrave; conforme allo standard
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545</a></u>] 
dell'Internet Engineering Task Force.</p>
<p>When <b>downloading</b> the exported iCal file, the date and time will be 
added to the name of the downloaded file.</p>
<h5>Esempi di file iCal</h5>
<p>Esempi di file iCalendar (estensinoe .ics) si possono trovare nella subdirectory '/files' 
della propria installazione di LuxCal.</p>"
);
?>
