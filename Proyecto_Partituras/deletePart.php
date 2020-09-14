<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
    
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/parts.php';

    $check = eliminarPart();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Eliminar una partitura</h1>
        <br>

        <?php
            $alerta = 'danger';
            $msj = 'Ups! No se pudo eliminar la partitura.';

            if( $check ){
                $alerta = 'success';
                $msj = '¡Partitura eliminada satisfactoriamente!';
            }
        ?>

        <div class="alert-<?= $alerta ?>">
            <?= $msj; ?>
        </div>
        <br><br>

        <div class="alert">
            <a href="adminPart.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver a Partituras
                </button>
            </a>
        </div>

    </main>

<?php

    include 'includes/footer.php';
?>