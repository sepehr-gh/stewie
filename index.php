<?php
include_once "core/Router.php";
include_once "core/defines/address_defines.php";
Router::get("/test/{hello}",function($txt){
    echo $txt;
});
//Router::get("/hello/{username}","HelloController","sayHello");