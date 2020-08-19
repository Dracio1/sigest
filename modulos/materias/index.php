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
    <link rel="stylesheet" href="../../css/cerulean/bootstrap.min.css"
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
                      <li class="nav-item active">
                        <a class="nav-link">Materias</a>
                      </li>
                      <li class="nav-item">
                     <a class="nav-link" href="../asistencia/">Asistencia</a>
                      </li>
                      <li class="nav-item">
                    <a class="nav-link" href="../ayuda/">Ayuda</a>                      
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
            <h3 align="center"><b>Materias</b></h3>
            <p align="center"><b>Filtrar</b> <input type="text" placeholder="Ingresar el texto a buscar..." size="25" id="filtro"></p>
            <br>

            <!-- Button trigger modal -->
            <button type="button" id="btn-agregarMateria" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
              Agregar Materia
            </button>

        <!-- Modal Agregar y Editar-->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="../../php/agregarMaterias.php" method="POST">
                      <input type="text" class="form-control" id="idmateria" hidden="true">  
                      <div class="form-group">
                          <label for="codigoMateria">Código de la carrera</label>
                          <input type="text" class="form-control" id="codigoMateria" name='codigo' placeholder="Ingrese el Código de la materia">
                      </div>                    
                      <div class="form-group">
                        <label for="nombreMateria">Nombre de la carrera</label>
                        <input type="text" class="form-control" id="nombreMateria" name="nombre" placeholder="Ingrese el Nombre de la materia">
                      </div>
                      <div class="form-group">
                        <label for="carrera">Carrera</label>
                        <select class="form-control" id="carrera" name="carrera" placeholder="Ingrese el Código de la materia">
                          <option selected='true' disabled>Seleccione la carrera</option>
                          <option value=1>ETDS</option>
                          <option value=2>MECA</option>
                        </select>
                      </div>  
                      <div class="modal-footer">
                        <button type="submit" id="btn-guardar"class="btn btn-primary">Cargar Materia</button>
                  
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
            <br>
            <div class="table"></div>
            
          
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/node-uuid/1.4.8/uuid.js"></script>
      <script src="https://kit.fontawesome.com/6033bbf198.js" crossorigin="anonymous"></script>
      <!-- <script src="../js/materias.js"></script> -->
    </body>
   
</html>