<?php
namespace Block\Admin\Attribute;
\Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/admin/attribute/form.php");
	}

    public function getAttribute(){
        return \Mage::getModel('Model\Attribute');
    }

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('save');
	}

}
?>