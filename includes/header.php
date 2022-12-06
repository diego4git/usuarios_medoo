<?php
include("session.php");
?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7c416d91d9.js" crossorigin="anonymous"></script>

    <nav class="nav-bar navbar-dark bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 style="color:white">Usuario: <?php echo $login_session; ?></h3>
                </div>
                <div class="col-md-4 offset-md-4">
                    <h3><a href="logout.php">Cerrar sesion</a></h3>
                </div>
            </div>
        </div>
    </nav>
