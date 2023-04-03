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

                            <h3 class="title text-center col-md-12">Mail Pishing</h3>

                            <div class="pishing-section text-center">
                                <?php if ($text == '1') { ?>
                                
                                <?php }?> 
                                <h1> Zona para crear los posibles Mail Phishing</h1>
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
