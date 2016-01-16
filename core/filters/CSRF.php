<?php

class CSRF implements Filter{

    private $is_filtered = false;
    public function do_filter(){
        if(isset($_SESSION['csrf'])){
            if(isset($_POST['csrf'])){
                if($_SESSION['csrf'] == $_POST['csrf']){
                    $this->setIsFiltered(true);
                }else{
                    $this->attack_log();
                }
            }else{
                //todo: no csrf input ERROR
            }
        }else{
            //todo: no csrf session value ERROR
        }
    }

    public function attack_log(){
        security_filter_attack_log("csrf");
    }

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