<?php
namespace Controller\Admin\Product\Group;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Price extends \Controller\Core\Admin{

    public function updateAction(){
        try{
        echo $productId = $this->getRequest()->getGet('id');
        if(!$productId) {
            throw new \Exception("couldn't get id", 1);
        }
        if(!$this->getRequest()->isPost()){
            throw new \Exception("invalid request", 1);
        }
        $postData =$this->getRequest()->getPost('groupPrice');
        
        echo "<pre>";
        print_r($postData);

        $productGroupPrice = \Mage::getModel('Model\Product\Group\Price');
        if(array_key_exists('exist', $postData)){
            foreach($postData['exist'] as $key => $value){
                $insertData = [
                    'customerGroupId' => $key,
                    'productId' => $productId
                ];
            }
        }
        if(array_key_exists('new', $postData)){
            foreach($postData['new'] as $key => $value){
                $insertData = [
                    'customerGroupId' => $key,
                    'productId' => $productId,
                    'price' => $value,
                    'createdDate' => date('Y-m-d H:i:s')
                ];
                print_r($insertData);
            }
        }
        die();
    }
    catch (\Exception $e){
        echo $e->getMessage();
    }
        
    }
}


?>