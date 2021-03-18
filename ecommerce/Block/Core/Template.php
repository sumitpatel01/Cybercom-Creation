<?php
namespace Block\Core;
require_once "./Block/Core/Layout/Header.php";
require_once "./Block/Core/Layout/Content.php";

class Template
{
	protected $template = Null;
    protected $children = [];
	protected $url = Null;
	protected $request = Null;
	const STATUS_ENABLED = '1';
    const STATUS_DISABLED = '0';
	
	public function __construct()
	{
		$alert = \Mage::getBlock('Block\Core\Message');
		$this->addChild($alert, 'alert');
		$this->setUrl();
		$this->setRequest();
	}


    public function getChildren(){
        return $this->children;
    }

    public function setChildren(array $children){
        $this->children = $children;
        return $this;
    }

    public function getChild($key){
        if(!array_key_exists($key, $this->children)) {
            return null;
        }
        return $this->children[$key];
    }

    public function addChild(Template $child, $key = null){
        if(!$key){
            $key = get_class($child);
        }
        $this->children[$key] = $child;
        return $this;
    }

    public function removeChild($key){
        if(array_key_exists($key, $this->children)) {
            unset($this->children[$key]);
        }
        return $this;
    }

	public function createBlock($className)
	{
		return Mage::getBlock($className);
	}

	public function setTemplate($template)
	{
		$this->template = $template;
		return $this;
	}
	public function getTemplate()
	{
		return $this->template;
	}
	
	public function setUrl($url = null)
	{
		if(!$url) {
			$url = \Mage::getModel('Model\Core\Url');
		}
		$this->url = $url;
		return $this;
	}
	public function getUrl()
	{
		if (!$this->url) {
			$this->setUrl();
		
		}
		return $this->url;
	}
	public function setRequest() {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }

    public function getRequest() {
		if(!$this->request){
			$this->setRequest();
		}
        return $this->request;
    }
	public function toHTML()
	{	
		ob_start();
		require_once $this->getTemplate();
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function getStatusOptions(){
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable'
        ];
    }
}
?>