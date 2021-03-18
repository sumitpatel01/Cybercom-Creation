<?php
namespace Controller\Core;
\Mage::loadFileByClassName('Model\Core\Request');
class Front
{
    public static function init () {

        $request = \Mage::getModel('Model\Core\Request');

        
        $controllerName = $request->getControllerName();
        $actionName = $request->getActionName()."Action";
        
        
        $controller = \Mage::prepareClassName('Controller', $controllerName);
        $controller->$actionName();    
    }
}



?>