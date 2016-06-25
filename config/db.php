<?php

/**
 * Database Info definition . Default is " Mysql " and uses Defualt MySql Database handler.
 * You can implement DBHandler and add other database handlers to use them.
 */
define('DB_PERSISTENCY', 'true');
define('DB_SERVER', 'localhost');
define('DB_TYPE','mysql');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'stewie_test');
define('PDO_DSN', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);
