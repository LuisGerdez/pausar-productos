<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript">

		function mostrarProductos() {
			var tabla = $.ajax({
				url: 'productosConsulta.php',
				dataType: 'text',
				async:false
			}).responseText;

			document.getElementById("container_productos").innerHTML = tabla;
		}

		function pausarProducto(id) {
			$.ajax({
				type: 'POST',
				url: 'productosPausar.php',
				data: {
					id: id
				},

				success: function(r) {		
					console.log(r);

					mostrarProductos();
				}
			});
		}

		document.addEventListener('DOMContentLoaded', function() {
			mostrarProductos();
		});

	</script>
</head>

<body>
	<h1>Productos</h1>

	<div id="container_productos"></div>
</body>
</html>




