<?php

/**
 * Interface TemplateEngine
 * Each and every other template engines users add should implement this interface
 */
interface TemplateEngine{
    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key,$value);

    /**
     * @param $templateFileName
     * @return mixed
     */
    public function display($templateFileName);
}