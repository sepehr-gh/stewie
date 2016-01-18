<?php

class Router {
    /**
     * @param $path
     * @param $controller
     * @param null $method
     */
    public static function get($path, $controller, $method = null){
        try {
            AbstractRouter::get($path, $controller, $method);
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
    public static function post($path, $controller, $method = null, $filters = null){
        try {
            AbstractRouter::post($path, $controller, $method,$filters);
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