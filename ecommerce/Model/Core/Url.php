<?php
namespace Model\Core;
class Url  
{
    protected $request = null;

    public function __construct()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
    }
    
    public function getURL ($actionName = NULL, $controllerName = NULL,$params = NULL,$resetparams = NULL) {
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

    public function baseUrl($baseurl){
        return "http://localhost/ecommerce/{$baseurl}";
    }
}

?>