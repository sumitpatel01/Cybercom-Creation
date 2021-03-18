<?php
namespace Block\Admin\Category;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template{
    protected $categories = null;
    protected $categoryOptions = null;
   
    public function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/category/grid.php');
        $this->setCategories();
	}

    public function getCategories(){
        if(!$this->categories){
            $this->categories;
        }
        
        return $this->categories;

    }

    public function setCategories($categories = null){
        if(!$categories){
            $category = \Mage::getModel('Model\Category');
            $categories = $category->fetchAll();
        }
        
        $this->categories = $categories;
        return $this;

    }

    function getCategoryOptions(){
        $query = "select `categoryId` from `category`";
    }

    public function getParentCategory(){
		$model = \Mage::getModel('Model\Category');
		$category = $model->fetchAll();

		foreach ($category as $key => $categoryRow) {
			$parentCategory[$categoryRow->categoryId] = $categoryRow->name;
		}
		return $parentCategory;
	}

    public function getCategoryName($pcategory,$value){
        $parentCategory = $this->getParentCategory();
        if($pcategory) {
            foreach ($parentCategory as $key1 => $value1) {
                if($pcategory == $key1) {
                 $namecategory = $value1."=>".$value->getData()['name'];
                 $value->name = $namecategory;
                }
            }
        } 
    }

    public function getName($category){
        $categoryModel = \Mage::getModel('Model\Category');

        if(!$this->categoryOptions) {
            $query = "SELECT `categoryId`,`name` FROM `{$categoryModel->getTableName()}`;";
            $this->categoryOptions = $categoryModel->getAdapter()->fetchPairs($query);
        }
      
        $pathIds = explode('/',$category->path);
        foreach($pathIds as $key => &$id){
            if(array_key_exists($id,$this->categoryOptions)){
                $id = $this->categoryOptions[$id];
            }
        }
        $name = implode('/',$pathIds);
        return $name;
        
    }

    public function getPath(){

        $parentCategory = $this->getParentCategory();
        $categories = $this->getCategories();
        foreach ($categories as $key => $value) {
            $pcategory = $value->getData()['parentCategory'];
            if($pcategory) {
                foreach ($parentCategory as $key1 => $value1) {
                    if($pcategory == $key1) {
                     echo $pathcategory = $key1."/".$value->getData()['categoryId'];
                     $value->path = $pathcategory;
                    }
                }
            }     
    }


}

}


?>