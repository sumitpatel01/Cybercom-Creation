<?php
namespace Block\Customer;
\Mage::loadFileByClassName('Block\Core\Layout');
class About extends \Block\Core\Layout{

    public function __construct()
    {
        $this->setTemplate('View/customer/about.php');
    }
}
?>