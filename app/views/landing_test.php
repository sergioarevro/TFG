<!DOCTYPE html>
<html>
<head>
    <?php include 'head.html'; ?>
</head>
<body>
    <?php include "header.html"; ?>
    
     <div class="wrapper">
        <div class="register-background"> 
            <div class="filter-black"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card text-center">
                                <h2 class='col-md-12'>Test <?php echo $test; ?></h2>
                                <div><?php echo file_get_contents("assets/txt/$test.txt"); ?></div>
                                <a class='col-md-12' href="index.php?section=<?php echo $test?>&action=show_quest&num=1"><button class="btn btn-block btn-send">Iniciar</button></a>
                         </div>
                     </div>
                 </div>
             </div>     
       <?php include "footer.html"; ?>
     </div>
 </div>
</body>
</html>
