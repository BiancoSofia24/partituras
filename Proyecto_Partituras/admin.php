<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();
        
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Banco de Partituras</h1>

        <div class="contenedor">
            <div class="catg">
                <div class="placa-1">
                    <a href="adminCatg.php" class="catg-lk">Categorías</a>
                </div>
            </div>

            <div class="part">
                <div class="placa-2">
                    <a href="adminPart.php" class="part-lk">Partituras</a>
                </div>
            </div>
        </div>

        <div class="contenedor">
            <div class="autor">
                <div class="placa-3">
                    <a href="adminAutor.php" class="autor-lk">Autores</a>
                </div>
            </div>
        </div>

    </main>

<?php

    include 'includes/footer.php';
?>


<!--
                <th>ID</th>
                <th>Categoría</th>
                <th colspan="2">
                    <a href="#">Agregar</a>
                </th>

-->