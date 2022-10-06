<?php

$inc = include("conexion.php");

if ($inc) {
	$id = $_POST['id'];

	$consulta = "SELECT * FROM products WHERE id = '$id'";
	$resultado = mysqli_query($conexion, $consulta);

	if ($resultado) {
		$row=mysqli_fetch_assoc($resultado);

		// Verifica si el producto esta habilitado o no
    	if($row['enable'] == 1) {
    		$value = 0;
    	} else {
    		$value = 1;
    	}

    	// Ejecuta la accion
    	$consulta="UPDATE products SET enable='$value' WHERE id=$id";
    	$resultado = mysqli_query($conexion, $consulta);

    	if($resultado) {
    		echo "Producto actualizado";
    	} else {
    		echo '<b>Error</b> - '.mysqli_error($conexion);
    	}
	} else {
		echo '<b>Error</b> - '.mysqli_error($conexion);
	}
}

?>
