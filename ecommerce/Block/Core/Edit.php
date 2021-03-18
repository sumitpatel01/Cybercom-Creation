<?php
namespace Block\Core;
\Mage::loadFileByClassName('Block\COre\Template');
class Edit extends Template{

    protected $tableRow = null;
    protected $tabClass = null;
    protected $tab = null;

    public function __construct(){
        $this->setTemplate('View/core/layout/edit.php');   
    }

    public function setTableRow(\Model\Core\Table $tableRow)
    {
       $this->tableRow = $tableRow;
       return $this;
    }

    public function getTableRow()
    {
        return $this->tableRow;
    }

    public function setTab($tab = null){
        if(!$tab){
            $tab =$this->getTabClass();
        }
        $tab->setTableRow($this->getTableRow());
        $this->tab = $tab;
        return $this;
    }

    public function getTab()
    {
        if(!$this->tab){
            $this->setTab();
        }
        return $this->tab;
    }

    public function setTabClass($tabClass){
        $this->tabClass = $tabClass;
        return $this;
    }

    public function getTabClass(){
        return $this->tabClass;
    }

    public function getTabContent()
	{
        
		$tabs = $this->getTabClass()->getTabs();

		$tab= $this->getRequest()->getGet('tab',$this->getTabClass()->getDefaultTab());
		$block = \Mage::getBlock($tabs[$tab]['block']);

        $block->setTableRow($this->getTableRow());
        return $block;
		
	}

    public function getTabHtml(){
        return $this->getTab()->toHTML();
    }
}

?>