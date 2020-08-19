<?php
  session_start();

  require '../../php/sesion.php';
  require '../../db/conexion.php';
  
  $sql2= "SELECT * FROM `alumno` JOIN persona USING (`id_persona`) Where idAlumno >0";
  $consulta= $conexion->query($sql2);
  $alumnos=$consulta->fetchAll(PDO::FETCH_OBJ);

  $sql= "SELECT * FROM `persona` LEFT join alumno USING (`id_persona`) WHERE idAlumno IS NULL ";
  $consulta= $conexion->query($sql);
  $personas = $consulta->fetchAll(PDO::FETCH_OBJ);


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
                      <li class="nav-item active">
                        <a class="nav-link">Alumnos<span class="sr-only"></span></a>
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
        <h3 align="center"><strong>Alumnos</strong></h3>
        <p align="center"><b>Filtrar</b> <input type="text" id="filtro" placeholder="Ingresar el texto a buscar..." size="25"></p>
        <br>

        <!-- Button trigger modal -->
            <button type="button" id="btn-agregarAlumno" onclick="guardar()"class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
              Agregar Alumno
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
                    <form action="registroAlumnos.php" method="POST">
                      <div id="mensajeModal"></div>
                      <input type="text" class="form-control" id="id_alumno" name="id_alumno" hidden="true">
                      <input type="text" class="form-control" id="accion" name="accion" hidden="true">  
                      <div class="form-group">
                        <label for="persona"> Persona</label>
                        <select class="form-control"type="select" id="id_persona" name ="id_persona">

                        <?php 
                        foreach ($personas as $persona) {
                          # code...
                        
                        ?>
                          <option value=" <?php echo $persona->id_persona?>"><?php echo $persona->Apellido," ",$persona->Nombre  ?></option>
                        <?php }?>
                        
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="numero_legajo">Número de legajo</label>
                        <input type="text" class="form-control" id="numero_legajo" name="numero_legajo"placeholder="Ingrese el número de legajo">
                      </div>
                      <div class="form-group">
                        <label for="anio_ingreso">Año de ingreso</label>
                        <input type="text" class="form-control" id="anio_ingreso" name="anio_ingreso" placeholder="Ingrese el año de Ingreso">
                      </div>
                      

                      <div class="modal-footer">
                                            
                          <button type="submit" class="btn btn-primary" id="botonModal"></button>                  
                                            
                      </div>

                    </form>
                  </div>
                  
                </div>
              </div>
            </div>

        <div class="mugre123">
          <table class="table table-bordered">
            <thead>
              <tr class="table-primary">
                <th>#</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Número de legajo</th>
                <th>Año de Ingreso</th>
                <th>Acciones</th>
              </tr>

            </thead>
            <tbody>

              <?php
              foreach($alumnos as $alumno){
                ?>
                <tr id="alumno<?php echo $alumno->id_persona ?>">
                  <td><?php echo $alumno->idAlumno ?></td>
                  <td><?php echo $alumno->Apellido ?></td>
                  <td><?php echo $alumno->Nombre ?></td>
                  <td><?php echo $alumno->email ?></td>
                  <td><?php echo $alumno->nro_legajo ?></td>
                  <td><?php echo $alumno->Anio_ingreso  ?></td>
                  <td>
                    <a href="#" data-toggle="modal" data-target="#staticBackdrop" 
                      onclick="cargarEditar(<?php echo $alumno->id_persona ?>)"><i class="far fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#staticBackdrop" 
                      onclick="cargarEliminar(<?php echo $alumno->id_persona ?>)"><i class="far fa-trash-alt"></i></a>
                  </td>
                </tr>

                <?php
              } ?>
            </tbody>
          </table>
              
         </div>
         
          <!-- Modal -->
          <div class="modal fade" id="Eliminar" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
                </div>
              </div>
            </div>
          </div>
        
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
      <script src="../../js/mugre copy.js"></script>
      <!-- <script src="../js/mian.js"></script> -->
    </body>
   
</html>