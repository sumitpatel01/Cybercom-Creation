<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Price extends \Block\Core\Edit
{
    protected $product = null;
    public function __construct()
    {
        $this->setTemplate('./View/admin/product/edit/tabs/group_price.php');
    }

    public function setProduct(Model_Product $product){
        $this->product = $product;
        return $this;
    }

    public function getProduct(){
        return $this->product;
    }

    public function getCustomerGroup(){
        $productId = $this->getRequest()->getGet('id');
        $customerGroup = \Mage::getModel('Model\Customer\Group');
        $groupPrices = \Mage::getModel('Model\Product\Group\Price');
        $product = \Mage::getModel('Model\Product');
            
        $query ="SELECT `cg`.`customerGroupId`,`cg`.`name`,`pgp`.`entityId`,`pgp`.`price`,`p`.`productId`,`p`.`price` as `productPrice` 
        FROM `{$customerGroup->getTableName()}` as `cg` 
        LEFT JOIN `{$groupPrices->getTableName()}` as `pgp` 
            ON `pgp`.`customerGroupId` = `cg`.`customerGroupId` 
                AND `pgp`.`productId` = '{$productId}' 
        LEFT JOIN `{$product->getTableName()}` as `p` 
            ON `p`.`productId` = '{$productId}'";

        $productGroupPrice = \Mage::getModel("Model\Product\Group\Price")->fetchAll ($query);
        return $productGroupPrice;
    }

    public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update','product\group\price');
	}
}


?>