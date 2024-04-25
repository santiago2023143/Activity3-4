<?php

include 'database/db.php';

class UserMigration extends Database
{

    public function createTable(){

        $this->conn();

        $this->conn->query("CREATE TABLE IF NOT EXISTS users(
            id int auto_increment primary key,
            first_name varchar(50) not null,
            last_name varchar(255) not null,
            email varchar(100) not null,
            password varchar(100) not null,
            token varchar(100) not null
        
            )");
    }


}

$new = new UserMigration();
$new->createTable();
?>