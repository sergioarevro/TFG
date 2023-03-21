<?php
    include $_SERVER['DOCUMENT_ROOT'].'/TFG/config/config.php';
    include ROOT_PATH.'config/database.php';
    // Iniciar sesión
    //session_start();   ----> Necesito iniciar sesion??
    $db_connector = DataBase::getInstance();
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
            require_once MODELS_PATH.'personal_model.php';
            $personal_model = new PersonalModel($db_connector);
            $colours = $personal_model->read('color');
            $sex = $personal_model-> read('sexo');
            $place = $personal_model-> read('lugar_residencia');
            $studies = $personal_model-> read('estudios');
            $ocupation = $personal_model-> read('ocupación');
            
            include 'app/views/user_data_view.php';
        }
        else if ($section == 'users' && $action == 'store'){
            require_once MODELS_PATH.'user_model.php';
            session_start();
            $user_model = new UserModel($db_connector);
            $user_model->insert();
        }
        
        if ($section == 'operas'){
            switch ($action){
                case 'show_quest':         
                    require_once MODELS_PATH.'operas_model.php';
                    $num_quest = isset($_GET['num']) ? $_GET['num'] : '';
                    $model = new OperasModel($db_connector);
                    $rows = $model->getNumQuest();
                    $perc = ($num_quest/40)*100;
                    if ($num_quest <= $rows){
                        $question = $model->getQuestionbyID($num_quest); 
                        //require_once VIEWS_PATH.'show_operas_quest.php';
                        $text='operas';
                        require_once VIEWS_PATH.'test_view.php';
                        break;
                    }else{
                        //echo "Test terminado";
                        require_once 'index.php?section=iq&action=show_test&num=1';
                    }
                                     
                case 'insert_answer':
                    $quest_id = $_POST['quest_id'];
                    $answer = $_POST['answer'];
                    require_once MODELS_PATH.'operas_model.php';
                    $model = new OperasModel($db_connector);
                    echo "<br>id: $quest_id y answer: $answer";
                    $model->insertAnswer($quest_id, $answer);
                    $quest_id++;
                    header("Location: index.php?section=operas&action=show_quest&num=$quest_id");
                    //Modificar y si llega a 40 pasar al siguiente test
                    break;
            }
        }
        
        if ($section == 'iq'){
            switch ($action){
                case 'show_test': 
                    require_once MODELS_PATH.'iq_model.php';
                    $num_quest = isset($_GET['num']) ? $_GET['num'] : '';
                    $model = new IqModel($db_connector);
                    $rows = $model->getNumQuest();
                    $perc = ($num_quest/40)*100;
                    if ($num_quest <= $rows){
                        $question = $model->getQuestionbyID($num_quest); 
                        $text='iq';
                        require_once VIEWS_PATH.'test_view.php';
                        break;
                    }else{
                        //echo "Test terminado";
                        require_once 'index.php';
                        break;}
                    
                case 'insert_answer':
                    echo "dentro show_test <br>";
                    $quest_id = $_POST['quest_id'];
                    $answer = $_POST['answer'];
                    require_once MODELS_PATH.'iq_model.php';
                    $model = new IqModel($db_connector);
                    echo "<br>id: $quest_id y answer: $answer";
                    $model->insertAnswer($quest_id, $answer);
                    $quest_id++;
                    header("Location: index.php?section=iq&action=show_test&num=$quest_id");
                    //Modificar y si llega a 40 pasar al siguiente test
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
