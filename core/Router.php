<?php
include_once _core_ . "/lib/parse_path.php";

/**
 * Class AbstractRouter
 * Stewie uses this class to parse url paths and show results to users
 */
class Router{
    private $address;

    public function __construct(){
        $this->address = "/".parse_path()["call_utf8"];
    }

    protected static function call($callable, $parameter = array()){
        if (is_callable($callable)) {
            call_user_func_array($callable, $parameter);
        } else {
            try{
                $controllerArray = explode("@",$callable);
                $controllerClass = new $controllerArray[0];
                $method = $controllerArray[1];
                if (method_exists($controllerClass, $method)) {
                    $methodChecker = new ReflectionMethod($controllerClass, $method);
                    if ($methodChecker->isStatic()) {
                        call_user_func_array([$controllerClass, $method], $parameter);
                    } else {
                        if(is_subclass_of($controllerClass,"BaseController")){
                            $template_engine_name = TEMPLATE_ENGINE_NAME;
                            $template_engine = new $template_engine_name;
                            $controllerClass->setTemplateEngine($template_engine);
                        }
                        call_user_func_array([$controllerClass, $method], $parameter);
                    }
                }else{
                    throw new Exception("No method named $method found in $controllerClass");
                }
            }catch (Exception $e){
                throw new Exception("No Class named $controllerClass was found");
            }
        }
    }

    private function pathCheckAndCall($uri,$callable,$filters=null){
        $explodedURI = explode("/",$uri);
        $explodedAddress = explode("/",$this->address);
        unset($explodedURI[0]);
        unset($explodedAddress[0]);
        if(count($explodedURI) == count($explodedAddress) || (count($explodedAddress)-1 == count($explodedURI) && empty($explodedAddress[count($explodedURI)]))){
            $flag = true;
            $parameters = [];
            for($i=1;$i<=count($explodedURI);$i++){
                if(strpos($explodedURI[$i],"{")!==false && strpos($explodedURI[$i],"}")!==false){
                    $tmp = str_replace("{","",$explodedAddress[$i]);
                    $parameters[] = str_replace("}","",$tmp);
                }else if($explodedURI[$i]!=$explodedAddress[$i]){
                    $flag = false;
                    break;
                }
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if ($this->filter($filters)) {
                    die(_FILTER_FAIL_MSG_);
                }
            }
            if($flag){
                $this->call($callable,$parameters);

            }
        }

    }


    private function filter($filters){
        $filters = explode("|", ucwords(str_replace(" ", "", $filters)));
        foreach ($filters as $filter) {
            $f = new $filter;
            $f->do_filter();
            if ($f->is_filtered()) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * @param $path
     * @param $controller
     * @param null $method
     */
    public function get($uri, $callable, $filters = null){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->pathCheckAndCall($uri,$callable,$filters);
        }
    }

    /**
     * @param $path
     * @param $controller
     * @param null $method
     * @param null $filters
     */
    public function post($uri, $callable, $filters = null){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->pathCheckAndCall($uri,$callable,$filters);
        }
    }
}