<?php
    include 'Conexion.php';

    error_reporting(0); //Hide the errors reporting
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/user_create_styles.css">
    <title>User_Change</title>
</head>
<body>
    <div class="flex-container">
        <div class="container-form">
            <form method="POST">
                <!--<label for="name">ID:</label>
                <input type="text" name="id" value="" autocomplete="off" required>-->
                <label for="name">Nombre:</label>
                <input type="text" name="name" value="" autocomplete="off" required>
                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" value="" autocomplete="off" required>
                <label for="rol">rol:</label>
                <select name="rol" required autocomplete="off" id="rol-selector">
                    <option value="A">Administrador</option>
                    <option value="O">Operador</option>
                </select>

                <button name="btn_crear" class="btn">Crear usuario</button> 
            </form>
        </div>
    </div>
</body>
</html>
<?php
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $pass = $_REQUEST['pass'];
    $rol = $_REQUEST['rol'];

    if(isset($_POST['btn_crear'])){

        $query = "SELECT COUNT(*) as contar from usuarios where id_usuario = '$id'";
        $consulta = mysqli_query($conexion, $query);
        $array = mysqli_fetch_array($consulta);

        if($array['contar']>0){
            echo "<script>alert('Ya existe un usuario con ese ID');</script>";
        }
        else{
            $query = "INSERT INTO usuarios (nombre, pass, tipo_usuario) VALUES ('$name', '$pass', '$rol')";
            mysqli_query($conexion, $query);
    
            echo "<script>alert('El usuario ha sido creado correctamente');</script>";
            header('location: ../Pages/Configuracion.php');
        }

       
    }
?>