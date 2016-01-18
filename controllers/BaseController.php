<?php


/**
 * Class BaseController
 */
class BaseController {
    /**
     * @var TemplateEngine
     */
    protected $templateEngine;

    /**
     * @param TemplateEngine $templateEngine
     */
    public function setTemplateEngine(TemplateEngine $templateEngine){
        $this->templateEngine = $templateEngine;
    }
}