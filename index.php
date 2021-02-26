<!DOCTYPE html>
<html>

<?php
  error_reporting(0);
  session_start();
  $usuario = $_SESSION['username'];
  $rol = $_SESSION['rol'];
?>

    <head>
        <title>Sistema Silo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/main_style.css" type="text/css">
         <script src="https://kit.fontawesome.com/94ea767862.js" crossorigin="anonymous"></script>
        <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous">
        </script>
    </head>
    <body>
        <script>
            function Esconder_btn(){
                var btnSes = document.getElementById('ini_ses');
                btnSes.style.display = "none";
            }
        </script>
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
                        <li><a href="index.php"><i class="fas fa-house-user black-icon"></i>Inicio</a></li>
                        <?php
                            if($rol == "A"){
                                echo '<li><a href="Pages/Configuracion.php"><i class="fas fa-cog black-icon"></i>Configuracion</a></li>';
                            }
                        ?>
                        <li><a href="Login.php" id="ini_ses" class="ini_ses">INICIAR SESION</a><li>
                    </ul>
                </nav>
                </div>
            </div>
        </header>
        <!--End Header-->
        <?php
            if(isset($usuario))
            {
            echo "<script>Esconder_btn()</script>";
            }
        ?>
        <!--BANNER-->
        <div class="banner">
            <div class="banner-container">
                <h2>Datos en vivo</h2>
                <div id="Valores">
                
                </div>
               
                <?php
                    if($rol == "A" || $rol == "O"){
                        echo '<a href="Pages/Mediciones.php"><button class="button-banner">Mas Mediciones<i class="fas fa-chevron-right toright"></i></button></a>';   
                    }else{
                        echo '<a onclick="msg_alert()" href="#"><button class="button-banner-block">Mas Mediciones<i class="fas fa-chevron-right toright"></i></button></a>';
                    }
                    
                ?>
                
                <div class="time">
                    <h2 id="reloj">Hora actual: 00:00:00</h2>
                </div>
            </div>
        </div>
        
        <!--Start Options Section-->
        
        <?php
            if($rol == 'A'){
                echo
                '<section class="container">
                    <div class="container2">
                    <h2 class="title">Opciones</h2>
                        <div class="options-container">
                            <a href="./Pages/graficas.php" class="box">
                                <i class="fas fa-chart-bar size-icon"></i>
                                <h3>Graficos</h3>
                            </a>      
                            <a href="./Pages/Configuracion.php" class="box">
                                <i class="fas fa-cogs size-icon"></i>
                                <h3>Configuracion</h3>
                             </a>
                        </div>
                    </div>
                </section>';
            }
            if($rol == 'O'){
                echo
                '<section class="container">
                    <div class="container2">
                    <h2 class="title">Opciones</h2>
                        <div class="options-container width-container">
                            <a href="./Pages/graficas.php" class="box">
                                <i class="fas fa-chart-bar size-icon"></i>
                                <h3>Graficos</h3>
                            </a>
                            <a onclick="message()" class="box-disabled">
                            <i class="fas fa-cogs size-icon"></i>
                            <h3>Configuracion</h3>
                            </a>      
                        </div>
                    </div>
                </section>';
            }
        ?>
        
        
        <!--Start Footer-->
        <footer>
            <div class="footer-container">
                <h2>Created by <span>Grupo 4-PWD</span></h2>
            </div>
        </footer>


        <script type="text/javascript" src="JS/permisos.js"></script>
    </body>
</html>

<script>
    function message(){
        alert("Debes entrar como administrador para acceder a la configuracion");
    }
</script>

 <script type="text/javascript">
     $(document).ready(function(){
       setInterval(function(){$('#Valores').load('PruebaValores.php');},2000);                              
       });
     
     function tiempo(){
         time = new Date();
         hora = time.getHours();
         minutos = time.getMinutes();
         segundos = time.getSeconds();
         
         comprobarHora = new String(hora);
         if(comprobarHora.length == 1){
             hora = "0" + comprobarHora;
         }
         comprobarMin = new String(minutos);
         if(comprobarMin.length == 1){
             minutos = "0" + minutos;
         }
         comprobarSeg = new String(segundos);
         if(comprobarSeg.length == 1){
             segundos = "0" + segundos;
         }
         mostrarHora = hora + ":" + minutos + ":" + segundos;
         return mostrarHora;
     }
     function ActualizarTime(){
         horaActual = "Hora actual: " + tiempo();
         var miReloj = document.getElementById("reloj");
         miReloj.innerHTML = horaActual;
     }
     setInterval(ActualizarTime, 1000);
</script>