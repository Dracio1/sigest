<?php

include '../db/conexion.php';

//agregacion de materias

$nombreMateria = $_POST['nombre'];
$codigoMateria = $_POST['codigo'];
$carrera = $_POST['carrera'];


$sql = "INSERT INTO Materias (idMaterias,Nombre,codigo_carrera,idCarrera) 
            VALUES (NULL,:nombre,:codigo,:carrera)" ;

$stmt = $conexion->prepare($sql);

$stmt->execute(array(':nombre' => $nombreMateria
                    , ':codigo'=> $codigoMateria
                    , ':carrera' => $carrera
                    )
                );


echo $sql;

if ($stmt->rowCount() == 1) {
    header('Location:' . getenv('HTTP_REFERER'));
}else{
    echo "Carga Fallida";
};


?>