<?php
namespace Block\Admin\Cms;

\Mage::loadFileByClassName('Block\Core\Edit');

class Edit extends \Block\Core\Edit
{
	protected $cms = Null;

	public function __construct()
	{
		parent::__construct();
		$this->setTabClass(\Mage::getBlock('Block\Admin\Cms\Edit\Tabs'));
	}

}
?>