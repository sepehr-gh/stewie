<?php

class CSRF_NO_SESSION_EXCEPTION extends Exception{
    public function __construct($message = "", $code = 0, Exception $previous = null){
        parent::__construct("No CSRF SESSION was found", $code, $previous);
    }
}