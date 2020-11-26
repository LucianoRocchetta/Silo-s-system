<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=mediciones.xls');

	require_once('../PHP/Conexion.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="SELECT * FROM mediciones";
	$result=mysqli_query($link, $query);
?>

<table border="1">
	<tr>
		<th>ID</th>
		<th>Tipo medicion</th>
		<th>Valor</th>
		<th>Fecha y hora</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['tipo_medicion']; ?></td>
					<td><?php echo $row['valor']; ?></td>
					<td><?php echo $row['fecha_hora']; ?></td>
				</tr>	
			<?php
		}

	?>
</table>