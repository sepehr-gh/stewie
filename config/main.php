<?php

/*
 * debug_mode :
 * While debugging your software, you might want to see errors.
 * true : no error logging - showing errors in pages
 * false: error logging - not showing errors in pages
 */
$debug_mode = true;
/*
 * $error_types :
 * in case you are wishing to display/log errors, you can set their type below.
 * default is E_ALL & ~E_NOTICE
 */
$error_types = E_ALL & ~E_NOTICE;