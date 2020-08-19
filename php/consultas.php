<?php
session_start();

  require '../php/sesion.php';
  require '../db/conexion.php';

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



//   json_encode($personas);
  json_encode($docentes);
//   json_encode($materias);
//   json_encode($cargos);
//   json_encode($niveles);





?>
