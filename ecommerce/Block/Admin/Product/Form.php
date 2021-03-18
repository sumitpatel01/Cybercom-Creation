<?php
namespace Block\Admin\Product;
\Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/admin/product/form.php");
	}

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('save');
	}

}
?>