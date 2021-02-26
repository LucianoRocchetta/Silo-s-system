<html>

    <?php 
        include('../PHP/Conexion.php');
        session_start();
        $usuario = $_SESSION['username'];
        $rol = $_SESSION['rol'];
    ?>


    <head>
        <title>Sistema Silo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/main_style.css" type="text/css">
         <script src="https://kit.fontawesome.com/94ea767862.js" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="../CSS/mediciones_styles.css" type="text/css">
    </head>
    <body>
 
        <!--Start Header-->
        <?php
        if(isset($usuario)){
        echo "<div class='container-login'><h4>Usuario: $usuario</h4><a href='PHP/logout.php' class='salir_btn'>Salir</a></div>";
        }
        ?>
        <header>
          
            <div class="container">
                <div class="flex">
                <h2>Sistema Silo</h2>
                <nav>
                    <ul>
                        <li><a href="../index.php"><i class="fas fa-house-user"></i>Inicio</a></li>
                        <?php
                            if($rol == "A"){
                                echo '<li><a href="./Configuracion.php"><i class="fas fa-cog black-icon"></i>Configuracion</a></li>';
                            }
                        ?>
                    </ul>
                </nav>
                </div>
            </div>
        </header>
        <!--End Header-->
        <section class="mediciones">
            <h2 class="title">Mediciones Anteriores (BD)</h2>
            <div class="browser">
                <h2>Fecha / Hora de Medicion: </h2>
                <div class="center">
                    <form action="" method="post">
                    <input type="date" name="date">
                    <input type="submit" value="Buscar" id="btn-submit"></input>
                    </form>
                </div>



                <?php
                    $date = $_POST['date'];
                    echo $date;
                ?>

                
                <div class="table-container">
                    <table class="table">
                        <thead>
                        <th>ID</th>
                        <th>Tipo de Medicion</th>
                        <th>Valor</th>
                        <th>Fecha/Hora</th>
                        </thead>
                        <tbody>
                           <?php

                            if($date != null){
                                $datoWithDate = "SELECT * FROM mediciones WHERE fecha_hora = '".$date."'";
                                $query = mysqli_query($conexion, $datoWithDate);
                                while($row=mysqli_fetch_array($query)){
                                    ?>
                                     <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['tipo_medicion']?></td>
                                        <td><?php echo $row['valor']?></td>
                                        <td><?php echo $row['fecha_hora']?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else{
                            $datos="SELECT * FROM mediciones";
                            $ejecutar=mysqli_query($conexion, $datos);
                            while($row=mysqli_fetch_array($ejecutar))
                            {
                            ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['tipo_medicion']?></td>
                                <td><?php echo $row['valor']?></td>
                                <td><?php echo $row['fecha_hora']?></td>
                            </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="container-exp">
            <div>
                <a href="pdf.php">
                    <button>Exportar</button>
                </a>
            </div>
        </section>
        
      
        <!--Start Footer-->
        <footer>
            <div class="footer-container">
                <h2>Created by <span>Grupo 4-PWD</span></h2>
            </div>
        </footer>
        
    </body>
</html>