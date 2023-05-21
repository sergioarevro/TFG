<?php
/*
 * Esta clase gestiona las consultas a las respuestas que debe 
 * mostrar el test de información demografico.
 */

$documentRoot = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);
include $documentRoot . '/TFG/config/config.php';

class PersonalModel {
    private $tables;
    private $dbconnector;
    
    public function __construct($db_connector) {
        session_start();
        $this->tables = ['sexo','color', 'lugar_residencia', 'estudios', 'ocupación'];
        $this->db_connector = $db_connector;
    }
    
    public function read($table) {
        $conn = $this->db_connector->getConnection();
        
        $sql = "SELECT id, name FROM $table";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        $this->db_connector->closeConnection($conn);
        
        return $data;
    }
    
    public function execute($conn,$sql) {
        if (!$conn->query($sql) === TRUE) {
          echo "Error inserting." . $conn->error;
        }
    }
}

?>
