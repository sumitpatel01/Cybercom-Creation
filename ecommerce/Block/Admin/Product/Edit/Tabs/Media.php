<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Media extends \Block\Core\Edit
{
    
    protected $productImages = [];
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/product/edit/tabs/media.php');
        $this->setProductImages();
    }

    public function getProductImages(){
        if(!$this->productImages){
            $this->setProductImages();
        }
        
        return $this->productImages;
    }

    public function setProductImages($productImages = null){
        if(!$productImages){
            $productId = $this->getRequest()->getGet('id');
            $productImage = \Mage::getModel('Model\Product\Media');
            $productImages = $productImage->FetchProductImages($productId);
        }
        $this->productImages = $productImages;
        return $this;

    }

    public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update','product\Media');
	}
}


?>