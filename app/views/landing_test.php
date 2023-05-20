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
                                    <p>Descripción del test demográfico</p>
                                    <?php $test='users'; ?>
                                <?php }?>
                                    
                                <?php if ($test == 'operas') { ?>
                                    <h2 class='col-md-12'>Test OPERAS</h2>
                                    <p>Descripción del OPERAS</p>
                                <?php }?>
                                    
                                <?php if ($test == 'iq') { ?>
                                    <h2 class='col-md-12'>Test de IQ</h2>
                                    <p>Descripción del IQ</p>
                                <?php }?>

                                <?php if ($test == 'mail') { ?>
                                    <h2 class='col-md-12'>Test de Mail Phishing</h2>
                                    <p>Descripción del Mail Test.</p>
                                    <p>Escoge entre realizar el test en modo entrenamiento o en modo experimento. El modo entrenamiento da feedback sobre las respuestas.</p>
                                    <a class='col-md-12' href="index.php?section=<?php echo $test?>&action=init&mode=entrenamiento"><button class="btn btn-block btn-send">Entrenamiento</button></a>
                                    <a class='col-md-12' href="index.php?section=<?php echo $test?>&action=init&mode=experimento"><button class="btn btn-block btn-send">Experimento</button></a>
                                <?php }else {?>
                                    <a class='col-md-12' href="index.php?section=<?php echo $test?>&action=init"><button class="btn btn-block btn-send">Iniciar</button></a>
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