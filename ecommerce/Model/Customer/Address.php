<?php
namespace Model\Customer;
\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Address extends \Model\Core\Table
{

   public function __construct(){
       $this->setTableName('address');
       $this->setPrimaryKey("addressId");
   }

   public function FetchShipping($customerId){
      
    $query = "SELECT * FROM `address` WHERE `customerId` = '$customerId' && `addressType` = 'shipping'";
    return $this->fetchAll($query);
   }

   public function FetchBilling($customerId){
      
    $query = "SELECT * FROM `address` WHERE `customerId` = '$customerId' && `addressType` = 'billing'";
    return $this->fetchAll($query);
   }
    
    

}


?>