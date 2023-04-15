<!DOCTYPE html>
<html>
    <?php include "head.html"; ?>
    <title>Pishing <?php echo $text; ?></title>
<body>    
    <?php include "header.html"; ?>

    <div class="wrapper">
        <div class="register-background"> 
               <div class="container" style="display: flex; justify-content: center; align-items: center;">
                    <div class="col-md-12 col-sm-6 col-xs-10">
                        <div class="text-center pishing-container">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $perc; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $perc; ?>%;">
                                </div>
                            </div>

                            <h3 class="title text-center col-md-12">Mail Phishing</h3>

                            <div class="pishing-section text-center">
                                <?php if ($text == '1') { ?>
                                
                                <?php }?> 
                                <div class="email-header text-left">
                                    <div class="circle-red col-md-1">L</div>
                                    <div class="email-info col-md-10">
                                        <span class="name-email">Luís Gómez</span>
                                        <span class="email-dir">‎&lt;luis.gomez8000@gmail.com&gt;</span>

                                    </div>
                                    <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                    <a href="#" class="dropdown-toggle email-toggle text-left col-md-2" data-toggle="para mí" aria-expanded="false">para mí <b class="caret"></b></a>     
                                </div>
                                
                                <div class="email-content-container">
                                    <div class="email-content">
                                        <p class="email-content-style text-left"> Zona para crear los posibles Mail Phishing<p>
                                        <hr class="email-separator">
                                    </div>
                                </div>                            
                            </div>
                            <form id="mail_pishing" method="POST" action="index.php?section=pishing&action=insert_answer">
                                <div class="btn-pishing-container">
                                    <button class="btn btn-block btn-send btn-pishing" type="submit" name="submit_pishing" value="Pishing"> Pishing </button>
                                    <button class="btn btn-block btn-send btn-pishing" type="submit" name="submit_legitimo" value="Legitimo"> Legítimo </button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>     
        <?php include "footer.html"; ?>
        </div>
    </div>
</body>
</html>
