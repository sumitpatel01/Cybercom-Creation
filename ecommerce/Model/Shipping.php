<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Shipping extends Core\Table
{

   public function __construct(){
       $this->setTableName('shipping');
       $this->setPrimaryKey("methodId");
   }

    

}


?>