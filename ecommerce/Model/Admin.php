<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Admin extends Core\Table
{

   public function __construct(){
       $this->setTableName('admin');
       $this->setPrimaryKey("adminId");
   }

}


?>