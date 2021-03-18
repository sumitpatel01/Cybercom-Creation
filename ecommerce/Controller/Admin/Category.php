<?php
namespace Controller\Admin;

\Mage::loadFileByClassName('\Controller\Core\Admin');

class Category extends \Controller\Core\Admin{
    
    public function gridAction(){
        try {
            $grid = \Mage::getBlock('Block\Admin\Category\Grid'); 
           
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
            $form = \Mage::getBlock('Block\Admin\Category\Form'); 
           
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
            $postData = $this->getRequest()->getPost('category');
 
            $category = \Mage::getModel('Model\Category')->setData($postData);
            $insertId = $category->save();

            if ($category->updatePathId()) {
                $this->getMessage()->setSuccess("category added successfully");
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
            $category = \Mage::getModel('Model\category');
            if(!$categoryId = $this->getRequest()->getGet('id')){
                throw new Exception("couldn't get id");  
            }
            $category->load($categoryId);


            $form = \Mage::getBlock('Block\Admin\category\Edit'); 
            $form->setTableRow($category);

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
            $categoryId = $this->getRequest()->getGet('id');
            if(!$categoryId){
                throw new \Exception('Invalid Update ID!');
            }
            if(!$this->getRequest()->isPost()){
                throw new \Exception("Invalid Request.");
            }
            $postData = $this->getRequest()->getPost('category');
            $postData['categoryId'] = $categoryId;
            
            $category = \Mage::getModel('Model\Category');
            
            $category->setData($postData);
            $category->updatePathId();
            if($category->updateChildrenPathId($category->path,$category->parentCategory)) {
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
            $categoryId = $this->getRequest()->getGet('id');
            if(!$categoryId) {
                throw new \Exception('Invalid ID!');
            }
            $category = \Mage::getModel('Model\Category');
            $category->load($categoryId);

            $path = $category->path;
            $parentId =$category->parentCategory;
            $category->updateChildrenPathId($path, $parentId);
            if ($category->delete($categoryId)) {
                $this->getMessage()->setSuccess("categoryId ={$categoryId} deleted successfully");
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
            $categoryId = $this->getRequest()->getGet('id');
            if(!$categoryId){
                throw new \Exception('Invalid Status ID!');
            }
            $category = \Mage::getModel('Model\Category');
            if(!$category->load($categoryId)) {
                throw new \Exception("Record not found");
            }
            if($category->status($categoryId)){
                $this->getMessage()->setSuccess("CategoryId = {$categoryId} status changed successfully");
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