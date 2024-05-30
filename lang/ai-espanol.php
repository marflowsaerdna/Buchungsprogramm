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

//settings.php - fieldset headers + general
"set_general_settings" => "Calendario",
"set_opanel_settings" => "Options Panel",
"set_user_settings" => "Usuarios",
"set_view_settings" => "Apariencia",
"set_dt_settings" => "Hora y fecha",
"set_save_settings" => "Guardar configuración",
"set_not_valid" => "no válido",
"set_missing" => "falta",
"set_settings_saved" => "Configuración de calendario guardada",
"set_read_error" => "Error al leer el archivo de configuración",
"set_write_error" => "Error al grabar el archivo de configuración. Check permissions of root directory",
"hover_for_details" => "Pase el cursor sobre las descipciones para detalles",
"enabled" => "habilitado",
"disabled" => "deshabilitado",
"no" => "no",
"yes" => "si",
"or" => "or",//
"minutes" => "minutes",
"pixels" => "pixels",
"no_way" => "Usted no está autorizado para realizar esta acción",

//settings.php - calendar settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"calendarTitle_label" => "Título del calendario",
"calendarTitle_text" => "Se muestra en la barra superior del calendario y en las notificaciones por correo electrónico.",
"calendarUrl_label" => "URL del calendario",
"calendarUrl_text" => "La dirección web del calendario.",
"calendarEmail_label" => "email de remitente del calendario",
"calendarEmail_text" => "Dirección de correo electrónico usada para enviar notificaciones.<br />Formato: \'email\' or \'nombre&#8249;email&#8250;\'. \'nombre\' puede ser el título del calendario.",
"timeZone_label" => "Zona horaria",
"timeZone_text" => "La zona horaria del calendario utilizada para calcular la hora actual del calendario.",
"see" => "ver",
"view" => "ver",
"post_own" => 'publicar propios',
"post_all" => 'publicar para todos',
"defaultView_label" => "Vista por defecto al comenzar",
"defaultView_text" => "Las vistas por defecto posibles son:<br />- Año<br />- Mes<br />- Semana<br />- Día<br />- Próximos<br />- Cambios<br />Elección recomendada: Mes o Próximos.",
"language_label" => "Lenguaje por defecto de la interfaz",
"language_text" => "Los archvos ui-{lenguaje}.php, ai-{lenguaje}.php, ug-{lenguaje}.php y ug-layout.png deben estar presentes en el directorio lang/. {lenguaje} = lenguaje de interfaz elegido. ¡Los nombres de archivo deben ser en minúsculas!",
"userMenu_label" => "User filter menu",
"userMenu_text" => "Display the user filter menu in the options panel.<br />This filter can be used to only display events created by one specific user.",
"catMenu_label" => "Resource filter menu",
"catMenu_text" => "Display the event resource filter menu in the options panel.<br />This filter can be used to only display events belonging to a specific event resource.",
"langMenu_label" => "Menú de selección de lenguaje",
"langMenu_text" => "Desplegar el menú de selección de lenguaje en la barra de navegación.<br />This menu can be used to select the user interface language.<br />(Activarlo solo tiene sentido si hay varios lenguajes instalados)",
"chgEmailList_label" => "Envío de correos con cambios",
"chgEmailList_text" => "Las direcciones de correo destino reciben periódicamente notificaciones por correo electrónico con los cambios en el calendario.<br />Direcciones de correo separadas por comas.<br />(requiere usar cron o at en Windows)",
"chgNofDays_label" => "Días hacia atrás para buscar cambios periódicamente",
"chgNofDays_text" => "Número de días hacia atrás para buscar el resumen de cambios en el calendario.<br />Si el número de días es cero no se enviarán resúmenes de los cambios.<br />(requiere usar cron o at en Windows)",
"cronSummary_label" => "Admin cron job summary",//
"cronSummary_text" => "Send a cron job summary to the calendar administrator.<br />Enabling is only useful if on your server:<br />- a cron job has been activated<br />- emailing cron job output is enabled (check with your ISP)",//
"oneStepEdit_label" => "One-step event editing",//
"oneStepEdit_text" => "If enabled: clicking an event will directly open the Edit Event window.<br />If disabled: clicking an event will always first open the Event Details window where the Edit button has to be selected to open the Edit Event window.<br />Note: If the user has no rights to edit an event, the Event Details window will open with the Edit button disabled.",//

//settings.php - user account settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"selfReg_label" => "Auto registro",
"selfReg_text" => "Permitir a los usuarios registrarse por sí mismos para acceder al calendario.",
"selfRegPrivs_label" => "Permisos para autoregistro",
"selfRegPrivs_text" => "Permisos de acceso para los usuarios autoregistrados.<br />- ver: únicamente consulta<br />- enviar propios: publicar y editar eventos propios<br />- publicar a todos: publicar y editar eventos propios y de los otros.",
"maxNoLogin_label" => "Número máximo de días sin ingresar",
"maxNoLogin_text" => "Si un usuario no ha accedido al calendario en el número de días indicado su cuenta será borrada.<br />Si el número es 0 las cuentas no se borrarán<br />(requiere usar cron o at en Windows)",
"miniCalPost_label" => "Mini calendar event posting",//
"miniCalPost_text" => "Only relevant if the mini calendar is used!<br />If enabled users can:<br />- post new events in the mini calendar by clicking the top bar of a day cell<br />- edit/delete events by clicking an event square",//

//settings.php - view settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"yearStart_label" => "Start month in Year view",
"yearStart_text" => "If a start month has been specified (1 - 12), in Year view the calendar will always start with this month and the year of this first month will only change as of the first day of the same month in the next year.<br />The value 0 has a special meaning: the start month is based on the current date and will fall in the first row of months.",
"colsToShow_label" => "Columnas en la vista anual",
"colsToShow_text" => "Número de meses que se mostrarán em cada fila de la vista anual.<br />Elección recomendada: 3 o 4.",
"rowsToShow_label" => "Filas en la vista anual",
"rowsToShow_text" => "Número de filas que se desplegarán en la vista anual.<br />Elección recomendada: 4, que proporciona 16 meses para recorrer.",
"weeksToShow_label" => "Semanas en la vista mensual",
"weeksToShow_text" => "Número total de semanas desplegadas en la vista mensual.<br />Opción recomendada: 10, que despliega 2.5 meses.<br />El valor 0 tiene un significado especial, despliega exactamente un mes.",
"upcomingDays_label" => "Dias hacia adelante",
"upcomingDays_text" => "Número de días hacia adelante para mostrar eventos próximos en la vista correspondiente and in the RSS feeds.",
"startHour_label" => "Hora inicial en las vistas de día y semana",
"startHour_text" => "Hora a la que comienzan los eventos de un día normal.<br />Establecer este valor en 6, evitará desperdiciar espacio en las horas muertas de la noche en la vista de día o semana entre la media noche y las 6:00.",
"dwTimeSlot_label" => "Time slot in Day/Week view",
"dwTimeSlot_text" => "Day/Week view time slot in number of minutes.<br />This value, together with the Start hour (see above) will determine the number of rows in Day/Week view.",
"dwTsHeight_label" => "Time slot height",
"dwTsHeight_text" => "Day/Week view time slot display height in number of pixels.",
"weekNumber_label" => "Display week numbers",//
"weekNumber_text" => "The display of week numbers in Year, Month and Week view can be switched on or off",//
"showOwner_label" => "Mostrar el propietario del evento",
"showOwner_text" => "Si se indica, el propietario (creador) de un evento se mostrará en:<br />- la caja flotante al pasar el cursor en diferentes vistas<br />- La vista de próximos<br />- la vista de cambios<br />- rss feeds<br />- notificaciones por email.",
"showCatName_label" => "Show resource name",//
"showCatName_text" => "If switched on, in various views, apart from displaying the event description in the event resource color, the resource name will also be displayed.",//
"showLinkInMV_label" => "Show links in month view",//
"showLinkInMV_text" => "If switched on, URLs in the event description will be displayed as hyperlink in month view (when an event is clicked, URLs will always be displayed as hyperlink in the Event window)",//
"eventColor_label" => "Event colors based on",
"eventColor_text" => "Events in the various calendar views can displayed in the color assigned to the user who created the event or the color of the event resource.",
"owner_color" => "owner color",
"res_color" => "resource color",

//settings.php - date/time settings. Single quotes in the ......_text translations below must be escaped by a backslash (e.g. \')
"dateFormat_label" => "Formato de fecha",
"dateFormat_text" => "Formato de fecha de los eventos en las vistas del calendario y en los campos de formulario.",
"dateUSorEU_label" => "Formato de fecha y hora",
"dateUSorEU_text" => "Formato para fecha y hora en las cabeceras de las vistas de calendario.",
"dateSep_label" => "Separador para fechas",
"dateSep_text" => "Separador para fechas en vistas del calendario y en los campos de formulario.",
"time24_label" => "Formato de tiempo (12 o 24 horas)",
"time24_text" => "Formato de tiempo en las vistas de calendario y campos de formulario.",
"weekStart_label" => "Primer día de la semana",
"weekStart_text" => "el día con que inicia la semana.",
"date_format_us" => "Lunes, Mayo 15, 2010 (US)",
"date_format_eu" => "Lunes 15 Mayo 2010",
"dot" => "punto",
"slash" => "diagonal",
"hyphen" => "guión",
"time_format_us" => "12 horas AM/PM",
"time_format_eu" => "24 horas",
"sunday" => "Domingo",
"monday" => "Lunes",
"time_zones" => "zonas horarias",
"dd_mm_yyyy" => "dd-mm-yyyy",
"mm_dd_yyyy" => "mm-dd-yyyy",
"yyyy_mm_dd" => "yyyy-mm-dd",

//login.php
"log_log_in" => "Entrar",
"log_remember_me" => "Recordarme",
"log_register" => "Registro",
"log_change_my_data" => "Cambiar mis datos",
"log_change" => "Cambiar",
"log_back" => "Regresar",
"log_un_or_em" => "Nombre de usuario o correo electrónico",
"log_un" => "Nombre de usuario",
"log_em" => "Correo electrónico",
"log_pw" => "Contraseña",
"log_new_un" => "Nuevo nombre de usuario",
"log_new_em" => "Nuevo correo electrónico",
"log_new_pw" => "Nueva contraseña",
"log_pw_msg" => "Esta es su contraseña para ingresar a:",
"log_pw_subject_pre" => "Su",
"log_pw_subject_post" => "Contraseña",
"log_npw_msg" => "Esta es su nueva contraseña para ingresar a:",
"log_npw_subject_pre" => "Su nueva",
"log_npw_subject_post" => "Contraseña",
"log_npw_sent" => "Su nueva contrasena ha sido enviada a:",
"log_registered" => "Rgistro exitoso - Su nueva contrasena ha sido enviada por correo electrónico",
"log_not_registered" => "Registro fallido",
"log_un_exists" => "El nombre de usuario ya existe",
"log_em_exists" => "La dirección de correo electrónico ya está registrada",
"log_un_invalid" => "Nombre de usuario inválido (longitud mínima 2: A-Z, a-z, 0-9, and _-.) ",
"log_em_invalid" => "Dirección de correo electrónico inválida",
"log_un_em_invalid" => "Nombre de usuario/correo electrónico inválidos",
"log_un_em_pw_invalid" => "El nombre de usuario/correo electronico o la contraseña es incorrecta",
"log_no_un_em" => "No introdujo su nombre de usuario / correo electrónico",
"log_no_un" => "Ingrese su nombre de usuario",
"log_no_em" => "Ingrese su dirección de correo electrónico",
"log_no_pw" => "No ha introducido su contraseña",
"log_no_rights" => "Login rejected: you have no view rights - Contact the administrator",//
"log_send_new_pw" => "Enviar una nueva contraseña",
"log_if_changing" => "Sólo si cambia",
"log_no_new_data" => "No hay cambios",
"log_invalid_new_un" => "Nuevo nombre de usuario inválido (longitud mínima 2: A-Z, a-z, 0-9, and _-.) ",
"log_new_un_exists" => "El nuevo nombre de usuario ya existe",
"log_invalid_new_em" => "La nueva dirección de correo electrónico es inválida",
"log_new_em_exists" => "La nueva dirección de correo electrónico address ya existe",
"log_ui_language" => "User interface language",//

//categories.php
"res_list" => "Lista de Categorías",
"res_edit" => "Editar",
"res_delete" => "Borrar",
"res_add_new" => "Añadir Nueva Categoría",
"res_add" => "Agregar",
"res_edit_cat" => "Editar Categoría",
"res_back" => "Regresar",
"res_name" => "Nombre de la categoría",
"res_sequence" => "Secuencia",
"res_in_menu" => "En menú",
"res_text_color" => "Color del texto",
"res_background" => "Fondo",
"res_select_color" => "Seleccione el color",
"res_save" => "Actualizar",
"res_added" => "Categoría agregada",
"res_updated" => "Categoría actualizada",
"res_deleted" => "Categoría eliminada",
"res_invalid_color" => "Formato de color inválido (#XXXXXX - X = Valor hexadecimal)",
"res_not_added" => "Categoría no agregada",
"res_not_updated" => "La categoría no se actualizó",
"res_not_deleted" => "La categoría no se eliminó",
"res_nr" => "#",//
"res_repeat" => "Repeat",//
"res_every_day" => "every day",//
"res_every_week" => "every week",//
"res_every_month" => "every month",//
"res_every_year" => "every year",//
"res_public" => "Public",//

//users.php
"usr_list_of_users" => "Lista de Usuarios",
"usr_name" => "Nombre de usuario",
"usr_email" => "Correo",
"usr_password" => "Contraseña",
"usr_rights" => "Derechos",
"usr_language" => "Language",//
"usr_ui_language" => "User interface language",//
"usr_edit_user" => "Editar perfil de usuario",
"usr_add" => "Añadir usuario",
"usr_edit" => "Editar",
"usr_delete" => "Borrar",
"usr_none" => "Ninguno",
"usr_view" => "Ver",
"usr_post_own" => "Editar de evento propio",
"usr_post_all" => "Editar de evento para todos",
"usr_back" => "Regresar",
"usr_admin" => "Admin",
"usr_login_0" => "Primer acceso",
"usr_login_1" => "Último acceso",
"usr_login_cnt" => "Accesos",
"usr_add_profile" => "Añadir perfil",
"usr_upd_profile" => "Actualizar perfil",
"usr_not_found" => "Usuario no encontrado",
"usr_if_changing_pw" => "Sólo si se cambia la contraseña",
"usr_admin_functions" => "Funciones de administración",
"usr_no_rights" => "No hay derechos de acceso",
"usr_view_calendar" => "Ver calendario",
"usr_post_events_own" => "Publicar + Editar Eventos Propios",
"usr_post_events_all" => "Publicar + Editar Todos los eventos",
"usr_pw_not_updated" => "Contraseña no actualizada",
"usr_added" => "Usuario añadido",
"usr_updated" => "Perfil de usuario actualizado",
"usr_deleted" => "Usuario eliminado",
"usr_not_added" => "Usuario no añadido",
"usr_not_updated" => "Usuario no actualizado",
"usr_not_deleted" => "Usuario no suprimido",
"usr_cred_required" => "Nombre de usuario, correo electrónico y contraseña son requeridos",
"usr_uname_exists" => "El nombre de usuario ya existe",
"usr_email_exists" => "La dirección de correo electrónico ya existe",
"usr_un_invalid" => "Nombre de usuario inválido (longitud mínima 2: A-Z, a-z, 0-9, and _-.) ",
"usr_em_invalid" => "Dirección de coreo electrónico inválida",
"usr_cant_delete_yourself" => "No puede borrarse usted mismo",
"usr_background" => "Background color",
"usr_select_color" => "Select Color",
"usr_invalid_color" => "Color format invalid (#XXXXXX - X = HEX-value)",

//database.php
"mdb_dbm_functions" => "Database Functions",
"mdb_noshow_tables" => "Cannot get table(s)",
"mdb_compact" => "Compact database",
"mdb_compact_table" => "Compact table",
"mdb_compact_error" => "Error",
"mdb_compact_done" => "Done",
"mdb_purge_done" => "Deleted events definitively removed",
"mdb_repair" => "Check and repair database",
"mdb_check_table" => "Check table",
"mdb_ok" => "OK",
"mdb_nok" => "Not OK",
"mdb_nok_repair" => "Not OK, repair started",
"mdb_backup" => "Backup database",
"mdb_backup_table" => "Backup table",
"mdb_backup_done" => "Done",
"mdb_file_saved" => "Backup file saved on server.",
"mdb_file_name" => "File name:",
"mdb_start" => "Start",
"mdb_back" => "Back",
"mdb_no_function_checked" => "No function(s) selected",
"mdb_write_error" => "Writing backup file failed<br />Check permissions of 'files/' directory",

//import/export.php
"iex_file" => "Archivo",
"iex_file_name" => "iCal file name",
"iex_file_description" => "Descripción del archivo iCal",
"iex_filters" => "Event Filters",
"iex_upload_ics" => "Archivo&nbsp;iCal",
"iex_select_events" => "Selecccionar eventos",
"iex_upload_csv" => "Archivo CSV",
"iex_upload_file" => "Subir archivo",
"iex_create_file" => "Crear archivo",
"iex_download_file" => "Descargar archivo",
"iex_fields_sep_by" => "Separador de campos",
"iex_birthday_res_id" => "Categoría de cumpleaños",
"iex_default_res_id" => "Categoría por defecto",
"iex_if_no_cat" => "si no hay categoría",
"iex_import_events_from_date" => "Eventos a partir del",
"iex_see_insert" => "Vea las instrucciones a la derecha",
"iex_no_file_name" => "Falta el nombre del archivo",
"iex_inval_field_sep" => "separador de campos inválido o ausente",
"iex_no_begin_tag" => "archivo iCal invélido (BEGIN-tag missing)",
"iex_date_format" => "Formato de fecha",
"iex_time_format" => "Formato de hora",
"iex_number_of_errors" => "Número de errores enlistados",
"iex_bgnd_highlighted" => "fondo coloreado",
"iex_verify_event_list" => "Verifique la lista de eventos corríjala y haga click",
"iex_add_events" => "Añadir eventos a la base de datos",
"iex_select_birthday_delete" => "Seleccione los cumpleaños y archivos para borrar",
"iex_select_delete_ignore" => "Seleccione la casilla borrar para ignorar el evento",
"iex_title" => "Título",
"iex_venue" => "Lugar",
"iex_owner" => "Owner",
"iex_resource" => "Categoría",
"iex_date" => "Fecha",
"iex_end_date" => "Fecha final",
"iex_start_time" => "Comienzo",
"iex_end_time" => "Tiempo límite",
"iex_description" => "Descripción",
"iex_birthday" => "Cumpleaños",
"iex_delete" => "Borrar",
"iex_events_added" => "eventos agregados",
"iex_events_dropped" => "eventos eliminados (preexistentes)",
"iex_db_error" => "Error en la base de datos",
"iex_ics_file_error_on_line" => "Error en el archivo iCal, línea",
"iex_occurring_between" => "Ocurre entre",
"iex_changed_between" => "Añadido/modificado entre",
"iex_select_date" => "Seleccionar fecha",
"iex_all_cats" => "todas las categorías",
"iex_all_users" => "all users",
"iex_no_events_found" => "No hay eventos",
"iex_file_created" => "Archivo creado",
"iex_write error" => "Writing export file failed<br />Check permissions of 'files/' directory",
"iex_back" => "Regresar",

//lcalcron.php
"cro_sum_header" => "CRON JOB SUMMARY",
"cro_sum_trailer" => "END OF SUMMARY",

//notify.php
"not_sum_title" => "EMAIL REMINDERS",
"not_not_sent_to" => "Reminders sent to",
"not_no_not_dates_due" => "No notification dates due",
"not_all_day" => "Todo el día ",
"not_mailer" => "mailer",
"not_subject" => "Tema",
"not_event_due_in" => "El evento siguiente ocurrirá en",
"not_due_in" => "Ocurrido en",
"not_days" => "día(s)",
"not_date_time" => "Fecha / hora",
"not_title" => "Título",
"not_sender" => "Remitente",
"not_venue" => "Lugar del evento",
"not_description" => "Descripción",
"not_resource" => "Categoría",
"not_open_calendar" => "Abre el calendario",

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
"<h4>Instrucciones para gestionar la base de datos</h4>
<p>En esta página pueden seleccionarse las siguientes funciones:</p>
<h5>Verificar y corregir la base de datos</h5>
<p>Esta función revisará las tablas del calendario en la base de datos y checará las errores. 
Los errores serán reparados, si es posible.</p>
<p>Si las vistas del calendario no muestran problemas ejecutar esta función anualmente bastará.</p>
<h5>Compactar base de datos</h5>
<p>Cuendo un usuario elimina un evento, el evento se marca como eliminado', pero no
se semueve de la base de datos. Al Compactar la base de datos, la función eliminará
permanente los eventos, which have been deleted more than 30 days ago, liberando espacio en en 
el disco.</p>
<h5>Respaldar la base de datos</h5>
<p>Esta función creará un respaldo completo de la base de datos del calendario 
(tablas, estructura y contenido) en formato .sq. El respaldo será guardado en el directorio 
<strong>files/</strong> con el nombre de archivo: 
<kbd>cal-backup-yyyymmdd-hhmmss.sql</kbd> (where 'yyyymmdd' = año, mes, día, 
y hhmmss = hora, minutos y segundos.</p>
<p>Este archivo de respaldo podrá ser utilizado para recrear la base de datos en caso de desastre
del servidor o ya sea para importar el archivo mediante <strong>phpMyAdmin</strong>, herramienta 
que está disponible en los servidores de la mayoría de los hospedajes Web.</p>",

"xpl_import_csv" =>
"<h4>Instrucciones de importación de CSV</h4>
<p>Este formulario se utiliza para importar al calendario archivos de texto con datos 
separados por comas <strong>Comma Separated Values (CSV)</strong> con datos de eventos.</p>
<p>El orden de las columnas en el archivo CSV debe ser: título, lugar, resource_id (ver más abajo), 
fecha inicial, fecha final, hora inicial, hora de término y descripción. la primera fila
utilizada para desribir el contenido de las columnas es ignorada.</p>
<h5>Archivo CSV de ejemplo</h5>
<p>Los archivos CSV de ejemplo se encuentran en el directorio 'files/' del paquete que desacargó 
de LuxCal.</p>
<h5>Formato y de fecha y hora</h5>
<p>El formato de fecha y hora seleccionados a la izquierda deben coincidir con los correspondientes en 
el archivo CSV que se va a subir.
.</p>
<h5>Tabla de categorías</h5>
<p>La agenda del sistema usa múmeros únicos o llaves para identificar las categorías. 
Estos números o ID de las categorías deben coincidir en el archivo CSV con los de la agenda 
o estar en blanco.</p>
<p>Si en el campo siguiente desea asignar eventos como 'cumpleaños', el <strong>ID de la
categoría de cumpleaños</strong> debe corresponder en la lista de categorías de abajo.</p>
<br />
<p>En el calendario están definidas las siguientes categorías:</p>",

"xpl_import_ical" =>
"<h4>Instrucciones</h4>
<p>Este formulario sirve para importar un archivo <strong>iCal</strong> con eventos a la agenda del sistema.</p>
<p>El archvo debe estar arreglado en conformidad al [<u><a href='http://tools.ietf.org/html/rfc5545'
target='_blank'>RFC5545 standard</a></u>] de la Internet Engineering Task Force.</p>
<p>Sólo los eventos se importarán; otro tipo de componenetes iCal serán ignorados.</p>
<br />
<h5>Tabla de Categorías</h5>
<br />
La agenda del sistema usa múmeros únicos o llaves para identificar las categorías. 
Estos números o ID de las categorías deben coincidir en el archivo iCal con los de la agenda 
o estar en blanco.
<br />
<p>En el calendario están definidas las siguientes categorías:</p>",

"xpl_export_ical" =>
"<h4>Instrucciones</h4>
<br />
<p>Este formulario sirve para exportar los eventos de la agenda en formato <strong>iCal</strong>
de acuerdo a la especificación [<u><a href='http://tools.ietf.org/html/rfc5545' target='_blank'>RFC5545 standard</a></u>]
de la Internet Engineering Task Force.</p>
<p>The <b>iCal file name</b> (without extension) is optional. Created files will 
be stored in the \"files/\" directory on the server with the specified file name, 
or otherwise with the name \"luxcal\". The file extension will be <b>.ics</b>.
Existing files in the \"files/\" directory on the server with the same name will 
be overwritten by the new file.
<p>La descripción que se ingresa en el formulario es opcional. si se captura, se añadirá a la cabecera del archvo exportado.</p>
<p>Los eventops a exportar pueden ser filtrados por:</p>
<ul>
<li>event owner</li>
<li>categoría</li>
<li>comienzo del evento</li>
<li>fecha de alta/modificación del evento</li>
</ul>
<p>Cada filtro es opcional. La fecha en blanco significa \"Sin límite\"</p>
<p>When <b>downloading</b> the exported iCal file, the date and time will be 
added to the name of the downloaded file.</p>"
);
?>
