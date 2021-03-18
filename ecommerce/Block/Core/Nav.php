<?php
namespace Block\Core;
class Nav extends Template 
{
    public function __construct()
    {
        $this->setTemplate('./View/core/layout/nav.php');
        $this->setUrl();
    }
}


?>