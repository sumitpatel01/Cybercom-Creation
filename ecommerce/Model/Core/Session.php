<?php
namespace Model\Core;
class Session  
{
    protected $namespace = null;
    public function __construct()
    {
        $this->start();
        $this->setNameSpace('core');
    }
    public function setNameSpace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }
    public function getNameSpace()
    {
        return $this->namespace;
    }
    public function start()
    {   if(session_status() == PHP_SESSION_NONE){
        session_start();
        }
    return $this;
    }

    public function destroy()
    {
        session_destroy();
    }

    public function getId()
    {
        return session_id();
    }

    public function regenerateId()
    {
        return session_regenerate_id();
    }

    public function getNewId()
    {
        session_start();
    }

    public function __set($key ,$value)
    {
        $_SESSION[$this->getNameSpace()][$key] = $value;
        return $this;
    }
    public function __get($key)
    {
        if(array_key_exists($this->getNameSpace(), $_SESSION)) {
        if(array_key_exists($key, $_SESSION[$this->getNameSpace()])){
        return $_SESSION[$this->getNameSpace()][$key];
        }
    }
    }
    public function __unset($key)
    {
        if(array_key_exists($key, $_SESSION[$this->getNameSpace()])){
         unset($_SESSION[$this->getNameSpace()][$key]);
        }
        return $this;
    }
}

?>