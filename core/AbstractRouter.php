<?php
include_once _core_ . "/lib/parse_path.php";

/**
 * Class AbstractRouter
 * Stewie uses this class to parse url paths and show results to users
 */
class AbstractRouter
{
    private static $basePath;
    private static $call_utf8;
    private static $call;
    private static $call_parts;

    private static function init()
    {
        $parse_path = parse_path();
        self::$basePath = $parse_path['base'];
        self::$call = $parse_path['call'];
        self::$call_utf8 = $parse_path['call_utf8'];
        self::$call_parts = $parse_path['call_parts'];
    }

    protected static function call($controller, $method, $parameter = null){
        if (is_callable($controller)) {
            call_user_func_array($controller, $parameter);
        } else {
            try{
                $controllerClass = new $controller;
                if (method_exists($controllerClass, $method)) {
                    $methodChecker = new ReflectionMethod($controller, $method);
                    if ($methodChecker->isStatic()) {
                        call_user_func_array([$controller, $method], $parameter);
                    } else {
                        $template_engine_name = TEMPLATE_ENGINE_NAME;
                        $template_engine = new $template_engine_name;
                        $controllerClass->setTemplateEngine($template_engine);
                        call_user_func_array([$controllerClass, $method], $parameter);
                    }
                }else{
                    throw new Exception("No method named $method found in $controller");
                }
            }catch (Exception $e){
                stewie_exception_handler($e);
            }
        }
    }


    private static function filter($filters){
        $filters = explode("|", ucwords(str_replace(" ", "", $filters)));
        foreach ($filters as $filter) {
            $f = new $filter;
            $f->do_filter();
            if ($f->is_filtered()) {
                return true;
            } else {
                return false;
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
                    if (strpos($path_parts_array[$i], "{") !== false && strpos($path_parts_array[$i], "}") !== false) {
                        $parameter[$i] = str_replace("{", "", self::$call_parts[$i]);
                        $parameter[$i] = str_replace("}", "", $parameter[$i]);
                    } elseif ($path_parts_array[$i] != self::$call_parts[$i]) {
                        $true_url = false;
                        break;
                    }
                }
                if ($true_url) {
                    self::call($controller, $method, $parameter);
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
    public static function post($path, $controller, $method = null, $filters = null){
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
                    if (strpos($path_parts_array[$i], "{") !== false && strpos($path_parts_array[$i], "}") !== false) {
                        $parameter[$i] = str_replace("{", "", self::$call_parts[$i]);
                        $parameter[$i] = str_replace("}", "", $parameter[$i]);
                    } elseif ($path_parts_array[$i] != self::$call_parts[$i]) {
                        $true_url = false;
                        break;
                    }
                }
                if ($true_url) {
                    if ($filters != null && !empty($filters)) {
                        if (!self::filter($filters)) {
                            die("could not pass filter");
                        }
                    }
                    self::call($controller, $method, $parameter);
                }
            }
        }
    }
}