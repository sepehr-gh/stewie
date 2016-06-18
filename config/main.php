<?php

/*
 * debug_mode :
 * While debugging your software, you might want to see errors.
 * true : no error logging - showing errors in pages
 * false: error logging - not showing errors in pages
 */
$debug_mode = true;
/*
 * $error_types :
 * in case you are wishing to display/log errors, you can set their type below.
 * default is E_ALL & ~E_NOTICE
 */
$error_types = E_ALL & ~E_NOTICE;
/*
 * In case you wish to use your own template engine, you can change below values
 * $template_engine_class_name : exact class name of your template engine
 * $template_engine_implement_path : address of file. Remember your class should implement Stewie default template engine interface
 * availabe in core/template_engine/TemplateEngine.php
 * $template_engine_config_file : in order you want to handle a config for your own template engine, you can address this config
 * directory.
 *
 *
 * ATTENTION : be aware of changing causes.
 */
$template_engine_class_name = "SmartStewie";
$template_engine_implement_path = _core_."/template_engine/SmartStewie.php";
$template_engine_config_file = _config_."/smartStewieConfigs.php";

$stewie_user_packages = array();


/*
 * Filters might fail! Here you can set a message that will be shown if filters fail!
 * Notice: There will be a log available in _core_."/storage/logs/security_log.txt" when a filter is not passed.
 */

define("_FILTER_FAIL_MSG_","Could not pass the filter");