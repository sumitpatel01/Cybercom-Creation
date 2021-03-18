<?php
namespace Block\Admin\Customer\Group;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    protected $Groups = null;
   
    public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/customer/group/grid.php');
        $this->setGroups();
	}

    public function getGroups(){
        if(!$this->Groups){
            $this->Groups;
        }
        
        return $this->Groups;

    }

    public function setGroups($Groups = null){
        if(!$Groups){
            $Group = \Mage::getModel('Model\Customer\Group');;
            $Groups = $Group->fetchAll();
        }
        
        $this->Groups = $Groups;
        return $this;

    }
}
