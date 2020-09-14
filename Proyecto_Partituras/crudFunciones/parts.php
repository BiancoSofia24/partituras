<?php

#######################
### CRUD PARTITURAS ###
#######################

/**
 * @return bool|mysqli_result
 */
    function verParts()
    {
        $link = conectar();
        $sql = "SELECT  idPartitura,
                        partNombre,
                        partAutor,
                        p.idCategoria, catgNombre,
                        partArchivo
                FROM partituras p, categorias c
                WHERE c.idCategoria = p.idCategoria";
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error($link) );
        
        return $result;
    }

    function verPartPorCatg()
    {
        $idCategoria = $_GET['idCategoria'];

        $link =  conectar();
        $sql = "SELECT  idPartitura,
                        partNombre,
                        partAutor,
                        p.idCategoria, catgNombre,
                        partArchivo
                FROM partituras p, categorias c
                WHERE c.idCategoria = p.idCategoria
                AND p.idCategoria = ".$idCategoria;

        $result = mysqli_query( $link, $sql )
                or die( mysqli_error($link) );

        return $result;
    }

    function verAutorPorCatg()
    {
        $idCategoria = $_GET['idCategoria'];

        $link = conectar();
        $sql = "SELECT  partAutor,
                        p.idCategoria
                FROM partituras p, categorias c
                WHERE c.idCategoria = p.idCategoria
                AND p.idCategoria = ".$idCategoria;

        $result = mysqli_query( $link, $sql )
                or die( mysqli_error($link) );
        
        $autor = mysqli_fetch_assoc( $result );

        return $autor;


    }

    function verPartPorId()
    {
        $idPartitura = $_GET['idPartitura'];
        
        $link = conectar();
        $sql = "SELECT  idPartitura,
                        partNombre,
                        partAutor,
                        p.idCategoria, catgNombre,
                        partArchivo
                FROM partituras p, categorias c
                WHERE c.idCategoria = p.idCategoria
                AND idPartitura = ".$idPartitura;
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        $part = mysqli_fetch_assoc( $result );

        return $part;

        }

    function subirArchivo()
    {
        $ruta = 'archivos/';
        $partArchivo = 'no-disponible.jpg'; // SI NO AGREGA

        if( isset( $_POST['archivoPrev'] ) ){ // SI SE MODIFICA
            $partArchivo = $_POST['archivoPrev'];
        }

        if( $_FILES['partArchivo']['error'] == 0 ){ // SI ENVIAN
            $partArchivo = $_FILES['partArchivo']['name'];
            $temporal = $_FILES['partArchivo']['tmp_name'];

            move_uploaded_file( $temporal, $ruta.$partArchivo );
        }

        return $partArchivo;
    }

    function agregarPart()
    {
        $partNombre = $_POST['partNombre'];
        $partAutor = $_POST['partAutor'];
        $idCategoria = $_POST['idCategoria'];
        $partArchivo = subirArchivo();

        $link = conectar();
        $sql = "INSERT INTO partituras
                VALUES
                ( DEFAULT,
                '".$partNombre."',
                '".$partAutor."',
                ".$idCategoria.",
                '".$partArchivo."')";
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        return $result;
    }

    function editarPart()
    {
        $idPartitura = $_POST['idPartitura'];
        $partNombre = $_POST['partNombre'];
        $partAutor = $_POST['partAutor'];
        $idCategoria = $_POST['idCategoria'];
        $partArchivo = subirArchivo();

        $link = conectar();
        $sql = "UPDATE partituras
                SET partNombre = '".$partNombre."',
                    partAutor = '".$partAutor."',
                    idCategoria = ".$idCategoria.",
                    partArchivo = '".$partArchivo."'
                WHERE idPartitura = ".$idPartitura;
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        return $result;
    }

    function eliminarPart()
    {
        $idPartitura = $_POST['idPartitura'];

        $link = conectar();
        $sql = "DELETE FROM partituras
                WHERE idPartitura = ".$idPartitura;

        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        return $result;
    }
