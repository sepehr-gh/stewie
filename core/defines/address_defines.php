<?php

/**
 * _base_url_ defines website root in http protocol
 */
if($_SERVER["SERVER_PORT"]==80){
    if(isset($_SERVER["REQUEST_SCHEME"])){
        define("_base_url_",$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/'));
    }else{
        define("_base_url_","http://".$_SERVER["SERVER_NAME"].rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/'));
    }
}else{
    if(isset($_SERVER["REQUEST_SCHEME"])){
        define("_base_url_",$_SERVER['REQUEST_SCHEME']."//".$_SERVER['SERVER_NAME'].":".$_SERVER["SERVER_PORT"].rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/'));
    }else{
        define("_base_url_","http//".$_SERVER['SERVER_NAME'].":".$_SERVER["SERVER_PORT"].rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/'));
    }
}

/**
 * _root_ defines project root file (system file - folder/ftp format)
 */
define("_root_",__DIR__."/../..");

/**
 * _controllers_ defines Stewie Controller folder address
 */
define("_controllers_",_root_."/controllers");

/**
 * _assets_ defines Stewie developer configs folder address
 */
define("_config_",_root_."/config");

/**
 * _core_ defines Stewie core folder address
 */
define("_core_",_root_."/core");

/**
 * _core_ defines Stewie core folder address
 */
define("_exceptions_",_root_."/core/exceptions");


/**
 * _module_ defines Stewie module folder address
 */
define("_module_",_root_."/core");

/**
 * _views_ defines Stewie views folder address
 */
define("_views_",_root_."/views");

/**
 * _assets_ defines Stewie assets folder address
 */
define("assets",_root_."/assets");

