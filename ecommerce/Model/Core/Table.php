<?php
namespace Model\Core;
\Mage::loadFileByClassName('Model\Core\Adapter');

class Table{

    protected $primaryKey = null;
    protected $tableName = null;
    protected $data = [];
    protected $adapter = null;
    const STATUS_ENABLED = '1';
    const STATUS_DISABLED = '0';

    public function getStatusOptions(){
        return [
            self::STATUS_DISABLED => 'Disable',
            self::STATUS_ENABLED => 'Enable'
        ];
    }
     

    public function setAdapter(){
        $this->adapter = \Mage::getModel('Model\Core\Adapter');
        return $this;
    }

    public function getAdapter(){
        if(!$this->adapter){
            $this->setAdapter();
        }
        return $this->adapter;
    }

    public function setTableName($tablename){
        $this->tableName = $tablename;
        return $this;
    }

    public function getTableName(){
        return $this->tableName;
    }

    public function setData(array $data){
        $this->data = $data;
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function setPrimaryKey($primarykey){
        $this->primaryKey = $primarykey;
        return $this;
    }

    public function getPrimaryKey(){
        return $this->primaryKey;
    }

    public function __set($key,$value){
        $this->data[$key] = $value;
        return $this;
    }

    public function __get($key){
        if(!array_key_exists($key, $this->getData())){
            return null;
        }
        return $this->data[$key];
    }

    public function save(){
        if(!$this->getAdapter()) {
            $this->setAdapter();
        }
        $data = $this->getData();
        if (!array_key_exists($this->getPrimaryKey(), $data)) {
			$query = "INSERT INTO `{$this->getTableName()}`". "(`";
			$query .= implode("`,`", array_keys($data)) . '`) VALUES (';            
		    $query .= "'" . implode("','", array_values($data)) . "')";

		    $insertId = $this->getAdapter()->insert($query);
            $this->load($insertId);

            return $insertId;
		}
		$query = "UPDATE `{$this->getTableName()}` SET ";            
		foreach ($data as $key => $value) {
		  $query.= '`'.$key.'`='."'$value'" .',';
		}
		$query = substr($query, 0, -1);
		$query .= " WHERE `{$this->getPrimaryKey()}` = '{$data[$this->getPrimaryKey()]}'";
		return $this->getAdapter()->update($query);
    }


    public function load($value){
        $value = (int)$value;
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = '{$value}'";
        return  $this->fetchRow($query);
        
    }

    public function delete($id){
        if(!$this->getAdapter()) {
            $this->setAdapter();
        }
        $query = "delete from `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = '{$id}'";
        $row = $this->getAdapter()->delete($query);
        if(!$row){
            return false;
        }
        return $this;
    }

    public function query($query){
        $this->getAdapter()->query($query);
    }

    public function fetchRow($query){
        if(!$this->getAdapter()) {
            $this->setAdapter();
        }
        $row = $this->getAdapter()->fetchRow($query);
        if(!$row){
            return false;
        }
        $this->data = $row;
        return $this;
    }

    public function fetchAll($query = null){
        
        if(!$query) {
            $query = "select * from {$this->getTableName()}";
        }
        
        $rows = $this->setAdapter()->getAdapter()->fetchAll($query);
        if(!$rows){
            return false;
        }
        foreach($rows as $key => &$value){
            $row = new $this;
            $value = $row->setData($value);   
        }
        return $rows;   
    }

    public function status($id){
        if(!$this->getAdapter()) {
            $this->setAdapter();
        }
        $product = $this->getData();
        if ($product['status']){
            $this->data['status'] = 0;
        } else {
            $this->data['status'] = 1;
        }
        return $this->save();
    }
    
    

}

?>