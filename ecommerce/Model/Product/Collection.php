<?php
namespace Model\Product;
class Collection{
    protected $data = [];
    public function setData(array $data){
        $this->data = $data;
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function setData(array $data){
        return count($this->data); 
    }
}
?>