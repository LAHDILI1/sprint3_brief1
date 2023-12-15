<?php

 //require __DIR__ . '/../vendor/autoload.php';
 
include __DIR__ . '/../database/Connection.php';

class Users{
    
    private $conn;

    public function __construct(){

        $this->conn = Connection::getInstance()->getConn();
    }

    public function select_user($Username,$email) {
        return mysqli_query($this->conn, "SELECT * FROM users WHERE user_name = '$Username' OR email = '$email'");
    }

    public function add_user($fullname, $email, $Username, $confirm_password) {

        $insertion_user = mysqli_prepare($this->conn, 'INSERT INTO users(name,email,user_name,passe_word,role_id) VALUES(?,?,?,?,3)');
        mysqli_stmt_bind_param($insertion_user, "ssss", $fullname, $email, $Username, $confirm_password);
        mysqli_stmt_execute($insertion_user);
        return $insertion_user;
    }
    public function select_user2($Username) {

        $user = mysqli_prepare($this->conn, 'SELECT * FROM users WHERE user_name = ?');   
        mysqli_stmt_bind_param($user, "s", $Username);
    
        mysqli_stmt_execute($user);
    
        $result = mysqli_stmt_get_result($user);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}

?>