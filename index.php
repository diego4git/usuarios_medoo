<?php
include("includes/bd.php");
include "mcript.php";
session_start();

if (isset($_POST['login'])) {

  $cedula = $_POST['cedula'];
  $password = $_POST['password'];

  $user = $database->select("usuario_tb", "*", ["id" => $cedula]);
  
  if (count($user) > 0) {

    if ($desencriptar($user[0]['passw'])===$password) {
      $_SESSION['login_user'] = $cedula;
      header("location: principal.php");
    } else {
      $error = "Error en la contraseña";
    }
  } else {
    $error = "Usuario invalido";
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PHP CRUD Clase</title>
  <!--BOOTSRRAP 4.5.2-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!--FONT AWESOME-->
  <!--https://fontawesome.com/start/confirm-- link-->
  <script src="https://kit.fontawesome.com/7c416d91d9.js" crossorigin="anonymous"></script>
</head>

<body>

  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Por favor ingrese su cédula y contraseña!</p>

                <form action="" method="post">
                  <div class="form-outline form-white mb-4">
                    <input type="text" name="cedula" id="typeEmailX" class="form-control form-control-lg" />
                    <label class="form-label" for="typeEmailX">Cédula</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX">Contraseña</label>
                  </div>

                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Olvidó la contraseña?</a></p>

                  <button class="btn btn-outline-light btn-lg px-5" name="login" type="submit">Login</button>
                </form>
                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>
              </div>
              <div>
                <p class="mb-0">No tiene cuenta? <a href="frm_usuario.php" class="text-white-50 fw-bold">Crear un usuario</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>