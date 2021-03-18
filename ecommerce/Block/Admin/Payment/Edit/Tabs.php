<?php
namespace Block\Admin\Payment\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs  extends \Block\Core\Edit\Tabs
  {
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultTab('payment'); 
    }

    public function prepareTab(){
        $this->addTab(['key' => 'payment', 'label' => 'Payment Information', 'block'=> 'Block\Admin\Payment\Edit\Tabs\Form']);
    }

    
    
  }
  

?>