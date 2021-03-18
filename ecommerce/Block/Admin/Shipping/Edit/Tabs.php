<?php
namespace Block\Admin\Shipping\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs  extends \Block\Core\Edit\Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultTab('shipping'); 
    }

    public function prepareTab(){
        $this->addTab(['key' => 'shipping', 'label' => 'shipping Information', 'block'=> 'Block\Admin\Shipping\Edit\Tabs\Form']);
    }
}
?>