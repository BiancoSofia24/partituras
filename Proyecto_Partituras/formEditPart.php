<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
    
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/catgs.php';
    require 'crudFunciones/parts.php';

    $catgs = verCatgs();
    $part = verPartPorId();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Editar una partitura</h1>
        <br>

        <div class="main-form">
            <form action="editPart.php" method="post" enctype="multipart/form-data">
                <!-- NOMBRE -->
                <label for="partNombre">
                    Nombre de la partitura:
                </label>
                <br>

                <input type="text" name="partNombre" class="input-txt" value="<?= $part['partNombre']; ?>" required>
                <br><br>

                <!-- AUTOR -->
                <label for="partAutor">
                    Autor de la partitura:
                </label>
                <br>

                <input type="text" name="partAutor" class="input-txt" value="<?= $part['partAutor']; ?>" required>
                <br><br>

                <!-- CATEGORIA -->
                <label for="idCategoria">
                    Categoría:
                </label>
                <br>

                <select name="idCategoria" class="input-txt" required>
                    <option value="<?= $part['idCategoria'] ?>"><?= $part['catgNombre'] ?></option>
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
                <br><br>

                <object data="archivos/<?= $part['partArchivo']; ?>" class="input-file" name="archivoPrev"></object>
                <input type="file" name="partArchivo" class="input-txt">
                <br><br>

                <button class="btn-1">
                    Editar partitura
                </button>
                
                <a href="adminPart.php" class="btn-lk-2">
                    Volver a Partituras    
                </a>
                
                <input type="hidden" name="idPartitura" value="<?= $part['idPartitura']; ?>">
                <input type="hidden" name="archivoPrev" value="<?= $part['partArchivo']; ?>">
            </form>
        </div>

    </main>

<?php

    include 'includes/footer.php';
?>