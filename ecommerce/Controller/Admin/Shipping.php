<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('\Controller\Core\Admin');

class Shipping extends \Controller\Core\Admin{

    
    public function gridAction(){
        try {
            $grid = \Mage::getBlock('Block\Admin\Shipping\Grid'); 
           
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
            $form = \Mage::getBlock('Block\Admin\Shipping\Form'); 
           
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

            $postData = $this->getRequest()->getPost('shipping');
            $postData['createdDate'] = date('Y-m-d H:i:s');
            $shipping = \Mage::getModel('Model\Shipping')->setData($postData);
            
            if ($shipping->save()) {
                $this->getMessage()->setSuccess("shipping added successfully");
            } else {
                throw new \Exception("Something went wrong.");
            }   
        } catch(\Exception $e){
             $this->getMessage()->setSuccess($e->getMessage());
        }
        $this->redirect('grid',Null,Null,true);
    }

    public function editAction (){
        try{
            $shipping = \Mage::getModel('Model\Shipping');
            if(!$shippingId = $this->getRequest()->getGet('id')){
                throw new Exception("couldn't get id");  
            }
            $shipping->load($shippingId);


            $form = \Mage::getBlock('Block\Admin\Shipping\Edit'); 
            $form->setTableRow($shipping);

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
            $shippingId = $this->getRequest()->getGet('id');
            if(!$shippingId){
                throw new \Exception('Invalid Update ID!');
            }
            if(!$this->getRequest()->isPost()){
                throw new \Exception("Invalid Request.");
            }
            $postData = $this->getRequest()->getPost('shipping');
            $postData['methodId'] = $shippingId;
            
            $shipping = \Mage::getModel('Model\Shipping');
            $shipping->setData($postData);
            if($shipping->save()) {
                $this->getMessage()->setSuccess('Record updated successfully...!'); 
            } else {
                throw new \Exception("Database Insertion Error");
            }
        }  catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',NULL,NULL,TRUE); 
    }


    public function deleteAction (){
        try {
            $shippingId = $this->getRequest()->getGet('id');
            if(!$shippingId) {
                throw new \Exception('Invalid ID!');
            }
            $shipping = \Mage::getModel('Model\Shipping');
            if ($shipping->delete($shippingId)) {
                $this->getMessage()->setSuccess("shippingId ={$shippingId} deleted successfully");
            } else {
                throw new \Exception('Record not Deleted');
            }
        } catch(\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage()); 
        }
        $this->redirect('grid',NULL,NULL,TRUE);
    }


    public function statusAction (){
        try {
            $shippingId = $this->getRequest()->getGet('id');
            if(!$shippingId){
                throw new \Exception('Invalid Status ID!');
            }
            $shipping = \Mage::getModel('Model\Shipping');
            if(!$shipping->load($shippingId)) {
                throw new \Exception("Record not found");
            }
            if($shipping->status($shippingId)){
                $this->getMessage()->setSuccess("ShippingId = {$shippingId} status changed successfully");
            } else {
                throw new \Exception("Database Updation Error");
            }
        } 
        catch(\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',NULL,NULL,TRUE);

    }    

}


?>