<?php
namespace Block\Admin\Product\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
  class Tabs  extends \Block\Core\Edit\Tabs
  {
   
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultTab('product'); 
    }

    public function prepareTab(){
        $this->addTab(['key' => 'product', 'label' => 'Product Information', 'block'=> 'Block\Admin\Product\Edit\Tabs\Form']);
        $this->addTab(['key' => 'media', 'label' => 'Media', 'block'=> 'Block\Admin\Product\Edit\Tabs\Media']);
        $this->addTab(['key' => 'price', 'label' => 'Group Price', 'block'=> 'Block\Admin\Product\Edit\Tabs\price']);
        $this->addTab(['key' => 'option', 'label' => 'Attribute Options', 'block'=> 'Block\Admin\Product\Edit\Tabs\option']);
    }

    
   
}


?>