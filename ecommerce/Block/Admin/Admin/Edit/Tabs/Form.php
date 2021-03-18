<?php
namespace Block\Admin\Admin\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Form extends \Block\Core\Edit
{
    protected $admin = Null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/admin/edit/tabs/form.php');
    }


	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update');
	}

}


?>