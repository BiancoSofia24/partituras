<?php
    require 'config/config.php';
    require 'crudFunciones/aut.php';
        autenticar();

    require 'crudFunciones/conexion.php';
    require 'crudFunciones/users.php';

    $users = verUsers();

    include 'includes/header.html';
    include 'includes/nav.php';
?>
    <main>
        <h1>Usuarios</h1>

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
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th colspan="2">
                            <a href="formAddUser.php" class="btn-lk">
                                <button class="btn-1">
                                    Agregar
                                </button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody class="tbl-body">
                <?php
                    while( $user = mysqli_fetch_assoc( $users ) ){
                ?>
                    <tr>
                        <td><?= $user['userNombre']; ?></td>
                        <td><?= $user['userApellido']; ?></td>
                        <td><?= $user['userEmail']; ?></td>
                        <td><?= $user['userPass']; ?></td>
                        <td>
                            <a href="formEditUser.php?idUsuario=<?= $user['idUsuario']; ?>" class="btn-lk-2">
                                <button class="btn-2">
                                    Modificar
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="formDeleteUser.php?idUsuario=<?= $user['idUsuario']; ?>" class="btn-lk-2">
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
    </main>

<?php
    include 'includes/footer.php';
?>