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
        <h1>Editar un usuario</h1>
        <br>

        <div class="main-form">
            <form action="editUser.php" method="post">
                <!-- NOMBRE -->
                <label for="userNombre">
                    Nombre:
                </label>
                <br>

                <input type="text" name="userNombre" class="input-txt" value="<?= $user['userNombre']; ?>" required>
                <br><br>

                <!-- APELLIDO -->
                <label for="userApellido">
                    Apellido:
                </label>
                <br>

                <input type="text" name="userApellido" class="input-txt" value="<?= $user['userApellido']; ?>" required>
                <br><br>

                <!-- EMAIL -->
                <label for="userEmail">
                    Correo electrónico:
                </label>
                <br>

                <input type="text" name="userEmail" class="input-txt" value="<?= $user['userEmail']; ?>" required>
                <br><br>

                <!-- PASS -->
                <label for="userPass">
                    Constraseña:
                </label>
                <br>

                <input type="password" name="userPass" class="input-txt" value="<?= $user['userPass']; ?>" required>
                <br><br>

                <button class="btn-1">
                    Editar usuario
                </button>
                
                <a href="adminUsers.php" class="btn-lk-2">
                    Volver a Usuarios    
                </a>

                <input type="hidden" name="idUsuario" value="<?= $user['idUsuario']; ?>">
            </form>
        </div>

    </main>

<?php

    include 'includes/footer.php';
?>