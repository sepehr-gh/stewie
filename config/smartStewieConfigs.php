<?php

define("ST_ERROR_TYPES",E_ALL & ~E_NOTICE);
define("ST_COMPILE_DIR",_core_."/storage/template_c");
define("ST_CACHE_LIFETIME",120);
define("VIEW_CACHE_DIR",_core_."/storage/st_view_cache");
if(!_debug_mode_){
    define("DEBUGGING",false);
}else{
    define("DEBUGGING",true);
}