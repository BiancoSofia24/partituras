<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
        
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/catgs.php';

    $catgs = verCatgs();
    $catg = verCatgPorId();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Editar una categoría</h1>
        <br>

        <div class="main-form">
            <form action="editCatg.php" method="post">
                <!-- NOMBRE -->
                <label for="catgNombre">
                    Categoría:
                </label>
                <br>

                <input type="text" name="catgNombre" class="input-txt" value="<?= $catg['catgNombre']; ?>" required>
                <br><br>

                <button class="btn-1">
                    Editar categoría
                </button>
                
                <a href="adminCatg.php" class="btn-lk-2">
                    Volver a Categorías    
                </a>

                <input type="hidden" name="idCategoria" value="<?= $catg['idCategoria']; ?>">
            </form>
        </div>

    </main>

<?php

    include 'includes/footer.php';
?>