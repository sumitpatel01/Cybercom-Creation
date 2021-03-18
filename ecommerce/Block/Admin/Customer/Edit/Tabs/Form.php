<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('\Block\Core\Edit');
class Form extends \Block\Core\Edit
{
	protected $customer = null;
    public function __construct()
    {
		Parent::__construct();
        $this->setTemplate('./View/admin/customer/edit/tabs/form.php');
    }

	public function getCustomerGroup(){
		
		$sql = "select `CustomerGroupId`, `name` from `customer_group`;";
		$customerGroup = \Mage::getModel('Model\Core\Adapter');

		return $customerGroup->fetchPairs($sql);
	} 

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update','customer');
	}







}




?>