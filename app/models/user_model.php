<?php
include $_SERVER['DOCUMENT_ROOT'].'/TFG/config/config.php';

class UserModel {

    private $foreign_tables;
    private $db_connector;
    
    public function __construct($db_connector) {
        $this->foreign_tables = array("color","lugar_residencia","estudios","ocupación");
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

        $sql = "INSERT INTO users (id_sex, date_of_birth, id_color, id_lugar_residencia, id_estudios, id_ocupación)
        VALUES ('$sex', '$date_of_birth', '$colour', '$place', '$studies', '$ocupation')";
        $this->execute($conn, $sql);

        $user_id = mysqli_insert_id($conn);
        $_SESSION['user_id'] = $user_id;

        $params ='?view=init_test&test=operas';
        header('Location:index.php'.$params);
        $this->db_connector->closeConnection($conn);
    }
    
    
    public function execute($conn,$sql) {
        if (!$conn->query($sql) === TRUE) {
          echo "Error inserting." . $conn->error;
        }
    }
}

?>
