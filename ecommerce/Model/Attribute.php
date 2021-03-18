<?php
namespace Model;

\Mage::loadFileByClassName('Model\Core\Adapter');
\Mage::loadFileByClassName('Model\Core\Table');

class Attribute extends Core\Table
{

   public function __construct(){
       $this->setTableName('attribute');
       $this->setPrimaryKey("attributeId");
   }

   public function getEntityTypeOptions(){
    return [
        'product' => 'Product',
        'customer' => 'Customer',
    ];
   }

   public function getInputTypeOptions(){
    return [
        'text' => 'Textbox',
        'textarea' => 'Textarea',
        'select' => 'Select',
        'checkbox' => 'Checkbox',
        'radio' => 'radio',
    ];
   }

   public function getBackendTypeOptions(){
       return [
           'varchar' => 'Varchar',
           'int' => 'int',
           'text' => 'text',
           'decimal' => 'decimal',
           'radio' => 'radio'
       ];
   }
   public function getOptions(){
       $query = "SELECT * FROM `attribute_option` WHERE `attributeId` = '{$this->attributeId}' ORDER BY `sortOrder` ASC";

       $options =$this->fetchAll($query);
       return $options;
   }

}


?>