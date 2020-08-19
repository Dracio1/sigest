<?php 
require "../../db/conexion.php";

$id_alumno = $_POST["id_alumno"];
$id_persona = $_POST["id_persona"];
$numero_legajo = $_POST["numero_legajo"];
$anio_ingreso = $_POST["anio_ingreso"];
$accion = $_POST["accion"];
$idCarreras = $_POST["idCarreras"];

switch ($accion) {
    case 'agregar':
        # code...
        try {
            //code...
            $conexion->beginTransaction();
            $sqlNuevoAlumno="INSERT INTO `alumno`(`idAlumno`,`id_persona`, `nro_legajo`, `Anio_ingreso`,`idCarreras`)
                            VALUES (NULL
                                    ,:id_personas
                                    ,:numero_legajo
                                    ,:anio_ingreso)
                                    ,:idCarreras";
            
            $stmt = $conexion->prepare($sqlNuevoAlumno);
            
            $stmt->execute(array(":id_personas"=>$id_persona
                                ,":numero_legajo"=>$numero_legajo
                                ,":anio_ingreso"=>$anio_ingreso
                                ,":idCarreras"=>$idCarreras));
            
            $sqlInscribirMateria1="INSERT INTO `alumnos_materias`(`idAlumnos_Materias`, `idrela_Alumnos`, `idrela_Materias`) VALUES (NULL,(SELECT max(idAlumno) FROM alumno),1)";
            $stmtInscribirMateria1= $conexion->prepare($sqlInscribirMateria1);
            $stmtInscribirMateria1->execute();
            
            $sqlInscribirMateria2="INSERT INTO `alumnos_materias`(`idAlumnos_Materias`, `idrela_Alumnos`, `idrela_Materias`) VALUES (NULL,(SELECT max(idAlumno) FROM alumno),4)";
            $stmtInscribirMateria2= $conexion->prepare($sqlInscribirMateria2);
            $stmtInscribirMateria2->execute();
            
            $sqlInscribirMateria3="INSERT INTO `alumnos_materias`(`idAlumnos_Materias`, `idrela_Alumnos`, `idrela_Materias`) VALUES (NULL,(SELECT max(idAlumno) FROM alumno),5)";
            $stmtInscribirMateria3= $conexion->prepare($sqlInscribirMateria3);
            $stmtInscribirMateria3->execute();
            
            $sqlInscribirMateria4="INSERT INTO `alumnos_materias`(`idAlumnos_Materias`, `idrela_Alumnos`, `idrela_Materias`) VALUES (NULL,(SELECT max(idAlumno) FROM alumno),6)";
            $stmtInscribirMateria4= $conexion->prepare($sqlInscribirMateria4);
            $stmtInscribirMateria4->execute();
            
            $sqlInscribirMateria5="INSERT INTO `alumnos_materias`(`idAlumnos_Materias`, `idrela_Alumnos`, `idrela_Materias`) VALUES (NULL,(SELECT max(idAlumno) FROM alumno),7)";
            $stmtInscribirMateria5= $conexion->prepare($sqlInscribirMateria5);
            $stmtInscribirMateria5->execute();
            
            $sqlInscribirMateria6="INSERT INTO `alumnos_materias`(`idAlumnos_Materias`, `idrela_Alumnos`, `idrela_Materias`) VALUES (NULL,(SELECT max(idAlumno) FROM alumno),8)";
            $stmtInscribirMateria6= $conexion->prepare($sqlInscribirMateria6);
            $stmtInscribirMateria6->execute();
            
            $sqlInscribirMateria7="INSERT INTO `alumnos_materias`(`idAlumnos_Materias`, `idrela_Alumnos`, `idrela_Materias`) VALUES (NULL,(SELECT max(idAlumno) FROM alumno),9)";
            $stmtInscribirMateria7= $conexion->prepare($sqlInscribirMateria7);
            $stmtInscribirMateria7->execute();
            
            $sqlInscribirMateria8="INSERT INTO `alumnos_materias`(`idAlumnos_Materias`, `idrela_Alumnos`, `idrela_Materias`) VALUES (NULL,(SELECT max(idAlumno) FROM alumno),10)";
            $stmtInscribirMateria8= $conexion->prepare($sqlInscribirMateria8);
            $stmtInscribirMateria8->execute();
            
            
            if ($stmt->rowCount()==1) {
                # code...
                
                header('Location:' . getenv('HTTP_REFERER'));
            }
            $conexion->commit();


        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            $conexion->rollback();
            exit;
        }
        break;
    case 'editar':
        # code...
        try {
            //code...
            $conexion->beginTransaction();
            $sql="UPDATE `alumno` SET `nro_legajo`=:nro_legajo
                                    ,`Anio_ingreso`=:anio_ingreso
                                    ,`idCarreras`
                                WHERE `idAlumno` = :id_alumno";
            
            $stmt = $conexion->prepare($sql);
            
            $stmt->execute(array(":id_alumno"=>$id_alumno
                                ,":nro_legajo"=>$numero_legajo
                                ,":anio_ingreso"=>$anio_ingreso
                                ,":idCarreras"=>$idCarreras));
                                
            if ($stmt->rowCount()==1) {
                # code...
                header('Location:' . getenv('HTTP_REFERER'));
            }
            $conexion->commit();


        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            $conexion->rollback();
            exit;
        }
        break;
    case 'eliminar':
        # code...
        try {
            //code...
            $conexion->beginTransaction();
            $sql="DELETE FROM `alumno` WHERE idAlumno = :id_alumno";
            
            $stmt = $conexion->prepare($sql);

            $stmt->execute(array(":id_alumno"=>$id_alumno));

            if ($stmt->rowCount()==1) {
                # code...
                header('Location:' . getenv('HTTP_REFERER'));
            }
            $conexion->commit();


        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            $conexion->rollback();
            exit;
        }
        break;
    
    default:
        # code...
        break;
}



?>