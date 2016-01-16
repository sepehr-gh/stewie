<?php
Router::get("/test/{text}",function($text){
    echo $text;
});
Router::get("/hello/{username}","HelloController","sayHello");