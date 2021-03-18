<?php
namespace Block\Admin\Customer\Group\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs  extends \Block\Core\Edit\Tabs
  {
    
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultTab('CustomerGroup'); 
    }

    public function prepareTab(){
        $this->addTab(['key' => 'CustomerGroup', 'label' => 'Customer Group Information', 'block'=> 'Block\Admin\Customer\Group\Edit\Tabs\Form']);
    }

    
    
  }
  

?>