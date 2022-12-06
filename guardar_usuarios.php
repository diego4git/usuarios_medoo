<?php

include("includes/bd.php");
//include("session.php");
include "mcript.php";

if(isset($_POST['guardar_usuario'])){

    $nombre= $_POST['nombre'];
    $cedula= $_POST['cedula'];
    $perfil= $_POST['perfil'];
    $passw= $encriptar($_POST['passw']);
    $fecha= $_POST['fecha'];

    $resultado=$database->insert("usuario_tb",[
        "id"=>$cedula,
        "nombre"=>$nombre,
        "perfil"=>$perfil,
        "passw"=>$passw,
        "fecha"=>$fecha
    ]);

    if(!$resultado){
        die("Query failed");
    }
        $_SESSION['mensaje']="Usuario guardado correctamente!";
        $_SESSION['mensaje_tipo']='success';
        header("location: principal.php");

}

?>