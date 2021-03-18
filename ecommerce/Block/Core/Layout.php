<?php
namespace Block\Core;
\Mage::loadFileByClassname('Block\Core\Template');
class Layout extends Template{

    public function __construct(){
        parent::__construct();
        $this->setTemplate('./View/core/template/one-column.php');
        $this->prepareChildren();
    }
    public function prepareChildren()
	{
		$this->addChild(\Mage::getBlock('Block\Core\Layout\Header'),'header');
		$this->addChild(\Mage::getBlock('Block\Core\Layout\Left'),'left');
		$this->addChild(\Mage::getBlock('Block\Core\Layout\Content'),'content');
		$this->addChild(\Mage::getBlock('Block\Core\Layout\Footer'),'footer');
	}

    public function getContent()
    {
        return $this->getChild('content');
    }

    public function getLeft()
    {
        return $this->getChild('left');
    }
    
    public function getRight()
    {
        return $this->getChild('right');
    }

}
?>