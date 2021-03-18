<?php
namespace Block\Customer;
\Mage::loadFileByClassName('Block\Core\Layout');
class Contact extends \Block\Core\Layout{

    public function __construct()
    {
        $this->setTemplate('View/customer/contact.php');
    }
}
?>