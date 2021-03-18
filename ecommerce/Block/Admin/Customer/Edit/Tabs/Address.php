<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Address extends \Block\Core\Edit
{

    protected $shipping = [];
    protected $billing = [];
    public function __construct()
    {
        Parent::__construct();
        $this->setTemplate('./View/admin/customer/edit/tabs/address.php');
    }


public function getBilling(){
    if(!$this->billing){
        $this->setBilling();
    }
    
    return $this->billing;
}

public function setBilling($billing = null){
    if(!$billing){
        $customerId = $this->getRequest()->getGet('id');
        $billingAddress = \Mage::getModel('Model\Customer\Address');
        $billing = $billingAddress->FetchBilling($customerId);
    }
    $this->billing = $billing;
    return $this;

}


public function getShipping(){
    if(!$this->shipping){
        $this->setShipping();
    }
    
    return $this->shipping;
}

public function setShipping($shipping = null){
    if(!$shipping){
        $customerId = $this->getRequest()->getGet('id');
        $shippingAddress = \Mage::getModel('Model\Customer\Address');
        $shipping = $shippingAddress->FetchShipping($customerId);
    }
    $this->shipping = $shipping;
    return $this;

}

public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update','customer\address');
	}

}


?>