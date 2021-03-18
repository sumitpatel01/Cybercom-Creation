<?php
namespace Block\Admin\Layout\Edit;
\Mage::loadFileByClassName('Block\Core\Edit\Tabs');
class Tabs extends \Block\Core\Edit\Tabs{

    public function __construct(){
        parent::__construct();
        $this->setTemplate('View/admin/layout/edit/tab.php');
        $this->prepareTab();
    }
}