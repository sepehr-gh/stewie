<?php
    session_start();
    if(!isset($_SESSION['csrf'])){
        $_SESSION['csrf'] = sha1(time().$_SERVER["REMOTE_ADDR"].rand(0,time()));
    }
    if(!$debug_mode){
        set_error_handler("s_error_log",$error_types);
        error_reporting(0);
    }else{
        error_reporting($error_types);
    }
    define("_debug_mode_",$debug_mode);
    define("_error_types_",$error_types);
