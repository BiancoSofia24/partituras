<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
        
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/parts.php';

    $part = verPartPorId();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Eliminar una partitura</h1>
        <br><br>

        <div class="alert-danger">
            
            Se eliminará la partitura: <span class="txt-ppral"><?= $part['partNombre']; ?></span>
            <br>

            <span class="txt-fs-20"><?= $part['catgNombre'], ' de ',  $part['partAutor']; ?></span>
            <br><br>

            <form action="deletePart.php" method="post">
                <input type="hidden" name="idPartitura" value="<?= $part['idPartitura']; ?>">
                <br>

                <button class="btn-danger">
                    Confirmar
                </button>
                <br><br>
            </form>

            <a href="adminPart.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver a Partituras
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
                    window.location = 'adminPart.php';
                }
            })
        </script>
    </main>

<?php

    include 'includes/footer.php';
?>