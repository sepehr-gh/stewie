<?php

/**
 * Database Type definition . Default is " Mysql " and uses Defualt MySql Database handler.
 * You can implement DBHandler and add other database handlers to use them.
 */
define("DB_TYPE","Mysql");

$mysql_db_info = array(
    "MYSQL_HOST" => "localhost",
    "MYSQL_DATABASE_NAME" => "stewie_test",
    "MYSQL_DATABASE_USERNAME" => "root",
    "MYSQL_DATABASE_PASSWORD" => "",
    "MYSQL_DEBUG_MODE" => true,

);