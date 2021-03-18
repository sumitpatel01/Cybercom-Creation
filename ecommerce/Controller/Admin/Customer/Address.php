<?php
namespace Controller\Admin\Customer;

\Mage::loadFileByClassName('\Controller\Core\Admin');
class Address extends \Controller\Core\Admin{


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
            $postData['shipping']['customerId'] = $customerId;
            $postData['shipping']['updatedDate'] = date('Y-m-d H-i-s');
            $postData['billing']['customerId'] = $customerId;
            $postData['billing']['updatedDate'] = date('Y-m-d H-i-s');

            if(array_key_exists('shipping',$postData)){
                
                $shipping = \Mage::getModel('Model\Admin\Customer\Address');
                $shipping->setData($postData['billing']);
            
                if($shipping->save()) {
                    $this->getMessage()->setSuccess('Record updated successfully...!'); 
                } else {
                    throw new \Exception("Database Insertion Error");
                }
            }

            if(array_key_exists('billing',$postData)){
                
                $billing = \Mage::getModel('Model\Admin\Customer\Address');
                $billing->setData($postData['billing']);
                
                if($billing->save()) {
                    $this->getMessage()->setSuccess('Record updated successfully...!'); 
                } else {
                    throw new \Exception("Database Insertion Error");
                }
            }
            
            
        }  catch(\Exception $e){
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid','admin\customer',NULL,TRUE);
    }

   
    
}



?>