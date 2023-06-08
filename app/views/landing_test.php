<!DOCTYPE html>
<html>
<head>
    <?php include 'head.html'; ?>
</head>
<body>
    <?php include "header.html"; ?>
    
     <div class="wrapper">
        <div class="register-background"> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card text-center">
                                
                                <?php if ($test == 'demografico') { ?>
                                    <h2 class='col-md-12'>Test de Información demográfica</h2>
                                    <p class="col-md-12">En este test deberás responder una serie de preguntas sobre tu situación demográfica, como por ejemplo tu edad, sitio de residencia y similares.</p>
                                    <?php $test='users'; ?>
                                <?php }?>
                                    
                                <?php if ($test == 'operas') { ?>
                                    <h2 class='col-md-12'>Test OPERAS</h2>
                                    <p class="col-md-12">En este test deberás responder una serie de preguntas para evaluar tu personalidad mediante el test Operas.</p>
                                <?php }?>
                                    
                                <?php if ($test == 'iq') { ?>
                                    <h2 class='col-md-12'>Test de IQ</h2>
                                    <p class="col-md-12">En este test deberás responder una serie de preguntas para evaluar tu coeficiente intelectual. </p>
                                <?php }?>

                                <?php if ($test == 'mail') { ?>
                                    <h2 class='col-md-12'>Test de Mail Phishing</h2>
                                    <p class="col-md-12">En este test se proponen una serie de emails que pueden ser o no phishing.</p>
                                    <p class="col-md-12">Escoge entre realizar el test en modo entrenamiento o en modo experimento. El modo entrenamiento da feedback sobre las respuestas.</p>
                                    
                                    <form id="formMail" method="POST" action="index.php">
                                        <input type="hidden" name="section" value="<?php echo $test?>">
                                        <input type="hidden" name="action" value="init">
                                        <div class="col-md-12" style="display: inline-block;">
                                            <button type="submit" name="mode" value="entrenamiento" class="btn btn-block btn-send col-md-4" style="width: 250px; margin-right: 10px;">Entrenamiento</button>
                                            <button type="submit" name="mode" value="experimento" class="btn btn-block btn-send col-md-4" style="width: 250px;">Experimento</button>
                                        </div>
                                    </form>
                                <?php }else {?>
                                   
                                    <form id="form" method="POST" action="index.php">
                                        <input type="hidden" name="section" value="<?php echo $test?>">
                                        <input type="hidden" name="action" value="init">
                                        <button type="submit" class="btn btn-block btn-send" style="width: 150px;">Iniciar</button>   
                                    </form>
                                    
                                <?php }?>  
                            </div>
                        </div>
                    </div>
                </div>     
            <?php include "footer.html"; ?>
        </div>
    </div>
</body>
</html>