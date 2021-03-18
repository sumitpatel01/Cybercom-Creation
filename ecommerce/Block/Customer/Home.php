<?php
namespace Block\Customer;
\Mage::loadFileByClassName('Block\Core\Layout');
class Home extends \Block\Core\Layout{

    public function __construct()
    {
        $this->setTemplate('View/customer/home.php');
    }
}
?>