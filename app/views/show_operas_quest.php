<!DOCTYPE html>
<html>
    <?php include "head.html"; ?>
<body>    
    <?php include "header.html"; ?>

       <div class="wrapper">
        <div class="register-background"> 
            <div class="filter-black"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card">
                                <div class "progress-contianer">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $perc; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $perc; ?>%;">
                                        </div>
                                    </div>
                                <h3 class="title text-center">Test Operas</h3>
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
                            </div>
                             
                            </div>
                        </div>
                    </div>
                </div>     
            <div class="footer register-footer text-center">
                    <h6>&copy; Escribir mensaje??<i class="fa fa-heart heart"></i></h6>
            </div>
        </div>
    </div>  
</body>
</html>