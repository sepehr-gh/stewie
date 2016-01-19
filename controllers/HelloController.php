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

    public function get(){
        $this->templateEngine->display("form.tpl");

    }

    public function post(){
        clearPrint($_POST);
    }

    public function templateTest(){
        $this->templateEngine->set("message","Welcome");
        $this->templateEngine->display("welcome.tpl");
    }
    //pdo_wrapper test
    public function databaseTest(){
        $db = new PdoWrapper();
        $result = $db->select("test")->results();
        pad($result);
    }
    public function modelTest(){
        $db = new Test();
        $result = $db->all();
        pad($result);
    }
}