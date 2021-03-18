<?php
namespace Block\Admin\Layout;
\Mage::loadFileByClassName('Block\Core\Layout\Header');
class Header extends \Block\Core\Layout\Header
{
    public function __construct(){
        $this->setTemplate("./View/admin/layout/nav.php");
    } 
}


?>