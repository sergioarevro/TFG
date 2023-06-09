<?php
/*
 * Esta clase gestiona las inserciones de la información 
 * de usuario en la tabla users
 */

include 'config/config.php';

class UserModel {

    private $foreign_tables;
    private $db_connector;
    
    public function __construct($db_connector) {
        session_start();
        $this->foreign_tables = array("color","lugar_residencia","estudios","ocupacion");
        $this->db_connector = $db_connector;
    }
    
    public function insert() {     
        $conn = $this->db_connector->getConnection();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date_of_birth = mysqli_real_escape_string($conn, $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
            $sex = mysqli_real_escape_string($conn, $_POST['sex']);
            $colour = mysqli_real_escape_string($conn, $_POST['colour']);
            $place = mysqli_real_escape_string($conn, $_POST['place']);
            $studies = mysqli_real_escape_string($conn, $_POST['studies']);
            $ocupation = mysqli_real_escape_string($conn, $_POST['ocupation']);
        }
        
        if ($_SESSION['user_id']){
            $user_id  = $_SESSION['user_id'];
            $sql = "UPDATE users SET id_sex = '$sex', date_of_birth = '$date_of_birth', id_color = '$colour', id_lugar_residencia = '$place',"
            . "id_estudios = '$studies', id_ocupacion = '$ocupation' WHERE id = '$user_id'";
            $this->execute($conn, $sql);
        }
        else{     
            $sql = "INSERT INTO users (id_sex, date_of_birth, id_color, id_lugar_residencia, id_estudios, id_ocupacion)
            VALUES ('$sex', '$date_of_birth', '$colour', '$place', '$studies', '$ocupation')";
            $this->execute($conn, $sql);

            $user_id = mysqli_insert_id($conn);
            $_SESSION['user_id'] = $user_id;
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
