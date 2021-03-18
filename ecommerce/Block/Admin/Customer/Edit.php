<?php
namespace Block\Admin\Customer;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	protected $customer = Null;
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Customer\Edit\Tabs'));
	}
	

	public function getCustomerGroup(){
		return [
			'1' => 'retail',
			'2' => 'wholesale'
		];
	} 
}
?>