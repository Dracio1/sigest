<?php

    require "../../db/conexion.php";

    $id_persona= $_POST['id_persona'];
    $id_docente= $_POST['id_docente'];
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $email= $_POST['email'];
    $nivel_estudio= $_POST['nivel_estudio'];
    $titulo= $_POST['titulo'];
    $materia= $_POST['materia'];
    $cargo= $_POST['cargo'];
    $accion= $_POST['accion'];




    switch ($accion) {
        case 'agregar':
            # code...
            try {
                //code...
                $conexion->beginTransaction();
                $sql="INSERT INTO docentes (`id_persona`, `Nivel_Estudio`, `Cargo`, `Titulo`, `rela_materia`) 
                        VALUES (:id_persona
                                ,:nivel_estudio
                                ,:cargo
                                ,:titulo
                                ,:rela_materia)";
                $stmt= $conexion->prepare($sql);
                

                $stmt->execute(array(':id_persona'=>$id_persona
                                    ,':nivel_estudio'=>$nivel_estudio
                                    ,':cargo'=>$cargo
                                    ,'titulo'=>$titulo
                                    ,':rela_materia'=>$materia));
                
                if($stmt->rowCount()==1){
                    
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