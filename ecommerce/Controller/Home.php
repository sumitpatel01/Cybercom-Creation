<?php
namespace Controller;
\Mage::loadFileByClassName('Controller\Core\Customer');
class Home extends Core\Customer
{
    public function homeAction(){
        $layout = $this->getLayout();
        $block = \Mage::getBlock('Block\Customer\Home');
        $this->renderLayout();
    }

    public function contactAction()
    {
        echo " i am in contact";
    }

    public function aboutAction()
    {
        echo "i am in about";
    }

    public function categoryAction()
    {
        echo "i am in category";
    }

    public function pageAction(){
        $pager = \Mage::getController('Controller\Core\Pager');
        
        
        $sql = "SELECT * FROM `product`;";
        $product = \Mage::getModel('Model\Product');
        $productCount = $product->getAdapter()->fetchOne($sql);

        $pager->setTotalRecords(80);
        $pager->setRecordPerPage(10);
        $pager->setCurrentPage($_GET['p']);
        $pager->calculate();
        


        echo "<pre>";
        print_r($pager);
    }
        
}
?>