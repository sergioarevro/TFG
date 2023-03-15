<?php
    include $_SERVER['DOCUMENT_ROOT'].'/TFG/config/config.php';
    // Iniciar sesión
    //session_start();   ----> Necesito iniciar sesion??

    // Obtener los valores de "section" y "action" de la URL
    $section = isset($_GET['section']) ? $_GET['section'] : '';
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $view = isset($_GET['view']) ? $_GET['view'] : '';
    $test = isset($_GET['test']) ? $_GET['test'] : '';

    if (empty($section) && empty($action) && empty($view) && empty($test) ) {
        include 'app/views/home.html';
    }
    else{
        if ($section == 'users' && $action == 'create'){
            require_once MODELS_PATH.'user_model.php';
            session_start();
            $user_model = new UserModel();
            $user_model->insert();
        }
        
        if ($section == 'operas'){
            switch ($action){
                case 'show_quest':         
                    require_once MODELS_PATH.'operas_model.php';
                    $num_quest = isset($_GET['num']) ? $_GET['num'] : '';
                    $model = new OperasModel();
                    $rows = $model->getNumQuest();
                    if ($num_quest <= $rows){
                        $question = $model->getQuestionbyID($num_quest); 
                        require_once VIEWS_PATH.'show_operas_quest.php';                   
                        break;
                    }else{
                        echo "Test terminado";
                    }
                        

                    
                case 'insert_answer':
                    $quest_id = $_POST['quest_id'];
                    $answer = $_POST['answer'];
                    require_once MODELS_PATH.'operas_model.php';
                    $model = new OperasModel();
                    echo "<br>id: $quest_id y answer: $answer";
                    $model->insertAnswer($quest_id, $answer);
                    $quest_id++;
                    header("Location: index.php?section=operas&action=show_quest&num=$quest_id");
                    break;
            }
        }
        if ($view){
            switch($view){
                case 'init_test';
                    switch ($test){
                        case 'operas':
                           require_once VIEWS_PATH.'landing_test.php'; 
                    }
                        
            }
        }
        
    }
?>
