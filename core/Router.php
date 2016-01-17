<?php

class Router extends AbstractRouter{
    /**
     * @inheritDoc
     */
    public static function get($path, $controller, $method = null){
        try {
            parent::get($path, $controller, $method);
        }catch (No_Such_ControllerClass_Exception $nsc){
            stewie_exception_handler($nsc);
        }catch (No_Such_Method_Exception $nsme){
            stewie_exception_handler($nsme);
        }catch (Exception $e){
            stewie_exception_handler($e);
        }
    }

    /**
     * @inheritDoc
     */
    public static function post($path, $controller, $method = null, $filters = null){
        try {
        parent::post($path, $controller, $method,$filters);
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