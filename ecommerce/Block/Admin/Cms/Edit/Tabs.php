<?php
namespace Block\Admin\Cms\Edit;

\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs  extends \Block\Core\Edit\Tabs
  {
    
    public function __construct()
    {
        parent::__construct();
        $this->setDefaultTab('cms'); 
    }

    public function prepareTab(){
        $this->addTab(['key' => 'cms', 'label' => 'content Information', 'block'=> 'Block\Admin\Cms\Edit\Tabs\Form']);
    }

  }
  

?>