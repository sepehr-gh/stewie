<?php

class HelloController{
    private $test = null;
    /**
     * HelloController constructor.
     */
    public function __construct(){
        $this->test = "tested";
    }

    public function sayHello($username){
        echo "Hello ".$username."<br>".$this->test;
    }
}