<html>
    <?php
    include('../PHP/Conexion.php');

    session_start();
    $usuario = $_SESSION['username'];

    
    ?>
    <head>
        <title>Sistema Silo</title>
        <meta charset="utf-8">
         <script src="https://kit.fontawesome.com/94ea767862.js" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="../CSS/configuration_style.css" type="text/css">


    </head>
    <body>
 
        <!--Start Header-->
        <header>
            <div class="container">
                <div class="flex">
                <h2>Sistema Silo</h2>
                <nav>
                    <ul>
                        <li><a href="../index.php"><i class="fas fa-house-user"></i>Inicio</a></li>
                        <li><a href="#"><i class="fas fa-cog"></i>Configuracion</a></li>
                    </ul>
                </nav>
                </div>
            </div>
        </header>
        <!--End Header-->

        <!--Start Users-Control-Panel-->

        <section>
            <div class="container">
                <div class="users-panel">
                    <h2>Control de Usuarios</h2><hr>
                        <div class="container-btn">
                            <a href="../PHP/user_create.php" class="btn-agregar">Agregar un nuevo usuario</a>
                        </div>
                    <div class="table-container">
                    <table class="table">
                        <thead>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Contraseña</th>
                        <th>Rol</th>
                        <th>Opciones</th>
                        </thead>
                        <tbody>
                           <?php
                            $datos="SELECT * FROM usuarios";
                            $ejecutar=mysqli_query($conexion, $datos);
                            $usuarioLowerCase = strtolower($usuario);
                            while($row=mysqli_fetch_array($ejecutar))
                            {
                            ?>
                            <tr>
                                <td><?php echo $row['id_usuario']?></td>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['pass']?></td>
                                <td><?php echo $row['tipo_usuario']?></td>
                                <td><?php if($usuario == $row['nombre'] || $usuarioLowerCase == strtolower($row['nombre'])){ echo "
                                        Este usuario no puede ser Modificado/Eliminado
                                ";}else{
                                    echo "
                                    <a href='../PHP/user_change.php?id_usuario=".$row['id_usuario']."'><button class='btn_modificar'>Modificar</button></a>
                                    <a href='../PHP/user_delete.php?id_usuario=".$row['id_usuario']."'><button class='btn_eliminar'>Eliminar</button></a>
                                    ";
                                }
                                
                                ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                </div>
            </div>

        </section>

        <!--End Users-Control-Panel-->
      
        <!--Start Footer-->
        <footer>
            <div class="footer-container">
                <h2>Created by <span>Grupo 4-PWD</span></h2>
            </div>
        </footer>
        


    </body>
</html>