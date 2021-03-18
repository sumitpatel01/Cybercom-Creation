<?php
namespace Controller\Admin;


\Mage::loadFileByClassName('\Controller\Core\Admin');

class Payment extends \Controller\Core\Admin{

    public function gridAction(){
        try {
            $grid = \Mage::getBlock('Block\Admin\Payment\Grid'); 
           
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
            $form = \Mage::getBlock('Block\Admin\Payment\Form'); 
           
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

            $postData = $this->getRequest()->getPost('payment');  
            $postData['createdDate'] = date('Y-m-d H:i:s');
            $payment = \Mage::getModel('Model\Payment')->setData($postData);
            
            if ($payment->save()) {
                $this->getMessage()->setSuccess("payment added successfully");
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
            $payment = \Mage::getModel('Model\payment');
            if(!$paymentId = $this->getRequest()->getGet('id')){
                throw new Exception("couldn't get id");  
            }
            $payment->load($paymentId);


            $form = \Mage::getBlock('Block\Admin\payment\Edit'); 
            $form->setTableRow($payment);

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
            $paymentId = $this->getRequest()->getGet('id');
            if(!$paymentId){
                throw new \Exception('Invalid Update ID!');
            }
            if(!$this->getRequest()->isPost()){
                throw new \Exception("Invalid Request.");
            }
            $postData = $this->getRequest()->getPost('payment');
            $postData['paymentId'] = $paymentId;
            
            $payment = \Mage::getModel('Model\Payment');
            $payment->setData($postData);
            if($payment->save()) {
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
            $paymentId = $this->getRequest()->getGet('id');
            if(!$paymentId) {
                throw new \Exception('Invalid ID!');
            }
            $payment = \Mage::getModel('Model\Payment');
            if ($payment->delete($paymentId)) {
                $this->getMessage()->setSuccess("PaymentId ={$paymentId} deleted successfully");
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
            $paymentId = $this->getRequest()->getGet('id');
            if(!$paymentId){
                throw new \Exception('Invalid Status ID!');
            }
            $payment = \Mage::getModel('Model\Payment');
            if(!$payment->load($paymentId)) {
                throw new \Exception("Record not found");
            }
            if($payment->status($paymentId)){
                $this->getMessage()->setSuccess("PaymentId = {$paymentId} status changed successfully");
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