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
    $file = _core_."/storage/logs/log.txt";
    file_put_contents($file,$log,FILE_APPEND);
}

/**
 * @param $type
 * @param null $text
 */
function security_filter_attack_log($type,$text = null){
    $log = date('l jS \of F Y h:i:s A')." | From IP ".$_SERVER["REMOTE_ADDR"]." | request address: ". $_SERVER["REQUEST_URI"]."  | type: ".$type;
    if($text != null){
        $log .= " | text".$text;
    }
    $log .= "\n";
    $file = _core_."/storage/logs/security_log.txt";
    file_put_contents($file,$log,FILE_APPEND);
}