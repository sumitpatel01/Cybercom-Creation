<?php

namespace Controller\Admin\Attribute;
\Mage::loadFileByClassName('Controller\Core\Admin');
class Option extends \Controller\Core\Admin{

    public function updateAction()
    {
        echo $attributeId = $this->getRequest()->getGet('id');
        $postdata = $this->getRequest()->getPost('attribute');
        
        echo "<pre>";
        print_r($postdata);

        $attributeOptions = \Mage::getModel('Model\Attribute\Option');
        if(array_key_exists('exist',$postdata)){
            $existData = $postdata['exist'];
            foreach($existData as $key => $existvalue){
                $existvalue['optionId'] = $key;
                $attributeOptions->setdata($existvalue)->save();
            }

            echo $removeId = implode(',',array_keys($existData));

            echo $query = "DELETE FROM {$attributeOptions->getTableName()} WHERE {$attributeOptions->getPrimarykey()} NOT IN ({$removeId})";
            $attributeOptions->query($query);
        }
        if(array_key_exists('new',$postdata)){
            $newData = $postdata['new'];
            if(array_key_exists('new',$postdata)){
                $nameData = $postdata['new']['name'];
            }
            if(array_key_exists('new',$postdata)){
                    $orderData = $postdata['new']['sortOrder'];
            }
            foreach($nameData as $key => $nameValue){
                $insertdata = [
                    'name' => $nameValue,
                    'sortOrder' => $orderData[$key],
                    'attributeId' => $attributeId
                ];
                $attributeOptions->setData($insertdata)->save();
            }
        }
        $this->redirect('option','admin\attribute');
    }


}
?>