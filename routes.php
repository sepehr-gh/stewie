<?php

Route::get("/test/{text}",function($text){
    echo $text;
});
Route::get("/hello/{username}","HelloController@sayHello");
Route::get("/",function(){
    echo "Welcome";
});
Route::get("/filter-test","FilterTestController@get");
Route::post("/filter-test","FilterTestController@post","CSRF");

//Router::post("/filter-test","FilterTestController","post","WrongFilterNameForTest");

Route::get("/templateTest","HelloController@templateTest");

Route::get("/databaseTest","HelloController@databaseTest");

Route::get("/modelTest","HelloController@modelTest");

Route::get("/get","HelloController@get");

Route::post("/post","HelloController@post","CSRF");

Route::E404(function(){
    echo "oops! this 404 error is set in routes!";
});