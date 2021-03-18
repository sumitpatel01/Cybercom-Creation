<?php
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Option extends \Controller\Core\Admin{

public function updateAction(){
    try {
        $productId = $this->getRequest()->getGet('id');
        if(!$productId){
            throw new \Exception('Invalid product ID!');
        }
        if(!$this->getRequest()->isPost()){
            throw new \Exception("Invalid Request.");
        }
        $postData = $this->getRequest()->getPost('product');
        if(!$postData){
            throw new \Exception("Couldn't get data.");
        }
        $postData['productId'] = $productId;
        $postData['updatedDate'] = date('Y-m-d H-i-s');

        $product = \Mage::getModel('Model\Product');
        $product->setData($postData);
        if($product->save()) {
            $this->getMessage()->setSuccess('Record updated successfully...!'); 
        } else {
            throw new \Exception("Database Insertion Error");
        }
    }  catch(\Exception $e){
        $this->getMessage()->setFailure($e->getMessage());
    }
    $this->redirect('edit','admin\product',null);
}
}