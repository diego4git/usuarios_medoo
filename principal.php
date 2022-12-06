<?php
include_once("includes/bd.php");
include_once("session.php");
include("includes/header.php");
?>

<main class="container p-4">
    <div class="row">
        <section class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Perfil</th>
                            <th>Fecha</th>
                            <th></th>
                            <th>
                                <a href="frm_usuario.php" class="btn btn-primary">
                                    <i class="far fa-save"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $database->select("usuario_tb", "*");
                        for ($i = 0; $i < count($result); $i++) {   ?>
                            <tr>
                                <td><?php echo $result[$i]['id'] ?></td>
                                <td><?php echo $result[$i]['nombre'] ?></td>
                                <td><?php echo $result[$i]['perfil'] ?></td>
                                <td><?php echo $result[$i]['fecha'] ?></td>
                                <td>
                                    <a href="editar_usuario.php?cedula=<?php echo $result[$i]['id']; ?>" class="btn btn-secondary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="eliminar_usuario.php?cedula=<?php echo $result[$i]['id']; ?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php

                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </section>
    </div>
</main>

<?php
include("includes/footer.php");
?>