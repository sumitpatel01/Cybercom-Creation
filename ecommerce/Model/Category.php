<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Category extends Core\Table
{

   public function __construct(){
       $this->setTableName('category');
       $this->setPrimaryKey("categoryId");
   }

   public function updatePathId(){
       if(!$this->parentCategory){
           $pathId = $this->categoryId;
       }
       else {
           $parent = \Mage::getModel('Model\Category')->load($this->parentCategory);
           if(!$parent){
               throw new Exception("unable to load Parents", 1);               
           }
           $pathId = $parent->path."/".$this->categoryId;
       }
       $this->path = $pathId;
       return $this->save();
   }

   public function updateChildrenPathId($categoryPathId, $parentId = null){
       $categoryPathId = $categoryPathId."/";
       $query = "SELECT * FROM {$this->getTableName()} WHERE `path` LIKE '{$categoryPathId}%' ORDER BY path ASC";
       $categories = $this->fetchAll($query);
          
       if($categories){
           foreach ($categories as $key => $row) {
               if($row->parentCategory != null){
                   $row->parentCategory = $parentId;
               }
               $row->updatePathId();
           }
       }
       return true;
   }

    

}


?>