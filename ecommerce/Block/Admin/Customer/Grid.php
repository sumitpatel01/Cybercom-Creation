<?php
namespace Block\Admin\Customer;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    protected $customers = null;
   
    public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/customer/grid.php');
        $this->setCustomers();
	}

    public function getCustomers(){
        if(!$this->customers){
            $this->customers;
        }
        
        return $this->customers;

    }

    public function setCustomers($customers = null){
        if(!$customers){
            $customer = \Mage::getModel('Model\Customer');
            $customers = $customer->fetchAll();
        }
        
        $this->customers = $customers;
        return $this;

    }
}


?>