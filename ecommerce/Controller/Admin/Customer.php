<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('\Controller\Core\Admin');

class Customer extends \Controller\Core\Admin{

    
    public function gridAction(){
        try {
            $grid = \Mage::getBlock('Block\Admin\Customer\Grid'); 
           
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
            $form = \Mage::getBlock('Block\Admin\Customer\Form'); 
           
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

            $postData = $this->getRequest()->getPost('customer');
            $postData['createdDate'] = date('Y-m-d H:i:s');
            $customer = \Mage::getModel('Model\Customer')->setData($postData);
            
            if ($customer->save()) {
                $this->getMessage()->setSuccess("customer added successfully");
            } else {
                throw new \Exception("Something went wrong.");
            }  
        } catch(\Exception $e){
             $this->getMessage()->setSuccess($e->getMessage());
        }
        $this->redirect('grid',NULL,NULL,TRUE);

    }

    public function editAction (){

        try{
            $customer = \Mage::getModel('Model\customer');
            if(!$customerId = $this->getRequest()->getGet('id')){
                throw new Exception("couldn't get id");  
            }
            $customer->load($customerId);

            $form = \Mage::getBlock('Block\Admin\customer\Edit'); 
            $form->setTableRow($customer);

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
            $customerId = $this->getRequest()->getGet('id');
            if(!$customerId){
                throw new \Exception('Invalid Update ID!');
            }
            if(!$this->getRequest()->isPost()){
                throw new \Exception("Invalid Request.");
            }
            $postData = $this->getRequest()->getPost('customer');
            $postData['customerId'] = $customerId;
            $postData['updatedDate'] = date('Y-m-d H-i-s');
            
            $customer = \Mage::getModel('Model\Customer');
            $customer->setData($postData);
            if($customer->save()) {
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
            $customerId = $this->getRequest()->getGet('id');
            if(!$customerId) {
                throw new \Exception('Invalid ID!');
            }
            $customer = \Mage::getModel('Model\Customer');
            if ($customer->delete($customerId)) {
                $this->getMessage()->setSuccess("customerId ={$customerId} deleted successfully");
            } else {
                throw new \Exception('Record not Deleted');
            }
        } catch(\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage()); 
        }
        $this->redirect('grid',NULL,NULL,TRUE);
    }


}


?>