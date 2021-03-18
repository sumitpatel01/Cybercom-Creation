<?php
namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Media extends \Model\Core\Table
{

   public function __construct(){
       $this->setTableName('product_image');
       $this->setPrimaryKey("id");
   }  

   public function FetchProductImages($productId){
      
    $query = "SELECT * FROM `product_image` WHERE `productId` = '$productId'";
    return $this->fetchAll($query);
   }

   public function getImageuploadPath($subPath = null)
	{
		return \Mage::getBaseDir($subPath);
	}

}


?>