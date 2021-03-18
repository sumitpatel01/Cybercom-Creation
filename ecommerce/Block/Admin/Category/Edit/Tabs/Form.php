<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');
class Form extends \Block\Core\Edit
{
    protected $category = Null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/admin/category/edit/tabs/form.php');
    }


	public function getParentCategoryOptions() 
        {
             $sql =  "SELECT `categoryId` , `name` FROM `{$this->getTableRow()->getTableName()}`";
             $categoryoptions = $this->getTableRow()->getAdapter()->fetchPairs($sql);

             $sql =  "SELECT `categoryId` , `path` FROM `{$this->getTableRow()->getTableName()}`
			 WHERE path NOT LIKE '{$this->getTableRow()->path}%'
			 ORDER BY path ASC";
             $categoryPath = $this->getTableRow()->getAdapter()->fetchPairs($sql);
	
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
		return $this->getUrl()->getUrl('update');
	}

}


?>