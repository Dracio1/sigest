<?php

  include '../../db/conexion.php';

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $dni = $_POST['dni'];
  $fnacimiento = date_create_from_format('d/m/Y',$_POST['fnacimiento']);
  $localidad = $_POST['localidad'];
  $correo = $_POST['correo'];
  $CUIL = $_POST['CUIL'];
  $ntelefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];
  $perfil = $_POST['perfil'];
  $accion = $_POST['accion'];
  $id_persona = $_POST['id_persona'];

  function validar_nombre($nombre){
    if (is_numeric($nombre) ==1) return false;
    if (strlen($nombre)<3) return false;
    return true;
  };
  function validar_apellido($apellido){
    if (is_numeric($apellido) ==1) return false;
    if (strlen($apellido)<3) return false;
    return true;
  };
  function validar_dni($dni){
    $numdni = str_replace('.','',trim($dni,'.'));
    if (is_numeric($numdni) <>1) return false;
    if (strlen($numdni)!==8) return false;
    return true;
  };

  function validar_cuil($CUIL){
    $numcuil = str_replace('-','',trim($CUIL,'-'));

    if (is_numeric($numcuil) <>1) return false;
    if (strlen($numcuil)!==11) return false;
    
    $factores = array(5,4,3,2,7,6,5,4,3,2);
    $sumatoria =0;
    
    for($i=0;$i<strlen($numcuil)-1;$i++){
      
      $orden = substr($numcuil,$i,1);
      $sumatoria += ($orden* $factores[$i]);
      
    };

    $resto = $sumatoria % 11;
    $digitoVerificador = ($resto != 0 ) ? 11-$resto : $resto;

    return ($digitoVerificador == substr($numcuil, strlen($numcuil)-1));
  };

  function validar_telefono($ntelefono){
    if (is_numeric($ntelefono) <>1) return false;
    if (strlen($ntelefono)<7) return false;
    return true;
  };

  function validar_direccion($direccion){
    if (is_numeric($direccion) ==1) return false;
    if (strlen($direccion)<7) return false;
    return true;
  }
  

  // if (!filter_var($dni, FILTER_VALIDATE_INT) === false) {
  //     echo("Integer is valid");
  //   } else {
  //     echo("Integer is not valid");
  //     exit;
  //   };
  // if (!filter_var($perfil, FILTER_VALIDATE_INT) === false) {
  // echo("Integer is valid");
  // } else {
  // echo("Integer is not valid");
  // exit;
  // };
  // if (!filter_var($CUIL, FILTER_VALIDATE_INT) === false) {
  // echo("Integer is valid");
  // } else {
  // echo("Integer is not valid");
  // exit;
  // };
  if (!validar_nombre($nombre)){
    echo $nombre. ' Debe ingresar un Nombre';
    exit;
  }
  if (!validar_apellido($apellido)){
    echo $apellido. ' Debe ingresar un Apellido';
    exit;
  }
  if (!validar_dni($dni)){
    echo $dni. ' DNI Incorrecto';
    exit;
  }
  if (!filter_var($correo, FILTER_VALIDATE_EMAIL) === true) {
  echo("$correo ingrese un correo valido");
  exit;
  }
  if (!validar_cuil($CUIL)){
    echo $CUIL.' Cuil incorrecto';
    exit;
    
  }
  if (!validar_telefono($ntelefono)){
    echo $ntelefono.' Ingrese un telefono válido';
    exit;
  }
  if (!validar_direccion($direccion)){
    echo $direccion.' Ingrese una dirección';
    exit;
  }
  
 
  switch ($accion) {
    case 'agregar':
      # code...
      
      try{
        $conexion->beginTransaction();
      $sql = "INSERT INTO persona (`id_persona `,`DNI`, `Nombre`, `Apellido`, `CUIL`,`fecha_nacimiento`,`Numero_Telefono`,`Direccion`,`email`,`relaid_loca`,`perfil`)
                  VALUES (NULL
                          ,:dni
                          ,:nombre
                          ,:apellido
                          ,:CUIL
                          ,:fnac
                          ,:telefono
                          ,:direccion
                          ,:email
                          ,:localidad
                          ,:perfil)";

      $stmt = $conexion->prepare($sql);

      $stmt->execute(array(':dni'=> $dni
                          ,':nombre'=>$nombre
                          ,':apellido'=>$apellido
                          ,':CUIL'=>$CUIL
                          ,':fnac'=>date_format($fnacimiento,'Y-m-d')
                          ,':telefono'=>$ntelefono
                          ,':direccion'=>$direccion
                          ,':email'=>$correo
                          ,':localidad'=>$localidad
                          ,':perfil'=>$perfil));
        // echo $conexion->lastInsertId();
      if ($stmt->rowCount() == 1) {
          header('Location:' . getenv('HTTP_REFERER'));
      };
      $conexion->commit();
      }catch(PDOException $e){
        echo $e->getMessage();
        $conexion->rollback();
        exit;
      }
      break;
    case 'editar':
      # code...
        
    try{
      $conexion->beginTransaction();
    $sql = "UPDATE `persona` SET `DNI`=:dni
                                  ,`Nombre`=:nombre
                                  ,`Apellido`=:apellido
                                  ,`CUIL`=:CUIL
                                  ,`fecha_nacimiento`= :fnac
                                  ,`Numero_Telefono`=:telefono
                                  ,`Direccion`=:direccion
                                  ,`email`=:correo
                                  ,`relaid_loca`=:localidad
                                  ,`perfil`=:perfil
                                   WHERE `id_persona` = :id_persona";


    
    $stmt = $conexion->prepare($sql);


    $stmt->execute(array(':dni'=> $dni
                        ,':nombre'=>$nombre
                        ,':apellido'=>$apellido
                        ,':CUIL'=>$CUIL
                        ,':fnac'=>date_format($fnacimiento,'Y-m-d')
                        ,':telefono'=>$ntelefono
                        ,':direccion'=>$direccion
                        ,':correo'=>$correo
                        ,':localidad'=>$localidad
                        ,':perfil'=>$perfil
                        ,':id_persona'=>$id_persona));

        
    if ($stmt->rowCount() == 1) {
        header('Location:' . getenv('HTTP_REFERER'));
    };

    $conexion->commit();
    }catch(PDOException $e){
      echo $e->getMessage();
      $conexion->rollback();
      exit;
    }


      break;
    case 'eliminar':
      # code...
      try{
        $conexion->beginTransaction();
            $sql = "DELETE FROM `persona` WHERE `id_persona` = :id_persona";
            
            $stmt = $conexion->prepare($sql);

            $stmt->execute(array(':id_persona'=>$id_persona));
            

            if ($stmt->rowCount() == 1) {
              header('Location:' . getenv('HTTP_REFERER'));
          };
      
          $conexion->commit();
          }catch(PDOException $e){
            echo 'Hubo un error Intente mas tarde: '.$e->getMessage();
            $conexion->rollback();
            exit;
          }

      break;
    default:
      echo 'No metas la mano gilipollas';
      break;
  }










?>