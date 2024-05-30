<?php
/*
= LuxCal event calendar user interface language file =

Traducido al español por Michel Trottier y su novia - Montreal, Canada. Por favor envíe sus observaciones y comentarios a humm64@hotmail.com.

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.5.3");

/* -- Titles on the Header of the Calendar -- */

$months = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$months_m = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
$wkDays = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
$wkDays_l = array("Dom","Lun","Mar","Mié","Jue","Vie","Sáb","Dom");
$wkDays_m = array("Do","Lu","Ma","Mi","Ju","Vi","Sá","Do");
$wkDays_s = array("D","L","M","M","J","V","S","D");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "None.",

//index.php
"title_upcoming" => "Próximos eventos",            
"title_add_event" => "Añadir Evento",
"title_event_details" => "Detalles del Evento",
"title_edit_event" => "Editar Evento",
"title_log_in" => "Entrar",
"title_user_guide" => "LuxCal Guía del usuario",
"title_settings" => "Configuración de calendario",       
"title_edit_cats" => "Modificar categorías",
"title_edit_users" => "Modificar usuarios",
"title_manage_db" => "Gestionar la base de datos",
"title_changes" => "Eventos añadidos / modificados / suprimidos",
"title_csv_import" => "Importación de archivos CSV",
"title_ics_import" => "Importación de archivos iCal",
"title_ics_export" => "Exportación de archivos iCal",
"idx_log_in" => "Inicie sesion para ver este calendario",        
"idx_public_name" => "Vista pública",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_show_opanel" => "Show Options Panel",
"hdr_select_date" => "Ir a Fecha",
"hdr_view" => "Vista",
"hdr_select_view" => "Seleccione vista",
"hdr_filter" => "Filtro",
"hdr_select_filter" => "Seleccione filtro",
"hdr_lang" => "Lenguaje",
"hdr_select_lang" => "Seleccione lenguaje",
"hdr_all_cats" => "Todas las categorías",
"hdr_all_users" => "Todos los usuarios",
"hdr_year" => "Año",
"hdr_month" => "Mes",
"hdr_week" => "Semana",
"hdr_day" => "Día",
"hdr_upcoming" => "Próximos",
"hdr_changes" => "Cambios",
"hdr_select_admin_functions" => "Seleccione gestionar",
"hdr_admin" => "Administración",
"hdr_add_event" => "Añadir Evento",
"hdr_show_sbar" => "Show side bar",//
"hdr_settings" => "Configuración",
"hdr_categories" => "Categorías",
"hdr_users" => "Usuarios",
"hdr_database" => "Base de datos",
"hdr_import_csv" => "Importar CSV",
"hdr_import_ics" => "Importar iCal",
"hdr_export_ics" => "Exportar iCal",
"hdr_calendar" => "Back to calendar",
"hdr_guide" => "Ayuda",
"hdr_log_in" => "Entrar",
"hdr_log_out" => "Cierre de sesión",
"hdr_today" => "hoy", //dtpicker.js
"hdr_clear" => "borrar", //dtpicker.js

//header_s.php
"hdr_close_window" => "Cerrar",

//event.php
"evt_no_title" => "Sin título",
"evt_no_start_date" => "No hay fecha de inicio",
"evt_bad_date" => "Fecha errónea",
"evt_bad_rdate" => "Bad repeat end date",
"evt_no_start_time" => "No hay hora de inicio",
"evt_bad_time" => "Mal tiempo",
"evt_end_before_start_time" => "Hora de finalización antes de la hora de inicio",
"evt_end_before_start_date" => "Fecha de finalización antes de la fecha de inicio",
"evt_until_before_start_date" => "Repeat end antes de la fecha de inicio",
"evt_title" => "Título",
"evt_venue" => "Lugar del evento",
"evt_resource" => "Categoría",
"evt_description" => "Descripción",
"evt_date_time" => "Fecha / hora",
"evt_mailer" => "mailer",
"evt_private_event" => "Evento Privado",
"evt_start_date" => "Iniciar",
"evt_end_date" => "Final",
"evt_select_date" => "Seleccione fecha",
"evt_select_time" => "Seleccione hora",
"evt_all_day" => "Todo el día",
"evt_change" => "Cambiar",
"evt_set_repeat" => "Establecer repetición",
"evt_set" => "OK",
"evt_repeat_not_supported" => "La repeticion solicitada no está soportada",
"evt_no_repeat" => "No repetir",
"evt_repeat" => "Repetir",
"evt_repeat_on" => "Repetir cada",
"evt_until" => "mientras",
"evt_blank_no_end" => "en blanco: sin final",
"evt_of_the_month" => "del mes",
"evt_interval1_1" => "cada",
"evt_interval1_2" => "cada otro",
"evt_interval1_3" => "cada tercero",
"evt_interval1_4" => "cada cuarto",
"evt_interval1_5" => "every fifth",
"evt_interval1_6" => "every sixth",
"evt_interval2_1" => "primero",
"evt_interval2_2" => "segudo",
"evt_interval2_3" => "tercero",
"evt_interval2_4" => "cuarto",
"evt_interval2_5" => "último",
"evt_period1_1" => "día",
"evt_period1_2" => "semana",
"evt_period1_3" => "mes",
"evt_period1_4" => "año",
"evt_notify" => "Notificar",
"evt_now_and_or" => "ahora y/o",
"evt_event_added" => "El siguiente evento se añadió",
"evt_event_edited" => "El siguiente evento se modificó",
"evt_event_deleted" => "El siguiente evento fue eliminado",
"evt_days_before_event" => "días antes del evento",
"evt_notify_eml_list" => "direcciones de correo electrónico para notificación - separados por un punto y coma - max. 255 car.",
"evt_eml_list_too_long" => "Lista de direcciones de correo electrónico demasiado larga.",
"evt_eml_list_missing" => " Dirección de correo electrónico para notificación vacía",
"evt_not_in_past" => "Notification date in past",//
"evt_not_days_invalid" => "Notification days invalid",//
"evt_url_format" => "enlace al sitio web: url o url [nombre]. E.g. www.google.com [search]",
"evt_confirm_added" => "evento añadido",
"evt_confirm_saved" => "evento guardados",
"evt_confirm_deleted" => "evento eliminado",
"evt_add" => "Añadir",
"evt_edit" => "Modificar",
"evt_save_close" => "Guardar y cerrar",
"evt_save" => "Guardar",
"evt_clone" => "Guardar como nuevo",
"evt_delete" => "Borrar",
"evt_close" => "Cerrar",
"evt_open_calendar" => "Abre el calendario",
"evt_owner" => "Propietario",
"evt_edited" => "Edited",
"evt_is_repeating" => "is a repeating event.",
"evt_is_multiday" => "is a multi-day event.",
"evt_edit_series_or_occurrence" => "Do you want to edit the series or this occurrence?",
"evt_edit_series" => "Edit the series",
"evt_edit_occurrence" => "Edit this occurrence",

//views
"vws_add_event" => "Añadir Evento",
"vws_view_month" => "Ver mes",
"vws_view_week" => "Vista de la semana",
"vws_view_day" => "Ver día",
"vws_click_for_full" => "for full calendar click month",//
"vws_view_full" => "View full calendar",//
"vws_prev_month" => "Previous month",//
"vws_next_month" => "Next month",//
"vws_today" => "Hoy",
"vws_back_to_today" => "Volver al mes de hoy",//
"vws_week" => "Semana",
"vws_wk" => "sem",
"vws_time" => "Tiempo",
"vws_events" => "Eventos",
"vws_all_day" => "Todo el día",
"vws_venue" => "Lugar del evento",
"vws_owner" => "Propietario",
"vws_print" => "Imprimir",
"vws_print_today" => "Imprimir hoy",
"vws_print_all" => "Imprimir todos",
"vws_events_for_next" => "Eventos para los próximos",
"vws_days" => "día(s)",
"vws_edited" => "Edited",
"vws_notify" => "Notificar",

//changes.php
"chg_from_date" => "Fecha de inicio",
"chg_select_date" => "Seleccione la fecha de inicio",
"chg_notify" => "Notificar",
"chg_days" => "Día(s)",
"chg_added" => "Añadido",
"chg_edited" => "Corregido",
"chg_deleted" => "Suprimido",
"chg_changed_on" => "Cambiado el",
"chg_changes" => "Cambios",
"chg_no_changes" => "Sin cambios."
);
?>
