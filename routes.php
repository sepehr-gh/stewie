<?php
Router::get("/test/{text}",function($text){
    echo $text;
});
Router::get("/hello/{username}","HelloController","sayHello");
Router::get("/",function(){
    echo "Welcome";
});
Router::get("/filter-test","FilterTestController","get");
Router::post("/filter-test","FilterTestController","post","CSRF");

//Router::post("/filter-test","FilterTestController","post","WRONGFILTER");

Router::get("/check-error","HelloController","dehaa");