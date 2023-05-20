<?php
class DataBase {
    
    private static $instance;
    private $host = 'localhost'; 
    private $user = 'root';
    private $password = 'root'; 
    private $name_bd = 'TFG_Phishing';    
    
    private function __construct(){
    } 
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DataBase();
        }
        return self::$instance;
    }
    
    public function getConnection(){
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->name_bd);
        
        // verificar si la conexión se ha establecido correctamente
        if (!$conn) {
            die("Connection fails: " . mysqli_connect_error());
        }
        return $conn;
    }
    
    public function closeConnection($conn){
        mysqli_close($conn);
    }
}
?>