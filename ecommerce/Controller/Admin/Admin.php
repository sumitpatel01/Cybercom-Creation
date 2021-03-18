<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('\Controller\Core\Admin');

class Admin extends \Controller\Core\Admin{

    public function gridAction(){
        try {
            $grid = \Mage::getBlock('Block\Admin\Admin\Grid'); 
           
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
            $form = \Mage::getBlock('Block\Admin\Admin\Form'); 
           
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
            $postData = $this->getRequest()->getPost('admin');
            $postData['createdDate'] = date('Y-m-d H:i:s');
            $admin = \Mage::getModel('Model\Admin');
            $admin->setData($postData);
            if(!$admin->save()) {
                throw new \Exception("Something went wrong.");
            }
        } catch(\Exception $e){
            echo $e->getMessage();
        }
        $this->redirect('grid',NULL,NULL,TRUE);

    }

    public function editAction (){
        try{
            $admin = \Mage::getModel('Model\admin');
            if(!$adminId = $this->getRequest()->getGet('id')){
                throw new Exception("couldn't get id");  
            }
            $admin->load($adminId);


            $form = \Mage::getBlock('Block\Admin\admin\Edit'); 
            $form->setTableRow($admin);

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
            $adminId = $this->getRequest()->getGet('id');
            if(!$adminId){
                throw new \Exception('Invalid Update ID!');
            }
            if(!$this->getRequest()->isPost()){
                throw new \Exception("Invalid Request.");
            }
            $postData = $this->getRequest()->getPost('admin');
            $postData['adminId'] = $adminId;
            $postData['updatedDate'] = date('Y-m-d H-i-s');
            
            $admin = \Mage::getModel('Model\Admin');
            $admin->setData($postData);
            if($admin->save()) {
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
            $adminId = $this->getRequest()->getGet('id');
            if(!$adminId) {
                throw new \Exception('Invalid ID!');
            }
            $admin = \Mage::getModel('Model_Admin');
            if ($admin->delete($adminId)) {
                $this->getMessage()->setSuccess("adminId ={$adminId} deleted successfully");
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
            $adminId = $this->getRequest()->getGet('id');
            if(!$adminId){
                throw new \Exception('Invalid Status ID!');
            }
            $admin = \Mage::getModel('Model\Admin');
            if(!$admin->load($adminId)) {
                throw new \Exception("Record not found");
            }
            if($admin->status($adminId)){
                $this->getMessage()->setSuccess("AdminId = {$adminId} status changed successfully");
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