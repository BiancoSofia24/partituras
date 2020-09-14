<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
    
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/catgs.php';
    
    $catgs = verCatgs();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Nueva partitura</h1>
        <br>

        <div class="main-form">
            <form action="addPart.php" method="post" enctype="multipart/form-data">
                <!-- NOMBRE -->
                <label for="partNombre">
                    Nombre de la partitura:
                </label>
                <br>

                <input type="text" name="partNombre" class="input-txt" required>
                <br><br>

                <!-- AUTOR -->
                <label for="partAutor">
                    Autor de la partitura:
                </label>
                <br>

                <input type="text" name="partAutor" class="input-txt" required>
                <br><br>

                <!-- CATEGORIA -->
                <label for="idCategoria">
                    Categoría:
                </label>
                <br>

                <select name="idCategoria" class="input-txt" required>
                    <option value="">Seleccione una categoría</option>
                <?php
                    while( $catg = mysqli_fetch_assoc( $catgs ) ){
                ?>
                    <option value="<?= $catg['idCategoria']; ?>"><?= $catg['catgNombre']; ?></option>
                <?php
                    };
                ?>
                </select>
                <br><br>

                <!-- ARCHIVO -->
                <label for="partArchivo">
                    Archivo:
                </label>
                <br>

                <input type="file" name="partArchivo" class="input-txt">
                <br><br>

                <button class="btn-1">
                    Agregar partitura
                </button>
                
                <a href="adminPart.php" class="btn-lk-2">
                    Volver a Partituras    
                </a>
            </form>
        </div>

    </main>

<?php

    include 'includes/footer.php';
?>