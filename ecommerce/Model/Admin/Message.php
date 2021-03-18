<?php
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Admin\Session');

class Message extends \Model\Admin\Session
{
    
    public function setSuccess($message)
    {
        $this->success = $message;
        return $this;
    }

    public function getSuccess()
    {
        return $this->success;
    }

    public function clearSuccess()
    {
        $this->success = null;
        return $this;
    }

    public function setFailure($message)
    {
        $this->failure = $message;
        return $this;
    }

    public function getFailure()
    {
        return $this->failure;
    }

    public function clearFailure()
    {
        $this->failure = null;
        return $this;
    }
}

?>