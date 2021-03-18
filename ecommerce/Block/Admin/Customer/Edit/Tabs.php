<?php
namespace Block\Admin\Customer\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs  extends \Block\Core\Edit\Tabs
  {
    
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultTab('customerinfo'); 
    }

    public function prepareTab(){
        $this->addTab(['key' => 'customerinfo', 'label' => 'customer Information', 'block'=> 'Block\Admin\Customer\Edit\Tabs\Form']);
        $this->addTab(['key' => 'address', 'label' => 'address', 'block'=> 'Block\Admin\Customer\Edit\Tabs\Address']);
    }

}
  

?>