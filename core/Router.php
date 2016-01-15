<?php
include_once "lib/parse_path.php";

/**
 * Class Router
 * Stewie uses this class to parse url paths and show results to users
 */
class Router{
    private static $basePath;
    private static $call_utf8;
    private static $call;
    private static $call_parts;

    /**
     * Router constructor.
     * Initialize Router class. Sets path details
     */
    public function init(){
        $parse_path = parse_path();
        self::$basePath = $parse_path['base'];
        self::$call = $parse_path['call'];
        self::$call_utf8 = $parse_path['call_utf8'];
        self::$call_parts = $parse_path['call_parts'];
    }

    public static function get($path, $controller, $method = null){
        self::init();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $path_parts_array = explode('/', $path);
            unset($path_parts_array[0]);
            $path_parts_array = array_values($path_parts_array);
            $count = count($path_parts_array);
            if ($count == count(self::$call_parts) || ($count == count(self::$call_parts) - 1 && empty(self::$call_parts[$count]))) {
                $true_url = true;
                $parameter = null;
                if ($count == count(self::$call_parts) + 1 && empty($path_parts_array[$count - 1])) {
                    $count -= 1;
                }
                for ($i = 0; $i < $count; $i++) {
                    if (strpos($path_parts_array[$i],"{") !== false && strpos($path_parts_array[$i],"}") !== false) {
                        $parameter[$i] = str_replace("{", "", self::$call_parts[$i]);
                        $parameter[$i] = str_replace("}", "", $parameter[$i]);
                    } elseif ($path_parts_array[$i] != self::$call_parts[$i]) {
                        $true_url = false;
                        break;
                    }
                }
                if ($true_url) {
                    if (is_callable($controller)) {
                        call_user_func_array($controller, $parameter);
                    } else {
                        $file = _controllers_ . "/" . $controller . ".php";
                        if (file_exists($file) && $method != null) {
                            include_once $file;
                            call_user_func_array([$controller, $method], $parameter);
                        }else{
                            //Todo : throw new exception
                        }
                    }
                }
            }
        }
    }

    public static function post($path, $controller, $method = null,$filter = null){
        self::init();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $path_parts_array = explode('/', $path);
            unset($path_parts_array[0]);
            $path_parts_array = array_values($path_parts_array);
            $count = count($path_parts_array);
            if ($count == count(self::$call_parts) || ($count == count(self::$call_parts) - 1 && empty(self::$call_parts[$count]))) {
                $true_url = true;
                $parameter = null;
                if ($count == count(self::$call_parts) + 1 && empty($path_parts_array[$count - 1])) {
                    $count -= 1;
                }
                for ($i = 0; $i < $count; $i++) {
                    if (strpos($path_parts_array[$i],"{") !== false && strpos($path_parts_array[$i],"}") !== false) {
                        $parameter[$i] = str_replace("{", "", self::$call_parts[$i]);
                        $parameter[$i] = str_replace("}", "", $parameter[$i]);
                    } elseif ($path_parts_array[$i] != self::$call_parts[$i]) {
                        $true_url = false;
                        break;
                    }
                }
                if ($true_url) {
                    // Todo : Do a filter

                    if (is_callable($controller)) {
                        call_user_func_array($controller, $parameter);
                    } else {
                        $file = _controllers_ . "/" . $controller . ".php";
                        if (file_exists($file) && $method != null) {
                            include_once $file;
                            call_user_func([$controller, $method], $parameter);
                        }else{
                            //Todo : throw new exception
                        }
                    }
                }
            }
        }
    }
}