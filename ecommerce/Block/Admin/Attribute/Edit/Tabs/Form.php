<?php
namespace Block\Admin\Attribute\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Form extends \Block\Core\Edit
{
    protected $attribute = Null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/attribute/edit/tabs/form.php');
    }

	public function getAttributeModel(){
        return \Mage::getModel('Model\Attribute');
    }

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update','attribute');
	}

}


?>