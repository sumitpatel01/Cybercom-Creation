<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('\Controller\Core\Admin');

class Product extends \Controller\Core\Admin{

    public function gridAction(){
        try {
            $grid = \Mage::getBlock('Block\Admin\Product\Grid'); 
           
            $layout = $this->getLayout();
            $content = $layout->getContent();
            $content->addChild($grid);
            $this->renderLayout();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',Null,Null,true);
        }
    }

    public function formAction() {
        try {
            $form = \Mage::getBlock('Block\Admin\Product\Form'); 
           
            $layout = $this->getLayout();
            $content = $layout->getContent();
            $content->addChild($form);
            $this->renderLayout();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid',Null,Null,true);
        }
    }

    public function saveAction(){
        try{
            if(!$this->getRequest()->isPost()){
                throw new \Exception("Invalid request.");
            }
            $postData = $this->getRequest()->getPost('product');
            $postData['createdDate'] = date('Y-m-d H:i:s');
            $product = \Mage::getModel('Model\Product')->setData($postData);
            
            if ($product->save()) {
                $this->getMessage()->setSuccess("product added successfully");
            } else {
                throw new \Exception("Database insertion error.");
            }  
        } catch(\Exception $e){
             $this->getMessage()->setSuccess($e->getMessage());
        }
        $this->redirect('grid','admin\product',null,true);
    }

    public function editAction (){

        try{
            $product = \Mage::getModel('Model\Product');
            if(!$productId = $this->getRequest()->getGet('id')){
                throw new Exception("couldn't get id");  
            }
            $product->load($productId);


            $form = \Mage::getBlock('Block\Admin\Product\Edit'); 
            $form->setTableRow($product);

            $layout = $this->getLayout();
            $content = $layout->getContent();
            $content->addChild($form);
            $this->renderLayout();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function updateAction (){
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
        $this->redirect('grid','admin\product',null,true);
    }

    public function deleteAction () {
        try {
            $productId = $this->getRequest()->getGet('id');
            if(!$productId) {
                throw new \Exception('Invalid ID!');
            }
            $product = \Mage::getModel('Model\Product');
            if ($product->delete($productId)) {
                $this->getMessage()->setSuccess("ProductId ={$productId} deleted successfully");
            } else {
                throw new \Exception('Record not Deleted');
            }
        } catch(\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage()); 
        }
        $this->redirect('grid','admin\product',null,true);
    }

    public function statusAction (){
        try {
            $productId = $this->getRequest()->getGet('id');
            if(!$productId){
                throw new \Exception('Invalid Status ID!');
            }
            $product = \Mage::getModel('Model\Product');
            if(!$product->load($productId)) {
                throw new \Exception("Record not found");
            }
            if($product->status($productId)){
                $this->getMessage()->setSuccess("ProductId = {$productId} status changed successfully");
            } else {
                throw new \Exception("Database Updation Error");
            }
        } 
        catch(\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','admin\product',null,true);
    }  

    

}


?>