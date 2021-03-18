<?php
namespace Block\Core;
\Mage::loadFileByClassname('Block\Core\Template');
class Message extends Template
{
    public function __construct()
    {
        $this->setTemplate('./View/core/layout/message.php');
        $this->setMessage();
    }

    public function setMessage(){
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }

    public function getMessage() {
        if(!$this->message){
            $this->setMessage();
        }
        return $this->message;
    }
}


?>