<?php
    require 'config/config.php';
    
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Nuevo usuario</h1>
        <br>

        <div class="main-form">
            <form action="addUser.php" method="post">
            <!-- NOMBRE -->
            <label for="userNombre">
                Nombre:
            </label>
            <br>
            
            <input type="text" name="userNombre" class="input-txt" require>
            <br><br>

            <!-- APELLIDO -->
            <label for="userApellido">
                Apellido:
            </label>
            <br>
            
            <input type="text" name="userApellido" class="input-txt" require>
            <br><br>

            <!-- EMAIL -->
            <label for="userEmail">
                Correo electrónico:
            </label>
            <br>
            
            <input type="email" name="userEmail" class="input-txt" require>
            <br><br>

            <!-- CONSTRASEÑA -->
            <label for="userPass">
                Contraseña:
            </label>
            <br>
            
            <input type="password" name="userPass" class="input-txt" require>
            <br><br>

            <button class="btn-1">
                Agregar usuario
            </button>

            <a href="index.php" class="btn-lk-2">
                Volver atrás
            </a>
            </form>
        </div>
    </main>

<?php

    include 'includes/footer.php';
?>