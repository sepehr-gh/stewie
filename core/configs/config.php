<?php
    session_start();
    if(!isset($_SESSION['csrf'])){
        $_SESSION['csrf'] = sha1(time().$_SERVER["REMOTE_ADDR"].rand(0,time()));
    }
    set_error_handler("s_error_log");