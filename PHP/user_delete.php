<?php
    include 'Conexion.php';

    $id = $_GET["id_usuario"];
    echo "<br> $id";

    $query = "DELETE FROM usuarios WHERE id_usuario='".$id."'";
    mysqli_query($conexion, $query);
?>

<script type="text/javascript">
    alert("El usuario se ha eliminado correctamente");
    window.location.href="../Pages/Configuracion.php";
</script>