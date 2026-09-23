<?php
namespace MF\Model;
use MF\Model\DatabaseConnection;
abstract class Model 
{
    protected $db;
    function __construct(){
        $this->db = new DatabaseConnection();
    }
    public function getDb() {
        return $this->db->getConnection();
    }

    public function __set($name, $value){
        $this->$name = $value;
    }
    
    public function __get($name){
        return $this->$name;
    }
}
