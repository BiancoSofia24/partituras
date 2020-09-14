<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
    
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/users.php';

    $user = verUserPorId();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Eliminar un usuario</h1>
        <br><br>

        <div class="alert-danger">
            
            Se eliminará el usuario: <span class="txt-ppral"><?= $user['userNombre'], ' ', $user['userApellido']; ?></span>
            <br><br>
            Correo electrónico: <?= $user['userEmail']; ?>

            <form action="deleteUser.php" method="post">
                <input type="hidden" name="idUsuario" value="<?= $user['idUsuario']; ?>">
                <br>

                <button class="btn-danger">
                    Confirmar
                </button>
                <br><br>
            </form>

            <a href="adminUsers.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver a Usuarios
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
                confirmButtonText: 'Sí, lo quiero eliminar.',
                cancelButtonText: 'No lo quiero eliminar'
            }).then((result) => {
                if(!result.value){
                    // Redirecciona a admin
                    window.location = 'adminUsers.php';
                }
            })
        </script>
    </main>

<?php

    include 'includes/footer.php';
?>