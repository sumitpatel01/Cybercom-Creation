<?php
namespace Block\Admin\Category;
\Mage::loadFileByClassName('Block\Core\Template');

class Form extends \Block\Core\Template
{
	protected $categoryOption = [];
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate("./View/admin/category/form.php");
	}

	public function getParentCategory(){
		$model = \Mage::getModel('Model\Category');
		$category = $model->fetchAll();

		foreach ($category as $key => $categoryRow) {
			$parentCategory[$categoryRow->categoryId] = $categoryRow->name;
		}
		return $parentCategory;
	}

	public function getParentCategoryOptions() 
        {
			 $model = \Mage::getModel('Model\Category');
             $sql =  "SELECT `categoryId` , `name` FROM `{$model->getTableName()}`";	
             $categoryoptions = $model->getAdapter()->fetchPairs($sql);

             $sql =  "SELECT `categoryId` , `path` FROM `{$model->getTableName()}`";
             $categoryPath = $model->getAdapter()->fetchPairs($sql);
             if($categoryPath)
             {
                 foreach ($categoryPath as $categoryId => &$path) {
                     $pathids = explode("/",$path);
                     
                     foreach ($pathids as $key => &$value) {
                        $value = $categoryoptions[$value];
                        }
                        $path = implode("/",$pathids);                         
                    }
                }                
                $categoryPath = ['0'=>'Root Category'] + $categoryPath;
             return $categoryPath;
        }

	public function getFormUrl()
	{
		return $this->getUrl()->getUrl('save');
	}

}
?>