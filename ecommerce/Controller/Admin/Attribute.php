<?php
namespace Controller\Admin;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Attribute extends \Controller\Core\Admin{

    public function gridAction(){
        try {
            $grid = \Mage::getBlock('Block\Admin\Attribute\Grid'); 
           
            $layout = $this->getLayout();
            $content = $layout->getContent();
            $content->addChild($grid);
            $this->renderLayout();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
			$this->redirect('grid',Null,Null,true);
        };
    }

    public function formAction(){
        try {
            $form = \Mage::getBlock('Block\Admin\Attribute\Form'); 
           
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
        $postdata = $this->getRequest()->getPost('attribute');

        $attribute = \Mage::getModel('Model\attribute');
        $attribute->setData($postdata);
		
        $attribute->save();
		$sql = "ALTER TABLE `product` ADD `{$attribute->code}` {$attribute->backendType}(20) NOT NULL;";
		$attribute->query($sql);

        $this->redirect('grid',NULL,NULL,TRUE);

    }

    public function editAction(){

        try{
            $attribute = \Mage::getModel('Model\attribute');
            if(!$attributeId = $this->getRequest()->getGet('id')){
                throw new Exception("couldn't get id");  
            }
            $attribute->load($attributeId);


            $form = \Mage::getBlock('Block\Admin\attribute\Edit'); 
            $form->setTableRow($attribute);

            $layout = $this->getLayout();
            $content = $layout->getContent();
            $content->addChild($form);
            $this->renderLayout();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

	public function updateAction(){
		$attributeId = $this->getRequest()->getGet('id');
        $postdata = $this->getRequest()->getPost('attribute');
		$postdata['attributeId'] = $attributeId;

        $attribute = \Mage::getModel('Model\attribute');
        $attribute->setData($postdata);

		
        $attribute->save();
		$this->redirect('grid',null,null,true);
    }

    public function optionAction(){
        $id = $this->getRequest()->getGet('id');

        $attribute = \Mage::getModel('Model\attribute');
        $attribute->load($id);

        $option = \Mage::getBlock('Block\Admin\Attribute\Option\Grid');
        $option->setAttribute($attribute);

        $layout = \Mage::getBlock('Block\Core\Layout');
        $layout->addChild($option, 'content');
        echo $layout->toHTML();
    }

    

	public function deleteAction(){
		try {
            $attributeId = $this->getRequest()->getGet('id');
            if(!$attributeId) {
                throw new \Exception('Invalid ID!');
            }
            $attribute = \Mage::getModel('Model\Attribute');
            if ($attribute->delete($attributeId)) {
                $this->getMessage()->setSuccess("attributeId ={$attributeId} deleted successfully");
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