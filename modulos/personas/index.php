<?php
  session_start();

  require '../../php/sesion.php';
  require '../../db/conexion.php';


  $sql = "SELECT * FROM `persona` Join `localidades` on (relaid_loca=cod_loca_n) join `departamento`  on (cod_depar=idDepartamento)";
  $sql2 = "SELECT * From localidades";
  $consulta = $conexion->query($sql);
  $consulta2= $conexion->query($sql2);
  $alumnos = $consulta->fetchAll(PDO::FETCH_OBJ);
  $localidades = $consulta2->fetchAll(PDO::FETCH_OBJ);

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
                        <a class="nav-link active" >Personas<span class="sr-only"></span></a>
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
        <h3 align="center"><strong>Personas</strong></h3>
        <p align="center"><b>Filtrar</b> <input type="text" id="filtro" placeholder="Ingresar el texto a buscar..." size="25"></p>
        <br>

        <!-- Button trigger modal -->
            <button type="button" id="btn-agregarAlumno" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" onclick="guardar()">
              Agregar Persona
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
                    <form action="registro.php" method="POST">
                      <input type="text" class="form-control" name="accion" id="accion" hidden="true" >
                      <input type="text" class="form-control" name="id_persona" id="id_persona" hidden="true" >  
                      <div class="form-group" id='mensajeModal'></div>
                      <div class="form-group">
                          <label for="nombre">Nombre</label>
                          <input type="text" class="form-control" id="nombre" name="nombre"placeholder="Ingrese el Nombre...">
                      </div>
                      <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido"placeholder="Ingrese el Apellido...">
                      </div>  
                      <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni"placeholder="Ingrese el DNI...">
                      </div>
                      <div class="form-group">
                          <label for="fechanacimiento">Fecha de Nacimiento</label>
                          <input type="text" class="form-control" id="fechanacimiento" name="fnacimiento"placeholder="dd/mm/yyyy">
                        </div>
                      <div class="form-group">
                        <label for="CUIL">CUIL</label>
                        <input type="text" class="form-control" id="CUIL" name="CUIL"placeholder="Ingrese el CUIL...">
                      </div>  
                      <div class="form-group">
                        <label for="ntelefono">Número de Teléfono</label>
                        <input type="text" class="form-control" id="ntelefono" name="telefono"placeholder="Ingrese el número de contacto...">
                      </div> 
                      <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion"placeholder="Ingrese la dirección...">
                      </div> 
                     <div class="form-group">
                          <label for="localidad">Localidad</label>
                          <select class="form-control" id="localidad" name="localidad">
                            <option selected="true" disabled="disabled">Seleccione una Localidad</option>
                            <?php 
                            foreach ($localidades as $localidad) { ?>
                              <option value="<?php echo $localidad->cod_loca_n ?>"><?php echo $localidad->localidad ?></option>
                            <?php
                            };
                            ?>
                            
                          </select>
                      </div>                    
                      <div class="form-group">
                          <label for="email">Correo Electrónico</label>
                          <input type="email" class="form-control" id="email" name="correo"placeholder="Ingrese el Correo Electrónico...">
                      </div>
                      <div class="form-group">
                        <select class="form-control" id="perfil" name="perfil">
                          <option value=1 selected="true">Estudiante</option>
                        </select>
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
          <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr class="table-primary">
                <th >Mostrar</th>
                <th colspan=2>#</th>
                <th colspan=2>Apellido</th>
                <th colspan=2>Nombre</th>
                
                <th colspan=2>CUIL</th>
                
               
                <th colspan=2>Email</th>
                <th colspan=2>Acciones</th>

              </tr>

            </thead>
            <tbody>

              <?php
              foreach($alumnos as $alumno){
                ?>
               
                <tr id='al<?php echo $alumno->id_persona ?>'>
                  <td>
                    <a onclick="mostrar('<?php echo $alumno->id_persona ?>')" href="#" id="mostrar<?php echo $alumno->id_persona ?>"><i class="fas fa-chevron-down"></i></a>
                    <a onclick="ocultar('<?php echo $alumno->id_persona ?>')" href="#" id="ocultar<?php echo $alumno->id_persona ?>"><i class="fas fa-chevron-up"></i></a>
                  </td>
                  <td colspan=2><?php echo $alumno->id_persona ?></td>
                  <td colspan=2><?php echo $alumno->Apellido ?></td>
                  <td colspan=2><?php echo $alumno->Nombre ?></td>
                  <td colspan=2><?php echo $alumno->CUIL ?></td>
                  <td colspan=2><?php echo $alumno->email ?></td>
                  <td colspan=2>
                    <a href="#"><i class="far fa-edit" data-toggle="modal" data-target="#staticBackdrop" 
                      onclick="cargarEditar(<?php echo $alumno->id_persona ?>)"></i></a>
                    <a href="#"><i class="far fa-trash-alt" data-toggle="modal" data-target="#staticBackdrop"
                    onclick="cargarEliminar(<?php echo $alumno->id_persona ?>)"></i></a>
                  </td>
                  <tr id='alumno<?php echo $alumno->id_persona ?>' style="display: none;">
                    <td>DNI : </td>
                    <td><?php echo $alumno->DNI ?></td>
                    <td>Fecha de nacimiento: </td>
                    <td><?php echo date_format(date_create($alumno->fecha_nacimiento),'d/m/Y') ?></td>
                    <td>Teléfono: </td>
                    <td><?php echo $alumno->Numero_Telefono  ?></td>
                    <td>Dirección: </td>
                    <td><?php echo $alumno->Direccion ?></td>
                    <td hidden><?php echo $alumno->cod_loca_n ?></td>
                    <td>Localidad </td>
                    <td><?php echo $alumno->localidad ?></td>
                    <td>Departamento: </td>
                    <td><?php echo $alumno->Nombre_departamento ?></td>
                  </tr>
                  
                </tr>

                <?php
              } ?>
            </tbody>
          </table>
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
      <!-- <script src="../js/mian.js"></script> -->
      <script src="../../js/mugre.js"></script>
    </body>
   
</html>