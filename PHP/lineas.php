<?php
    require_once "Conexion.php";
    $conexion=mysqli_connect($host, $user, $password, $bd);
    $sql="SELECT tipo_medicion,fecha_hora from mediciones";
    $result=mysqli_query($conexion,$sql);
    $valoresY=array();
    $valoresX=array(); //fechas
    
    while($ver=mysqli_fetch_row($result)){
        $valoresY[]=$ver[1];
        $valoresX[]=$ver[0];
    }

    $datosX=json_encode($valoresX);
    $datosY=json_encode($valoresY);
    
?>
<div id="graficaLineal"></div>

<script type="text/javascript">
    function crearCadenaLineal(json){
        var parsed = JSON.parse(json);
        var arr = [];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>

<script type="text/javascript">
    
    datosX=crearCadenaLineal('<?php echo $datosX ?>');
    datosY=crearCadenaLineal('<?php echo $datosY ?>');

    var trace1 = {
  x: datosX,
  y: datosY,
  mode: 'markers',
  name: 'Mediciones',
  marker: {
      color: 'rgb(164,194,244',
      size: 12,
      line: {
          color: 'white',
          width: 0.5
      },
      type: 'scatter'
  }
};


var data = [trace1];

Plotly.newPlot('graficaLineal', data);

</script>