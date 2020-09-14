<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Nueva categoría</h1>
        <br>

        <div class="main-form">
            <form action="addCatg.php" method="post">
                <!-- NOMBRE -->
                <label for="catgNombre">
                    Categoría:
                </label>
                <br>

                <input type="text" name="catgNombre" class="input-txt" required>
                <br><br>

                <button class="btn-1">
                    Agregar categoría
                </button>
                
                <a href="adminCatg.php" class="btn-lk-2">
                    Volver a Categorías    
                </a>
            </form>
        </div>

    </main>

<?php

    include 'includes/footer.php';
?>