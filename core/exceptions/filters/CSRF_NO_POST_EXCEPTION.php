<?php

class CSRF_NO_POST_EXCEPTION extends Exception{
    public function __construct($message = "", $code = 0, Exception $previous = null){
        parent::__construct("No CSRF key was found in \$_POST", $code, $previous);
    }
}