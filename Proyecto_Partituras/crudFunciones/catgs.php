<?php

#######################
### CRUD CATEGORIAS ###
#######################

/**
 * @return bool|mysqli_result
 */
    function verCatgs()
    {
        $link = conectar();
        $sql = "SELECT  idCategoria,
                        catgNombre
                FROM categorias";
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error($link) );
        
        return $result;
    }

    function verCatgPorId()
    {
        $idCategoria = $_GET['idCategoria'];
        
        $link = conectar();
        $sql = "SELECT  idCategoria,
                        catgNombre
                FROM categorias
                WHERE idCategoria = ".$idCategoria;
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error($link) );      
        $catg = mysqli_fetch_assoc( $result );

        return $catg;
    }

    function partPorCatg()
    {
        $idCategoria = $_GET['idCategoria'];

        $link = conectar();
        $sql = "SELECT 1
                FROM partituras
                WHERE idCategoria = ".$idCategoria;
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        $cant = mysqli_num_rows( $result ); // Cantidad de partituras por categoría

        return $cant;
    }

    function agregarCatg()
    {
        $catgNombre = $_POST['catgNombre'];

        $link = conectar();
        $sql = "INSERT INTO categorias
                VALUES
                ( DEFAULT, '".$catgNombre."')";

        $result = mysqli_query( $link, $sql )
                or die( mysqli_error($link) );
        
        return $result;
    }

    function editarCatg()
    {
        $idCategoria = $_POST['idCategoria'];
        $catgNombre = $_POST['catgNombre'];

        $link = conectar();
        $sql = "UPDATE categorias
                SET catgNombre = '".$catgNombre."'
                WHERE idCategoria = ".$idCategoria;

        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        return $result;
    }

    function eliminarCatg()
    {
        $idCategoria = $_POST['idCategoria'];

        $link = conectar();
        $sql = "DELETE FROM categorias
                WHERE idCategoria = ".$idCategoria;
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        return ($result);
    }
