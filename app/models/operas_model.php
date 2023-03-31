<?php
include $_SERVER['DOCUMENT_ROOT'].'/TFG/config/config.php';

class OperasModel{
    
    private $db_connector;
    private $conn;
    
    public function __construct($dbconnector) {
        session_start();
        $this->db_connector = $dbconnector;
    }
    
    public function getAllQuestions() {
        $conn = $this->db_connector->getConnection();
        $sql = "SELECT id, quest_esp FROM questions";
        $result = mysqli_query($this->conn, $sql);     
        
        $questions = array();
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_object($result)) {
                    $quest = new stdClass();
                    $quest->id = $row->id;
                    $quest->quest_esp = $row->quest_esp;
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
        $sql = "SELECT id, quest_esp FROM questions WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id, $question);
        mysqli_stmt_fetch($stmt);
        
        $quest = new stdClass();   
        $quest->id = $id;
        $quest->quest_esp = $question;

        $this->db_connector->closeConnection($conn);

        return $quest;

    }
    
    public function insertAnswer($question_id, $answer){
        $conn = $this->db_connector->getConnection();
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO answers (id_user, id_question, answer) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $user_id, $question_id, $answer);
        $stmt->execute();

        
        $this->db_connector->closeConnection($conn);
    }
    
    public function getNumQuest(){
        $conn = $this->db_connector->getConnection();

        $sql = "SELECT COUNT(*) as total FROM questions";

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
