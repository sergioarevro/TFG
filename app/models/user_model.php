<?php
include $_SERVER['DOCUMENT_ROOT'].'/TFG/config/config.php';
include ROOT_PATH.'config/database.php';

class UserModel {

    private $foreign_tables;
    private $db_connector;
    
    public function __construct() {
        $this->foreign_tables = array("color","lugar_residencia","estudios","ocupación");
        $this->db_connector = DataBase::getInstance();
    }
    
    public function insert() {
        
        $conn = $this->db_connector->getConnection();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $sex = mysqli_real_escape_string($conn, $_POST['sex']);
            $date_of_birth = mysqli_real_escape_string($conn, $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);

            $foreign_answers = array(
                'colour' => mysqli_real_escape_string($conn, $_POST['colour']),
                'place' => mysqli_real_escape_string($conn, $_POST['place']),
                'studies' => mysqli_real_escape_string($conn, $_POST['studies']),
                'ocupation' => mysqli_real_escape_string($conn, $_POST['ocupation'])
            );
        }

        if (count($foreign_answers) === count($this->foreign_tables)) {
            $i = 0;   
            foreach ($foreign_answers as $answer){
                $table= $this->foreign_tables[$i];

                $sql = "INSERT INTO $table (name) VALUES ('$answer')";

                $this->execute($conn, $sql);
                $i++;
            }
            
            $sql = "INSERT INTO users (sex, date_of_birth, id_color, id_lugar_residencia, id_estudios, id_ocupación)
            VALUES ('$sex', '$date_of_birth',
                (SELECT MAX(id) FROM color),
                (SELECT MAX(id) FROM lugar_residencia),
                (SELECT MAX(id) FROM estudios),
                (SELECT MAX(id) FROM ocupación))";
            $this->execute($conn, $sql);
            
            $user_id = mysqli_insert_id($conn);
            $_SESSION['user_id'] = $user_id;
            
            $params ='?view=init_test&test=operas';
            header('Location:index.php'.$params);
            
        } else {
    
            echo "Discrepancy in arrays length.";
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
