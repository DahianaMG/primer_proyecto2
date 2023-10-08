<?php
include("conexion.php");
$message = $_GET["message"];
$sql = "select * from usuarios";
$resultado = mysqli_query($conexion, $sql)
    ?>

<hr class="hr">
<div class="alargar">
    <section class="container">
        <div class="row">
            <?php
            if ($message == 'Datos actualizados correctamente.') { ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $message; ?>
                </div>
                <?php
                $message = "";
            } elseif ($messageeliminar == "Se eliminó el registro.") { ?>
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $messageeliminar; ?>
                </div>
                <?php
                $messageeliminar = "";
            } ?>
            <h2 class="text-primary">Tabla de usuarios</h2>
        </div>
        <hr class="hr">
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Baja</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $filas['id_usuario'] ?>
                        </th>
                        <td>
                            <?php echo $filas['nombre'] ?>
                        </td>
                        <td>
                            <?php echo $filas['apellido'] ?>
                        </td>
                        <td>
                            <?php echo $filas['email'] ?>
                        </td>
                        <td>
                            <?php echo $filas['usuario'] ?>
                        </td>
                        <?php if ($filas['perfil_id'] == 1): ?>
                            <td>
                                Administrador
                            </td>
                        <?php else: ?>
                            <td>
                                Cliente
                            </td>
                        <?php endif; ?>
                        <td>
                            <?php echo $filas['baja'] ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary p-1 text-white">
                                <a class="text-white" href="editar?id=<?php echo $filas['id_usuario']; ?>"><i
                                        class="fa-solid fa-user-pen fa-lg"></i></a>
                            </button>
                            <?php if ($filas['perfil_id'] == 2) { ?>
                                <button type="button" class="btn btn-primary p-1" data-bs-toggle="modal"
                                    data-bs-target="#<?php echo $filas['id_usuario']; ?>">
                                    <i class="fa-solid fa-user-minus fa-lg text-light"></i></a>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo $filas['id_usuario']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content text-bg-primary">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Está seguro de que desea eliminar el registro?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-info">
                                                    <a class="link-dark link-underline link-underline-opacity-0"
                                                        href="eliminar?id=<?php echo $filas['id_usuario']; ?>">Confirmar</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        mysqli_close($conexion);
        ?>
    </section>
    <hr class="hr">