<?php

class Mage{
    public static function init(){
        self::loadFileByClassName('Controller\Core\Front');
        Controller\Core\Front::init();
    }

    public static function prepareClassName($key = NULL, $controllerName) {
        
        $className = $key.'\\'.$controllerName;
        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','\\',$className); 
        self::loadFileByClassName($className);
        return new $className;  

    }

    public static function loadFileByClassName($className) {
        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','/',$className);
        $className = "./".$className.".php";
        require_once($className);   

    }

    public static function getBlock($className, $ton = false) {
        if(!$ton){
        self::loadFileByClassName($className);

        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','\\',$className);
        return new $className;
    }
    $object = self::getRegistry($className);
        if ($object) {
            return $object;
        }
        self::loadFileByClassName($className);

        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','\\',$className);
        $object = new $className;
        self::setRegistry($className, $object);
        return $object;
    }

    public static function getController($className) {
       
        self::loadFileByClassName($className);

        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','\\',$className);
        return new $className;
        

    }

    public static function getModel($className) {
        self::loadFileByClassName($className);

        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','\\',$className);
        return new $className;
    }

    public static function getBaseDir($subPath)
    {
        return getcwd().DIRECTORY_SEPARATOR.$subPath;
    }

    public static function setRegistry($key, $value)
    {
        $GLOBALS[$key]  = $value;
    }
    public static function getRegistry($key, $optional = null)
    {
        if (!array_key_exists($key, $GLOBALS)) {
            return $optional;
        }
        return $GLOBALS[$key];
    }
}

Mage::init();

?>