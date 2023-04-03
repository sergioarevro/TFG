<!DOCTYPE html>
<html>
<head>
    <?php include 'head.html'; ?>
</head>
<body>
    <?php include "header.html"; ?>
    
     <div class="wrapper">
        <div class="register-background"> 
           <!-- <div class="filter-black"></div>-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card text-center">
                                <h2 class='col-md-12'>Test <?php echo strtoupper($test); ?></h2>
                                <h3>Has finalizado el test de IQ, tu IQ es de <?php echo $score; ?></h3>
                                <h3>Haz click en continuar para ir al siguiente módulo</h3>
                                
                                <a class='col-md-12' href="index.php?view=phishing"><button class="btn btn-block btn-send">Continuar</button></a>
                         </div>
                     </div>
                 </div>
             </div>     
       <?php include "footer.html"; ?>
     </div>
 </div>
</body>
</html>
