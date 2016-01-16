<?php
include_once "core/Router.php";
include_once "core/defines/address_defines.php";
Router::get("/test/{text}",function($text){
    echo $text;
});
Router::get("/hello/{username}","HelloController","sayHello");