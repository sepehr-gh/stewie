<?php
    session_start();
    if(!isset($_SESSION['csrf'])){
        $_SESSION['csrf'] = sha1(time().$_SERVER["REMOTE_ADDR"].rand(0,time()));
    }
    define("csrf","<input name='csrf' value='".$_SESSION['csrf']."' type='hidden'>");
    if(!$debug_mode){
        set_error_handler("s_error_log",$error_types);
        error_reporting(0);
    }else{
        error_reporting($error_types);
    }
    define("_DEBUG_MODE_",$debug_mode);
    define("_ERROR_TYPES_",$error_types);
    define("TEMPLATE_ENGINE_NAME",$template_engine_class_name);
    set_exception_handler("stewie_exception_handler");
    if(isset($mysql_db_info)){
        foreach($mysql_db_info as $key => $value){
            define($key,$value);
        }
    }
    spl_autoload_register("AUTOLOADER");