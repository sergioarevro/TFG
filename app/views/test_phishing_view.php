<!DOCTYPE html>
<html>
    <?php include "head.html"; ?>
    <title>Phishing <?php echo $text; ?></title>
<body>    
    <?php include "header.html"; ?>

    <script>
        // Seleccionar el enlace y la pantalla superpuesta
        var enlace = document.querySelector('.mostrar-mensaje');
        var pantallaSuperpuesta = document.querySelector('.pantalla-superpuesta');

        // Mostrar la pantalla superpuesta cuando se hace clic en el enlace
        enlace.addEventListener('click', function(event) {
        event.preventDefault();
        pantallaSuperpuesta.style.display = 'block';
        });

        document.getElementById("cerrar-mensaje").onclick = function() {
        document.querySelector(".pantalla-superpuesta").style.display = "none";
        };
    </script>
    
    
    <div class="wrapper">
        <div class="register-background"> 
               <div class="container" style="display: flex; justify-content: center; align-items: center;">
                    <div class="col-md-12 col-sm-6 col-xs-10">
                        <div class="text-center phishing-container">
                            <div class="col-md-12 text-right">
                                <p><?php echo "Modo $mode"; ?></p>
                            </div>
                         
                            <h3 class="title text-center col-md-12">Test sobre Mail Phishing</h3>

                            <div class="phishing-section text-center">   
                                
                                <!-- Primera pregunta -->   
                                <?php if ($num_quest == '1') { ?>
                                <div class="email-header text-left">
                                    <div class="circle-red col-md-1">L</div>
                                    <div class="email-info col-md-10">
                                        <span class="name-email">Luís Gómez</span>
                                        <span class="email-dir">‎&lt;luis.gomez8000@gmail.com&gt;</span>

                                    </div>
                                    <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                    
                                    <div id="dropdown" class="dropdown-li col-md-11">para mí<button class="drop-button" style="margin-left:5px; background-color: white; border:none;"><img src="assets/icons/dropdown-icon.png"></button>                              
                                         <ul class="dropdown">
                                           <li><span class="email-dir" style="margin-left: 20px;">de:&nbsp;</span><span class="name-email"> Luís Gómez ‎&lt;luis.gomez8000@gmail.com&gt</span></li>
                                           <li><span class="email-dir" style="margin-left: 20px;">para:&nbsp;</span><span class="name-email"> Usuario ‎&lt;user123@gmail.com&gt</span></li>
                                           <li><span class="email-dir" style="margin-left: 20px;">fecha:&nbsp;</span><span class="name-email">                                                         
                                               <?php
                                                    $fecha = new DateTime();
                                                    $fecha_formateada = strftime('%A, %e de %B de %Y, %H:%M:%S', $fecha->getTimestamp()); 
                                                    echo $fecha_formateada; 
                                                ?></span></li>
                                            <li><span class="email-dir" style="margin-left: 20px;">asunto:&nbsp;</span><span class="name-email"> Presupuesto de departamento del 2023</span></li>
                                         </ul>    
                                   </div>
	
                                </div>
                                
                                <div class="email-content-container">
                                    <div class="email-content">
                                        <p class="email-content-style text-left" style="margin-left: 30px;">Luís Gómez ha compartido un enlace al siguiente documento:</p>
                                        
                                        <a class="doc-name col-md-12 text-left" href="http://drive-google.com/luke.johnson" title="http://drive-google.com/luke.johnson"><img class="doc-icon col-md-1 text-left"src="assets/icons/doc-icon.png">Presupuesto de departamento del 2023.docx</a>
                                        <hr class="email-separator col-md-11">
                                        <div class="col-md-12">
                                            <img class="user-icon col-md-1 text-left"src="assets/icons/user-icon.png">
                                            <div class="email-content-style col-md-10 text-left">Hola. Aquí tienes el documento que querías. Dime si necesitas algo más.</div>
                                        </div>
                                        <button class="btn-rectangular-google col-md-3" style="margin-top:20px; margin-left: 30px;" href="http://drive-google.com/luke.johnson" title="http://drive-google.com/luke.johnson">Abrir en Documentos</button>
                                    </div>
                                </div>
                                <?php }?> 
                                <!-- Segunda pregunta -->  
                                <?php if ($num_quest == '2') { ?>
                                
                                <div class="email-header text-left">
                                    <div class="circle-red col-md-1">M</div>
                                    <div class="email-info col-md-10">
                                        <span class="name-email">Mensaje de fax - No responder [administrador]</span>
                                        <span class="email-dir">‎&lt;noreply@efacks.com&gt;</span>

                                    </div>
                                    <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                    
                                    <div id="dropdown" class="dropdown-li col-md-11">para mí<button class="drop-button" style="margin-left:5px; background-color: white; border:none;"><img src="assets/icons/dropdown-icon.png"></button>                              
                                        <ul class="dropdown">
                                            <li><span class="email-dir" style="margin-left: 20px;">de:&nbsp;</span><span class="name-email">Mensaje de fax - No responder [administrador] ‎&lt;noreply@efacks.com&gt;</span></li>
                                            <li><span class="email-dir" style="margin-left: 20px;">para:&nbsp;</span><span class="name-email"> Usuario ‎&lt;user123@gmail.com&gt</span></li>
                                            <li><span class="email-dir" style="margin-left: 20px;">fecha:&nbsp;</span><span class="name-email">                                                         
                                                <?php
                                                    $fecha = new DateTime();
                                                    $fecha_formateada = strftime('%A, %e de %B de %Y, %H:%M:%S', $fecha->getTimestamp()); 
                                                    echo $fecha_formateada; 
                                                ?></span></li>
                                            <li><span class="email-dir" style="margin-left: 20px;">asunto:&nbsp;</span><span class="name-email">Has recibido un fax de 1 página</span></li>
                                            </ul>    
                                    </div> 
	
                                </div>
                                
                                <div class="email-content-container">
                                    <div class="email-fax-content">
                                        <p class="email-content-style text-left" style="margin-left: 15px; opacity: 1; font-size: 16px;">Recibiste un fax de 1 página el <?php echo date("d/m/y, H:i");; ?> </p>
                                        <a class="col-md-5 text-left" href="http://efax.hosting.com.mailru382.co/efaxdelivery/2017Dk4h325RE3" title="http://efax.hosting.com.mailru382.co/efaxdelivery/2017Dk4h325RE3" style="color: #448aff; font-size: 16px; font-weight: 900;">Ver este fax online</a>
                                    </div> 
                                    <hr class="email-separator col-md-11">
                                    <div class="text-center" style="text-align: center;">
                                        <img class="efax-icon text-center" src="assets/icons/efax.png">
                                        <div class="email-content-style text-center" style="font-size: 12px; margin-top: 20px;">Gracias por utilizar el servicio de eFax. Si tienes alguna pregunta o crees que has recibido este fax por error, visita: www.efax.es/preguntas-mas-frecuentes.</div>
                                        <div class="email-content-style text-center" style="font-size: 12px;">eFax Inc (c) 2023</div>
                                    </div>
                                </div>
                     
                            <?php }?>   
                            
                            <!-- Pregunta 3 -->
                            <?php if ($num_quest == '3') { ?>
                            <div class="col-md-12" style="background-color: rgba(102, 97, 91, .1); height: 350px; padding: 10px; display:flex; align-items: center;">
                                <div class="col-md-12 text-center" style="background-color: white; height: 45%; padding: 15px;">
                                    <div class="email-header text-left" style="background-color: white;">
                                        <div class="circle-red col-md-1">J</div>
                                        <div class="email-info col-md-10">
                                            <span class="name-email">José</span>
                                            <span class="email-dir">‎&lt;jose867530@gmail.com&gt;</span>
                                        </div>
                                        <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                        
                                        <div id="dropdown" class="dropdown-li col-md-11">para mí<button class="drop-button" style="margin-left:5px; background-color: white; border:none;"><img src="assets/icons/dropdown-icon.png"></button>                              
                                            <ul class="dropdown">
                                                <li><span class="email-dir" style="margin-left: 20px;">de:&nbsp;</span><span class="name-email">José &lt;jose867530@gmail.com&gt;</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">para:&nbsp;</span><span class="name-email"> Usuario ‎&lt;user123@gmail.com&gt</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">fecha:&nbsp;</span><span class="name-email">                                                         
                                                    <?php
                                                        $fecha = new DateTime();
                                                        $fecha_formateada = strftime('%A, %e de %B de %Y, %H:%M:%S', $fecha->getTimestamp()); 
                                                        echo $fecha_formateada; 
                                                    ?></span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">asunto:&nbsp;</span><span class="name-email">¡Acabo de encontrar una foto tuya!</span></li>
                                                </ul>    
                                        </div> 
                                    </div> 
                                    <div>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 17px; color: black; margin-top: 15px; height: auto;">Hola, ¿te acuerdas de <a class="doc-name" style="font-size: 17px; color: #448aff;" href="https://drive.google.com.download-photo.sytez.net/AONh1e0hVP" title="https://drive.google.com.download-photo.sytez.net/AONh1e0hVP">ESTA FOTO</a>?</p>
                                    </div>
                                </div>
                            </div>
                            <?php }?> 
                           
                            <!-- Pregunta 4 -->
                            <?php if ($num_quest == '4') { ?>
                            
                                <div class="col-md-12 text-center" style="background-color: white; height: 50%; padding: 15px;">
                                    <div class="email-header text-left" style="background-color: white; height: auto;">
                                        <div class="circle-red col-md-1">D</div>
                                        <div class="email-info col-md-10">
                                            <span class="name-email">DropBox</span>
                                            <span class="email-dir">‎&lt;no-reply@dropboxmail.com&gt;</span>
                                        </div>
                                        <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                        
                                        <div id="dropdown" class="dropdown-li col-md-11">para mí<button class="drop-button" style="margin-left:5px; background-color: white; border:none;"><img src="assets/icons/dropdown-icon.png"></button>                              
                                            <ul class="dropdown">
                                                <li><span class="email-dir" style="margin-left: 20px;">de:&nbsp;</span><span class="name-email">DropBox &lt;no-reply@dropboxmail.com&gt;</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">para:&nbsp;</span><span class="name-email"> Usuario ‎&lt;user123@gmail.com&gt</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">fecha:&nbsp;</span><span class="name-email">                                                         
                                                    <?php
                                                        $fecha = new DateTime();
                                                        $fecha_formateada = strftime('%A, %e de %B de %Y, %H:%M:%S', $fecha->getTimestamp()); 
                                                        echo $fecha_formateada; 
                                                    ?></span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">asunto:&nbsp;</span><span class="name-email">Tu Dropbox ha dejado de sincronizarse</span></li>
                                                </ul>    
                                        </div> 
                                        
                                    </div>  
                                    <div class="col-md-11" style="border: 1px solid grey; width:auto; height:90%; padding: 10px; margin: 20px;">
                                        <div class="col-md-12 text-center"><img style="width: 85px; height: 60px;" src="assets/icons/dropbox-icon.png"></div>
                                            <p class="col-md-12 text-left dropbox-text">Hola:</p>
                                            <p class= "col-md-12 text-left dropbox-text">Tu Dropbox está lleno y ha dejado de sincronizar archivos. No podrás acceder a los nuevos archivos que añadas a tu carpeta de Dropbox desde el resto de tus dispositivos. Tampoco se creará una copia de ellos online.</p>
                                            <p class="col-md-12 text-left dropbox-text">Actualiza tu versión de Dropbox hoy mismo y consigue 1&nbsp;TB (1000&nbsp;GB) de espacio, así como eficientes funciones para compartir contenido.</p>
                                            <div class="col-md-12" style="align-items: center; display:flex; justify-content: center;"><button class="btn-rectangular-google col-md-3" style="margin-top: 5px; margin-bottom: 5px; padding: 4px;" href="https://www.dropbox.com/buy" title="https://www.dropbox.com/buy">Actualiza tu Dropbox</button></div>
                                            <p class="col-md-12 text-left dropbox-text">Para ver otras formas de conseguir más espacio, visita nuestra página <a class="doc-name" style="font-size: 17px; color: #448aff;" href="https://www.dropbox.com/help/space/get-more-space" title="https://www.dropbox.com/help/space/get-more-space">Obtener más espacio.</a></p>
                                            <p class="col-md-12 text-left dropbox-text">¡Que disfrutes de tu Dropbox!</p>
                                            <p class="col-md-12 text-left dropbox-text">El equipo de Dropbox</p>
                                            <p class="col-md-12 text-left dropbox-text">P.D.: Si necesitas el plan más grande del que disponemos, echa un vistazo a <a class="doc-name" style="font-size: 17px; color: #448aff;" href="https://www.dropbox.com/business" title="https://www.dropbox.com/business">Dropbox Bussines.</a></p>
                                        </div>
                                    </div>
                                           
                            <?php }?> 
                            
                            <!-- Pregunta 5 -->
                            <?php if ($num_quest == '5') { ?>
                            
                                <div class="col-md-12 text-center" style="background-color: white; height: 450px; padding: 10px; margin-bottom: 5px;">
                                    <div class="email-header text-left" style="background-color: white; height: auto;">
                                        <div class="circle-red col-md-1">S</div>
                                        <div class="email-info col-md-10">
                                            <span class="name-email">Sara Martín</span>
                                            <span class="email-dir">‎&lt;sara.martin@escuelawestmount.org&gt;</span>
                                        </div>
                                        <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                        
                                        <div id="dropdown" class="dropdown-li col-md-11">para mí<button class="drop-button" style="margin-left:5px; background-color: white; border:none;"><img src="assets/icons/dropdown-icon.png"></button>                              
                                            <ul class="dropdown">
                                                <li><span class="email-dir" style="margin-left: 20px;">de:&nbsp;</span><span class="name-email">Sara Martín ‎&lt;sara.martin@escuelawestmount.org&gt;</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">para:&nbsp;</span><span class="name-email"> Usuario ‎&lt;user123@gmail.com&gt</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">fecha:&nbsp;</span><span class="name-email">                                                         
                                                    <?php
                                                        $fecha = new DateTime();
                                                        $fecha_formateada = strftime('%A, %e de %B de %Y, %H:%M:%S', $fecha->getTimestamp()); 
                                                        echo $fecha_formateada; 
                                                    ?></span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">asunto:&nbsp;</span><span class="name-email">Informe de actividad financiera del 2023</span></li>
                                                </ul>    
                                        </div> 

                                    </div>  
                                    
                                    <div>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 17px; color: black; margin-top: 28px; line-height: 0.8;">Buenos días:</p>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 17px; color: black; line-height: 0.8;">Adjunto el informe de actividad financiera de 2023 para que lo revises.</p>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 17px; color: black; line-height: 0.8;"></p>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 17px; color: black; line-height: 0.8;">Gracias y un saludo,</p>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 17px; color: black; line-height: 0.8;"></p>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 17px; color: black; line-height: 0.8;">Sara Martín</p>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 17px; color: black; line-height: 0.8;">Colegio Montellano</p>
                                    </div>
                                    
                                    <hr class="email-separator col-md-12">
                                    
                                    <div class="imagen-hover col-md-12">
                                        <img class="icono1" src="assets/icons/pdf-icon1.png" alt="Icono pdf 1">
                                        <img class="icono2" src="assets/icons/pdf-icon2.png" alt="Icono pdf 2">
                                    </div>
                                </div>               
                            <?php }?> 
                        
                        <!-- Pregunta 6 -->
                            <?php if ($num_quest == '6') { ?>
                            
                                <div class="col-md-12 text-center" style="background-color: white; height: 50%; padding: 15px;">
                                    <div class="email-header text-left" style="background-color: white; height: auto;">
                                        <div class="circle-red col-md-1">G</div>
                                        <div class="email-info col-md-10">
                                            <span class="name-email">Google</span>
                                            <span class="email-dir">‎&lt;no-reply@google.support&gt;</span>
                                        </div>
                                        <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                        
                                        <div id="dropdown" class="dropdown-li col-md-11">para mí<button class="drop-button" style="margin-left:5px; background-color: white; border:none;"><img src="assets/icons/dropdown-icon.png"></button>                              
                                            <ul class="dropdown">
                                                <li><span class="email-dir" style="margin-left: 20px;">de:&nbsp;</span><span class="name-email">Google ‎&lt;no-reply@google.support&gt;</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">para:&nbsp;</span><span class="name-email"> Usuario ‎&lt;user123@gmail.com&gt</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">fecha:&nbsp;</span><span class="name-email">                                                         
                                                    <?php
                                                        $fecha = new DateTime();
                                                        $fecha_formateada = strftime('%A, %e de %B de %Y, %H:%M:%S', $fecha->getTimestamp()); 
                                                        echo $fecha_formateada; 
                                                    ?></span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">asunto:&nbsp;</span><span class="name-email">Alguien tiene tu contraseña</span></li>
                                                </ul>    
                                        </div> 
                                    </div>
                                    
                                    <div>
                                        <div class="pass-alert col-md-12">
                                           <p class="col-md-12 text-left" style="font-size: 24px;">Alguien tiene tu contraseña</p> 
                                        </div>
                                    
                                        <div class="pass-container col-md-12">
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; height: auto;">Hola:</p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; height: auto;">Alguien acaba de utilizar tu contraseña para intentar iniciar sesión en tu cuenta de Google.</p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; height: auto;"></p>
                                            
                                            <div>
                                                <div class="alert-pass-info">
                                                    <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; height: auto;">Información:</p>
                                                    <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: grey; height: auto;">
                                                         <?php
                                                            $fecha = new DateTime();
                                                            $fecha_formateada = strftime('%A, %e de %B de %Y, %H:%M:%S (GMT %z)', $fecha->getTimestamp()); 
                                                            echo $fecha_formateada; 
                                                        ?>
                                                    </p>
                                                    <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: grey; height: auto;">Slatina, Rumanía</p>
                                                    <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: grey; height: auto;">Navegador Firefox</p>
                                                </div>
                                            </div>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; height: auto; margin-top: 15px;">Google ha detenido este intento de inicio de sesión. Debes cambiar tu contraseña de inmediato.</p>
                                            <button class="btn-rectangular-google col-md-4" style="font-size:14px; margin-left: 10px; margin-top: 10px;" href="http://myaccount.google.com-securitysettingpage.ml-security.org/signonoptions/" title="http://myaccount.google.com-securitysettingpage.ml-security.org/signonoptions/">CAMBIAR CONTRASEÑA</button>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; height: auto; margin-top: 15px;"></p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; height: auto;">Un saludo,</p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; height: auto;"></p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; height: auto;">El equipo de Mail</p>
                                        </div>                          
                                    </div>
                                </div>               
                            <?php }?>
                            
                            <!-- Pregunta 7 -->
                            <?php if ($num_quest == '7') { ?>         
                                <div class="col-md-12 text-center" style="background-color: white; height: 50%; padding: 15px;">
                                    <div class="email-header text-left" style="background-color: white; height: auto;">
                                        <div class="circle-red col-md-1">G</div>
                                        <div class="email-info col-md-10">
                                            <span class="name-email">Google</span>
                                            <span class="email-dir">‎&lt;no-reply@google.support&gt;</span>
                                        </div>
                                        <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                        
                                        <div id="dropdown" class="dropdown-li col-md-11">para mí<button class="drop-button" style="margin-left:5px; background-color: white; border:none;"><img src="assets/icons/dropdown-icon.png"></button>                              
                                            <ul class="dropdown">
                                                <li><span class="email-dir" style="margin-left: 20px;">de:&nbsp;</span><span class="name-email">Google ‎&lt;no-reply@google.support&gt;</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">para:&nbsp;</span><span class="name-email"> Usuario ‎&lt;user123@gmail.com&gt</span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">fecha:&nbsp;</span><span class="name-email">                                                         
                                                    <?php
                                                        $fecha = new DateTime();
                                                        $fecha_formateada = strftime('%A, %e de %B de %Y, %H:%M:%S', $fecha->getTimestamp()); 
                                                        echo $fecha_formateada; 
                                                    ?></span></li>
                                                <li><span class="email-dir" style="margin-left: 20px;">asunto:&nbsp;</span><span class="name-email">Alguien tiene tu contraseña</span></li>
                                                </ul>    
                                        </div> 
                                    </div>
                                    
                                    <div>
                                  
                                        <div class="pass-container col-md-12" style="background-color:#f5f5f5; margin-top:15px;">
                                            <div class="col-md-12 text-left"><img style="width: 85px; height: 95px; margin-top: 10px; margin-bottom: 10px;" src="assets/icons/alert-icon.png"></div>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 17px; color: black; font-weight: bold; ">Es posible que atacantes respaldados por un gobierno estén intentando robar tu contraseña</p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 14px; color: black; height: auto; text-align: justify;">
                                                Puede que esto sea una falsa alarma, pero creemos que atacantes respaldados por un gobierno están intentando robar tu contraseña. 
                                                Esto le ocurre a menos del 0,1&nbsp;% de los usuarios de Gmail. No podemos revelar cómo nos hemos dado cuenta, ya que los atacantes se percatarían y cambiarían su táctica. 
                                                No obstante, si consiguen su objetivo en algún momento, podrán acceder a tus datos o realizar otras acciones con tu cuenta. Para mejorar tu seguridad teniendo en cuenta tu configuración actual, te recomendamos lo siguiente:                                              
                                            </p>
                                            <a href="https://google.com/amp/tinyurl.com/y7u8ewlr" class="col-md-3 text-left" style="opacity: 1; font-size: 17px; color: #448aff; font-weight: bold; margin-top: 10px; margin-bottom: 10px;">Cambiar contraseña</a>
                                        </div>                          
                                    </div>
                                </div>               
                            <?php }?>
                            
                            <!-- Pregunta 8 -->
                            <?php if ($num_quest == '8') { ?>                                        
                                <div class="pass-container text-center col-md-12" style="background-color:#f5f5f5; margin-top:15px; display: flex; justify-content: center; align-items: center">
                                    <div class="planification-service col-md-6" style="width: 50%; text-align: center; height: auto; padding: 10px;">
                                        <div class="col-md-12 text-left"><img style="width: auto; height: 55px; margin-bottom: 30px; margin-left: 7px; margin-top:20px;" src="assets/icons/google-brand.png"></div>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 26px; color: black; font-weight: bold; margin-left: 15px; margin-bottom: 0px;">Hola, José</p>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 16px; color: black; font-weight: bold; margin-left: 15px; margin-top: 0px;">jose1234@gmail.com</p>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 18px; color: black; height: auto;"></p>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 18px; color: black; height: auto; font-weight: bold; margin-left: 15px;"> <a class="mostrar-mensaje" style="color: #448aff;" href="">TripIt</a> quiere</p>

                                        
                                        <div class="col-md-11 text-center" style="margin-top:15px; margin-bottom: 15px; display:flex;">
                                            <div class="col-md-1 text-left"style="margin-right: 15px;"><img src="assets/icons/gmail-icon.png" style="width: 40px; height: 30px;"></div>
                                            <p class="col-md-9 text-left" style="opacity: 1; font-size: 18px; color: black; height: auto;">Consultar tus mensajes de correo electrónico y la configuración</p>
                                            <div class="col-md-1 text-left" style="margint-left: 5px;"><img src="assets/icons/info-icon.png"style="width: 25px; height: 25px;"></div>
                                            
                                            <div class="pantalla-superpuesta col-md-12">
                                                <div class="mensaje">
                                                    <p class="col-md-12 text-left" style="opacity: 1; font-size: 18px; color: black; height: auto; font-weight: bold;">Información para desarrolladores</p>
                                                    <p class="col-md-12 text-left" style="opacity: 1; font-size: 18px; color: black; height: auto;">Correo electrónico: <a class="mostrar-mensaje" style="color: #448aff;" href="mailto:support@tripit.com">support@tripit.com</a></p>
                                                    <p class="col-md-12 text-left" style="opacity: 1; font-size: 18px; color: black; height: auto; ">Al hacer clic en Permitir, se te redigirá a: https://www.tripit.com</p>
                                                    <div id="cerrar-mensaje" class="btn-rectangular-google-inv col-md-12 cerrar-mensaje text-right" style="font-size:16px; margin-top: 10px; font-weight: bold;" href="">ENTENDIDO</div> 
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div>
                                        <p class="col-md-12 text-left" style="opacity: 1; font-size: 18px; color: black; height: auto; font-weight: bold; margin-left: 15px;">¿Das permiso a TripIt para hacer esto?</p> 
                                        <p class="col-md-11 text-left" style="opacity: 1; font-size: 15px; color: black; height: auto; margin-left: 15px; margin-right: 15px; text-align: justify; ">Revisa las <a style="color: #448aff;" href="https://www.tripit.com/uhp/userAgreement" title="https://www.tripit.com/uhp/userAgreement">condiciones del servicio</a> y <a style="color: #448aff;" href="https://www.tripit.com/uhp/privacyPolicy" title="https://www.tripit.com/uhp/privacyPolicy">las politicas de privacidad</a>
                                        de esta aplicación. Puedes quitar esta o cualquier otra aplicación vinculada a tu cuenta en <a style="color: #448aff;" href="https://security.google.com/settings/security/permissions" title="https://security.google.com/settings/security/permissions">Mi Cuenta.</a></p>
                                        </div>
                                    
                                        <div class="col-md-11 text-center" style="display: flex; justify-content: right; align-items: right; margin-bottom:15px;">
                                            <div class="btn-rectangular-google-inv col-md-4" style="font-size:16px; margin-left: 8px; margin-top: 10px; font-weight: bold;" href="">CANCELAR</div>  
                                            <div class="btn-rectangular-google col-md-4" style="font-size:16px; margin-top: 10px; font-weight: bold; " href="">PERMITIR</div>  
                                        </div>
                                    </div>
                                </div>                                        
                            <?php }?>                         
                            
                        </div>                        
                        <form id="form" method="POST" action="index.php" onsubmit="return validateForm()">
                          <div class="btn-phishing-container">
                            <input type="hidden" name="num" value="<?php echo $num_quest; ?>">
                            <input type="hidden" name="section" value="mail">
                            <input type="hidden" name="action" value="insert_answer">
                            <input type="hidden" name="mode" value="<?php echo $mode; ?>">
                            <button class="btn btn-block btn-send btn-phishing" type="submit" name="answer" value="phishing">Phishing</button>
                            <button class="btn btn-block btn-send btn-phishing" type="submit" name="answer" value="legitimo">Legítimo</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>     
        <?php include "footer.html"; ?>
        </div>
    </div>
    <script>
        function invalidMsg(event) {
            event.preventDefault();
            alert("Por favor seleccione una respuesta.");
        }
    </script>
</body>
</html>
