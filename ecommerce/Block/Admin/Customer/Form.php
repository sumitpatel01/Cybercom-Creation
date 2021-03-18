<?php
namespace Block\Admin\Customer;
\Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/admin/customer/form.php");
	}


	public function getCustomerGroup(){
		
		$sql = "select `customerGroupId`, `name` from `customer_group`;";
		$customerGroup = \Mage::getModel('Model\Core\Adapter');

		return $customerGroup->fetchPairs($sql);
	} 

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('save');
	}

}
?>