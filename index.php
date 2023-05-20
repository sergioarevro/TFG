<?php
    include $_SERVER['DOCUMENT_ROOT'].'/TFG/config/config.php';
    include ROOT_PATH.'config/database.php';

    $db_connector = DataBase::getInstance();
    $section = isset($_GET['section']) ? $_GET['section'] : '';
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $view = isset($_GET['view']) ? $_GET['view'] : '';
    $test = isset($_GET['test']) ? $_GET['test'] : '';
    $start = isset($_GET['start']) ? $_GET['start'] : '';
    
    require_once MODELS_PATH.'iq_model.php';
    
    IqModel::createInstance($db_connector);
    $iq_model = $_SESSION['iq_instance'];
    
    $siguiente = $iq_model->getNextQuestion();

    if (empty($section) && empty($action) && empty($view) && empty($test) ) { 
        include 'app/views/home.html';
        
    }
    else{
        
        /*
         * Sección test información demográfica
         */
        if ($section == 'users'){
            switch($action){                     
                case 'init':
                    require_once MODELS_PATH.'personal_model.php';
                    $personal_model = new PersonalModel($db_connector);
                    $colours = $personal_model->read('color');
                    $sex = $personal_model-> read('sexo');
                    $place = $personal_model-> read('lugar_residencia');
                    $studies = $personal_model-> read('estudios');
                    $ocupation = $personal_model-> read('ocupación');
                    
                    include 'app/views/user_data_view.php';
                    break;
                
                case 'create':
                    $test = 'demografica';
                    header("Location: index.php?view=init_test&test=$test");
                    break;
                
                case 'store_aswer':
                    require_once MODELS_PATH.'user_model.php';
                    session_start();
                    $user_model = new UserModel($db_connector);
                    $user_model->insert();
                    $test = 'operas';
                    header("Location: index.php?view=init_test&test=$test");
            }
        }
     
        /*
         * Sección test OPERAS
         */
        
        if ($section == 'operas'){
            switch ($action){
                case 'init': 
                    header("Location: index.php?section=operas&action=show_quest&num=1"); 
                    break;
                
                case 'show_quest':         
                    require_once MODELS_PATH.'operas_model.php';
                    $num_quest = isset($_GET['num']) ? $_GET['num'] : '';
                    $model = new OperasModel($db_connector);
                    $rows = $model->getNumQuest();
                    $perc = ($num_quest/40)*100;
                    if ($num_quest <= $rows){
                        $question = $model->getQuestionbyID($num_quest); 
                        $text='operas';
                        require_once VIEWS_PATH.'test_view.php';
                        break;
                    }else{
                        $model->setFinalScore();
                        header("Location: index.php?view=init_test&test=iq");
                    }
                                     
                case 'insert_answer':
                    $quest_id = $_POST['quest_id'];
                    $answer = $_POST['answer'];
                    require_once MODELS_PATH.'operas_model.php';
                    $model = new OperasModel($db_connector);
                    $model->insertAnswer($quest_id, $answer);
                    $quest_id++;
                    if ($quest_id <= 40){
                        header("Location: index.php?section=operas&action=show_quest&num=$quest_id");
                    }else {
                        $model->setFinalScore();
                        header("Location: index.php?view=init_test&test=iq");
                    }
                    break;                    
            }
        }
        
        /*
         * Sección Test IQ
         */
        
        if ($section == 'iq'){
            switch ($action){
                case 'init':
                    $iq_model->iniVariables();
                    header("Location: index.php?section=iq&action=show_quest&num=1"); 
                    break;
                
                case 'show_quest': 
                    $num_quest = isset($_GET['num']) ? $_GET['num'] : '';
                    $rows = $iq_model->getNumQuest();
                    
                    if ($num_quest <= $rows){
                        $question = $iq_model->getQuestionbyID($num_quest); 
                        $text='iq';
                        require_once VIEWS_PATH.'test_view.php';
                    }else{
                        $iq_model->setFinalScore();
                        header("Location: index.php?view=init_test&test=mail");
                    }
                    break;

                    
                case 'insert_answer':
                    $quest_id = $_POST['quest_id'];
                    $answer = $_POST['answer'];
                    
                    if ($iq_model->getReverseMode()){
                        $iq_model->reviewAnswerReverse($quest_id, $answer);
                    }
                    else{
                        $iq_model->reviewAnswer($quest_id, $answer);
                    }
                    
                    $next_quest = $iq_model->getNextQuestion();
                    
                    if ($next_quest == 0){
                        $iq_model->setFinalScore();
                        header("Location: index.php?view=init_test&test=mail");
                    }
                    else{
                       header("Location: index.php?section=iq&action=show_quest&num=$next_quest"); 
                    }
                    break;
                }           
        }        
        /*
         * Sección test Mail Phishing
         */
        if ($section == 'mail'){
            switch ($action){
                case 'show_quest':
                    $num_quest = isset($_GET['num']) ? $_GET['num'] : '';
                    require_once MODELS_PATH.'mail_model.php';
                    $mail_model = new MailModel($db_connector);
                    $rows = $mail_model->getNumQuest();
                    if ($num_quest <= $rows){
                        $mode = isset($_GET['mode']) ? $_GET['mode'] : '';
                        $text='mail';
                        //$Timestamp = date('Y-m-d H:i:s') . ' - ';
                        //file_put_contents('/Applications/MAMP/logs/php_errors.log', $Timestamp."Show quest -> mode : $mode".PHP_EOL, FILE_APPEND);
                        require_once VIEWS_PATH.'test_phishing_view.php';
                        break;
                    }else{
                        $mail_model->setFinalScore();
                        header("Location: index.php?view=finish_test&test=mail");
                        break;
                    }
                    
                case 'show_next':
                    $num_quest = isset($_GET['num']) ? $_GET['num'] : '';
                    $num_quest++;
                    require_once MODELS_PATH.'mail_model.php';
                    $mail_model = new MailModel($db_connector);
                    $rows = $mail_model->getNumQuest();
                    if ($num_quest <= $rows){
                        $mode = isset($_GET['mode']) ? $_GET['mode'] : '';
                        $text='mail';
                        //$Timestamp = date('Y-m-d H:i:s') . ' - ';
                        //file_put_contents('/Applications/MAMP/logs/php_errors.log', $Timestamp."Show quest -> mode : $mode".PHP_EOL, FILE_APPEND);
                        require_once VIEWS_PATH.'test_phishing_view.php';
                        break;
                    }else{
                        $mail_model->setFinalScore();
                        header("Location: index.php?view=finish_test&test=mail");
                        break;
                    }
                    break;

                    
                case 'insert_answer':
                    $quest_id = $_POST['quest_id'];
                    $answer = $_POST['answer'];
                    $mode = $_GET['mode'];
                    $Timestamp = date('Y-m-d H:i:s') . ' - ';
                    file_put_contents('/Applications/MAMP/logs/php_errors.log', $Timestamp."inser_answer ->answer: $answer, quest_id: $quest_id,  mode : $mode".PHP_EOL, FILE_APPEND);
                    require_once MODELS_PATH.'mail_model.php';
                    $mail_model = new MailModel($db_connector);
                    $mail_model->insertAnswer($quest_id, $answer);
                    
                    if($mode == 'entrenamiento'){
                        $num_quest = $quest_id;
                        $text = mail;
                        require_once VIEWS_PATH.'test_phishing_explanation.php';
                        break;
                        //header("Location: index.php?section=mail&action=show_quest&num=$quest_id&mode=$mode");
                    }
                    else{
                        $quest_id++;
                        header("Location: index.php?section=mail&action=show_quest&num=$quest_id&mode=$mode");
                    }

                    break; 
                                                
                case 'init':
                    $mode = isset($_GET['mode']) ? $_GET['mode'] : '';
                    header("Location: index.php?section=mail&action=show_quest&num=1&mode=$mode");
                    break;
                }  

        }
       
        if ($view){
            switch($view){
                case 'init_test';
                    require_once VIEWS_PATH.'landing_test.php';
                    break;
                    
                /*case 'show_score';
                    require_once MODELS_PATH.'iq_model.php';
                    $iq_model = new IqModel($db_connector);
                    error_log("post instanciado show score");
                    //$score = $iq_model->calculateTestScore();
                    //$test = $_POST['iq'];
                    $score = 100;
                    require_once VIEWS_PATH.'test_score_view.php';  
                    break;*/
                
                case 'phishing':
                    require_once VIEWS_PATH.'landing_phishing.php';
                    break;
                
                case 'finish_test':
                    require_once VIEWS_PATH.'finish_test_view.php';
                    break;
            }
        }
 
    }
    
            /*if ($section == 'pishing'){
            switch ($action){
                case 'start': 
                    require_once VIEWS_PATH.'landing_phishing.php';
                    break;
                
                case 'init_test':
                    require_once VIEWS_PATH.'landing_test.php';
                    break;
            }
        }*/
    
?>