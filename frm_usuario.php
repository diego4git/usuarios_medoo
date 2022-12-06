<?php
//include("session.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/7c416d91d9.js" crossorigin="anonymous"></script>

</head>
<body>

    <nav class="nav-bar navbar-dark bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 style="color:white">Registro de Usuarios</h3>
                </div>
            </div>
        </div>
    </nav>

    <main class="container p-2 align-items-center" >
        <section class="card bg-dark text-white" style="border-radius:1rem;">
            <div class="card-body p-5 text-center">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                            if(isset($_SESSION['mensaje'])){
                        ?>
                        <div class="alert alert-<?php $_SESSION['mensaje_tipo'];?> alert-dismissible fade show" role="alert">
                                <?php $_SESSION['mensaje']; ?>
                                <button type="button" class="close" data-dismiss="alert"  arial-label="Close">
                                    <span arial-hidden="true">&times;</span>
                                </button>
                        </div>
                        <?php session_unset();} ?>

                        <div class="card card-body">
                                <form action="guardar_usuarios.php" method="post">
                                    <div class="form-group">
                                        <input type="text" name="cedula" class="form-control" placeholder="Cédula" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                                    </div>
                                    <div class="form-group">
                                       <select name="perfil" id="perfil" class="form-control" aria-label="Seleccione un perfil">
                                        <option selected>Seleccione un perfil</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Consulta">Consulta</option>
                                        <option value="Soporte">Soporte</option>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="passw" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="fecha" class="form-control" placeholder="Fecha" required>
                                    </div>

                                    <input type="submit" value="Guardar usuario" class="btn btn-success btn-block" name="guardar_usuario">
                                </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>

    
</body>
</html>