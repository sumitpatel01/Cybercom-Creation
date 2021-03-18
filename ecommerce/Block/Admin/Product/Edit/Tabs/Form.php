<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Form extends \Block\Core\Edit
{
    protected $product = Null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/product/edit/tabs/form.php');
        $this->setProduct();
    }

	public function setProduct($product = Null)
	{
		if ($product) {
			$this->product = $product;
			return $this;
		}
		$product = \Mage::getModel('Model\Product');
		if ($productId = (int) $this->getRequest()->getGet('id')) {
            $data = $product->load($productId)->getData();
			if (!$product) {
				return false;
			}
		}
		$this->product = $data;
		return $this;

	}
	public function getProduct()
	{
		if (!$this->product) {
			$this->setProduct();
		}
		return $this->product;
	}

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update');
	}

}


?>