<?php
namespace Block\Admin\Payment\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Form extends \Block\Core\Edit
{
    protected $payment = Null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/payment/edit/tabs/form.php');
    }

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('save');
	}

}


?>