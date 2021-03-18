<?php
namespace Controller\Core;

\Mage::loadFileByClassName('Controller\Core\Abstracts');

class Customer extends \Controller\Core\Abstracts
{
    
    public function setMessage() {
        $this->message = \Mage::getModel('Model\Core\Message');
        return $this;
    }

    public function setLayout(\Block\Core\Layout $layout = null) {
        if(!$this->layout){
            $layout = \Mage::getBlock('Block\Core\Layout');
        }
        $this->layout = $layout;
        return $this;
    }
}
?>