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
    $log = date('l jS \of F Y h:i:s A')." Error num : $errno | Message : $errstr | File : $errfile in line $errline \n";
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

function stewie_exception_handler(Exception $exception){
    if(_debug_mode_){
        echo "<div style='border:2px solid black;background-color: #ff6e66;color: #FFFFFF;font-family: sans-serif;font-weight: bold;'>".$exception->getMessage()."</div>";
        foreach($exception->getTrace() as $trace){
            echo "<div style='margin-top: 10px; background-color: #6E7075;color: #000000;font-family:'>";
            foreach($trace as $key => $value){
                if(!is_array($value)){
                    echo $key." : " . $value."<br>";
                }else{
                    echo $key." : <br><blockquote>";
                    foreach($value as $v){
                        echo "$v";
                    }
                    echo "</blockquote><br>";
                }
            }
            echo "</div>";
        }
    }else{
        s_error_log($exception->getCode(),$exception->getMessage(),$exception->getFile(),$exception->getLine());
    }
}