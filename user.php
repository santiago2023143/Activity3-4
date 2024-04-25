<?php
include 'database/db.php';
header('Content-Type: application/json');

class User extends Database{

    public function getAll(){

        $this->conn();
        $sql = $this->conn->query("SELECT * FROM users");
        $data = $sql->fetch_all(MYSQLI_ASSOC);
        return $data;

    }

    public function Search(array $params){
        $this->conn();
        $email = $params['email'];
        $isSearch = $this->conn->prepare("SELECT * FROM users where email LIKE ?");
        $emailParams = "%$email%";
        $isSearch->bind_param("s", $emailParams);
        $isSearch->execute();
        $result = $isSearch->get_result();
        if($result->num_rows > 0)
        {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        } else {
            return json_encode([
                'message' => 'failed to search'
            ]);
        }
    }

    public function Create($params){
        $this->conn();
        if(empty($params['first_name'])){
            return ['message' => 'FisrtName is required'];
        }
        if(empty($params['last_name'])){
            return ['message' => 'LastName is required'];
        }
        if(empty($params['email'])){
            return ['message' => 'Email is required'];
        }
        if(empty($params['password'])){
            return ['message' => 'Password is required'];
        }
        if(empty($params['token'])){
            return ['message' => 'Token is required'];
        }

        $first_name = $params['first_name'];
        $last_name = $params['last_name'];  
        $email = $params['email'];
        $password = $params['password'];
        $token = $params['token'];

        $isInserted = $this->conn->query("INSERT INTO users (first_name, last_name, email, password, token)
        VALUES ('$first_name', '$last_name', '$email', '$password', '$token')
        ");

        if($isInserted){
            return ['message' => 'User Inserted Succesfully'];

        }
    }

    
}



?>