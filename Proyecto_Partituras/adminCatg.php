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
        <h1>Categorías</h1>

        <div class="main-tbl">
            <a href="admin.php" class="btn-lk-2">
                <button class="btn-2">
                    Volver al inicio
                </button>
            </a>            
            <br><br>

            <table class="tbl">
                <thead class="tbl-head">
                    <tr>
                        <th>Categoría</th>
                        <th colspan="2">
                            <a href="formAddCatg.php" class="btn-lk">
                                <button class="btn-1">
                                    Agregar
                                </button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="tbl-body">
                <?php
                    while( $catg = mysqli_fetch_assoc( $catgs ) ){
                ?>
                    <tr>
                        <td>
                            <a href="biblioteca.php?idCategoria=<?= $catg['idCategoria']; ?>" class="lk">
                                <?= $catg['catgNombre']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="formEditCatg.php?idCategoria=<?= $catg['idCategoria']; ?>" class="btn-lk-2">
                                <button class="btn-2">
                                    Modificar
                                </button>
                            </a>  
                        </td>
                        <td>
                            <a href="formDeleteCatg.php?idCategoria=<?= $catg['idCategoria']; ?>" class="btn-lk-2">
                                <button class="btn-2">
                                    Eliminar
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