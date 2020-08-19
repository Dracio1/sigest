<?php

session_start();

include '../db/conexion.php';

$usuario = $_POST['usuario'];
$pass = $_POST['contraseña'];
$sql = "SELECT * 
            FROM usuarios
            WHERE usuarios_nick = :usuario
                AND usuarios_pass = :pass";

// $usuarios =$conexion->query($sql, PDO::FETCH_ASSOC);




$stmt = $conexion->prepare($sql);
$stmt->execute(array(':usuario' => $usuario, ':pass' => $pass));
// $usuario = $stmt->fetchAll();

if ($stmt->rowCount() == 1) {
    $_SESSION['alta']=true;
    $_SESSION['usuario']=$_POST['usuario'];
    
    header("Location: ../modulos/index.php");
    exit;
}else{
    
    header("Location: ../modulos/login/");

}


?>