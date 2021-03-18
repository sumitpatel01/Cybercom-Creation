<?php
namespace Block\Admin\Payment;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    protected $payments = null;
   
    public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/payment/grid.php');
        $this->setPayments();
	}

    public function getPayments(){
        if(!$this->payments){
            $this->payments;
        }
        
        return $this->payments;

    }

    public function setPayments($payments = null){
        if(!$payments){
            $payment = \Mage::getModel('Model\Payment');;
            $payments = $payment->fetchAll();
        }
        
        $this->payments = $payments;
        return $this;

    }
}


?>