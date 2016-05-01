<?php

class No_Such_FIlter_Exception extends Exception{
    public function __construct($message = "", $code = 0, Exception $previous = null){
        parent::__construct("No Filter class was found with provided name", $code, $previous);
    }
}