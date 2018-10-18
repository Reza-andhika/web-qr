<?php

class db_function{
	private $conn;
	
	function __construct() {
    require_once 'db_connect.php';
	$db = new db_connect();
	$this->conn= $db->connect();
    }

    function __destruct() {
         
    }
    public function getUserByEmailAndPassword($email, $password) {
 
        $stmt = $this->conn->prepare("SELECT * FROM coba WHERE username = ? AND password=?");
 
        $stmt->bind_param("ss", $email,$password);

        if ($stmt->execute()) {
            $stmt->close();
        } else {
            return NULL;
        }
    }
}
?>