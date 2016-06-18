<?php

class Route {
    static $router;
    private static function init(){
        if(!is_object(self::$router)){
            self::$router = new Router();
        }
    }
    /**
     * @param $path
     * @param $controller
     * @param null $method
     */
    public static function get($path, $controller){
        self::init();
        try {
            self::$router->get($path, $controller);
        }catch (No_Such_ControllerClass_Exception $nsc){
            stewie_exception_handler($nsc);
        }catch (No_Such_Method_Exception $nsme){
            stewie_exception_handler($nsme);
        }catch (Exception $e){
            stewie_exception_handler($e);
        }
    }

    /**
     * @param $path
     * @param $controller
     * @param null $method
     * @param null $filters
     */
    public static function post($path, $controller, $filters = null){
        self::init();
        try {
            self::$router->post($path, $controller,$filters);
        }catch (No_Such_ControllerClass_Exception $nsc){
            stewie_exception_handler($nsc);
        }catch (No_Such_Method_Exception $nsme){
            stewie_exception_handler($nsme);
        }catch (No_Such_Filter_Exception $nsf){
            stewie_exception_handler($nsf);
        }catch (Exception $e){
            stewie_exception_handler($e);
        }
    }

}