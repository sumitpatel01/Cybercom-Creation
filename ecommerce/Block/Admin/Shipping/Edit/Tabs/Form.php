<?php
namespace Block\Admin\Shipping\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Form extends \Block\Core\Edit 
{
    protected $shipping = Null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/shipping/edit/tabs/form.php');
    }

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update');
	}

}


?>