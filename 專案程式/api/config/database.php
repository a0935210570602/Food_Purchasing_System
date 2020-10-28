<?php
class Database{
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "members";
    private $username = "root";
    private $password = "a3135079602";
    public $conn;
 
    // get the database connection
    public function getConnection(){
        echo "Connecting database\n\n\n";
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>