<?php

class No_Such_Method_Exception extends Exception{
    /**
     * @inheritDoc
     */
    public function __construct($method = "",$message = "", $code = 0, Exception $previous = null){
        if(!empty($method)){
            parent::__construct("No such method found as ".$method, $code, $previous);
        }else{
            parent::__construct("No such method found", $code, $previous);
        }

    }
}