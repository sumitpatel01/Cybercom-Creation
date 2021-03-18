<?php
namespace Block\Admin;
\Mage::loadFileByClassname('Block\Core\Layout');
class Layout extends \Block\Core\Layout{

    public function __construct(){
        parent::__construct();
        $this->setTemplate('./View/admin/layout.php');
        $this->prepareChildren();
    }
    public function prepareChildren()
	{
		$this->addChild(\Mage::getBlock('Block\Admin\Layout\Header'),'header');
		$this->addChild(\Mage::getBlock('Block\Admin\Layout\Left'),'left');
		$this->addChild(\Mage::getBlock('Block\Admin\Layout\Content'),'content');
		$this->addChild(\Mage::getBlock('Block\Admin\Layout\Footer'),'footer');
	}

}
?>