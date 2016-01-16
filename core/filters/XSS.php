<?php

class XSS implements Filter{
    private $is_filtered = false;
    public function do_filter(){
        if(isset($_POST) && !empty($_POST)){
            foreach($_POST as $key => $value){
                $_POST[$key] = htmlentities($value);
            }
        }
        if(isset($_GET) && !empty($_GET)){
            foreach($_GET as $key => $value){
                $_GET[$key] = htmlentities($value);
            }
        }
        $this->setIsFiltered(true);
    }

    public function attack_log(){}

    public function is_filtered(){
        return $this->is_filtered;
    }

    /**
     * @param boolean $is_filtered
     */
    public function setIsFiltered($is_filtered)
    {
        $this->is_filtered = $is_filtered;
    }

}