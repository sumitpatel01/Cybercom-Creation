<?php
namespace Block\Admin\Shipping;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    protected $shippings = null;
   
    public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/shipping/grid.php');
        $this->setShippings();
	}

    public function getShippings(){
        if(!$this->shippings){
            $this->shippings;
        }
        
        return $this->shippings;

    }

    public function setShippings($shippings = null){
        if(!$shippings){
            $shipping = \Mage::getModel('Model\Shipping');
            $shippings = $shipping->fetchAll();
        }
        
        $this->shippings = $shippings;
        return $this;

    }
}


?>