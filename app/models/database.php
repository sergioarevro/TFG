<?php
class DataBase {
    
    private static $instance;
    private $host = 'smarttechresearch.com'; 
    private $user = 'tfg_phishing';
    private $password = 'PhishinG_23'; 
    private $name_bd = 'tfg_phishing';    
    
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