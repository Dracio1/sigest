<?php
session_start();

  require '../../php/sesion.php';
  require '../../db/conexion.php';

  $sql= "SELECT * FROM persona left join docentes using (id_persona) where id_docentes is NULL";
  $consulta = $conexion->query($sql);
  $personas = $consulta->fetchAll(PDO::FETCH_OBJ);
  $sql2= "SELECT * FROM persona join docentes using (id_persona)
             join cargos on (Cargo=id_cargos)
             join nivel_estudio on (Nivel_Estudio=id_nivel_estudio)
             join materias on (rela_materia=idMaterias)";
  $consulta2 = $conexion->query($sql2);
  $docentes = $consulta2->fetchAll(PDO::FETCH_OBJ);
  $sql3= "SELECT * FROM materias";
  $consulta3=$conexion->query($sql3);
  $materias = $consulta3->fetchAll(PDO::FETCH_OBJ);
  $sql4= "SELECT * FROM cargos";
  $consulta4 = $conexion->query($sql4);
  $cargos= $consulta4->fetchAll(PDO::FETCH_OBJ);
  $sql5= "SELECT * FROM nivel_estudio";
  $consulta5= $conexion->query($sql5);
  $niveles= $consulta5->fetchAll(PDO::FETCH_OBJ);





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
                      <li class="nav-item active">
                        <a class="nav-link">Profesores</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../materias/">Materias</a>
                      </li>
                      <li class="nav-item">
                     <a class="nav-link" href="../asistencia/">Asistencia</a>
                      </li>
                      <li class="nav-item">
                    <a class="nav-link" href="../ayuda">Ayuda</a>                      
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
            <h3 align="center"><b>Profesores</b></h3>
            <p align="center"><b>Filtrar</b> <input type="text" placeholder="Ingresar el texto a buscar..." size="25"></p>
            <br>

            <!-- Button trigger modal -->
            <button type="button" id="btn-agregarAlumno" class="btn btn-primary" onclick="guardar()"data-toggle="modal" data-target="#staticBackdrop">
              Agregar Profesor
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
                    <form action="registroProfesores.php" method="POST">
                      <input type="text" class="form-control" id="id_docente" name="id_docente"hidden="true">
                      <input type="text" class="form-control" id="accion" name="accion" hidden="true">
                      <div class="form-group" id="mensajeModal"></div> 
                      <div class="form-group">
                        <label for="Persona">Persona</label>
                        <select  class="form-control" id="id_persona" name="id_persona">
                          <?php 
                            foreach ($personas as $persona) {
                              # code...
                          ?>
                          <option value="<?php echo $persona->id_persona?>"><?php echo $persona->Apellido,', ',$persona->Nombre?></option>
                          <?php
                            } ?>
                        </select>
                      </div> 
                      <div class="form-group">
                          <label for="Nivel_Estudio">Nivel de Estudio</label>
                          <select class="form-control" id="nivel_estudio" name="nivel_estudio">
                          <?php 
                            foreach ($niveles as $nivel) {
                              # code...
                          ?>
                          <option value="<?php echo $nivel->id_nivel_estudio?>"><?php echo $nivel->descripcion_nivel_estudio?></option>
                          <?php
                            } ?>
                          </select>
                          
                      </div>
                      <div class="form-group">
                        <label for="Titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo"placeholder="Ingrese el título obtenido...">
                      </div>  
                      <div class="form-group">
                        <label for="Materia">Materia</label>
                        <select class="form-control" id="materia" name="materia">
                          <?php 
                            foreach ($materias as $materia) {
                              # code...
                          ?>
                          <option value="<?php echo $materia->idMaterias?>"><?php echo $materia->Nombre_materias?></option>
                          <?php
                            } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="Cargos">Cargos</label>
                        <select class="form-control" id="cargo" name="cargo">
                          <?php 
                            foreach ($cargos as $cargo) {
                              # code...
                          ?>
                          <option value="<?php echo $cargo->id_cargos?>"><?php echo $cargo->descripcion_cargo?></option>
                          <?php
                            } ?>
                        </select>
                      </div>
                      
                          
                      <div class="modal-footer">
                                            
                          <button type="submit" class="btn btn-primary" id="botonModal">Agregar Profesor</button>                  
                                            
                      </div>

                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
            
          <table class="table table-bordered">
            <thead>
              <tr class="table-primary">
                <th>#</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Nivel de Estudio</th>
                <th>Título</th>
                <th>Materia</th>
                <th>Cargo</th>
                <th>Acciones</th>
              </tr>

            </thead>
            <tbody>

              <?php
              foreach($docentes as $docente){
                ?>

                <tr>
                  <td><?php echo $docente->id_docentes ?></td>
                  <td><?php echo $docente->Apellido ?></td>
                  <td><?php echo $docente->Nombre ?></td>
                  <td><?php echo $docente->email ?></td>
                  <td><?php echo $docente->descripcion_nivel_estudio ?></td>
                  <td><?php echo $docente->Titulo ?></td>
                  <td><?php echo $docente->Nombre_materias  ?></td>
                  <td><?php echo $docente->descripcion_cargo ?></td>
                  
                  <td>
                    <i class="far fa-edit"></i>
                    <i class="far fa-trash-alt"></i>

                  </td>
                </tr>

                <?php
              } ?>
            </tbody>
          </table>



            <table class="table table-hover"align="center">
                <tr class="table-primary">
                    <th><b>Apellido y Nombre</b></th>
                    <th><b>Materia</b></th>
                    <th><b>Correo Electrónico</b></th>
                </tr>
                <tr>
                    <th>Rubiano Ernesto Guillermo</th>
                    <td>Algoritmos y Estructuras de Datos</td>
                    <td>erubiano@outlock.com</td>
                </tr>
                <tr>
                    <th>Badaracco Miguel Mateo</th>
                    <td>Proyecto Integrador I</td>
                    <td>mbadaracco@yahoo.com</td>  
                </tr>
                <tr>
                    <th>Hoferek Silvia Rosana</th>
                    <td>Algoritmos y Estructuras de Datos</td>
                    <td>shoferek@gmail.com</td>
                </tr>
                







            </table>
          
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
      <script src="https://kit.fontawesome.com/6033bbf198.js" crossorigin="anonymous"></script>
      <script src="../../js/mugre copy 2.js"></script>
      
    </body>
   
</html>