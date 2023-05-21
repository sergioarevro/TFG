<?php
    $documentRoot = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);
    include $documentRoot . '/TFG/config/config.php';
    include ROOT_PATH.'config/database.php';

    //Inicializaciones
    $db_connector = DataBase::getInstance();
    $view = filter_input(INPUT_POST, 'view', FILTER_SANITIZE_STRING);
    $test = filter_input(INPUT_POST, 'test', FILTER_SANITIZE_STRING);
    $section = filter_input(INPUT_POST, 'section', FILTER_SANITIZE_STRING);
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

    if (empty($section) && empty($action) && empty($test) && empty($view)) { 
        include 'app/views/home.html';      
    }
    else{    
        /*
         * Sección de información usuario
         */
        if ($section == 'users'){
            require_once MODELS_PATH.'personal_model.php';
            $personal_model = new PersonalModel($db_connector);
            
            require_once MODELS_PATH.'user_model.php';
            $user_model = new UserModel($db_connector);
            
            switch($action){                     
                case 'init':
                    $colours = $personal_model->read('color');
                    $sex = $personal_model-> read('sexo');
                    $place = $personal_model-> read('lugar_residencia');
                    $studies = $personal_model-> read('estudios');
                    $ocupation = $personal_model-> read('ocupación');
                    require_once VIEWS_PATH.'user_data_view.php';
                    break;

                case 'insert_answer':
                    $user_model->insert();
                    $test = 'operas';
                    require_once VIEWS_PATH.'landing_test.php';
            }
        }

        /*
         * Sección test OPERAS
         */
        
        if ($section == 'operas'){
            require_once MODELS_PATH.'operas_model.php';
            $operas_model = new OperasModel($db_connector);
            
            switch ($action){
                case 'init': 
                    $question = $operas_model->getQuestionbyID(1);
                    require_once VIEWS_PATH.'test_view.php';
                    break;
                                     
                case 'insert_answer':
                    $quest_id = filter_input(INPUT_POST, 'quest_id', FILTER_SANITIZE_STRING);
                    $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING);

                    $operas_model->insertAnswer($quest_id, $answer);
                    $quest_id++;
                    $rows = $operas_model->getNumQuest();

                    if ($quest_id <= $rows){
                        $question = $operas_model->getQuestionbyID($quest_id); 
                        require_once VIEWS_PATH.'test_view.php';
                    }else {
                        $operas_model->setFinalScore();
                        $test='iq';
                        require_once VIEWS_PATH.'landing_test.php';
                    }
                    break;                
            }
        }
        
        /*
         * Sección Test IQ
         */
        
        if ($section == 'iq'){
            require_once MODELS_PATH.'iq_model.php';
            IqModel::createInstance($db_connector);
            $iq_model = $_SESSION['iq_instance'];
            
            switch ($action){
                case 'init':
                    $iq_model->iniVariables();
                    $question = $iq_model->getQuestionbyID(1);
                    require_once VIEWS_PATH.'test_view.php';
                    break;
                    
                case 'insert_answer':
                    $quest_id = filter_input(INPUT_POST, 'quest_id', FILTER_SANITIZE_STRING);
                    $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING);

                    if ($iq_model->getReverseMode()){
                        $iq_model->reviewAnswerReverse($quest_id, $answer);
                    }
                    else{
                        $iq_model->reviewAnswer($quest_id, $answer);
                    }
                    
                    $next_quest = $iq_model->getNextQuestion();
                    $rows = $iq_model->getNumQuest();
                    
                    if ($next_quest == 0 || $num_quest >= $rows){             //Test finalizado
                        $iq_model->setFinalScore();
                        $test='mail';
                        require_once VIEWS_PATH . 'landing_test.php';
                    }
                    else{
                        $question = $iq_model->getQuestionbyID($next_quest); 
                        require_once VIEWS_PATH.'test_view.php';
                    }
                    break;
                }           
        } 
        
        /*
         * Sección test Mail Phishing
         */
        if ($section == 'mail'){
            require_once MODELS_PATH.'mail_model.php';
            $mail_model = new MailModel($db_connector);
        
            switch ($action){               
                case 'init':
                    $mode = filter_input(INPUT_POST, 'mode', FILTER_SANITIZE_STRING);
                    $num_quest = 1;
                    require_once VIEWS_PATH.'test_phishing_view.php';
                    break;

                case 'show_next':
                    $num_quest = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_STRING);

                    $num_quest++;
                    $rows = $mail_model->getNumQuest();
                    if ($num_quest <= $rows){
                        $mode = filter_input(INPUT_POST, 'mode', FILTER_SANITIZE_STRING);
                        require_once VIEWS_PATH.'test_phishing_view.php';           
                    }else{
                        $mail_model->setFinalScore();
                        $test='mail';
                        require_once VIEWS_PATH.'finish_test_view.php';
                    }
                    break;

                    
                case 'insert_answer':
                    $num_quest = filter_input(INPUT_POST, 'num', FILTER_SANITIZE_STRING);
                    $answer = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_STRING);
                    $mode = filter_input(INPUT_POST, 'mode', FILTER_SANITIZE_STRING);
                    
                    $mail_model->insertAnswer($num_quest, $answer);
                    
                    if($mode == 'entrenamiento'){
                        require_once VIEWS_PATH.'test_phishing_explanation.php';
                    }
                    else{         //Mostrar siguiente
                        $num_quest++;
                        $rows = $mail_model->getNumQuest();
                        if ($num_quest <= $rows){
                            require_once VIEWS_PATH.'test_phishing_view.php';
                    }else{
                        $mail_model->setFinalScore();
                        $test='mail';
                        require_once VIEWS_PATH.'finish_test_view.php';
                    }
                    break; 
                    }
                }
            }
           
        if ($view){
            switch($view){
                case 'init_test';
                    require_once VIEWS_PATH.'landing_test.php';
                    break;
            }
        }
    }
?>