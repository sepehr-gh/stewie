<?php

class HelloController extends BaseController{
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

    public function templateTest(){
        $this->templateEngine->set("message","Welcome");
        $this->templateEngine->display("welcome.tpl");
    }
}