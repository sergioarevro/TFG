<!DOCTYPE html>
<html>
    <?php include "head.html"; ?>
     <title>Test <?php echo $text; ?></title>
<body>    
    <?php include "header.html"; ?>

    <div class="wrapper">
        <div class="register-background"> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card text-center">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $perc; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $perc; ?>%;">
                                        </div>
                                    </div>
                                    
                                    <?php if ($text == 'operas') { ?>
                                            <h3 class="title text-center col-md-12">Test Operas</h3>
                                                <form id="test_operas" method="POST" action="index.php?section=operas&action=insert_answer">
                                                    <p><?php echo "$question->id . $question->quest_esp"; ?><br></p>

                                                    <div class="row text-center">
                                                        <input type="hidden" name="quest_id" value="<?php echo $question->id; ?>">
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="1"><label>1</label>
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="2"><label>2</label>
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="3"><label>3</label>
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="4"><label>4</label>
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="5"><label>5</label><br>
                                                    </div>
                                                    <button class="btn btn-block btn-send" type="submit" name="submit_answer" value="Submit"> Enviar </button>
                                                 </form>
                                    <?php }?>
                                           
                                    <?php if ($text == 'iq') { ?>
                                            <h3 class="title text-center col-md-12">Test IQ</h3>
                                                <form id="test_operas" method="POST" action="index.php?section=iq&action=insert_answer">
                                                    <img class='image col-md-12' src='<?php echo $question->path_q; ?>' class='center-block'>
                                                    <img class='image col-md-12' src='<?php echo $question->path_a; ?>' class='center-block'>
                                                    
                                                    <div class="row text-center">
                                                        <input type="hidden" name="quest_id" value="<?php echo $question->id; ?>">
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="1"><label>1</label>
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="2"><label>2</label>
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="3"><label>3</label>
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="4"><label>4</label>
                                                        <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="5"><label>5</label><br>
                                                    </div>
                                                    <button class="btn btn-block btn-send" type="submit" name="submit_answer" value="Submit"> Enviar </button>
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