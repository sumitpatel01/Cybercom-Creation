<?php
namespace Block\Admin\Attribute;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	protected $attribute = Null;
	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Attribute\Edit\Tabs'));
	}

}
?>