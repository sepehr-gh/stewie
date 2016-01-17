<?php

class Router extends AbstractRouter{
    /**
     * @inheritDoc
     */
    public static function get($path, $controller, $method = null)
    {
        try {
            parent::get($path, $controller, $method);
        }catch (No_Such_ControllerClass_Exception $nsc){
            if(_debug_mode_){
                echo "catched";
                echo $nsc->getMessage();
            }
        }catch (No_Such_Method_Exception $nsme){
            if(_debug_mode_){
                echo $nsme->getMessage();
            }
        }
    }

    /**
     * @inheritDoc
     */
    public static function post($path, $controller, $method = null, $filters = null)
    {
        try {
        parent::post($path, $controller, $method,$filters);
        }catch (No_Such_ControllerClass_Exception $nsc){
            if(_debug_mode_){
                echo "catched";
                echo $nsc->getMessage();
            }
        }catch (No_Such_Method_Exception $nsme){
            if(_debug_mode_){
                echo $nsme->getMessage();
            }
        }catch (No_Such_Filter_Exception $nsf){
            if(_debug_mode_){
                pad($nsf->getTrace());
            }
        }
    }


}