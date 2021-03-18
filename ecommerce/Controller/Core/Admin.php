<?php
namespace Controller\Core;

\Mage::loadFileByClassName('Controller\Core\Abstracts');

class Admin extends \Controller\Core\Abstracts
{
    
    public function setMessage() {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }

    public function setLayout(\Block\Core\Layout $layout = null) {
        if(!$this->layout){
            $layout = \Mage::getBlock('Block\Admin\Layout');
        }
        $this->layout = $layout;
        return $this;
    }
}


?>