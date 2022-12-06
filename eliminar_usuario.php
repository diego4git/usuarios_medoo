<?php
    include_once("includes/bd.php");
    include_once("session.php");

    if(isset($_GET['cedula'])){
        
        $result= $database->delete("usuario_tb",["id"=>$_GET['cedula']]);

        if(!$result){
            die("Query Failed");
        }

        $_SESSION['mensaje']=" Usuario eliminado correctamente!";
        $_SESSION['mensaje_tipo']="danger";

        header("location: principal.php");
    }
?>