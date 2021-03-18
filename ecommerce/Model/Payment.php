<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Payment extends Core\Table
{

   public function __construct(){
       $this->setTableName('payment');
       $this->setPrimaryKey("paymentId");
   }

    

}


?>