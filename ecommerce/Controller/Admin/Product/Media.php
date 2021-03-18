<?php
namespace Controller\Admin\Product;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Media extends \Controller\Core\Admin{

    public function updateAction(){
        echo $productId = $this->getRequest()->getGet('id');

            if(!$productId){
                throw new \Exception('Invalid Update ID!');
            }

            if(!$this->getRequest()->isPost()){
                throw new \Exception("Invalid Request.");
            }


            /* image upload */
             if(isset($_POST['upload'])){
                 $this->imageUpload($productId);
             }

             /* media update */
             if(isset($_POST['update'])){
                 $this->updateMedia($productId);
             }

             /* image delete */
             if(isset($_POST['delete'])){
                 $this->deleteMedia();
             }
        
    }

    public function imageUpload($productId){
        $location = 'asset';
        $product_temp_name = $_FILES['image']['tmp_name'];
        $product_extension = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
        $productimage = time().'.'.$product_extension;
        $producturl = $location.'/'.$productimage;
        move_uploaded_file($product_temp_name, $producturl);

        $productData = $this->getRequest()->getPost();
    
        $product_tabel = \Mage::getModel('Model\Product\Media');
        $product_tabel->productId = $productId;
        $product_tabel->image = $producturl;
        $product_tabel->save();

        $this->redirect('edit','admin\product');
    }

    public function deleteMedia()
    {
        $productImageData = $this->getRequest()->getPost();

        $product_image = \Mage::getModel('Model\Product\Media');
        foreach($productImageData as $key => $value){
            if(array_key_exists('remove',$value)){
                $product_image->delete($key);    
            }
        }
        $this->redirect('edit','admin\product');
    }

    public function updateMedia($productId){
        $productImageData = $this->getRequest()->getPost();
        unset($productImageData['update']);

        $product_image = \Mage::getModel('Model\Product\Media');
        echo "<pre>";
        foreach($productImageData as $key => $value){
            $value['id'] = $key;
            if(array_key_exists('small',$value)){
                    $value['small'] = 1;
            }else{
                $value['small'] = 0;
            }
            if(array_key_exists('base',$value)){
                $value['base'] = 1;
            }else{
                $value['base'] = 0;
            }
            if(array_key_exists('thumbnail',$value)){
                $value['thumbnail'] = 1;
            }else{
                $value['thumbnail'] = 0;
            }
            if(array_key_exists('gallery',$value)){
                $value['gallery'] = 1;
            }else{
                $value['gallery'] = 0;
            }
            $product_image->setData($value);
            $product_image->save();
        }

        $this->redirect('edit','admin\product');
    }
}


?>