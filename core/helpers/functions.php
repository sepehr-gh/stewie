<?php


/**
 * @param String $library
 * @param bool|false $isNotBuiltIn
 *
 * imports built-in packages and helper libraries available in Stewie framework
 * use second parameter if library you are importing is not a built-in but is introduced.
 */
function import($library,$isNotBuiltIn = false){

}

/**
 * @param array $array
 * Prints Array in good format and dies
 */
function pad(Array $array){
    echo "<div><pre>";
    print_r($array);
    echo "</pre></div>";
}

/**
 * @param $errno
 * @param $errstr
 * @param $errfile
 * @param $errline
 * Stewie error logging function
 */
function s_error_log($errno, $errstr, $errfile, $errline){
    $log = "Error num : $errno | Message : $errstr | File : $errfile in line $errline \n";
    $file = fopen(_core_."/storage/logs/log.txt","w");
    fwrite($file,$log);
    fclose($file);
}