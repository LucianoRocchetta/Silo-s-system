<?php
    include 'Conexion.php';
    $id = $_GET['id_usuario'];

    $consulta = "SELECT * FROM usuarios where id_usuario = '". $id ."'";
    $ejecutar = mysqli_query($conexion, $consulta);
    $datos = mysqli_fetch_array($ejecutar); 

    error_reporting(0); //Hide the errors reporting
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/user_change_styles.css">
    <title>User_Change</title>
</head>
<body>
    <div class="flex-container">
        <div class="container-form">
            <form method="POST">
                <label for="name">Nombre:</label>
                <input type="text" name="name" value="<?php echo $datos[1] ?>" autocomplete="off">
                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" value="<?php echo $datos[2] ?>" autocomplete="off">
                <label for="rol">rol:</label>
                <select name="rol" id="rol-selector">
                    <option value="A">Administrador</option>
                    <option value="O">Operador</option>
                </select>

                <button name="btn_modificar" class="btn_modificar">Modificar</button> 
            </form>
        </div>
    </div>
</body>
</html>
<?php

    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $rol = $_POST['rol'];

    echo "$name";
    if(isset($_POST['btn_modificar'])){
        $query = "UPDATE usuarios SET nombre= '". $name ."', pass= '". $pass ."', tipo_usuario = '". $rol . "' where id_usuario = ' ". $id .  " ' ";
        mysqli_query($conexion, $query);

        echo "<script>alert('El usuario ha sido modificado correctamente');</script>";
        header('location: ../Pages/Configuracion.php');
    }

?>