<?php

class Database{
    
    public $conn;
    
    public function conn(){
        $this->conn = new mysqli('localhost', 'root', '', 'api_db');
    }
}


?>