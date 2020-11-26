<?php
    require_once "Conexion.php";
    $conexion=mysqli_connect($host, $user, $password, $bd);
    $sql="SELECT valor,fecha_hora from mediciones";
    $result=mysqli_query($conexion,$sql);
    $valoresY=array();
    $valoresX=array(); //fechas
    
    while($ver=mysqli_fetch_row($result)){
        $valoresY[]=$ver[0];
        $valoresX[]=$ver[1];
    }

    $datosX=json_encode($valoresX);
    $datosY=json_encode($valoresY);
    
?>
<div id="graficaBarras"></div>

<script type="text/javascript">
    function crearCadenaBarras(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>

<script type="text/javascript">
    
    datosX=crearCadenaBarras('<?php echo $datosX ?>');
    datosY=crearCadenaBarras('<?php echo $datosY ?>');
    
    var data = [
{
    x: datosX,
    y: datosY,
    type: 'bar'
  }
    ];

Plotly.newPlot('graficaBarras', data);
</script>