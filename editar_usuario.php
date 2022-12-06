<?php

include("includes/bd.php");
include("session.php");
include("includes/header.php");
?>

<?php

if (isset($_GET['cedula']) && isset($_SESSION['login_user'])) {
    $cedula = $_GET['cedula'];

    $result = $database->select("usuario_tb", "*", ["id" => $cedula]);

    if (count($result) == 1) {
        $nombre = $result[0]['nombre'];
        $perfil = $result[0]['perfil'];
        $passw = $result[0]['passw'];
        $fecha = $result[0]['fecha'];
    }
}
?>
<?php

if (isset($_POST['actualizar'])) {
    $cedula = $_GET['cedula'];
    $nombre = $_POST['nombre'];
    $perfil = $_POST['perfil'];
    $passw = $_POST['passw'];
    $fecha = $_POST['fecha'];

    $result = $database->update("usuario_tb", [
        "nombre" => $nombre,
        "perfil" => $perfil,
        "passw" => $passw,
        "fecha" => $fecha
    ], [
        "id" => $cedula
    ]);

    if (!$result) {
        die("Query failed");
    }

    $_SESSION['mensaje'] = "Usuario actualizado";
    $_SESSION['mensaje_tipo'] = "warning";
    $_SESSION['login_user'] = $login_session;

    header("Location: principal.php");
}
?>

<main class="container p-2 align-items-center">
    <section class="card bg-dark text-white" style="border-radius:1rem;">
        <div class="card-body p-5 text-center">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-body">
                        <form action="editar_usuario.php?cedula=<?php echo $_GET['cedula'] ?>" method="post">
                            <div class="form-group">
                                <input type="text" name="cedula" disabled value="<?php echo $_GET['cedula'] ?>" class="form-control" placeholder="Cédula" autofocus required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nombre" value="<?php echo $nombre ?>" class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <select name="perfil" value="<?php echo $perfil ?>" id="perfil" class="form-control" aria-label="Seleccione un perfil">
                                    <?php if ($perfil == "Administrador") { ?>
                                        <option selected value="Administrador">Administrador</option>
                                        <option value="Consulta">Consulta</option>
                                        <option value="Soporte">Soporte</option>
                                    <?php } else if ($perfil == "Consulta") { ?>
                                        <option selected value="Consulta">Consulta</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Soporte">Soporte</option>
                                    <?php   } else { ?>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Consulta">Consulta</option>
                                        <option selected value="Soporte">Soporte</option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="password" name="passw" value="<?php echo $passw ?>" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="date" name="fecha" value="<?php echo $fecha ?>" class="form-control" placeholder="Fecha" required>
                            </div>
                            <input type="submit" value="Actualizar usuario" class="btn btn-success btn-block" name="actualizar">
                            <input type="button" class="btn btn-success btn-block" onclick="history.back()" name="Atras" value="Atrás">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>