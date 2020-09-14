<?php

#####################
### CRUD USUARIOS ###
#####################

/**
 * @return bool|mysqli_result 
 */
    function verUsers()
    {
        $link = conectar();
        $sql = "SELECT  idUsuario,
                        userNombre,
                        userApellido,
                        userEmail,
                        userPass
                FROM usuarios";

        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        return $result;
    }

    function verUserPorId()
    {
        $idUsuario = $_GET['idUsuario'];

        $link = conectar();
        $sql = "SELECT  idUsuario,
                        userNombre,
                        userApellido,
                        userEmail,
                        userPass
                FROM usuarios
                WHERE idUsuario = ".$idUsuario;
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        $user = mysqli_fetch_assoc( $result );
    
        return $user;
    }

    function agregarUser()
    {
        $userNombre = $_POST['userNombre'];
        $userApellido = $_POST['userApellido'];
        $userEmail = $_POST['userEmail'];
        $userPass = $_POST['userPass'];

        $link = conectar();
        $sql = "INSERT INTO usuarios
                VALUES
                ( DEFAULT, 
                '".$userNombre."',
                '".$userApellido."',
                '".$userEmail."',
                '".$userPass."')";
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        return $result;
    }

    function editarUser()
    {
        $idUsuario = $_POST['idUsuario'];
        $userNombre = $_POST['userNombre'];
        $userApellido = $_POST['userApellido'];
        $userEmail = $_POST['userEmail'];
        $userPass = $_POST['userPass'];

        $link = conectar();
        $sql = "UPDATE usuarios
                SET userNombre = '".$userNombre."',
                    userApellido = '".$userApellido."',
                    userEmail = '".$userEmail."',
                    userPass = '".$userPass."'
                WHERE idUsuario = ".$idUsuario;
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        return $result;
    }

    function eliminarUser()
    {
        $idUsuario = $_POST['idUsuario'];

        $link = conectar();
        $sql = "DELETE FROM usuarios
                WHERE idUsuario = ".$idUsuario;
        
        $result = mysqli_query( $link, $sql )
                or die( mysqli_error( $link ) );
        
        return $result;
    }