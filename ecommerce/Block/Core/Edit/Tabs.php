<?php
namespace Block\Core\Edit;
\Mage::loadFileByClassName('Block\Core\Template');
class Tabs extends \Block\Core\Template{

    protected $defaulttab = null;
    protected $tabs = [];

    public function __construct(){
        $this->setTemplate('View/core/layout/edit/tab.php');
        $this->prepareTab();
    }

    public function getTabs(){
        return $this->tab;
    }

    public function setTabs(array $tabs){
        $this->tabs = $tab;
        return $this;
    }

    public function getTab($key){
        if(!array_key_exists($key, $this->tab)) {
            return null;
        }
        return $this->tab[$key];
    }

    public function addTab(array $tab){
        $key = $tab['key'];
        
        $this->tab[$key] = $tab;
        return $this;
    }

    public function prepareTab()
    {
        return $this;
    }
    public function setTableRow(\Model\Core\Table $tableRow)
    {
       $this->tableRow = $tableRow;
       $this->prepareTab();
       return $this;
    }

    public function getTableRow()
    {
        return $this->tableRow;
    }

    public function removeTab($key){
        if(array_key_exists($key, $this->tab)) {
            unset($this->tab[$key]);
        }
        return $this;
    }
    public function setDefaultTab($defaulttab){
        $this->defaultTab = $defaulttab;
        return $this;
    }

    public function getDefaultTab(){
        return $this->defaultTab;
    }

    public function settab(array $tabs){
        $this->tab = $tab;
        return $this;
    }
}

?>