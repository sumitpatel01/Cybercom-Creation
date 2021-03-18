<?php
namespace Block\Admin\Attribute\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs  extends \Block\Core\Edit\Tabs
  {
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultTab('attribute'); 
    }

    public function prepareTab(){
        $this->addTab(['key' => 'attribute', 'label' => 'attribute Information', 'block'=> 'Block\Admin\Attribute\Edit\Tabs\Form']);
        $this->addTab(['key' => 'option', 'label' => 'attribute option', 'block'=> 'Block\Admin\Attribute\Option\Grid']);
    }

    
    
  }
  

?>