<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
    require 'crudFunciones/conexion.php';
    require 'crudFunciones/parts.php';

    $parts = verParts();

    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Autores</h1>

        <div class="main-tbl">
            <a href="admin.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver al inicio
                </button> 
            </a>

            <select name="filtro" class="btn-flt">
                <option value="">Sin filtro</option>

                <option value="1">Ordenar A-Z</option>

                <option value="2">Ordenar Z-A</option>
            </select>

            <br><br>

            <table class="tbl">
                <thead class="tbl-head">
                    <tr>
                        <th>Autor</th>
                        <th>Partitura</th>
                        <th>Categoría</th>
                        <th>Archivo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="tbl-body">
                <?php
                    while( $part = mysqli_fetch_assoc( $parts ) ){
                ?>
                    <tr>
                        <td>
                            <a href="autores.php?idCategoria=<?= $part['idCategoria']; ?>" class="lk">
                                <?= $part['partAutor']; ?>
                            </a>    
                        </td>
                        <td><?= $part['partNombre']; ?></td>
                        <td>
                            <a href="biblioteca.php?idCategoria=<?= $part['idCategoria']; ?>" class="lk">
                                <?= $part['catgNombre']; ?>
                            </a>
                        </td>
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
                        <td>
                            <a href="formEditPart.php?idPartitura=<?= $part['idPartitura']; ?>" class="btn-lk-2">
                                <button class="btn-2">
                                    Modificar
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php
                    };  
                ?>
                </tbody>
            </table>
            <br>

            <a href="admin.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver al inicio
                </button>
            </a>
        </div>
        <br>
    </main>

<?php

    include 'includes/footer.php';
?>