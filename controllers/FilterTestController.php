<?php

class FilterTestController extends BaseController {
    public function get(){
        echo "<form method='post'> <input name='csrf' value='". $_SESSION["csrf"] ."' type='text'> <input name='name'> <input type='submit'>";
    }
    public function post(){
        pad($_POST);
    }
}