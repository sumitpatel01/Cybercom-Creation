<?php
namespace Block\Admin\Admin;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	protected $admin = Null;
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Admin\Edit\Tabs'));
	}
}
?>