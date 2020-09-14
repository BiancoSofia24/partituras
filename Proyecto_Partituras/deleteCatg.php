<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
    
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/catgs.php';

    $check = eliminarCatg();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Eliminar una categoría</h1>
        <br>

        <?php
            $alerta = 'danger';
            $msj = 'Ups! No se pudo eliminar la categoría.';

            if( $check ){
                $alerta = 'success';
                $msj = '¡Categoría eliminada satisfactoriamente!';
            }
        ?>

        <div class="alert-<?= $alerta ?>">
            <?= $msj; ?>
        </div>
        <br><br>

        
        <div class="alert">
            <a href="adminCatg.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver a Categorías
                </button>
            </a>
        </div>
    </main>

<?php

    include 'includes/footer.php';
?>