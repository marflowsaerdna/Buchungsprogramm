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

//settings.php - En-tête de paragraphe + general
"set_general_settings" => "Calendrier",
"set_opanel_settings" => "Options Panel",
"set_user_settings" => "Utilisateurs",
"set_view_settings" => "Vues",
"set_dt_settings" => "Dates et Heures",
"set_save_settings" => "Sauver les paramètres",
"set_not_valid" => "Non valide",
"set_missing" => "Manquant",
"set_settings_saved" => "Sauvegarde effectuée",
"set_read_error" => "Lecture du fichier config.php impossible",
"set_write_error" => "Ecriture dans le fichier config.php impossible. Check permissions of root directory",
"hover_for_details" => "Curseur sur le texte pour descriptions complètes",
"enabled" => "actif",
"disabled" => "inactif",
"no" => "non",
"yes" => "oui",
"or" => "ou",
"minutes" => "minutes",
"pixels" => "pixels",
"no_way" => "Vous n'avez pas les droits d'accès pour effectuer cette commande",

//settings.php - Paramètres du calendrier. Faire précédé d'un backslash (ex: \'), l'apostrophe de tout mot traduit dans chaque ligne ayant "....._text"
"calendarTitle_label" => "Titre du Calendrier",
"calendarTitle_text" => "Affiche le nom du calendrier au dessus de la page et l\'utilise dans les notifications d\'email.",
"calendarUrl_label" => "URL du calendrier",
"calendarUrl_text" => "Adresse du calendrier de votre site Web. Ex : http://www.monsite.com/LuCal/.",
"calendarEmail_label" => "Adresse email du Calendrier",
"calendarEmail_text" => "Cette adresse email est utilisée dans le champ de notification d\'emails.<br />Format: \'adresse mail\' ou \'nom&#8249;adresse mail&#8250;\'. \'nom\' peut être le nom du calendrier.",
"timeZone_label" => "Fuseau horaire",
"timeZone_text" => "Fuseau horaire du calendrier, utilisé pour calculer l\'heure.",
"see" => "voir",
"view" => "voir",
"post_own" => 'ajouter/éditer',
"post_all" => 'ajouter/éditer tout',
"defaultView_label" => "Vue par défaut au démarrage",
"defaultView_text" => "Choix possible:<br />- Année<br />- Mois<br />- Semaine<br />- Jour<br />- Prochain(s) événement(s)<br />- Modifications<br />Choix recommandé: Mois ou Prochain(s) événement(s).",
"language_label" => "Language par défaut",
"language_text" => "Les fichiers ai-{language}.php, ui-{language}.php, ug-{language}.php et ug-layout.png doivent être présents dans le répertoire lang/.  {language} = nom du language à utiliser. Les noms de fichier doivent être en minuscules !",
"userMenu_label" => "User filter menu",
"userMenu_text" => "Display the user filter menu in the options panel.<br />This filter can be used to only display events created by one specific user.",
"catMenu_label" => "Resource filter menu",
"catMenu_text" => "Display the event resource filter menu in the options panel.<br />This filter can be used to only display events belonging to a specific event resource.",
"langMenu_label" => "Sélection du language",
"langMenu_text" => "Affiche le menu de sélection du language dans la barre de navigation.<br />This menu can be used to select the user interface language.<br />(seulement utile si plusieurs languages sont installés)",
"chgEmailList_label" => "Adresse email pour les modifications",
"chgEmailList_text" => "Adresse email pour recevoir les modifications faites aux événements.<br />Séparer les adresses email par des points-virgules.<br />(démarré par un cron job)",
"chgNofDays_label" => "Jours précédents pour les modifications",
"chgNofDays_text" => "Nombre de jours précédents à afficher pour les événements modifiés.<br />Si la valeur est à 0, aucun e-mail reprenantles modifications ne sera envoyé.<br />(démarré par un cron job)",
"cronSummary_label" => "Admin cron job summary",//
"cronSummary_text" => "Send a cron job summary to the calendar administrator.<br />Enabling is only useful if on your server:<br />- a cron job has been activated<br />- emailing cron job output is enabled (check with your ISP)",//
"oneStepEdit_label" => "One-step event editing",//
"oneStepEdit_text" => "If enabled: clicking an event will directly open the Edit Event window.<br />If disabled: clicking an event will always first open the Event Details window where the Edit button has to be selected to open the Edit Event window.<br />Note: If the user has no rights to edit an event, the Event Details window will open with the Edit button disabled.",//

//settings.php - Paramètres des comptes utilisateurs. Faire précédé d'un backslash (ex: \'), l'apostrophe de tout mot traduit dans chaque ligne ayant "....._text"
"selfReg_label" => "S'enregistrer soi-même",
"selfReg_text" => "Permet aux utilisateurs de s\'enregistrer eux-mêmes et d\'accéder au calendrier.",
"selfRegPrivs_label" => "Droits enregistrement soi-même",
"selfRegPrivs_text" => "Droits d\'accès au calendrier pour l\'enregistrement des utilisateurs par eux-mêmes.<br />- Voir: Seulement consulter<br />- Ajouter/Editer: Ajouter/Editer ses événements<br />- Ajouter/Editer tout: Ajouter/Editer tous les événements",
"maxNoLogin_label" => "Nombre de jour max. entre 2 connexions",
"maxNoLogin_text" => "Si un utilisateur ne s\'est pas connecté dans l\'intervalle du nombre de jour, le compte de l\'utilisateur est automatiquement supprimé sauf si la valeur est à 0.",
"miniCalPost_label" => "Ajouter dans le mini calendrier",
"miniCalPost_text" => "Seulement si le mini calendrier est utilisé!<br />Si vous choisissez actif, l\'utilisateur peut:<br />- ajouter un nouvel événement en cliquant sur le jour du calendrier<br />- éditer/supprimer un événement en cliquant sur l\'événement",

//settings.php - Paramètres des vues. Faire précédé d'un backslash (ex: \'), l'apostrophe de tout mot traduit dans chaque ligne ayant "....._text"
"yearStart_label" => "Start month in Year view",
"yearStart_text" => "If a start month has been specified (1 - 12), in Year view the calendar will always start with this month and the year of this first month will only change as of the first day of the same month in the next year.<br />The value 0 has a special meaning: the start month is based on the current date and will fall in the first row of months.",
"colsToShow_label" => "Colonnes affichées dans la vue Année",
"colsToShow_text" => "Nombre de mois affiché dans chaque rangée dans la vue Année.<br />Choix recommandé: 3 ou 4.",
"rowsToShow_label" => "Rangées affichées dans la vue Année",
"rowsToShow_text" => "Nombre de rangée de 4 mois affichée sur une année.<br />Choix recommandé: 4, ce qui permet d\'afficher 16 mois d\'affiler.",
"weeksToShow_label" => "Semaines affichées dans la vue Mois",
"weeksToShow_text" => "Nombre de semaine affichée par mois.<br />Choix recommandé: 10, qui affiche 2 mois 1/2.<br />La valeur 0 affiche le mois entier.",
"upcomingDays_label" => "Jours affichés des prochains événements",
"upcomingDays_text" => "Nombre de jour à afficher dans la vue Prochain(s) événement(s) et dans les RSS feeds.",
"startHour_label" => "Heure de début dans les vues Jour et Semaine",
"startHour_text" => "Choix de l\'heure du début d\'une journée d\'événement.<br />La valeur par défaut est 6 pour un début de journée à 6h, ce qui évite de gaspiller l\'espace reprenant les heures de la nuit.",
"dwTimeSlot_label" => "Tranche horaire dans les vues Jour et Semaine",
"dwTimeSlot_text" => "Nombre de minutes dans la tranche horaire pour les vues Jour et Semaine. Cette valeur, ainsi que l\'heure de début (voir ci-dessus) déterminera le nombre de lignes affiché dans les vues Jour et Semaine.",
"dwTsHeight_label" => "Hauteur de ligne de la tranche horaire",
"dwTsHeight_text" => "Hauteur d\'affichage de la tranche horaire dans les vues Jour et Semaine en pixels.",
"weekNumber_label" => "Afficher les n° des semaines",
"weekNumber_text" => "Permet d\'afficher ou non les numéros des semaines dans les vues Année, Mois et Semaine",
"showOwner_label" => "Afficher le propriétaire de l'événement",
"showOwner_text" => "Si le choix est oui, le propriétaire (créateur) de l\'événement est affiché dans l\'info bulle des différents événements des vues : <br />- dans la vue Prochain(s) événements<br />- la vue Modifications <br />- rss feeds<br />- les notifications des e-mail.",
"showCatName_label" => "Afficher le nom des catégories",
"showCatName_text" => "Si le choix est oui, le nom de la catégorie est affiché en plus de la couleur dans la description des événements dans les différentes vues.",
"showLinkInMV_label" => "Afficher le lien URL dans la vue Mois",
"showLinkInMV_text" => "Si le choix est oui, le lien URL écrit dans la description de l\'événement est affiché dans la vue Mois (lorsque l\'événement est sélectionné, le lien URL apparaitera toujours dans la fenêtre de l\'événement)",
"eventColor_label" => "Event colors based on",
"eventColor_text" => "Events in the various calendar views can displayed in the color assigned to the user who created the event or the color of the event resource.",
"owner_color" => "owner color",
"res_color" => "resource color",

//settings.php - Paramètres des dates/heures. Faire précédé d'un backslash (ex: \'), l'apostrophe de tout mot traduit dans chaque ligne ayant "....._text"
"dateFormat_label" => "Format de date pour événement",
"dateFormat_text" => "Format de l\'affichage des dates dans les vues du calendrier et dans les champs dates.",
"dateUSorEU_label" => "Format de date/heure du calendrier",
"dateUSorEU_text" => "Format utilisé pour l\'en-tête et les vues du calendrier.",
"dateSep_label" => "Séparateur de date",
"dateSep_text" => "Type de séparateur pour l\'affichage des dates dans les vues du calendrier et dans les champs dates.",
"time24_label" => "Format de l'heure (12 ou 24 heures)",
"time24_text" => "Format de l\'heure dans les les vues du calendrier et dans les champs heures.",
"weekStart_label" => "Premier jour de la semaine",
"weekStart_text" => "Jour qui débute la semaine.",
"date_format_us" => "Lundi, Mai 15, 2010 (US)",
"date_format_eu" => "Lundi 15 Mai 2010",
"dot" => "point",
"slash" => "diviser",
"hyphen" => "tiret",
"time_format_us" => "12 heures AM/PM",
"time_format_eu" => "24 heures",
"sunday" => "Dimanche",
"monday" => "Lundi",
"time_zones" => "FUSEAUX HORAIRES",
"dd_mm_yyyy" => "jj-mm-aaaa",
"mm_dd_yyyy" => "mm-jj-aaaa",
"yyyy_mm_dd" => "aaaa-mm-jj",

//login.php
"log_log_in" => "Connexion",
"log_remember_me" => "Remember me",
"log_register" => "S'enregistrer",
"log_change_my_data" => "Modifier mes données",
"log_change" => "Modifier",
"log_back" => "Retour",
"log_un_or_em" => "Nom d’utilisateur ou adresse email",
"log_un" => "Nom d’utilisateur",
"log_em" => "Adresse email",
"log_pw" => "Mot de passe",
"log_new_un" => "Nouveau nom d’utilisateur",
"log_new_em" => "Nouveau email",
"log_new_pw" => "Nouveau mot de passe",
"log_pw_msg" => "Voici le mot de passe pour se connecter à:",
"log_pw_subject_pre" => "Votre",
"log_pw_subject_post" => "mot de passe",
"log_npw_msg" => "Voici votre nouveau mot de passe pour vous connecter à:",
"log_npw_subject_pre" => "Votre nouveau",
"log_npw_subject_post" => "mot de passe",
"log_npw_sent" => "Votre nouveau mot de passe a été envoyé",
"log_registered" => "Enregistrement réussi - Votre mot de passe a été envoyé par email",
"log_not_registered" => "Enregistrement non réussi",
"log_un_exists" => "Nom d’utilisateur existe déjà",
"log_em_exists" => "Adresse email existe déjà",
"log_un_invalid" => "Nom d’utilisateur non valide (min 2 caractères : A-Z, a-z, 0-9, and _-.) ",
"log_em_invalid" => "Adresse email non valide",
"log_un_em_invalid" => "Nom d’utilisateur/adresse email non valide",
"log_un_em_pw_invalid" => "Nom d'utilisateur/adresse email ou mot de passe non valide",
"log_no_un_em" => "Entrez votre nom d'utilisateur/adresse email",
"log_no_un" => "Entrez votre nom d'utilisateur",
"log_no_em" => "Entrez votre adresse email",
"log_no_pw" => "Entrez votre mot de passe",
"log_no_rights" => "Nom d'utilisateur rejeté : Vous n'avez pas les droits d'accès - Contacter l'Adminitrateur.",
"log_send_new_pw" => "Envoyer nouveau mot de passe",
"log_if_changing" => "Uniquement en cas de modification",
"log_no_new_data" => "Aucunes données à modifier",
"log_invalid_new_un" => "Nouveau nom d'utilisateur non valide (min 2 caractères : A-Z, a-z, 0-9, and _-.) ",
"log_new_un_exists" => "Nouveau nom d'utilisateur existe déjà",
"log_invalid_new_em" => "Nouvelle adresse email non valide",
"log_new_em_exists" => "Nouvelle adresse email existe déjà",
"log_ui_language" => "Interface langue de l'utilisateur",

//categories.php
"res_list" => "Liste des Catégories",
"res_edit" => "Editer",
"res_delete" => "Supprimer",
"res_add_new" => "Ajouter une nouvelle catégorie",
"res_add" => "Ajouter",
"res_edit_cat" => "Editer la catégorie ",
"res_back" => "Retour",
"res_name" => "Nom de la catégorie",
"res_sequence" => "Ordre d'affichage",
"res_in_menu" => "dans le menu",
"res_text_color" => "Couleur du texte",
"res_background" => "Couleur du fond",
"res_select_color" => "Choix de la couleur",
"res_save" => "Sauver les modifications",
"res_added" => "Ajouter",
"res_updated" => "Sauvegarde effectuée",
"res_deleted" => "Supprimer",
"res_invalid_color" => "Format de couleur non valide (#XXXXXX - X=valeur-HEX)",
"res_not_added" => "Ajout annulé",
"res_not_updated" => "Sauvegarde annulée",
"res_not_deleted" => "Suppression annulée",
"res_nr" => "#",
"res_repeat" => "Périodicité",
"res_every_day" => "chaque jour",
"res_every_week" => "chaque semaine",
"res_every_month" => "chaque mois",
"res_every_year" => "chaque année",
"res_public" => "Public",

//users.php
"usr_list_of_users" => "Liste des utilisateurs",
"usr_name" => "Nom d'utilisateur",
"usr_email" => "Adresse email",
"usr_password" => "Mot de passe",
"usr_rights" => "Droits",
"usr_language" => "Langue",
"usr_ui_language" => "Interface langue de l'utilisateur",
"usr_edit_user" => "Edition du profil",
"usr_add" => "Ajout nouvel utilisateur",
"usr_edit" => "Editer",
"usr_delete" => "Supprimer",
"usr_none" => "Aucun",
"usr_view" => "Voir",
"usr_post_own" => "Ajout/Editer",
"usr_post_all" => "Ajout/Editer Tous",
"usr_back" => "Retour",
"usr_admin" => "Admin",
"usr_login_0" => "Premier login",
"usr_login_1" => "Dernier login",
"usr_login_cnt" => "Logins",
"usr_add_profile" => "Ajouter",
"usr_upd_profile" => "Sauver le profil",
"usr_not_found" => "Utilisateur non trouvé",
"usr_if_changing_pw" => "A utiliser seulement si vous voulez changer de mot de passe",
"usr_admin_functions" => "Fonctions d'administrateur",
"usr_no_rights" => "Pas de droits d'accès",
"usr_view_calendar" => "Voir le Calendrier",
"usr_post_events_own" => "Ajout/Editer/Supprimer",
"usr_post_events_all" => "Ajout/Editer/Supprimer Tous",
"usr_pw_not_updated" => "Sauvegarde du mot de passe annulée",
"usr_added" => "Ajouter",
"usr_updated" => "Sauvegarde effectuée",
"usr_deleted" => "Supprimer",
"usr_not_added" => "Ajout annulé",
"usr_not_updated" => "Modification annulée",
"usr_not_deleted" => "Suppression annulée",
"usr_cred_required" => "Nom d'utilisateur/adresse email et mot de passe obligatoire",
"usr_uname_exists" => "Nom d’utilisateur existe déjà",
"usr_email_exists" => "Adresse email existe déjà",
"usr_un_invalid" => "Nom d'utilisateur non valide (min 2 caractères : A-Z, a-z, 0-9, et _-.) ",
"usr_em_invalid" => "Adresse email non valide",
"usr_cant_delete_yourself" => "Vous ne pouvez pas supprimer vous-même",
"usr_background" => "Background color",
"usr_select_color" => "Select Color",
"usr_invalid_color" => "Color format invalid (#XXXXXX - X = HEX-value)",

//database.php
"mdb_dbm_functions" => "Choix des fonctions",
"mdb_noshow_tables" => "Pas d'accès aux tables",
"mdb_compact" => "Compacter la base de données",
"mdb_compact_table" => "Compactage de la table",
"mdb_compact_error" => "Erreur",
"mdb_compact_done" => "Terminé",
"mdb_purge_done" => "Suppression définitive des événements effacés",
"mdb_repair" => "Vérifier et réparer la base de données",
"mdb_check_table" => "Vérif. table",
"mdb_ok" => "OK",
"mdb_nok" => "Pas OK",
"mdb_nok_repair" => "Pas OK, réparer",
"mdb_backup" => "Sauvegarder la base de données",
"mdb_backup_table" => "Sauvegarde de la table",
"mdb_backup_done" => "Terminé",
"mdb_file_saved" => "Fichier sauvegardé.",
"mdb_file_name" => "Nom du fichier:",
"mdb_start" => "Démarrer",
"mdb_back" => "Retour",
"mdb_no_function_checked" => "Aucune fonction sélectionnée",
"mdb_write_error" => "Writing backup file failed<br />Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "Sélectionner un fichier",
"iex_file_name" => "Nom du fichier iCal",
"iex_file_description" => "Description du fichier iCal",
"iex_filters" => "Filtres",
"iex_upload_ics" => "Importer un fichier iCal",
"iex_select_events" => "Sélection des événements",
"iex_upload_csv" => "Importer un fichier CSV",
"iex_upload_file" => "Importer le fichier",
"iex_create_file" => "Exporter le fichier",
"iex_download_file" => "Charger le fichier",
"iex_fields_sep_by" => "Champs séparés par",
"iex_birthday_res_id" => "ID de la Catégorie",
"iex_default_res_id" => "ID de la Catégorie par défaut",
"iex_if_no_cat" => "Laisser vide si la catégorie n'existe pas",
"iex_import_events_from_date" => "Importer les événements en date du",
"iex_see_insert" => "voir liste à droite",
"iex_no_file_name" => "Nom de fichier manquant",
"iex_inval_field_sep" => "Séparateur de champs invalide ou inexistant",
"iex_no_begin_tag" => "Fichier iCal invalide (DEBUT-vide)",
"iex_date_format" => "Format date événement",
"iex_time_format" => "Format heure événement",
"iex_number_of_errors" => "Nombre d'erreur dans la liste",
"iex_bgnd_highlighted" => "fond accentué",
"iex_verify_event_list" => "Vérifier la liste des événements, corriger les erreurs et cliquer",
"iex_add_events" => "Ajouter les événements dans la base de données",
"iex_select_birthday_delete" => "Cocher la case \"ID Anniversaire\" et \"Supprimer\"  si nécessaire",
"iex_select_delete_ignore" => "Cocher la case \"Supprimer\" pour ignorer un événement",
"iex_title" => "Titre",
"iex_venue" => "Lieu",
"iex_owner" => "Utilisateur",
"iex_resource" => "Catégorie",
"iex_date" => "Date début",
"iex_end_date" => "Date fin",
"iex_start_time" => "Heure début",
"iex_end_time" => "Heure fin",
"iex_description" => "Description",
"iex_birthday" => "ID Anniversaire",
"iex_delete" => "Supprimer",
"iex_events_added" => "Evénements ajoutés",
"iex_events_dropped" => "Evénements sautés (déjà présents)",
"iex_db_error" => "Erreur de base de données",
"iex_ics_file_error_on_line" => "Erreur fichier iCal ligne",
"iex_occurring_between" => "Occurence entre",
"iex_changed_between" => "Ajouté/modifié entre",
"iex_select_date" => "Sélectionner la date",
"iex_all_cats" => "toutes",
"iex_all_users" => "tous",
"iex_no_events_found" => "Pas d'événements trouvés",
"iex_file_created" => "Fichier créé",
"iex_write error" => "Writing export file failed<br />Check permissions of 'files/' directory",
"iex_back" => "Retour",

//lcalcron.php
"cro_sum_header" => "CRON JOB SUMMARY",
"cro_sum_trailer" => "END OF SUMMARY",

//notify.php
"not_sum_title" => "EMAIL REMINDERS",
"not_not_sent_to" => "Reminders sent to",
"not_no_not_dates_due" => "No notification dates due",
"not_all_day" => "Toute la journée",
"not_mailer" => "Notification",
"not_subject" => "Sujet",
"not_event_due_in" => "Le prochain événement est dans",
"not_due_in" => "est dans",
"not_days" => "Jour(s)",
"not_date_time" => "Date / heure",
"not_title" => "Titre",
"not_sender" => "Expéditeur",
"not_venue" => "Lieu",
"not_description" => "Description",
"not_resource" => "Categorie",
"not_open_calendar" => "Ouvrir calendrier",

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
"<h4>Instructions pour gérer la Base de données</h4>
<p>Sur cette page, les fonctions suivantes peuvent être choisies :</p>
<h5>Vérifier et réparer la base de données</h5>
<p>Cette fonction permet de scanner le calendrier, de vérifier les incohérences et de les réparer.</p>
<p>Si vous ne remarquez pas d'incohérence dans votre calendrier, cette fonction
peut être lancée une seule fois par an.</p>
<h5>Compacter la base de données</h5>
<p>Lorsqu'un utilisateur efface un événement, il est marqué 'effacé', mais il
n'est pas supprimé de la base de données. La fonction 'Compacter la base de données'
le supprime physiquement et libére l'espace qu'il occupait.</p>
<h5>Sauvegarder la base de données</h5>
<p>Cette fonction permet de créer une sauvegarde de toute la base de données (tables,  
structures et données) dans un format '.sql'. La sauvegarde est enregistrée dans le 
répertoire <strong>files/</strong> avec comme nom : 
<kbd>cal-backup-aaammjj-hhmmss.sql</kbd> (où 'aaaammjj' = année, mois, et 
jour, et hhmmss = heure, minutes et secondes.</p>
<p>Ce fichier de sauvegarde peut être utilisé pour recréer les tables, les structures et les données 
de la base de données en important le fichier avec des outils spécifiques comme, par exemple, le <strong>phpMyAdmin</strong> 
qui est disponible sur la plupart des serveurs web.</p>",

"xpl_import_csv" =>
"<h4>Instructions pour importer un fichier CSV</h4>
<p>Ce formulaire est utilisé pour importer dans votre calendrier LuxCal, un fichier 
<strong>CSV</strong> (Comma Separated Values) contenant des événements créés par 
un autre calendrier comme par ex. MS Outlook.</p>
<p>L'ordre des colonnes dans le fichier CSV doit être impérativement comme suit : 
titre, lieu, id catégorie (voir ci-dessous), date début, date fin, heure début, 
heure fin et description. La 1ère ligne du fichier CSV, utilisée par le nom des 
colonnes, est ignorée.</p>
<h5>Exemples de fichier CSV</h5>
<p>Des exemples de fichier CSV se trouvent dans le répertoire 'files/' de LuxCal.</p>
<h5>Format de date et heure</h5>
<p>Le format de la date et de l'heure de l'événement côté gauche doit être le même 
que le format de la date et de l'heure du fichier CSV.</p>
<h5>Liste des Catégories</h5>
<p>Le calendrier utilise un numéro d'identification (ID) spécifique à chaque 
catégorie. Les ID des catégories dans le fichier CSV doivent correspondre aux 
catégories utilisées dans le calendrier LuxCal ou à défaut être vide.</p>
<p>Si dans la prochaine étape, vous voulez affecter des événements en tant que 
\"anniversaire\", la catégorie <strong>ID Anniversaire</strong> doit être 
identique à l'ID de la catégorie ci-dessous.</p>
<br />
<p>Voici les catégories actuellement définies dans votre calendrier:</p>",

"xpl_import_ical" =>
"<h4>Instructions pour importer un fichier iCalendar</h4>
<p>Ce formulaire est utilisé pour importer dans votre calendrier LuxCal, un fichier 
<strong>iCalendar</strong> contenant des événements.</p>
<p>Le contenu du fichier à importer doit rencontrer le standard de l'Internet 
Engineering Task Force 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>].</p>
<p>Seuls les événements sont importés; les autres composants iCal (A faire, 
Jounal, Libre/Occupé, Alarme et zone de temps) sont ignorés.</p>
<h5>Exemples de fichier iCal</h5>
<p>Des exemples de fichier iCalendar se trouvent dans le répertoire 'files/' de 
LuxCal.</p>
<h5>Liste des Catégories</h5>
<p>Le calendrier utilise un numéro d'identification (ID) spécifique à chaque 
catégorie. Les ID des catégories dans le fichier iCalendar doivent correspondre 
aux catégories utilisées dans le calendrier LuxCal ou à défaut être vide.</p>
<br />
<p>Voici les catégories actuellement définies dans votre calendrier:</p>",

"xpl_export_ical" =>
"<h4>Instructions pour exporter vers un fichier iCalendar</h4>
<p>Ce formulaire est utilisé pour extraire et exporter les événements du calendrier 
LuxCal dans un fichier <strong>iCalendar</strong>.</p>
<p>Le <b>nom du fichier iCal</b> (sans extension) est facultatif. Le fichier créé est sauvegardé  
dans le répertoire \"files/\" du serveur avec un nom de fichier spécifique 
ou avec un nom \"luxcal\". L'extension du fichier sera <b>.ics</b>.
Si un fichier existe déjà dans le répertoire \"files/\" du serveurr avec le même nom, il sera  
écrasé par le nouveau fichier.
<p>La <b>description du fichier iCal</b> (ex. 'Réunions 2011') est facultative. 
Si elle existe, elle sera ajoutée à l'en-tête du fichier iCal exporté.</p>
<p><b>Filtres</b>: Les événements à extraire peuvent être filtrés par:</p>
<ul>
<li>Propriétaire</li>
<li>Catégorie</li>
<li>Date début</li>
<li>Date d'ajout/modification</li>
</ul>
<p>Chaque filtre est facultatif. Une date vide = aucun filtre</p>
<br />
<p>Le contenu du fichier à exporter doit rencontrer le standard de l'Internet 
Engineering Task Force 
[<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>]</p>. 
<p>Lorsqu'on <b>télécharge</b> le fichier ical exporté, la date et l'heure sont ajoutées au nom  
du fichier téléchargé.</p>
<h5>Exemples de fichier iCal</h5>
<p>Des exemples de fichier iCalendar se trouvent dans le répertoire 'files/' de 
LuxCal.</p>"
);
?>
