<?php
namespace Block\Admin\Category\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs  extends \Block\Core\Edit\Tabs
  {
    
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultTab('categoryinfo'); 
    }

    public function prepareTab(){
        $this->addTab(['key' => 'categoryinfo', 'label' => 'category Information', 'block'=> 'Block\Admin\Category\Edit\Tabs\Form']);

    }

    
    
  }
  

?>