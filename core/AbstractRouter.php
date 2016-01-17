<?php
include_once "lib/parse_path.php";

/**
 * Class Router
 * Stewie uses this class to parse url paths and show results to users
 */
class AbstractRouter{
    private static $basePath;
    private static $call_utf8;
    private static $call;
    private static $call_parts;

    private static function init(){
        $parse_path = parse_path();
        self::$basePath = $parse_path['base'];
        self::$call = $parse_path['call'];
        self::$call_utf8 = $parse_path['call_utf8'];
        self::$call_parts = $parse_path['call_parts'];
    }

    protected static function call($controller,$method,$parameter = null){
        if (is_callable($controller)) {
            call_user_func_array($controller, $parameter);
        } else {
            $file = _controllers_ . "/" . $controller . ".php";
            if (file_exists($file) && $method != null) {
                include_once $file;
                $controllerClass = new $controller;
                if(method_exists($controllerClass,$method)){
                    $methodChecker = new ReflectionMethod($controller,$method);
                    if($methodChecker->isStatic()){
                        call_user_func_array([$controller, $method], $parameter);
                    }else{
                        call_user_func_array([$controllerClass,$method],$parameter);
                    }
                }else{
                    include_once _exceptions_ . "/router/No_Such_Method_Exception.php";
                    throw new No_Such_Method_Exception($method);
                }
            }else{
                include_once _exceptions_ . "/router/No_Such_ControllerClass.php";
                throw new No_Such_ControllerClass_Exception($controller);
            }
        }
    }

    private static function filter($filters){
        $filters = explode("|",ucwords(str_replace(" ","",$filters)));
        include_once _core_ . "/filters/Filter.php";
        foreach($filters as $filter){
            if(file_exists(_core_ . "/filters/" . $filter . ".php")){
                include_once _core_ . "/filters/" . $filter . ".php";
                $f = new $filter;
                $f-> do_filter();
                if($f->is_filtered()){
                    return true;
                }else{
                    return false;
                }
            }else{
                include_once _exceptions_ . "/filters/No_Such_Filter.php";
                throw new No_Such_Filter_Exception($filter);
            }
        }
    }

    /**
     * @param $path
     * @param $controller
     * @param null $method
     */
    public static function get($path, $controller, $method = null){
        self::init();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $path_parts_array = explode('/', $path);
            unset($path_parts_array[0]);
            $path_parts_array = array_values($path_parts_array);
            $count = count($path_parts_array);
            if ($count == count(self::$call_parts) || ($count == count(self::$call_parts) - 1 && empty(self::$call_parts[$count]))) {
                $true_url = true;
                $parameter = [];
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
                    self::call($controller,$method,$parameter);
                }
            }
        }
    }

    /**
     * @param $path
     * @param $controller
     * @param null $method
     * @param null $filters
     */
    public static function post($path, $controller, $method = null,$filters = null){
        self::init();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $path_parts_array = explode('/', $path);
            unset($path_parts_array[0]);
            $path_parts_array = array_values($path_parts_array);
            $count = count($path_parts_array);
            if ($count == count(self::$call_parts) || ($count == count(self::$call_parts) - 1 && empty(self::$call_parts[$count]))) {
                $true_url = true;
                $parameter = [];
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
                    if($filters != null && !empty($filters)){
                        if(!self::filter($filters)){
                            //todo: show a page that says security filer could not be passed
                            die("could not pass filter");
                        }
                    }
                    self::call($controller,$method,$parameter);
                }
            }
        }
    }
}