<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Option extends \Block\Core\Edit
{
    protected $product = Null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/product/edit/tabs/option.php');
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

    public function getAttribute(){
        $sql =  "SELECT * FROM `attribute` WHERE `entityTypeId` = 'product'";
        $attribute = \Mage::getModel('Model\Product')->fetchAll($sql);
        return $attribute;
    }

    public function getSelectOptions($attributeId)
    {
        $sql =  "SELECT `optionId`,`name` FROM `attribute_option`  WHERE `attributeId` = '$attributeId' ORDER BY `sortOrder`";
        return $options = \Mage::getModel('Model\Core\Adapter')->fetchPairs($sql);
    }

    public function getRadioOptions($attributeId)
    {
        $sql =  "SELECT `optionId`,`name` FROM `attribute_option`  WHERE `attributeId` = '$attributeId' ORDER BY `sortOrder`";
        return $options = \Mage::getModel('Model\Core\Adapter')->fetchPairs($sql);
    }

    
    public function getcheckboxOptions($attributeId)
    {
        $sql =  "SELECT `optionId`,`name` FROM `attribute_option`  WHERE `attributeId` = '$attributeId' ORDER BY `sortOrder`";
        return $options = \Mage::getModel('Model\Core\Adapter')->fetchPairs($sql);
    }

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update','product\option');
	}

}


?>