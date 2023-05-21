<?php
/*
 * Esta clase gestiona todas las operaciones referntes al test IQ
 */

//include $_SERVER['DOCUMENT_ROOT'].'/TFG/config/config.php';
$documentRoot = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);
include $documentRoot . '/TFG/config/config.php';

class IqModel {

    private $db_connector, $show_back, $next_question, $show_later, $reverse_mode;

    private function __construct($db_connector) {    
        $this->db_connector = $db_connector;
    }
    
    
    //Funciones para crear instancia, getters & setters, iniciar variables
    public static function createInstance($db_connector) {
        session_start();
        if (!isset($_SESSION['iq_instance'])) {
            $_SESSION['iq_instance'] = new self($db_connector);      
        }
    }
    public function getReverseMode() {
        return $this->reverse_mode;
    }

    public function getShowBack() {
        return $this->show_back;
    }

    public function getNextQuestion() {
        return $this->next_question;
    }
    
    public function getShowLater() {
        return $this->show_later;
    }
    
    public function iniVariables(){
        $this->show_back = false;
        $this->reverse_mode = false;
        $this->next_question = 1;
    }
    
    /*
     * Funciones de comunicación con Base de Datos
     */
    
    public function getAllQuestions() {
    $sql = "SELECT id, path_q, path_a FROM questions_iq";
    $result = mysqli_query($this->conn, $sql);     

    $questions = array();
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_object($result)) {
                $quest = new stdClass();
                $quest->id = $row->id;
                $quest->path_q = $row->path_q;
                $quest->path_a = $row->path_a;
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
        $sql = "SELECT id, path_q, path_a FROM questions_iq WHERE id = ?";
        
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $id, $path_q, $path_a);
        mysqli_stmt_fetch($stmt);
        
        $quest = new stdClass();   
        $quest->id = $id;
        $quest->path_q = $path_q;
        $quest->path_a = $path_a;

        $this->db_connector->closeConnection($conn);

        return $quest;

    }
    
    public function insertAnswer($question_id, $answer, $correct){
        $conn = $this->db_connector->getConnection();
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO answers_iq (id_user, id_quest_iq, answer, correct) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);  
        if (!$stmt) {
            error_log("Prepare error:  . $conn->error");
            return;
        }
        $stmt->bind_param("iisi", $user_id, $question_id, $answer, $correct);
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
    
    /*
     * Revisa la respuesta dada por el usuario y actua en consecuencia a los criterios
     * de corrección. Posteriormente muestra la siguiente pregunta o acaba con el test.
     * Solo se queda en esta función si el orden es descendente.
     */
    public function reviewAnswer($question_id, $answer){
        
        $conn = $this->db_connector->getConnection();
        $user_id = $_SESSION['user_id'];
        

        if ($question_id >= 1 && $question_id <= 3){
            $this->insertAnswer($question_id, $answer, $this->checkCorrect($question_id, $answer));
            $this->next_question++;       
        }
        elseif ($question_id == 4 || $question_id == 5){

            if ($this->checkCorrect($question_id, $answer)){        //Si es correcta insertamos y siguiente
                $this->insertAnswer($question_id, $answer, 1);

                if ($question_id == 5){
                    if($this->checkTwoQuest($question_id, $question_id-1)){
                        for($i = 0; $i < 4; $i++){         //Damos como correctas las preguntas 1,2 y 3
                            $this->updateAnswer($user_id,$i,1);
                        }
                    }
                }
                $this->next_question++; 
            }
            else{
                $this->insertAnswer($question_id, $answer, 0);
                $this->next_question--;     //Si es incorrecta, anterior pregunta
                $this->reverse_mode = true;
                $this->next_later = $question_id + 1;
            }
        }
        elseif ($question_id > 5){
            $this->insertAnswer($question_id, $answer,$this->checkCorrect($question_id, $answer));
            $this->checkConditions($question_id);
        }

        $this->db_connector->closeConnection($conn);    
    }
    
    /*
     * Función que revisa las respuestas cuando se están mostrando en orden descendente.
     * Las preguntas superiores a la nº 4 solo se tratan en orden ascendente
     */
    public function reviewAnswerReverse($question_id, $answer){
        $conn = $this->db_connector->getConnection();
        $user_id = $_SESSION['user_id'];
        
        $this->updateAnswer($user_id, $question_id, $this->checkCorrect($question_id, $answer));
        
        switch($question_id){
            case 4:     
                $this->next_question--;
                break;
            case 3:
                if($this->checkTwoQuest($question_id, $question_id+1)){  //Si las preguntas 3 y 4 son correctas
                    for($i = 0; $i < 3; $i++){         //Damos como correctas las preguntas 1 y 2 
                        $this->updateAnswer($user_id,$i,1);
                    }
                    $this->reverse_mode = false;
                    $this->next_question = $this->next_later;
                    break;
                }
                $this->next_question--;
                break;
            case 2:
                if($this->checkTwoQuest($question_id, $question_id+1)){  //Si las preguntas 2 y 3 son correcta damos la 1 por correcta
                    $this->updateAnswer($user_id,1,1);
                    $this->reverse_mode = false;
                    $this->next_question = $this->next_later;
                    break;
                }
                elseif ($this->checkCorrect($question_id, $answer)){     //Si pregunta 2 correcta damos la oportunidad de pasar a la 1
                    $this->next_question--;
                    break;
                }
                $this->next_question = 0;    //Pregunta 2 incorrecta, acaba el test
                break;

            case 1:
                if($this->checkTwoQuest($question_id, $question_id+1)){  //Si las preguntas 1 y 2 son correctas continuamos test
                    $this->reverse_mode = false;
                    $this->next_question = $this->next_later;
                    break;
                }
                $this->next_question = 0;    //Pregunta 1 incorrecta, acaba el test
                break;                
        }
        
        $this->db_connector->closeConnection($conn);
    }

    /*
     * Función que comprueva las condiciones de salida del test
     */
    public function checkConditions($last_question){
        $conn = $this->db_connector->getConnection();
        $user_id = $_SESSION['user_id'];
        $last_questions= array();        //Array que guarda las ultimas 5 respuestas
        $errors_consec = 0;                 //Contador de errores consecutivos en las 5 respuestas anteriores
        $errors_last_five = 0;              //Contador de numero de fallos en las 5 respuestas anteriores
        $aux = 0;
        $quest = 0;                         //Id de pregunta que consultamos
        
        for ($quest = $last_question; $quest >= $last_question-5; $quest --){
            $sql = "SELECT correct FROM answers_iq WHERE id_quest_iq = $quest AND id_user = $user_id";
            $resultado = $conn->query($sql);

            $fila = $resultado->fetch_assoc();
            $correct = $fila["correct"];
            $last_questions[] = $correct;            
        }
        
        for ($i = 0; $i < 5; $i++){
            if ($last_questions[$i] == 0){
                $errors_last_five ++;
                $aux ++;
                
                if ($aux > $errors_consec){
                    $errors_consec = $aux;
                }
            }
            else{
                $aux = 0;
            }
        }
        
        if ($errors_consec == 4 || $errors_last_five >= 4){
            $this->next_question = 0;      //Indicador de que el test a acabado
        }
        else{
            $this->next_question = $last_question + 1; 
        }
        
        $this->db_connector->closeConnection($conn);   
    }
    
    /*
     * Funcion que actualiza a correcta una respuesta anterior
     */
    public function updateAnswer($user_id,$question_id, $correct){
        $conn = $this->db_connector->getConnection();

        $sql = "UPDATE answers_iq SET correct = $correct WHERE id_user = $user_id AND id_quest_iq = $question_id";
        $this->execute($conn, $sql);
        $this->db_connector->closeConnection($conn);     
    }
    
    /*
     * Funcion que actualiza a incorrecta una respuesta anterior
     */
    public function makeIncorrect($user_id,$question_id){
        $conn = $this->db_connector->getConnection();

        $sql = "UPDATE answers_iq SET correct = 0 WHERE id_user = $user_id AND id_quest_iq = $question_id";
        $this->execute($conn, $sql);
        $this->db_connector->closeConnection($conn);     
    }
                                    
    
    /*
     * Función que comprueva si la respuesta es correcta
     */
    public function checkCorrect($question_id, $answer){
        $conn = $this->db_connector->getConnection();
        
        $sql = "SELECT correct_a FROM questions_iq WHERE id = $question_id";

        $resultado = $conn->query($sql);

        if ($resultado) {
            $registro = $resultado->fetch_assoc();
            $correct_a = (int) $registro['correct_a'];

            if ($correct_a == $answer){
                $correct = 1;
            } else {
                $correct = 0;
            }
        } else {
            echo "Error en la consulta: " . $conn->error;
        }

        $this->db_connector->closeConnection($conn);
        return $correct;
    }
    
    /* 
     * Función que comprueva si $question_id1 y $question_id2 han sido respondidas correctamente
     * Si han sido correctamente respondidas las dos, devuelve true. 
     */     
    public function checkTwoQuest($question_id1, $question_id2){
        $conn = $this->db_connector->getConnection();
        $id_user = $_SESSION['user_id'];
        
        $sql1 = "SELECT correct FROM answers_iq WHERE id_user = $id_user AND id_quest_iq = $question_id1";
        
        $resultado1 = $conn->query($sql1);

        if ($resultado1) {
            $registro = $resultado1->fetch_assoc();
            $first_quest = (int) $registro['correct'];
        }
        else{
            echo "Error en la consulta: " . $conn->error;
        }
        
        $sql2 = "SELECT correct FROM answers_iq WHERE id_user = $id_user AND id_quest_iq = $question_id2";
        $resultado2 =$conn->query($sql2);
        
        if ($resultado2) {
            $registro = $resultado2->fetch_assoc();
            $second_quest = (int) $registro['correct'];
        }
        else{
            echo "Error en la consulta: " . $conn->error;
        }
        
        if ($first_quest == 1 && $second_quest == 1){
            $this->db_connector->closeConnection($conn);
            return true;
        } 
       
        $this->db_connector->closeConnection($conn);
        return false;
    }
    
    /*
     * Función que calcula el resultado total del test
     */
    public function getScore(){
        $conn = $this->db_connector->getConnection();
        $id_user = $_SESSION['user_id'];
        
        $sql = "SELECT COUNT(*) AS count FROM answers_iq WHERE id_user = $id_user AND correct = 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $count = $row["count"];
        } else {
            echo "No se encontraron resultados para el id_user $id_user.";
        }
        
        $this->db_connector->closeConnection($conn);
        return $count;
    }
    
    /*
     * Función que calcula la puntuación total del test y la guarda en la bd
     */
    public function setFinalScore(){
        $conn = $this->db_connector->getConnection();
        $id_user = $_SESSION['user_id'];
        
        $sql1 = "SELECT COUNT(*) AS count FROM answers_iq WHERE correct = 1 AND id_user = $id_user";
        $result1 = $conn->query($sql1);
        $row = $result1->fetch_assoc();
        $count = $row['count'];
        
        $sql = "SELECT * FROM puntuaciones WHERE id_user = $id_user";
        $result2 = $conn->query($sql);
        
        if ($result2 && $result2->num_rows > 0) {
            $row = $result2->fetch_assoc();

            $updateSql = "UPDATE puntuaciones SET iq = $count WHERE id_user = $id_user";
            if ($conn->query($updateSql) === TRUE) {
                //
            } else {
                echo "Error al actualizar la entrada: " . $conn->error;
            }
        } else {
            $insertSql = "INSERT INTO puntuaciones (id_user, iq) VALUES ($id_user, $count)";
            if ($conn->query($insertSql) === TRUE) {
                //echo "Nueva entrada creada correctamente.";
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