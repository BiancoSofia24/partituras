<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
    
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/users.php';

    $check = editarUser();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Editar un usuario</h1>
        <br>

        <?php
            $alerta = 'danger';
            $msj = 'Ups! No se pudo editar el usuario.';

            if( $check ){
                $alerta = 'success';
                $msj = '¡Usuario editado satisfactoriamente!';
            }
        ?>

        <div class="alert-<?= $alerta ?>">
            <?= $msj; ?>
        </div>
        <br><br>

        <div class="alert">
            <a href="adminUsers.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver a Usuarios
                </button>
            </a>
        </div>
    </main>

<?php

    include 'includes/footer.php';
?>