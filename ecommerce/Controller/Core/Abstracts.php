<?php
namespace Controller\Core;

class Abstracts{
    protected $request = NULL;
    protected $layout = null;
    protected $message = null;
    
    public function __construct() {
        $this->setRequest();
        $this->setMessage();
        $this->setLayout();
    }

    public function setRequest() {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }

    public function getRequest() {
        return $this->request;
    }

    public function setMessage() {
        $this->message = \Mage::getModel('Model\Core\Message');
        return $this;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setLayout(\Block\Core\Layout $layout = null) {
        if(!$this->layout){
            $layout = \Mage::getBlock('Block\Core\Layout');
        }
        $this->layout = $layout;
        return $this;
    }

    public function getLayout() {
        if(!$this->layout){
            $this->setLayout();
        }
        return $this->layout;
    }

    public function renderLayout(){
        echo $this->getLayout()->toHTML();
    }

    public function getURL ($actionName = NULL, $controllerName = NULL,$params = NULL,$resetparams = false) {
        $final = $_GET;
        if($resetparams)
        {
            $final = [];
        }

        if(empty($controllerName))
        {
            $controllerName = $this->request->getGet('c');
        }

        if(empty($actionName))
        {
            $actionName = $this->request->getGet('a');
        }

        $final['c'] = $controllerName;
        $final['a'] = $actionName;

        if(is_array($params)){
            $final = array_merge($final,$params);
        }

        $queryString = http_build_query($final);
        unset($final);
        return "http://localhost/ecommerce/index.php?{$queryString}";
    } 

    public function redirect ($actionName = NULL, $controllerName = NULL,$params = NULL,$resetparams = false) {
        echo $actionName;
        echo $controllerName;
        header("location: ".$this->getURL($actionName,$controllerName,$params,$resetparams));
        exit();
    }
}