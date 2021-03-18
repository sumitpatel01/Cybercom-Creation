<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Cms extends Core\Table
{

   public function __construct(){
       $this->setTableName('cms');
       $this->setPrimaryKey("pageId");
   }

    

}


?>