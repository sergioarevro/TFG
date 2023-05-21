<!DOCTYPE html>
<html>
    <?php include "head.html"; ?>
     <title>Test <?php echo $section; ?></title>
<body> 
    <script>
        function validateForm() {
          var answer = document.querySelector('input[name="answer"]:checked');

          if (!answer) {
            alert("Por favor seleccione una respuesta.");
            return false;
          }

          return true;
        }
</script>

    <?php include "header.html"; ?>
    <div class="wrapper">
        <div class="register-background"> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card text-center">
                                    
                                    <?php if ($section == 'operas') { ?>
                                            <h3 class="title text-center col-md-12">Test Operas</h3>
                                            <form id="form" method="POST" action="index.php" onsubmit="return validateForm()">
                                              <p><?php echo "$question->id . $question->quest_esp"; ?><br></p>

                                              <div class="row text-center">
                                                <input type="hidden" name="section" value="operas">
                                                <input type="hidden" name="action" value="insert_answer">
                                                <input type="hidden" name="quest_id" value="<?php echo $question->id; ?>">
                                                <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="1"><label>1</label>
                                                <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="2"><label>2</label>
                                                <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="3"><label>3</label>
                                                <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="4"><label>4</label>
                                                <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="5"><label>5</label><br>
                                              </div>
                                              <button class="btn btn-block btn-send" type="submit">Enviar</button>
                                            </form>
                                            
                                    <?php }?>
                                           
                                    <?php if ($section == 'iq') { ?>
                                            <h3 class="title text-center col-md-12">Test IQ</h3>
                                                <form id="form" method="POST" action="index.php" onsubmit="return validateForm()">
                                                    <img class="image col-md-12" src="<?php echo $question->path_q; ?>" class="center-block">
                                                    <img class="image col-md-12" src="<?php echo $question->path_a; ?>" class="center-block">

                                                    <div class="row text-center">
                                                      <input type="hidden" name="section" value="iq">
                                                      <input type="hidden" name="action" value="insert_answer">
                                                      <input type="hidden" name="quest_id" value="<?php echo $question->id; ?>">
                                                      <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="1"><label>1</label>
                                                      <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="2"><label>2</label>
                                                      <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="3"><label>3</label>
                                                      <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="4"><label>4</label>
                                                      <input class="radio radio-inline" style="margin:10px !important;" type="radio" name="answer" value="5"><label>5</label><br>
                                                    </div>
                                                    <button class="btn btn-block btn-send" type="submit">Enviar</button>
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