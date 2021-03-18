<?php
namespace Block\Admin\Customer\Group\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Form extends \Block\Core\Edit
{
    protected $group = Null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/customer/group/edit/tabs/form.php');
    }

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update','customer\group');
	}

}


?>