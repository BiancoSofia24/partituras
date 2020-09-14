<a href="#">
    <div class="btn">SUBIR</div>
</a>

<nav>
    <ul class="menu-nav">
        <?php
            if( !isset( $_SESSION['login'] ) )
            {
        ?>
        <li>
            <a href="index.php">
                MIS PARTITURAS
            </a>
        </li>
        <?php
            }   else
                {
        ?>
        <li>
            <a href="admin.php">
                MIS PARTITURAS
            </a>
        </li>
        <?php
            };
        ?>
        <li>
            <a href="adminCatg.php">
                CATEGORIAS
            </a>
        </li>     
        <li>
            <a href="adminPart.php">
                PARTITURAS
            </a>
        </li>
        <li>
            <a href="adminAutor.php">
                AUTORES
            </a>
        </li>
        <li>
            <a href="adminUsers.php">
                USUARIOS
            </a>
        </li>
        <?php
            if( !isset( $_SESSION['login'] ) )
            {
        ?>
            <li class="ingreso">
                <a href="formLogin.php" class="ingresoLink">
                    Ingresar
                </a>
                <ul class="submenu">
                    <li>
                        <a href="formAddUser.php">
                            Crear usuario
                        </a>
                    </li>
                </ul>
            </li>
        <?php
            }   else
                {
        ?>
            <li>
                <?= $_SESSION['userNombre'], ' ', $_SESSION['userApellido']; ?>
                <ul class="submenu">
                    <li>
                        <a href="logout.php">
                            Salir
                        </a>
                    </li>
                </ul>
            </li>
        <?php
            };
        ?>
        </ul>

</nav>

<div class="relleno"></div>