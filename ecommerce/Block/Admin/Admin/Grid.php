<?php
namespace Block\Admin\Admin;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    protected $admins = null;
   
    public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/admin/grid.php');
        $this->setAdmins();
	}

    public function getAdmins(){
        if(!$this->admins){
            $this->admins;
        }  
        return $this->admins;
    }

    public function setAdmins($admins = null){
        if(!$admins){
            $admin = \Mage::getModel('Model\Admin');
            $admins = $admin->fetchAll();
        }     
        $this->admins = $admins;
        return $this;
    }

    public function getFormUrl(){
        return $this->getModel()->getUrl('save',null,null);
    }
}


?>