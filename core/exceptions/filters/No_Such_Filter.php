<?php

class No_Such_Filter_Exception extends Exception{
    /**
     * @inheritDoc
     */
    public function __construct($filter = "",$message = "", $code = 0, Exception $previous = null){
        if(!empty($filter)){
            parent::__construct("No such Filter found as ".$filter, $code, $previous);
        }else{
            parent::__construct("No such Filter found", $code, $previous);
        }

    }
}