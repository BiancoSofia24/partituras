<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
    
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/parts.php';
    require 'crudFunciones/catgs.php';

    $parts = verPartPorCatg( $_GET['idCategoria'] );
    $catg = verCatgPorId();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1><?= $catg['catgNombre'] ?></h1>
        <br>

        <div class="main-tbl">
            <a href="adminCatg.php" class="btn-lk-2">
                <button class="btn-2">
                    Ir a Categorías
                </button> 
            </a>

            <a href="adminPart.php" class="btn-lk-2">
                <button class="btn-2">
                    Ir a Partituras
                </button> 
            </a>
            <br><br>

            <table class="tbl">
                <thead class="tbl-head">
                    <tr>
                        <th>Partituras</th>
                        <th>Autor</th>
                        <th>Categoría</th>
                        <th>Archivo</th>
                    </tr>
                </thead>
                <tbody class="tbl-body">
                    <tr>
                    <?php
                        while ( $part = mysqli_fetch_assoc( $parts )){
                    ?>
                        <td><?= $part['partNombre']; ?></td>
                        <td>
                            <a href="autores.php?idCategoria=<?= $part['idCategoria']; ?>" class="lk">
                                <?= $part['partAutor']; ?>
                            </a>    
                        </td>
                        <td><?= $part['catgNombre'] ?></td>
                        <td>
                            <a href="archivos/<?= $part['partArchivo']; ?>">
                                <?php 
                                    $img = 'no-disponible.jpg';
                                    $archivo = $part['partArchivo'];

                                    if( $archivo == $img ){
                                        echo 'partitura-';
                                    } echo $archivo;
                                ?>
                            </a>
                        </td>
                    </tr>
                    <?php
                        };
                    ?>
                </tbody>
            </table>
            <br>

            <a href="adminCatg.php" class="btn-lk-2">
                <button class="btn-2">
                    Ir a Categorías
                </button>
            </a>

            <a href="adminPart.php" class="btn-lk-2">
                <button class="btn-2">
                    Ir a Partituras
                </button> 
            </a>

            <input type="hidden" name="idCategoria" value="<?= $part['idCategoria']; ?>">
        </div>

    </main>

<?php

    include 'includes/footer.php';
?>