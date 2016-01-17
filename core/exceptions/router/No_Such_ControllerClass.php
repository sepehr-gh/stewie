<?php

class No_Such_ControllerClass_Exception extends Exception{
    /**
     * @inheritDoc
     */
    public function __construct($className = "",$message = "", $code = 0, Exception $previous = null){
        if(!empty($className)){
            parent::__construct("No such Controller Class found as ".$className, $code, $previous);
        }else{
            parent::__construct("No such Controller Class found", $code, $previous);
        }

    }
}