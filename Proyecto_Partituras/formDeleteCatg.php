<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
        
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/catgs.php';

    $cant = partPorCatg();

    if( $cant == 0 ){
        $catg = verCatgPorId();
    }

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Eliminar una categoría</h1>
        <br><br>

        <?php 
            if( $cant > 0 ){
        ?>

        <div class="alert-danger">
            No se puede eliminar la categoría selecionada, ya que tiene partituras relacionadas.
            <br><br>

            <a href="adminCatg.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver a Categorías
                </button> 
            </a>
        </div>

        <?php
            } else {
        ?>

        <div class="alert-danger">
            Se eliminará la categoría: <span class="txt-ppral"><?= $catg['catgNombre']; ?></span>
            
            <form action="deleteCatg.php" method="post">
                <input type="hidden" name="idCategoria" value="<?= $catg['idCategoria']; ?>">
                <br>

                <button class="btn-danger">
                    Confirmar
                </button>
                <br><br>
            </form>

            <a href="adminCatg.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver a Categorías
                </button>
            </a>        
        </div>
        
        <script>
            // Ventana de sweetalert
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(165, 50, 50)',
                confirmButtonText: 'Sí, la quiero eliminar.',
                cancelButtonText: 'No la quiero eliminar'
            }).then((result) => {
                if(!result.value){
                    // Redirecciona a admin
                    window.location = 'adminCatg.php';
                }
            })
        </script>

        <?php
            };
        ?>
    </main>

<?php

    include 'includes/footer.php';
?>