<?php
/*
= LuxCal event calendar lamguage file =

La traduction française a été réalisée par Fabiou (fabiou.dec@gmail.com).
N'hésitez pas à lui faire part de vos remarques si vous constatez des erreurs ou des oublis dans la traduction.

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.5.3");

/* -- Titles on the Header of the Calendar -- */

$months = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
$months_m = array("Jan","Fév","Mar","Avr","Mai","Jui","Jui","Aoû","Sep","Oct","Nov","Déc");
$wkDays = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
$wkDays_l = array("Dim","Lun","Mar","Mer","Jeu","Ven","Sam","Dim");
$wkDays_m = array("Di","Lu","Ma","Me","Je","Ve","Sa","Di");
$wkDays_s = array("D","L","M","M","J","V","S","D");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "Aucun.",

//index.php
"title_upcoming" => "Prochains événements",
"title_add_event" => "Ajouter un Événement",
"title_event_details" => "Détails de l'Événement",
"title_edit_event" => "Modifier un Événement",
"title_log_in" => "Ouverture de session",
"title_user_guide" => "Guide de l'utilisateur",
"title_settings" => "Gestion des paramètres",
"title_edit_cats" => "Gestion des catégories",
"title_edit_users" => "Gestion des utilisateurs",
"title_manage_db" => "Gérer la base de données",
"title_changes" => "Événements Ajoutés / Modifiés / Supprimés",
"title_csv_import" => "Importer un fichier CSV",
"title_ics_import" => "Importer un fichier iCalendar",
"title_ics_export" => "Exporter un fichier iCalendar",
"idx_log_in" => "Connexion",
"idx_public_name" => "Accès Public",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_show_opanel" => "Show Options Panel",
"hdr_select_date" => "Aller à la date",
"hdr_view" => "Vue",
"hdr_select_view" => "Choisir la vue",
"hdr_filter" => "Filtre",
"hdr_select_filter" => "Choisir le filtre",
"hdr_lang" => "Langue",
"hdr_select_lang" => "Choisir la langue",
"hdr_all_cats" => "Catégories: Toutes",
"hdr_all_users" => "Utilisateurs: Tous",
"hdr_year" => "Année",
"hdr_month" => "Mois",
"hdr_week" => "Semaine",
"hdr_day" => "Jour",
"hdr_upcoming" => "A venir",
"hdr_changes" => "Modifications",
"hdr_select_admin_functions" => "Choisir la fonction Admin",
"hdr_admin" => "Menu admin",
"hdr_add_event" => "Ajout événement",
"hdr_show_sbar" => "Afficher la barre latérale",
"hdr_settings" => "Paramètres",
"hdr_categories" => "Catégories",
"hdr_users" => "Utilisateurs",
"hdr_database" => "Base de données",
"hdr_import_csv" => "Import CSV",
"hdr_import_ics" => "Import iCal",
"hdr_export_ics" => "Export iCal",
"hdr_calendar" => "Back to calendar",
"hdr_guide" => "Aide",
"hdr_log_in" => "Connexion",
"hdr_log_out" => "Déconnexion",
"hdr_today" => "Aujourd'hui", //dtpicker.js
"hdr_clear" => "Effacer", //dtpicker.js

//header_s.php
"hdr_close_window" => "Fermer la fenêtre",

//event.php
"evt_no_title" => "Titre manquant",
"evt_no_start_date" => "Date de début manquante",
"evt_bad_date" => "Mauvaise date",
"evt_bad_rdate" => "Mauvaise date de fin de répétition",
"evt_no_start_time" => "Heure du début manquante",
"evt_bad_time" => "Mauvaise heure",
"evt_end_before_start_time" => "Heure de fin précède heure de début",
"evt_end_before_start_date" => "Date de fin précède date de début",
"evt_until_before_start_date" => "Fin de répétition précède date de début",
"evt_title" => "Titre",
"evt_venue" => "Lieu",
"evt_resource" => "Catégorie",
"evt_description" => "Description",
"evt_date_time" => "Date / heure",
"evt_mailer" => "notification",
"evt_private_event" => "Privé",
"evt_start_date" => "Date début",
"evt_end_date" => "Date fin",
"evt_select_date" => "Choisir la date",
"evt_select_time" => "Choisir l'heure",
"evt_all_day" => "Journée entière",
"evt_change" => "Modifier",
"evt_set_repeat" => "Répétition",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Répétition spécifiée non supportée",
"evt_no_repeat" => "Pas de répétition",
"evt_repeat" => "Répète",
"evt_repeat_on" => "Répète chaque ",
"evt_until" => "jusqu'à",
"evt_blank_no_end" => "vide: illimité",
"evt_of_the_month" => "du mois",
"evt_interval1_1" => "chaque",
"evt_interval1_2" => "chaque deuxième",
"evt_interval1_3" => "chaque troisième",
"evt_interval1_4" => "chaque quatrième",
"evt_interval1_5" => "chaque cinquième",
"evt_interval1_6" => "chaque sixième",
"evt_interval2_1" => "premier",
"evt_interval2_2" => "deuxième",
"evt_interval2_3" => "troisième",
"evt_interval2_4" => "quatrième",
"evt_interval2_5" => "dernier",
"evt_period1_1" => "jour",
"evt_period1_2" => "semaine",
"evt_period1_3" => "mois",
"evt_period1_4" => "année",
"evt_notify" => "Notification",
"evt_now_and_or" => "maintenant et/ou",
"evt_event_added" => "Evénement ajouté",
"evt_event_edited" => "Evénement modifié",
"evt_event_deleted" => "Evénement supprimé",
"evt_days_before_event" => " jour(s) avant l'événement à :",
"evt_notify_eml_list" => "Adresses email séparée par un point-virgule. Longueur totale 255 caractères max.",
"evt_eml_list_too_long" => "La liste des adresses email a trop de caractère.",
"evt_eml_list_missing" => "Adresse(s) email manquante(s)",
"evt_not_in_past" => "Date de notification dépassée",
"evt_not_days_invalid" => "Jour de notification invalide",
"evt_url_format" => "lien URL: url ou url [name]. Ex. www.google.com, www.google.com [chercher]",
"evt_confirm_added" => "événement ajouté",
"evt_confirm_saved" => "événement sauvé",
"evt_confirm_deleted" => "événement supprimé",
"evt_add" => "Ajouter",
"evt_edit" => "Modifier",
"evt_save_close" => "Sauver et fermer",
"evt_save" => "Sauver",
"evt_clone" => "Dupliquer",
"evt_delete" => "Supprimer",
"evt_close" => "Fermer",
"evt_open_calendar" => "Ouvrir calendrier",
"evt_owner" => "Ajouté pour",
"evt_edited" => "Edité",
"evt_is_repeating" => "est un événement répèté.",
"evt_is_multiday" => "est un événement multi-jours.",
"evt_edit_series_or_occurrence" => "Voulez-vous éditer la série ou cette occurence ?",
"evt_edit_series" => "Editer la série",
"evt_edit_occurrence" => "Editer l'occurrence",

//views
"vws_add_event" => "Ajout nouvel événement",
"vws_view_month" => "Mois",
"vws_view_week" => "Semaine",
"vws_view_day" => "Jour",
"vws_click_for_full" => "Cliquer sur le mois pour afficher le calendrier",
"vws_view_full" => "Voir le calendrier complet",
"vws_prev_month" => "Mois précédent",
"vws_next_month" => "Mois suivant",
"vws_today" => "Aujourd'hui",
"vws_back_to_today" => "Retour au mois courant",
"vws_week" => "Semaine",
"vws_wk" => "Sem",
"vws_time" => "Heure",
"vws_events" => "Evénements",
"vws_all_day" => "Journée entière",
"vws_venue" => "Lieu",
"vws_owner" => "Ajouté par",
"vws_print" => "Imprimer",
"vws_print_today" => "Imprimer aujourd'hui",
"vws_print_all" => "Imprimer tout",
"vws_events_for_next" => "Evénements pour les prochains",
"vws_days" => "jours",
"vws_edited" => "Modifié par",
"vws_notify" => "Envoi d'une notification",

//changes.php
"chg_from_date" => "A partir de",
"chg_select_date" => "Choisir date de début",
"chg_notify" => "Notification",
"chg_days" => "jour(s)",
"chg_added" => "Ajouté",
"chg_edited" => "Modifié",
"chg_deleted" => "Supprimé",
"chg_changed_on" => "Modifié le",
"chg_changes" => "Modifications",
"chg_no_changes" => "Aucune modification."
);
?>
