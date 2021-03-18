<?php
namespace Block\Admin\Attribute\Option;
\Mage::loadFileByClassName('Block\Core\Edit');
class Grid extends \Block\Core\Edit{
    protected $attribute = null;

    public function __construct()
    {
        $this->settemplate('View/admin/attribute/option/grid.php');
    }

    public function setAttribute(\Model\Attribute $attribute){
        
        $this->attribute = $attribute;
        return $this;
    }

    public function getAttribute(){    
        return $this->attribute;
    }

    public function getFormUrl()
	{
		return $this->getUrl()->getUrl('update','admin\attribute\option');
	}

}

?>