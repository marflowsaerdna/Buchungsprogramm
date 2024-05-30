<?php
/*
= LuxCal event calendar user interface language file =

Traduzido para Português-Portugal (Rodrigo Pedro) - Contacto: rodrigocaetanopedro@gmail.com

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.5.3");

/* -- Titles on the Header of the Calendar and Date Picker -- */

$months = array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
$months_m = array("Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez");
$wkDays = array("Domingo","Segunda-Feira","Terça-Feira","Quarta-Feira","Quinta-Feira","Sexta-Feira","Sábado","Domingo");
$wkDays_l = array("Domi","Segu","Terç","Quar","Quin","Sext","Sába","Domi");
$wkDays_m = array("Dom","Seg","Ter","Qua","Qui","Sex","Sáb","Dom");
$wkDays_s = array("D","S","T","Q","Q","S","S","D");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "None.",

//index.php
"title_upcoming" => "Próximos Eventos",
"title_add_event" => "Adicionar Eventos",
"title_event_details" => "Detalhes do Eventos",
"title_edit_event" => "Editar Eventos",
"title_log_in" => "Iniciar Sessão",
"title_user_guide" => "Manual do Utilizador LuxCal",
"title_settings" => "Gerir Definições do Calendário",
"title_edit_cats" => "Categorias",
"title_edit_users" => "Utilizadores",
"title_manage_db" => "Controlar Base de Dados",
"title_changes" => "Eventos Adicionado(s) / Alterardo(s) / Eliminado(s)",
"title_csv_import" => "Importar Ficheiro CSV",
"title_ics_import" => "Importar Ficheiro iCal",
"title_ics_export" => "Exportar Ficheiro iCal",
"idx_log_in" => "Preencha os dados para iniciar a sessão e visualizar o calendário",
"idx_public_name" => "Vista Pública",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_show_opanel" => "Show Options Panel",
"hdr_select_date" => "Ir para a data",
"hdr_view" => "Vista",
"hdr_select_view" => "Selecionar Vista",
"hdr_filter" => "Filtro",
"hdr_select_filter" => "Selecionar Filtro",
"hdr_lang" => "Idioma",
"hdr_select_lang" => "Selecionar Idioma",
"hdr_all_cats" => "Todas as categorias",
"hdr_all_users" => "Todos os utilizadores",
"hdr_year" => "Anual",
"hdr_month" => "Mensal",
"hdr_week" => "Semanal",
"hdr_day" => "Diária",
"hdr_upcoming" => "Próximos Eventos",
"hdr_changes" => "Alterações",
"hdr_select_admin_functions" => "Selecionar Funções do Administrador",
"hdr_admin" => "Administração",
"hdr_add_event" => "Adicionar Evento",
"hdr_show_sbar" => "Mostrar barra lateral",
"hdr_settings" => "Definições",
"hdr_categories" => "Categorias",
"hdr_users" => "Utilizadores",
"hdr_database" => "Base de dados",
"hdr_import_csv" => "Importar CSV",
"hdr_import_ics" => "Importar iCal",
"hdr_export_ics" => "Exportar iCal",
"hdr_calendar" => "Back to calendar",
"hdr_guide" => "Ajuda",
"hdr_log_in" => "Iniciar Sessão",
"hdr_log_out" => "Terminar Sessão",
"hdr_today" => "Hoje", //dtpicker.js
"hdr_clear" => "Apagar", //dtpicker.js

//header_s.php
"hdr_close_window" => "Fechar Janela",

//event.php
"evt_no_title" => "Título vazio!",
"evt_no_start_date" => "Data de início vazia!",
"evt_bad_date" => "Data inválida!",
"evt_bad_rdate" => "Repetição da date final errada!",
"evt_no_start_time" => "Hora de início vazia!",
"evt_bad_time" => "Hora inválida!",
"evt_end_before_start_time" => "Hora do fim anterior há hora do início!",
"evt_end_before_start_date" => "Data do fim anterior há data do início!",
"evt_until_before_start_date" => "Repete o fim antes da data de início!",
"evt_title" => "Título",
"evt_venue" => "Local",
"evt_resource" => "Categoria",
"evt_description" => "Descrição",
"evt_date_time" => "Data / tempo",
"evt_mailer" => "remetente",
"evt_private_event" => "Evento Privado",
"evt_start_date" => "Início",
"evt_end_date" => "Fim",
"evt_select_date" => "Selecionar data",
"evt_select_time" => "Selecionar hora",
"evt_all_day" => "Todo o dia",
"evt_change" => "Alterar",
"evt_set_repeat" => "Definir repetição",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Repetição especificada não é suportada",
"evt_no_repeat" => "Não repetir",
"evt_repeat" => "Repetir",
"evt_repeat_on" => "Repetir a cada",
"evt_until" => "até",
"evt_blank_no_end" => "em branco: sem fim",
"evt_of_the_month" => "do mês",
"evt_interval1_1" => "todos(as) os(as)",
"evt_interval1_2" => "a cada dois(duas)",
"evt_interval1_3" => "a cada três",
"evt_interval1_4" => "a cada quatro",
"evt_interval1_5" => "every fifth",
"evt_interval1_6" => "every sixth",
"evt_interval2_1" => "primeiro(a)",
"evt_interval2_2" => "segundo(a)",
"evt_interval2_3" => "terceiro(a)",
"evt_interval2_4" => "quarto(a)",
"evt_interval2_5" => "último(a)",
"evt_period1_1" => "dias",
"evt_period1_2" => "semanas",
"evt_period1_3" => "meses",
"evt_period1_4" => "anos",
"evt_notify" => "Enviar e-mail",
"evt_now_and_or" => "agora e/ou",
"evt_event_added" => "O Seguinte evento foi adicionado",
"evt_event_edited" => "O Seguinte evento foi alterado",
"evt_event_deleted" => "O Seguinte evento foi eliminado",
"evt_days_before_event" => "dia(s) antes do evento:",
"evt_notify_eml_list" => "Endereços de e-mail devem ser separados por ponto e vírgula - Máx. 255 caracteres.",
"evt_eml_list_too_long" => "Lista de endereços de e-mail possu&iacute muitos caracteres.",
"evt_eml_list_missing" => "Notificação de e-mail(s) em falta",
"evt_not_in_past" => "Dia de notificação não pode ser anterior ao dia de hoje",//
"evt_not_days_invalid" => "Dias de notificação inválidos",//
"evt_url_format" => "hiperligação para site: url ou url [nome]. Ex. www.google.com [pesquisa]",
"evt_confirm_added" => "evento added",//
"evt_confirm_saved" => "evento saved",//
"evt_confirm_deleted" => "evento deleted",//
"evt_add" => "Adicionar",
"evt_edit" => "Editar ",
"evt_save_close" => "Salvar e Fechar",
"evt_save" => "Salvar",
"evt_clone" => "Salvar como Novo",
"evt_delete" => "Eliminar",
"evt_close" => "Fechar",
"evt_open_calendar" => "Abre o calendário",
"evt_owner" => "Autor",
"evt_edited" => "Edited",
"evt_is_repeating" => "is a repeating event.",
"evt_is_multiday" => "is a multi-day event.",
"evt_edit_series_or_occurrence" => "Do you want to edit the series or this occurrence?",
"evt_edit_series" => "Edit the series",
"evt_edit_occurrence" => "Edit this occurrence",

//views
"vws_add_event" => "Adiconar Evento",
"vws_view_month" => "Ver Mês",
"vws_view_week" => "Ver Semana",
"vws_view_day" => "Ver Dia",
"vws_click_for_full" => "para ver todo o calendário clique em mês",//
"vws_view_full" => "View full calendar",//
"vws_prev_month" => "Mês Anterior",//
"vws_next_month" => "Próximo Mês",//
"vws_today" => "Hoje",
"vws_back_to_today" => "Voltar para o dia de hoje",
"vws_week" => "Semana",
"vws_wk" => "sem",
"vws_time" => "Hora",
"vws_events" => "Eventos",
"vws_all_day" => "Todo o dia",
"vws_venue" => "Local",
"vws_owner" => "Autor",
"vws_print" => "Imprimir",
"vws_print_today" => "Imprimir o dia de Hoje",
"vws_print_all" => "Imprimir Tudo",
"vws_events_for_next" => "Próximos eventos",
"vws_days" => "dia(s)",
"vws_edited" => "Editado",
"vws_notify" => "Notificar",

//changes.php
"chg_from_date" => "Da data",
"chg_select_date" => "Selecionar data de inicio",
"chg_notify" => "Notificação",
"chg_days" => "Dia(s)",
"chg_added" => "Adicionado",
"chg_edited" => "Editado",
"chg_deleted" => "Eliminado",
"chg_changed_on" => "Mudou em",
"chg_changes" => "Alterações",
"chg_no_changes" => "Sem alterações."
);
?>