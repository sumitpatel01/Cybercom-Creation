<?php
namespace Block\Admin\Shipping;
\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	protected $shipping = Null;
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Shipping\Edit\Tabs'));
	}


	
}
?>