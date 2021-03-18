<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Customer extends Core\Table
{

   public function __construct(){
       $this->setTableName('customer');
       $this->setPrimaryKey("customerId");
   }

    

}


?>