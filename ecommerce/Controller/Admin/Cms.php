<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('\Controller\Core\Admin');
class Cms extends \Controller\Core\Admin{

    public function gridAction(){
        try {
            $grid = \Mage::getBlock('Block\Admin\Cms\Grid'); 
           
            $layout = $this->getLayout();
            $content = $layout->getContent();
            $content->addChild($grid);
            $this->renderLayout();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
			$this->redirect('grid',Null,Null,true);
        }
    }

    public function formAction(){
        try {
            $form = \Mage::getBlock('Block\Admin\Cms\Form'); 
           
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
            $postData = $this->getRequest()->getPost('cms');
            $postData['createdDate'] = date('Y-m-d H:i:s');
            $cms = \Mage::getModel('Model\Cms');
            $cms->setData($postData);
            if(!$cms->save()) {
                throw new \Exception("Something went wrong.");
            }
             
        } catch(\Exception $e){
            echo $e->getMessage();
        }
        $this->redirect('grid',NULL,NULL,TRUE);

    }

    public function editAction(){
        try{
            $cms = \Mage::getModel('Model\cms');
            if(!$cmsId = $this->getRequest()->getGet('id')){
                throw new Exception("couldn't get id");  
            }
            $cms->load($cmsId);


            $form = \Mage::getBlock('Block\Admin\cms\Edit'); 
            $form->setTableRow($cms);

            $layout = $this->getLayout();
            $content = $layout->getContent();
            $content->addChild($form);
            $this->renderLayout();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }
    public function updateAction(){
        try {
            $contentId = $this->getRequest()->getGet('id');
            if(!$contentId){
                throw new \Exception('Invalid Update ID!');
            }
            if(!$this->getRequest()->isPost()){
                throw new \Exception("Invalid Request.");
            }
            $postData = $this->getRequest()->getPost('cms');
            $postData['pageId'] = $contentId;
            $postData['updatedDate'] = date('Y-m-d H-i-s');
            
            $content = \Mage::getModel('Model\Cms');
            $content->setData($postData);

            if($content->save()) {
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
            $pageId = $this->getRequest()->getGet('id');
            if(!$pageId) {
                throw new \Exception('Invalid ID!');
            }
            $content = \Mage::getModel('Model\Cms');
            if ($content->delete($pageId)) {
                $this->getMessage()->setSuccess("PageId ={$pageId} deleted successfully");
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
            $pageId = $this->getRequest()->getGet('id');
            if(!$pageId){
                throw new \Exception('Invalid Status ID!');
            }
            $content = \Mage::getModel('Model\Cms');
            if(!$content->load($pageId)) {
                throw new \Exception("Record not found");
            }
            if($content->status($pageId)){
                $this->getMessage()->setSuccess("PageId = {$pageId} status changed successfully");
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