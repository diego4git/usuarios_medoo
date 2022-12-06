<?php
    use Medoo\Medoo;
    require_once 'includes/Medoo.php';
    $database= new Medoo([
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'usuarios_medoo',
        'username' => 'root',
        'password' => 'root'
      ]);
?>