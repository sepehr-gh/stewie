<?php
include_once _core_ . "/lib/smarty/libs/Smarty.class.php";

class SmartStewie implements TemplateEngine{
    private $smarty;

    /**
     * SmartStewie constructor.
     */
    public function __construct(){
        $this->smarty = new Smarty;
        $this->config();
    }

    public function config(){
        $this->smarty->debugging = DEBUGGING;
        $this->smarty->error_reporting = ST_ERROR_TYPES;
        $this->smarty->setTemplateDir(_views_);
        $this->smarty->setCompileDir(ST_COMPILE_DIR);
        $this->smarty->cache_lifetime = ST_CACHE_LIFETIME;
        $this->smarty->setCacheDir(VIEW_CACHE_DIR);
        $this->smarty->muteExpectedErrors();
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value){
        $this->smarty->assign($key,$value);
    }

    /**
     * @param $templateFileName
     * @return mixed
     */
    public function display($templateFileName){
        return $this->smarty->display($templateFileName);
    }
}