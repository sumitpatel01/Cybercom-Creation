<?php
namespace Block\Admin\Cms;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    protected $cmss = null;
   
    public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/cms/grid.php');
        $this->setCmss();
	}

    public function getCmss(){
        if(!$this->cmss){
            $this->setCmss;
        }
        
        return $this->cmss;

    }

    public function setCmss($cmss = null){
        if(!$cmss){
            $cms = \Mage::getModel('Model\Cms');
            $cmss = $cms->fetchAll();
        }
        
        $this->cmss = $cmss;
        return $this;

    }
}


?>