<!DOCTYPE html>
<html>
<head>
	<title>Información personal</title>
</head>
<body>
        <h2>Información personal</h2>
	<form action="/TFG/index.php?section=users&action=create" method="POST">
            <label for="sex">Sexo:</label>
            <select id="sex" name="sex" required>
              <option value=""></option>
              <option value="masculino">Hombre</option>
              <option value="femenino">Mujer</option>
            </select>
            <br>
            
            <label for="fecha_de_nacimiento">Fecha de nacimiento:</label>
                <label for="day">Día:</label>
                <select id="day" name="day" required oninvalid="invalidMsg(event)">
                  <option value=""></option>
                  <?php
                    $num_days = date('t');
                    for ($i = 1; $i <= $num_days; $i++) {
                      echo "<option value=\"$i\">$i</option>";
                    }
                  ?>
                </select>

                <label for="month">Mes:</label>
                <select id="month" name="month" required oninvalid="invalidMsg(event)">
                  <option value=""></option>
                  <?php
                    for ($i = 1; $i <= 12; $i++) {
                      echo "<option value=\"$i\">$i</option>";
                    }
                  ?>
                </select>
                
                <label for="year">Año:</label>
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
                
                <label for="colour">Color preferido:</label>
                <select id="colour" name="colour" required oninvalid="invalidMsg(event)">
                  <option value=""></option>
                  <option value="negro">Negro</option>
                  <option value="verde">Verde</option>
                  <option value="amarillo">Amarillo</option>
                  <option value="rojo">Rojo</option>
                  <option value="violeta">Violeta</option>
                  <option value="naranja">Naranja</option>
                  <option value="marron">Marrón</option>
                  <option value="rosa">Rosa</option>
                  <option value="granate">Granate</option>
                  <option value="gris">Gris</option>
                  <option value="azul">Azul</option>                                   
                </select>
                <br>
                
                <label for="place">Lugar de residencia:</label>
                <select id="place" name="place" required oninvalid="invalidMsg(event)">
                  <option value=""></option>
                  <option value="europa">Europa</option>
                  <option value="norte_america">América del Norte</option>
                  <option value="sur_america">América del Sur</option>
                  <option value="asia">Asia</option>
                  <option value="oceania">Oceanía</option>
                  <option value="antartida">Antártida</option>
                  <option value="africa">África</option>                             
                </select>
                <br>
                
                <label for="studies">Nivel de estudios:</label>
                <select id="studies" name="studies" required oninvalid="invalidMsg(event)">
                  <option value=""></option>
                  <option value="basicos">Estudios básicos/obligatorios</option>
                  <option value="medio">Estudios de grado medio</option>
                  <option value="superiores">Estudios de grado superior/Universitarios</option>                           
                </select>
                <br>
                
                <label for="ocupation">Ocupación:</label>
                <select id="ocupation" name="ocupation" required oninvalid="invalidMsg(event)">
                  <option value=""></option>
                  <option value="estudiante">Estudiante</option>
                  <option value="empleado">Empleado</option>
                  <option value="desempleado">Desempleado</option>                           
                </select>
                <br>

            <br>        
            <input type="submit" value="Enviar">
	</form>
        
        <script>
            function invalidMsg(event) {
                event.preventDefault();
                alert("Por favor seleccione una respuesta.");
            }
        </script>
</body>
</html>
