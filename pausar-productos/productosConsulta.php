<?php

echo '

<table style="font-size:16px;">
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Categoría</th>
		<th>Estado</th>
		<th>Acción</th>
	</tr>';

$inc = include("conexion.php");

if ($inc) {
	$consulta = "SELECT * FROM products";
	$resultado = mysqli_query($conexion, $consulta);

	if ($resultado) {
		while ($producto = $resultado->fetch_array(MYSQLI_BOTH)) {
			if($producto['enable'] == 1) {
				$producto['estado'] = "Habilitado";
				$producto['accion'] = "<button onclick='pausarProducto(".$producto['id'].");'>Pausar</button>";
			} else if($producto['enable'] == 0) {
				$producto['estado'] = "Pausado";
				$producto['accion'] = "<button onclick='pausarProducto(".$producto['id'].");'>Habilitar</button>";
			}

			echo '
			<tr>
				 <td>'.$producto['id'].'</td>
				 <td>'.$producto['name'].'</td>
				 <td>'.$producto['category'].'</td>
				 <td>'.$producto['estado'].'</td>
				 <td>'.$producto['accion'].'</td>
			</tr>';
		}
	} else {
		echo '<b>Error</b> - '.mysqli_error($conexion);
	}
}

echo '</table>';
?>
