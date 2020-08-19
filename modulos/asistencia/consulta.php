<?php
require '../../db/conexion.php';

$consultajs = $_POST["consulta"];

$sql = "SELECT * from materias";
$consulta= $conexion->query($sql);
$materias= $consulta->fetchAll(PDO::FETCH_OBJ);




foreach ($materias as $materia) {
    # code...

switch ($consultajs) {
   
        # code...
        case $materia->idMaterias:
            $sqlfecha= "SELECT dayofweek(fecha),fecha From fecha where dayofweek(fecha)=3 or dayofweek(fecha)=5";

        # code...
        
        break;
}
}
?>