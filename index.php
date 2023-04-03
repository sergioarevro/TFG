<?php
    include $_SERVER['DOCUMENT_ROOT'].'/TFG/config/config.php';
    include ROOT_PATH.'config/database.php';

    $db_connector = DataBase::getInstance();
    $section = isset($_GET['section']) ? $_GET['section'] : '';
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $view = isset($_GET['view']) ? $_GET['view'] : '';
    $test = isset($_GET['test']) ? $_GET['test'] : '';
    $start = isset($_GET['start']) ? $_GET['start'] : '';

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
            //include 'index.php?section=iq&action=show_test&num=1';
            header("Location: index.php?view=init_test&test=operas");
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
                        $text='operas';
                        require_once VIEWS_PATH.'test_view.php';
                        break;
                    }else{
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
                        header("Location: index.php?view=init_test&test=iq");
                    }
                    break;
            }
        }
        
        if ($section == 'iq'){
            switch ($action){
                case 'show_quest': 
                    $num_quest = isset($_GET['num']) ? $_GET['num'] : '';
                    require_once MODELS_PATH.'iq_model.php';
                    $iq_model = new IqModel($db_connector);
                    $rows = $iq_model->getNumQuest();
                    $perc = ($num_quest/29)*100;
                    
                    if ($num_quest <= $rows){
                        $question = $iq_model->getQuestionbyID($num_quest); 
                        $text='iq';
                        require_once VIEWS_PATH.'test_view.php';
                        break;
                    }else{
                        header("Location: index.php?view=show_score&test=iq");
                        break;
                    }

                    
                case 'insert_answer':
                    $quest_id = $_POST['quest_id'];
                    $answer = $_POST['answer'];
                    require_once MODELS_PATH.'iq_model.php';
                    $iq_model = new IqModel($db_connector);
                    $iq_model->insertAnswer($quest_id, $answer);
                    $quest_id++;
                    header("Location: index.php?section=iq&action=show_quest&num=$quest_id");
                    break;
                    
                }           
        }
        if ($section == 'pishing'){
            switch ($action){
                case 'start': 
                    require_once VIEWS_PATH.'landing_phishing.php';
                    break;
                
                case 'init_test':
                    //$test = $_POST['test'];
                    error_log("Test pishing: $test");
                    require_once VIEWS_PATH.'landing_test.php';
                    break;
            }
        }
        if ($section == 'mail'){
            switch ($action){
                case 'show_quest': 
                    $num_quest = isset($_GET['num']) ? $_GET['num'] : '';
                    //require_once MODELS_PATH.'mail_model.php';
                    //$mail_model = new MailModel($db_connector);
                    //$rows = $mail_model->getNumQuest();
                    //$perc = ($num_quest/29)*100;
                    $rows = 100;
                    $perc = 0;
                    $perc ++;
                    if ($num_quest <= $rows){
                        //$question = $mail_model->getQuestionbyID($num_quest); 
                        $question = "$perc - Esto es una pregunta de prueba.";
                        $text='mail';
                        require_once VIEWS_PATH.'test_phishing_view.php';
                        break;
                    }else{
                        header("Location: index.php?view=show_score&test=mail");
                        break;
                    }

                    
                case 'insert_answer':
                    $quest_id = $_POST['quest_id'];
                    $answer = $_POST['answer'];
                    require_once MODELS_PATH.'mail_model.php';
                    $mail_model = new MailModel($db_connector);
                    $mail_model->insertAnswer($quest_id, $answer);
                    $quest_id++;
                    header("Location: index.php?section=mail&action=show_quest&num=$quest_id");
                    break;
                    
                }           
        }
       
        if ($view){
            switch($view){
                case 'init_test';
                    require_once VIEWS_PATH.'landing_test.php';
                    break;
                    
                case 'show_score';
                    require_once MODELS_PATH.'iq_model.php';
                    $iq_model = new IqModel($db_connector);
                    error_log("post instanciado show score");
                    //$score = $iq_model->calculateTestScore();
                    //$test = $_POST['iq'];
                    $score = 100;
                    require_once VIEWS_PATH.'test_score_view.php';  
                    break;
                
                case 'phishing':
                    require_once VIEWS_PATH.'landing_phishing.php';
                    break;
            }
        }

        
        
    }
?>
