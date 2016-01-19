<?php


/**
 * @param String $library
 * @param bool|false $isNotBuiltIn
 *
 */
function s_import($library,$isNotBuiltIn = false){
    if(!$isNotBuiltIn){
        include _core_ . "/defines/packages.php";
        if(isset($stewie_class_packages[$library])){
            include $stewie_class_packages[$library];
        }else{
            if(strpos($library,'DBHandler') !== false){
                include _core_."/database/DB/$library.php";
            }
        }
    }else{
        global $stewie_user_packages;
        if(isset($stewie_user_packages[$library])){
            include $stewie_user_packages[$library];
        }
    }
}


/**
 * @param $ModelName
 */
function s_model($modelName){
    include_once _models_ . "/BaseModel.php";
    if(file_exists(_models_ . "/" . $modelName . ".php")){
        include_once _models_ . "/" . $modelName . ".php";
    }
}

/**
 * @param $controllerClassName
 */
function s_controller($controllerClassName){
    if(file_exists(_controllers_ . "/" . $controllerClassName . ".php")){
        include_once _controllers_ . "/" . $controllerClassName  . ".php";
    }
}

/**
 * @param array $array
 * Prints Array in good format and dies
 */
function pad(Array $array){
    echo "<div><pre>";
    print_r($array);
    echo "</pre></div>";
    die();
}
/**
 * @param array $array
 * Prints Array in good format
 */
function clearPrint(Array $array){
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

/**
 * @param Exception $exception
 */
function stewie_exception_handler(Exception $exception){
    if(_DEBUG_MODE_){
        echo "<div style='padding: 5px;border:2px solid black;background-color: #ff6e66;color: #FFFFFF;font-family: sans-serif;font-weight: bold;'>".$exception->getMessage()."</div>";
        foreach($exception->getTrace() as $trace){
            echo "<div style='padding: 5px;margin-top: 10px; background-color: #47B1F0;color: #000000;font-family:sans-serif'>";
            foreach($trace as $key => $value){
                if(!is_array($value)){
                    echo $key." : " . $value."<br>";
                }else{
                    echo $key." : <br><blockquote style='color:#FFFFFF'>";
                    foreach($value as $v){
                        echo "$v";
                    }
                    echo "</blockquote><br>";
                }
            }
            echo "</div>";
        }
        echo "<div style='padding: 5px;margin-top: 10px;border: 2px solid #ff4c4a; background-color: #fafafa;color: #1e1e1e;font-family:sans-serif'>";
        echo "<h2>REQUEST DETAILS</h2>";
        echo "<h3>\$_SERVER</h3>";
        clearPrint($_SERVER);
        echo "<h3>parse path</h3>";
        import("ParsePath");
        clearPrint(parse_path());
        echo "<h3>Session</h3>";
        clearPrint($_SESSION);
        echo "<h3>POST</h3>";
        clearPrint($_POST);
        echo "<h3>Cookies</h3>";
        clearPrint($_COOKIE);
        echo "</div>";
    }else{
        s_error_log($exception->getCode(),$exception->getMessage(),$exception->getFile(),$exception->getLine());
    }
}

/**
 * @param $classname
 */
function AUTOLOADER($classname){
    s_import($classname);
    s_model($classname);
    s_controller($classname);
}