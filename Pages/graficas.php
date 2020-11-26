<!DOCTYPE html>
<html>
    <?php
        error_reporting(0);
        session_start();
        $usuario = $_SESSION['username'];
        $rol = $_SESSION['rol'];
      
    ?>



<head>
    <title> Graficas </title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/plotly-latest.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../CSS/graphics_style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/main_style.css">
    <script src="https://kit.fontawesome.com/94ea767862.js" crossorigin="anonymous"></script>
    <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous">
    </script>
</head>
<body>
    <!--Start Header-->
        <?php
            if(isset($usuario)){
                echo "<div class='container-login'><h4>Usuario: $usuario</h4><a href='../PHP/logout.php' class='salir_btn'>Salir</a></div>";
            }
        ?>
        <header>
            <div class="container">
                <div class="flex">
                <h2>Sistema Silo</h2>
                <nav>
                    <ul>
                        <li><a href="../index.php"><i class="fas fa-house-user black-icon"></i>Inicio</a></li>
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



    <!--START GRAPHICS SECTION -->
    <section>
        <div class="center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel panel-heading">
                            Graficas Silo
                        </div>
                            <div class="panel panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="cargaBarras"></div> 
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="cargaLineal">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="cargaCirculo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END GRAPHICS SECTION-->

    <!--Start Footer-->
    <footer>
            <div class="footer-container">
                <h2>Created by <span>Grupo 4-PWD</span></h2>
            </div>
    </footer>
    <!--END FOOTER-->


</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#cargaBarras').load('../PHP/barras.php');
        $('#cargaLineal').load('../PHP/lineas.php');
    })
</script>