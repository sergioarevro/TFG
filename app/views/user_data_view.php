<!DOCTYPE html>
<html>
    <?php include "head.html"; ?>
<body>
    <?php include "header.html"; ?> 
    
       <div class="wrapper">
        <div class="register-background"> 
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 ">
                            <div class="register-card">
                                <h3 class="title">Información personal</h3>
                                    <form clas= "register-form" action="/TFG/index.php?section=users&action=store_aswer" method="POST">
                                        <label for="sex">Sexo </label>
                                        <select id="sex" name="sex" required oninvalid="invalidMsg(event)" title="Sexo">
                                            <option value=""></option>
                                            <?php foreach ($sex as $row): ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>        
                                            <?php endforeach; ?>                                                   
                                        </select>
                                        <br>

                                        <label for="fecha_de_nacimiento">Fecha de nacimiento </label>
                                        <label for="day">Día </label>
                                        <select id="day" name="day" required oninvalid="invalidMsg(event)">
                                            <option value=""></option>
                                            <?php
                                                $num_days = date('t');
                                                for ($i = 1; $i <= $num_days; $i++) {
                                                  echo "<option value=\"$i\">$i</option>";
                                                }
                                            ?>
                                        </select>

                                        <label for="month">Mes </label>
                                        <select id="month" name="month" required oninvalid="invalidMsg(event)">
                                            <option value=""></option>
                                            <?php
                                            for ($i = 1; $i <= 12; $i++) {
                                                echo "<option value=\"$i\">$i</option>";
                                            }
                                            ?>
                                        </select>

                                        <label for="year">Año </label>
                                        <select id="year" name="year" required oninvalid="invalidMsg(event)">
                                            <option value=""></option>
                                                <?php
                                                $this_year = date('Y');
                                                for ($i = $this_year; $i >= ($this_year - 110); $i--) {
                                                    echo "<option value=\"$i\">$i</option>";
                                                }
                                                ?>
                                        </select>
                                        <br>  
                                        
                                        <label for="colour">Color preferido </label>
                                        <select id="colour" name="colour" required oninvalid="invalidMsg(event)">
                                            <option value=""></option>
                                            <?php foreach ($colours as $row): ?>
                                                 <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>        
                                            <?php endforeach; ?>                                 
                                        </select>
                                        <br>

                                        <label for="place">Lugar de residencia </label>
                                        <select id="place" name="place" required oninvalid="invalidMsg(event)">
                                            <option value=""></option>
                                            <?php foreach ($place as $row): ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>        
                                            <?php endforeach; ?>                       
                                        </select>
                                        <br>

                                        <label for="studies">Nivel de estudios </label>
                                        <select id="studies" name="studies" required oninvalid="invalidMsg(event)">
                                            <option value=""></option>
                                            <?php foreach ($studies as $row): ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>        
                                            <?php endforeach; ?>                        
                                        </select>
                                        <br>

                                        <label for="ocupation">Ocupación </label>
                                        <select id="ocupation" name="ocupation" required oninvalid="invalidMsg(event)">
                                            <option value=""></option>
                                            <?php foreach ($ocupation as $row): ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>        
                                            <?php endforeach; ?>                                     
                                        </select>
                                        <br>
                                       
                                        <button class="btn btn-block btn-send" type="submit" name="submit_answer" value="Submit">Enviar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
             <?php include "footer.html"; ?>
            </div>  
        
        <script>
            function invalidMsg(event) {
                event.preventDefault();
                alert("Por favor seleccione una respuesta.");
            }
        </script>
</body>
</html>
