<?php
    require 'config/config.php';
    
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/users.php';

    $check = agregarUser();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Nuevo usuario</h1>
        <br>

        <?php
            $alerta = 'danger';
            $msj = 'Ups! No se pudo agregar el usuario.';

            if( $check ){
                $alerta = 'success';
                $msj = '¡Usuario agregado satisfactoriamente!';
            }
        ?>

        <div class="alert-<?= $alerta ?>">
            <?= $msj; ?>
        </div>
        <br><br>

        <div class="alert">
            <a href="index.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver atrás
                </button>
            </a>
        </div>

    </main>

<?php

    include 'includes/footer.php';
?>