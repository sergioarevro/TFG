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
                                <!-- Primera pregunta -->   
                                <?php if ($num_quest == '1') { ?>
                                <div class="email-header text-left">
                                    <div class="circle-red col-md-1">L</div>
                                    <div class="email-info col-md-10">
                                        <span class="name-email">Luís Gómez</span>
                                        <span class="email-dir">‎&lt;luis.gomez8000@gmail.com&gt;</span>

                                    </div>
                                    <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                    <div class="dropdown-toggle email-toggle text-left col-md-2" data-toggle="dropdown" aria-expanded="false">para mí <b class="caret"></b>                       
                                        <div class="dropdown-content">
                                            <!-- TODO desplegable -->                             
                                        </div>

                                    </div>  
	
                                </div>
                                
                                <div class="email-content-container">
                                    <div class="email-content">
                                        <p class="email-content-style text-left" style="margin-left: 30px">Luís Gómez ha compartido un enlace al siguiente documento:</p>
                                        
                                        <a class="doc-name col-md-12 text-left" href="http://drive-google.com/luke.johnson" title="http://drive-google.com/luke.johnson"><img class="doc-icon col-md-1 text-left"src="assets/icons/doc-icon.png">Presupuesto de departamento del 2023.docx</a>
                                        <hr class="email-separator col-md-11">
                                        <div class="col-md-12">
                                            <img class="user-icon col-md-1 text-left"src="assets/icons/user-icon.png">
                                            <div class="email-content-style col-md-10 text-left">Hola. Aquí tienes el documento que querías. Dime si necesitas algo más.</div>
                                        </div>
                                        <button class="btn-rectangular-google col-md-3" href="http://drive-google.com/luke.johnson" title="http://drive-google.com/luke.johnson">Abrir en Documentos</button>


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
                                    <div class="dropdown-toggle email-toggle text-left col-md-2" data-toggle="dropdown" aria-expanded="false">para mí <b class="caret"></b>                       
                                        <div class="dropdown-content">
                                            <!-- TODO desplegable -->                             
                                        </div>

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
                            <div class="col-md-12" style="background-color: rgba(102, 97, 91, .1); height: 100%; padding: 10px; align-items: center;">
                                <div class="col-md-12 text-center" style="background-color: white; height: 50%; margin-top: 100px; padding: 15px;">
                                    <div class="email-header text-left" style="background-color: white;">
                                        <div class="circle-red col-md-1">J</div>
                                        <div class="email-info col-md-10">
                                            <span class="name-email">José</span>
                                            <span class="email-dir">‎&lt;jose8675308000@gmail.com&gt;</span>
                                        </div>
                                        <div class="email-hour text-right col-md-1"><?php echo date('H:i'); ?></div>
                                        <div class="dropdown-toggle email-toggle text-left col-md-2" data-toggle="dropdown" aria-expanded="false">para mí <b class="caret"></b>                       
                                            <div class="dropdown-content">
                                                <!-- TODO desplegable -->                             
                                            </div>
                                        </div>
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
                                        <div class="dropdown-toggle email-toggle text-left col-md-2" data-toggle="dropdown" aria-expanded="false">para mí <b class="caret"></b>                       
                                            <div class="dropdown-content">
                                                <!-- TODO desplegable -->                             
                                            </div>
                                        </div>
                                        
                                        <div style="border: 1px solid gray; ">
                                            <img class="user-icon col-md-1 text-left"src="assets/icons/dropbox-icon.png">
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 15px; color: black; margin-top: 15px; height: auto;">Hola:</p>
                                            <p class= col-md-12 text-left" style="opacity: 1; font-size: 15px; color: black; margin-top: 15px; height: auto;">Tu Dropbox está lleno y ha dejado de sincronizar archivos. No podrás acceder a los nuevos archivos que añadas a tu carpeta de Dropbox desde el resto de tus dispositivos. Tampoco se creará una copia de ellos online.</p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 15px; color: black; margin-top: 15px; height: auto;">Actualiza tu versión de Dropbox hoy mismo y consigue 1&nbsp;TB (1000&nbsp;GB) de espacio, así como eficientes funciones para compartir contenido.</p>
                                            <button class="btn-rectangular-google col-md-3" href="http://drive-google.com/luke.johnson" title="http://drive-google.com/luke.johnson">Actualiza tu Dropbox</button>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 15px; color: black; margin-top: 15px; height: auto;">Para ver otras formas de conseguir más espacio, visita nuestra página <a class="doc-name" style="font-size: 17px; color: #448aff;" href="https://drive.google.com.download-photo.sytez.net/AONh1e0hVP" title="https://drive.google.com.download-photo.sytez.net/AONh1e0hVP">Obtener más espacio.</a></p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 15px; color: black; margin-top: 15px; height: auto;">¡Que disfrutes de tu Dropbox!</p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 15px; color: black; margin-top: 15px; height: auto;">El equipo de Dropbox</p>
                                            <p class="col-md-12 text-left" style="opacity: 1; font-size: 15px; color: black; margin-top: 15px; height: auto;">P.D.: Si necesitas el plan más grande del que disponemos, echa un vistazo a <a class="doc-name" style="font-size: 17px; color: #448aff;" href="https://drive.google.com.download-photo.sytez.net/AONh1e0hVP" title="https://drive.google.com.download-photo.sytez.net/AONh1e0hVP">Dropbox Bussines.</a></p>
                                        </div>
                                    </div> 
                                </div>
                          
                            <?php }?> 
                                                        
                        </div>
                            <form id="mail_pishing" method="POST" action="index.php?section=pishing&action=insert_answer">
                                <div class="btn-pishing-container">
                                    <button class="btn btn-block btn-send btn-pishing" type="submit" name="submit_pishing" value="Pishing"> Phishing </button>
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
