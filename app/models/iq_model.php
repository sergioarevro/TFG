<?php
include $_SERVER['DOCUMENT_ROOT'].'/TFG/config/config.php';

class IqModel {

    private $db_connector;
    
    public function __construct($db_connector) {
        session_start();
        $this->db_connector = $db_connector;
    }
    
    public function getAllQuestions() {
    $conn = $this->db_connector->getConnection();
    $sql = "SELECT id, path FROM questions_iq";
    $result = mysqli_query($this->conn, $sql);     

    $questions = array();
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_object($result)) {
                $quest = new stdClass();
                $quest->id = $row->id;
                $quest->path = $row->path;
                $questions[] = $quest;
            }
        }
    }
    else {
        echo "Error en la consulta: " . mysqli_error($this->conn);
    }

    $this->db_connector->closeConnection($this->conn);
    return $questions;
}
    
    public function getQuestionbyID($id){
        $conn = $this->db_connector->getConnection();
        $sql = "SELECT id, path FROM questions_iq WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id, $path);
        mysqli_stmt_fetch($stmt);
        
        $quest = new stdClass();   
        $quest->id = $id;
        $quest->path = $path;

        $this->db_connector->closeConnection($conn);

        return $quest;

    }
    
    public function insertAnswer($question_id, $answer){

        $conn = $this->db_connector->getConnection();
        $user_id = $_SESSION['user_id'];
        //$user_id = 1;

        $sql = "INSERT INTO answers_iq (id_user, id_quest_iq, answer) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);  
        if (!$stmt) {
            error_log("Prepare error:  . $conn->error");
            return;
        }
    
        $stmt->bind_param("iis", $user_id, $question_id, $answer);
        if (!$stmt->execute()) {
            error_log("Execution error:  . $stmt->error");
            return;
        }
        $this->db_connector->closeConnection($conn);
    }
    
    public function getNumQuest(){
        $conn = $this->db_connector->getConnection();

        $sql = "SELECT COUNT(*) as total FROM questions_iq";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $rows = $row["total"];
        } else {
            echo "No se han encontrado entradas en la tabla.";
        }

        $this->db_connector->closeConnection($conn);
        
        return $rows;
    }
    
    public function execute($conn,$sql) {
        if (!$conn->query($sql) === TRUE) {
          echo "Error inserting." . $conn->error;
        }
    }
}

?>