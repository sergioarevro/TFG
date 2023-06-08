<?php
/*
 * Esta clase gestiona todas las operaciones relacionadas 
 * con el test de mails de Google
 */

$documentRoot = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);
include $documentRoot . '/TFG/config/config.php';

class MailModel {

    private $db_connector;
    
    public function __construct($db_connector) {
        session_start();
        $this->db_connector = $db_connector;
    }
    
    public function insertAnswer($question_num, $answer){
        $conn = $this->db_connector->getConnection();
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO answers_mail (id_user, question_num, answer) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);  
        
        if (!$stmt) {
            error_log("Prepare error:  . $conn->error");
            return;
        }
        
        $stmt->bind_param("iis", $user_id, $question_num, $answer);
        
        if (!$stmt->execute()) {
            error_log("Execution error:  . $stmt->error");
            return;
        }
        $this->db_connector->closeConnection($conn);
    }
    
    /*
     * Función que devuelve el numero de preguntas que hay en el test
     */
    public function getNumQuest(){
        $conn = $this->db_connector->getConnection();

        $sql = "SELECT COUNT(*) as total FROM questions_mail";

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
    
    /*
     * Función que calcula la puntuación total del test y la guarda en la bd
     */
    public function setFinalScore(){
        $conn = $this->db_connector->getConnection();
        $id_user = $_SESSION['user_id'];
        
        $sql = "SELECT COUNT(*) AS count
                FROM answers_mail AS a
                INNER JOIN questions_mail AS q ON a.question_num = q.id
                WHERE a.id_user = $id_user AND a.answer = q.correct_answer";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $count = $row['count'];
        
        $sql2 = "SELECT * FROM puntuaciones WHERE id_user = $id_user";
        $result2 = $conn->query($sql2);

        if ($result2 && $result2->num_rows > 0) {
            $row = $result2->fetch_assoc();
            $updateSql = "UPDATE puntuaciones SET mail = $count WHERE id_user = $id_user";
            
            if ($conn->query($updateSql) === TRUE) {
            } else {
                echo "Error al actualizar la entrada: " . $conn->error;
            }    
        } else {
            $insertSql = "INSERT INTO puntuaciones (id_user, mail) VALUES ($id_user, $count)";
            
            if ($conn->query($insertSql) === TRUE) {  
            } else {
                echo "Error al crear la nueva entrada: " . $conn->error;
            }
        }
        $this->db_connector->closeConnection($conn);
    }
    
    public function execute($conn,$sql) {
        if (!$conn->query($sql) === TRUE) {
          echo "Error inserting." . $conn->error;
        }
    }
}

?>

