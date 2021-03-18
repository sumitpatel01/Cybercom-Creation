<?php
namespace Controller\Admin\Customer;

\Mage::loadFileByClassName('\Controller\Core\Admin');
class Group extends \Controller\Core\Admin{

    public function gridAction(){
        try {
            $grid = \Mage::getBlock('Block\Admin\Customer\Group\Grid'); 
           
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
            $form = \Mage::getBlock('Block\Admin\Customer\Group\Form'); 
           
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
            $postData = $this->getRequest()->getPost('group');
            $postData['createdDate'] = date('Y-m-d H:i:s');
            $Group = \Mage::getModel('Model\Customer\Group');
            $Group->setData($postData);
            if(!$Group->save()) {
                throw new \Exception("Something went wrong.");
            }
            if(!$this->redirect('grid',null,null,true)) {
                throw new \Exception("header error.");
            }   
        } catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function editAction (){
        
        try{
            $customerGroup = \Mage::getModel('Model\customer\Group');
            if(!$customerGroupId = $this->getRequest()->getGet('id')){
                throw new Exception("couldn't get id");  
            }
            $customerGroup->load($customerGroupId);


            $form = \Mage::getBlock('Block\Admin\customer\Group\Edit'); 
            $form->setTableRow($customerGroup);

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
            $GroupId = $this->getRequest()->getGet('id');
            if(!$GroupId){
                throw new \Exception('Invalid Update ID!');
            }
            if(!$this->getRequest()->isPost()){
                throw new \Exception("Invalid Request.");
            }
            $postData = $this->getRequest()->getPost('Group');
            $postData['groupId'] = $GroupId;
            $postData['updatedDate'] = date('Y-m-d H-i-s');
            
            $Group = \Mage::getModel('Model\Admin\Customer\Group');
            $Group->setData($postData);
            
            if($Group->save()) {
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
            $GroupId = $this->getRequest()->getGet('id');
            if(!$GroupId) {
                throw new \Exception('Invalid ID!');
            }
            $Group = \Mage::getModel('Model\Admin\Customer\Group');
            if ($Group->delete($GroupId)) {
                $this->getMessage()->setSuccess("GroupId ={$GroupId} deleted successfully");
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
            $GroupId = $this->getRequest()->getGet('id');
            if(!$GroupId){
                throw new \Exception('Invalid Status ID!');
            }
            $Group = \Mage::getModel('Model\Admin\Customer\Group');
            if(!$Group->load($GroupId)) {
                throw new \Exception("Record not found");
            }
            if($Group->status($GroupId)){
                $this->getMessage()->setSuccess("GroupId = {$GroupId} status changed successfully");
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