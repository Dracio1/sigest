<?php
session_start();

require '../../php/sesion.php';








?>


<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigest - Sistema de Gestión Académica del IPF</title>
    <link rel="icon" type="image/ico" href="../../media/img/favicon.ico" />
    <link rel="stylesheet" href="../../css/cerulean/bootstrap.min.css">
    </head>
    
    <body>
    
    
        <header>
            <div class="bs-component">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <a href="../index.php"><IMG SRC="../../media/img/logo.png" align="middle" width="130" height="50"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
    
                  <div class="collapse navbar-collapse" id="navbarColor01" >
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="../personas/">Personas<span class="sr-only"></span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../alumnos/">Alumnos<span class="sr-only"></span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../profesores/">Profesores</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../materias/">Materias</a>
                      </li>
                      <li class="nav-item">
                     <a class="nav-link" href="../asistencia/">Asistencia</a>
                      </li>
                      <li class="nav-item active">
                    <a class="nav-link">Ayuda</a>                      
                      </li>
                      <li class="nav-item">
                     <a class="nav-link" href="../../php/logout.php">Salir</a>
                      </li>
                     
                    </ul>
                   
                  </div>
                </nav>
            </div>
    
        </header>    
        <br><br>  
            <p>NO HAY AYUDA QUE TE SALVE</p>
          
            <footer class="footer mt-auto py-3" style="position: fixed;

            left: 0;
            
            bottom: 0;">
            
            <div class="container">
            
            <span class="text-muted">&copy2020 - todos los derechos reservados</span>
            
            </div>
            
            </footer>
    
      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/popper.min.js"></script>
    </body>
   
</html>