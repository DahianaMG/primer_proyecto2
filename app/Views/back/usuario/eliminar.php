<?php
$id = $_GET['id'];
include("conexion.php");

//eliminar registro
$sql = "delete from usuarios where id_usuario = '" . $id . "'";
$resultado = mysqli_query($conexion, $sql);
if ($resultado) {
    $messageeliminar = "";
    $messageeliminar = "Se eliminó el registro.";
    //echo "<script language='Javascript'>
    //location.assign('editar_usuarios');
    //</script>";
    echo "<script>window.location.href='editar_usuarios?message=$messageeliminar';</script>";
} else {
    $messageeliminar = "";
    $messageeliminar = "No se pudo eliminar el registro.";
    echo "<script>window.location.href='editar_usuarios?message=$messageeliminar';</script>";
}
?>

<div class="alargar">
    <hr class="hr" />

    <section>

    </section>
    <hr class="hr">