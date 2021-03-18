<?php
namespace Block\Admin\Admin;
// \Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/admin/admin/form.php");
	}

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('save');
	}
}
?>