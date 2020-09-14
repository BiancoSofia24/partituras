<?php

#####################
### AUTENTICACIÓN ###
##################### 

function login()
{
    $userEmail = $_POST['userEmail'];
    $userPass = $_POST['userPass'];

    $link = conectar();
    $sql = "SELECT  userNombre,
                    userApellido
            FROM usuarios
            WHERE userEmail = '".$userEmail."'
            AND userPass = '".$userPass."'";
    
    $result = mysqli_query( $link, $sql )
            or die( $link );
    $cant = mysqli_num_rows( $result );

    if( $cant == 0 )
    {
        // ERROR DE LOGIN
        header( 'location:formLogin.php?error=1' );
    }   else
        {
            // LOGIN OK
            $_SESSION['login'] = 1;

            $data = mysqli_fetch_assoc( $result );
            $_SESSION['userNombre'] = $data['userNombre'];
            $_SESSION['userApellido'] = $data['userApellido'];

            header( 'location:admin.php' );
        }
}

function autenticar()
{
    if( !isset( $_SESSION['login'] ) )
    {
        header( 'location:formLogin.php?error=2' );
    }
}

function logout()
{
    session_destroy();

    header( 'refresh:2; url=index.php' );
}