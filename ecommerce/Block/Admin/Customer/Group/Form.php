<?php
namespace Block\Admin\Customer\Group;
class Form extends \Block\Core\Template 
{
    protected $customer = Null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/customer/group/form.php');
    }

    public function getFormUrl()
	{
		return $this->getUrl()->getUrl('save','admin\Customer\Group');
	}

	

}


?>