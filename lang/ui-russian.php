<?php
/*
= LuxCal event calendar user interface language file =

This file has been translated by the Promoteweb Group.

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","2.5.3");

/* -- Titles on the Header of the Calendar and Date Picker -- */

$months = array("Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь");
$months_m = array("Янв","Февр","Мар","Апр","Май","Июн","Июл","Авг","Сен","Окт","Ноя","Дек");
$wkDays = array("Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота","Воскресенье");
$wkDays_l = array("Вос","Пон","Вто","Сре","Чет","Пят","Суб","Вос");
$wkDays_m = array("Вс","Пн","Вт","Ср","Чт","Пт","Сб","Вс");
$wkDays_s = array("В","П","В","С","Ч","П","С","В");


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"none" => "None.",

//index.php
"title_upcoming" => "Приближающиеся события",
"title_add_event" => "Добавить Событие",
"title_event_details" => "Сведения о Событие",
"title_edit_event" => "Изменить Событие",
"title_log_in" => "Вход",
"title_user_guide" => "Руководство по календарю",
"title_settings" => "Настройка календаря",
"title_edit_cats" => "Редактировать категории",
"title_edit_users" => "Редактировать пользователей",
"title_manage_db" => "Управляйте базу данных",
"title_changes" => "Добавить / Изменить / Удалить события",
"title_csv_import" => "Импорт в CSV файл",
"title_ics_import" => "Импорт в iCal файл",
"title_ics_export" => "Экспорт из iCal файла",
"idx_log_in" => "Авторизуйтесь для просмотра календаря",
"idx_public_name" => "Режим просмотра",

//header.php
"hdr_options" => "Options",
"hdr_options_submit" => "Make your choice and press 'Options'",
"hdr_show_opanel" => "Show Options Panel",
"hdr_select_date" => "Перейти к дате",
"hdr_view" => "Режим",
"hdr_select_view" => "Выберите режим",
"hdr_filter" => "Фильтр ",
"hdr_select_filter" => "Выберите фильтр",
"hdr_lang" => "язык",
"hdr_select_lang" => "Выберите язык",
"hdr_all_cats" => "Все категории",
"hdr_all_users" => "Все пользователи",
"hdr_year" => "Год",
"hdr_month" => "Месяц",
"hdr_week" => "Неделя",
"hdr_day" => "День",
"hdr_upcoming" => "Ближайшее",
"hdr_changes" => "Изменения",
"hdr_select_admin_functions" => "Выберите функцию управления",
"hdr_admin" => "Управление",
"hdr_add_event" => "Добавить событие",
"hdr_show_sbar" => "Show side bar",//
"hdr_settings" => "Настройки",
"hdr_categories" => "Категории",
"hdr_users" => "Пользователи",
"hdr_database" => "База данных",
"hdr_import_csv" => "CSV импорт",
"hdr_import_ics" => "iCal импорт",
"hdr_export_ics" => "iCal экспорт",
"hdr_calendar" => "Back to calendar",
"hdr_guide" => "Справка",
"hdr_log_in" => "Войти",
"hdr_log_out" => "Выйти",
"hdr_today" => "сегодня", //dtpicker.js
"hdr_clear" => "стереть", //dtpicker.js

//header_s.php
"hdr_close_window" => "Закрыть",

//event.php
"evt_no_title" => "Без имени",
"evt_no_start_date" => "Нет даты начала",
"evt_bad_date" => "Неправильная дата",
"evt_bad_rdate" => "Неверный повтор конечной даты",
"evt_no_start_time" => "Нет времени начала",
"evt_bad_time" => "Неправильное время",
"evt_end_before_start_time" => "Время окончания предшествует времени начала",
"evt_end_before_start_date" => "Дата окончания предшествует дате начала",
"evt_until_before_start_date" => "Повторите дату окончания перед датой начала",
"evt_title" => "Заголокок",
"evt_venue" => "Место проведения",
"evt_category" => "Категория",
"evt_description" => "Описание",
"evt_date_time" => "Дата / время",
"evt_mailer" => "почтовый клиент",
"evt_private_event" => "Частное событие",
"evt_start_date" => "Начало",
"evt_end_date" => "Конец",
"evt_select_date" => "Выберите дату",
"evt_select_time" => "Выберите time",
"evt_all_day" => "Весь день",
"evt_change" => "Изменить",
"evt_set_repeat" => "Задать повтор",
"evt_set" => "OK",
"evt_repeat_not_supported" => "Заданное повторение не поддерживается",
"evt_no_repeat" => "Без повтора",
"evt_repeat" => "Повтор",
"evt_repeat_on" => "Повторять каждый",
"evt_until" => "до",
"evt_blank_no_end" => "если бесконечно, оставьте пустым",
"evt_of_the_month" => "месяца",
"evt_interval1_1" => "каждый",
"evt_interval1_2" => "любой другой",
"evt_interval1_3" => "каждый третий",
"evt_interval1_4" => "каждый четвертый",
"evt_interval1_5" => "every fifth",
"evt_interval1_6" => "every sixth",
"evt_interval2_1" => "первый",
"evt_interval2_2" => "второй",
"evt_interval2_3" => "третий",
"evt_interval2_4" => "четвертый",
"evt_interval2_5" => "последний",
"evt_period1_1" => "день",
"evt_period1_2" => "неделя",
"evt_period1_3" => "месяц",
"evt_period1_4" => "год",
"evt_notify" => "Отправить почту",
"evt_now_and_or" => "сейчас и/или",
"evt_event_added" => "Указанное ниже событие добавлено",
"evt_event_edited" => "Указанное ниже событие изменено",
"evt_event_deleted" => "Указанное ниже событие удалено",
"evt_days_before_event" => "день(дней) до начала события:",
"evt_notify_eml_list" => "email-адреса разделяйте точкой с запятой - макс. 255 символов",
"evt_eml_list_too_long" => "Слишком много символов в списке email-адресов.",
"evt_eml_list_missing" => "Отсутствует уведомление на email-адрес(а)",
"evt_not_in_past" => "Notification date in past",//
"evt_not_days_invalid" => "Notification days invalid",//
"evt_url_format" => "ссылка на web-сайт: url или url [имя]. например www.google.ru [поиск]",
"evt_confirm_added" => "cобытие добавил",
"evt_confirm_saved" => "событии сохранен",
"evt_confirm_deleted" => "Событие удален",
"evt_add" => "Добавить",
"evt_edit" => "Edit",
"evt_save_close" => "Сохранить и закрыть",
"evt_save" => "Сохранить",
"evt_clone" => "Сохранить как новую",
"evt_delete" => "Удалить",
"evt_close" => "Закрыть",
"evt_open_calendar" => "Открыть календарь ",
"evt_owner" => "Владелец",
"evt_edited" => "Edited",
"evt_is_repeating" => "is a repeating event.",
"evt_is_multiday" => "is a multi-day event.",
"evt_edit_series_or_occurrence" => "Do you want to edit the series or this occurrence?",
"evt_edit_series" => "Edit the series",
"evt_edit_occurrence" => "Edit this occurrence",

//views
"vws_add_event" => "Добавить событие",
"vws_view_month" => "Обзор месяца",
"vws_view_week" => "Обзор недели",
"vws_view_day" => "Обзор дня",
"vws_click_for_full" => "for full calendar click month",//
"vws_view_full" => "View full calendar",//
"vws_prev_month" => "Previous month",//
"vws_next_month" => "Next month",//
"vws_today" => "Cегодня",
"vws_back_to_today" => "Перейти к месяцу сегодня",
"vws_week" => "нед.",
"vws_wk" => "нд",
"vws_time" => "Время",
"vws_events" => "События",
"vws_all_day" => "Весь день",
"vws_venue" => "Место проведения",
"vws_owner" => "Владелец",
"vws_print" => "Печать",
"vws_print_today" => "Печатать сегодняшний день",
"vws_print_all" => "Печатать все",
"vws_events_for_next" => "Предстоящие к следующему события",
"vws_days" => "день(дней)",
"vws_edited" => "Отредактировано",
"vws_notify" => "Уведомление",

//changes.php
"chg_from_date" => "С даты",
"chg_select_date" => "Выберите дату начала",
"chg_notify" => "Уведомление",
"chg_days" => "День(дней)",
"chg_added" => "Добавлено",
"chg_edited" => "Отредактировано",
"chg_deleted" => "Удалено",
"chg_changed_on" => "Изменено",
"chg_changes" => "Изменения",
"chg_no_changes" => "No changes."
);
?>
