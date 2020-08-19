<?php
session_start();

require '../../php/sesion.php';
require '../../db/conexion.php';
date_default_timezone_set("America/Argentina/Buenos_Aires");

$sql = "SELECT * FROM persona Join alumno using (id_persona)";
$consulta = $conexion->query($sql);
$alumnos= $consulta->fetchAll(PDO::FETCH_OBJ);

// $salfecha = "SELECT * FROM persona
//                          join alumno using (id_persona) 
//                          join alumnos_materias on (idAlumno=idrela_Alumnos) 
//                          join materia on (idMateria=idrela_Materias) 
//                          join alumno_materia_asistencia on (idAlumnos_Materias=idrela_Alumno_Materia) 
//                          join fecha using (id_fecha) 
//                          where DAYOFWEEK(fecha)=2";
// $consultafecha = $conexion->query($salfecha);
// $fechas = $consultafecha->fetchAll(PDO::FETCH_OBJ);
$sqlfecha ="SELECT DAYOFWEEK(fecha),fecha from fecha where DAYOFWEEK(fecha)=3 or DAYOFWEEK(fecha)=5";
$consultaFecha = $conexion->query($sqlfecha);
$fechas= $consultaFecha->fetchAll(PDO::FETCH_OBJ);



$sqlmaterias ="SELECT * FROM materias";
$consultamaterias= $conexion->query($sqlmaterias);
$materias= $consultamaterias->fetchAll(PDO::FETCH_OBJ);





$fechaactual= date("d/m/Y");

$asdf= "SELECT * FROM persona 
join alumno using (id_persona) 
join alumnos_materias on (idAlumno=idrela_Alumnos) 
join materias on (idMaterias=idrela_Materias) 
join alumno_materia_asistencia on (idAlumnos_Materias=idrela_Alumno_Materia) 
join fecha USING (id_fecha) where (select DAYOFWEEK(fecha),fecha from fecha where DAYOFWEEK(fecha)=3 or DAYOFWEEK(fecha)=5)";
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
                      <li class="nav-item active">
                     <a class="nav-link" >Asistencia</a>
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
            <h3 align="center"><b>Asistencia</b></h3><br>
            <div align="center">
            <p><b>Fecha</b><div id=selectFecha>
              <select name="" id="">
              <?php
                foreach ($fechas as $fecha) {
                  # code...
                  
                  echo "<option value='$fecha->id_fecha'>$fecha->fecha</option>";
                }

              ?>
            
            </select>
            </div>
            

            <img type="image/jpg" alt="calendario pequeño" src="../media/img/calendario_chico.jpg" width="1.5%">
            <b>Materia</b>
            <select name="" id="selectMateria">
            <?php
              foreach ($materias as $materia) {
                # code...
                
                echo "<option value='$materia->idMaterias'>$materia->Nombre_materias</option>";
              }

            ?>
            
            </select></p>
          </div>
            <!-- <b>Materia</b> <select>
                <option>Algoritmos y Estructuras de Datos</option>
                <option>Base de Datos I</option>
                <option>Base de Datos II</option>
                <option>Matemática Aplicada I</option>
                <option>Proyecto Integrador I</option>
                <option>Proyecto Integrador II</option>
                <option>Taller de Lenguage de Programación</option>
            </select> -->
            
            <!-- <table class="table table-hober"align="center">
                <tr class="table-primary">
                    <th><b>Nombre y Apellido</b></th>
                    <th><b>Asistencia</b></th>
                </tr>
                <tr>
                    <th>Tarufetti Raúl</th>
                    <th><input type="checkbox"></th>                
                </tr>
                <tr>
                    <th>Aurelio Marco</th>
                    <th><input type="checkbox"></th>                    
                </tr>
                <tr>
                    <th>García Juan</th>
                    <th><input type="checkbox"></th>                  
                </tr>
                <tr>
                    <th>MCampanela Juan</th>
                    <th><input type="checkbox"></th>
                </tr>
                <tr>
                    <th>Total Presentes</th>
                    <th>3</th>
                </tr>
                <tr>
                    <th>Total Ausentes</th>
                    <th>1</th>
                </tr>             



            </table> -->
            

            <div class="container pt-5 mt-4"> <!-- Con esto se encierra a el formulario -->
                 <div class="row d-flex justify-content-center"> <!-- con esto centramos lo que encerramos-->
                   <div class="col-md-5 pb-3"><!-- con esto armamos columnas dentro de la casilla -->
            <form action="">
            <table class="table table-hober"align="center">
                <tr class="table-primary">
                    <th><b>Nombre y Apellido</b></th>
                    <?php
                      
                     $hoy = date("d/m/Y");
                      echo "<th><b>$hoy</b></th>";
                    ?>
                    
                </tr>


              
              <?php 
              foreach ($alumnos as $alumno) {
                # code...
              
              
              ?>
              <tr>
                <form id="formulario">
                  <td>
                    <div class="form-group">
                      
                      
                    <?php echo $alumno->Apellido," ",$alumno->Nombre ?>
                  
                    </div>
                  </td>

                  <td>
                    <input type="checkbox" class="form-control">
                  </td>  
                  </div>
                  
                </form>
              </tr>
              <?php
              }
              ?>
              <tr><button type="submit" class="btn-primary">Enviar</button></tr>
              </table>
           </form>
                 </div></div></div>
          <div id="respuesta"></div>
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
            <!-- <script src="../../js/mugre copy 3.js"></script> -->
            <script src="../../js/asistencia.js"></script>
    </body>
   
</html>