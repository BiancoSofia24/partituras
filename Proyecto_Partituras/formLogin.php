<?php
    require 'config/config.php';
    
    include 'includes/header.html';
    include 'includes/nav.php';
?>

    <main>
        <h1>Ingreso</h1>
        <br>

        <div class="main-form">
            <form action="login.php" method="post">
                <label for="userEmail">
                    Usuario:
                </label>
                <br>

                <input type="email" name="userEmail" class="input-txt">
                <br><br>

                <label for="userPass">
                    Contraseña:
                </label>
                <br>

                <input type="password" name="userPass" class="input-txt">
                <br><br>

                <button class="btn-1">
                    Ingresar
                </button>
            </form>
        </div>

        <?php
            if( isset( $_GET['error'] ) ){
                $error = $_GET['error'];

                $title = '¡Error en el login!';
                $sms = 'Usuario y/o contraseña incorrectos';

                if( $error == 2 )
                {
                    $title = '¡Error de ingreso!';
                    $sms = 'Debe estar logueado para continuar';
                }
        ?>
            <script>
                Swal.fire(
                    '<?= $title ?>',
                    '<?= $sms ?>',
                    'error'
                )
            </script>
        <?php
            };
        ?>
    </main>

<?php

    include 'includes/footer.php';
?>