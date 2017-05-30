<?php
	include_once '../controllers/updatecontroller.php';


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Pizza</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/css/style.css">
	<script src="../assets/js/cargarTabla.js"></script>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-m-12"></div>
		<div class="navbar-header">
					<h1><center>Carrito De Compras</center></h1>
					<a href="registrocliente.php" title="carrito de compras">
						<img src="../imagen/carrito.png" >
					</a>
		</div>
		</div>
	</div>	
</div>			
<div class="container">
	<div class="row">
		<div class="col-m-12">
			  <table style="margin: 0 auto;" border="1">
			  <caption><center><h1>Productos</h1></center></caption>
    <tr class="success">
    <td>Id</td>
    <td>Nombre</td>
    <td>Descripcion</td>
    <td>Precio</td>
  </tr>
<tr>
  <?php
    foreach ($productos as $producto) {
  ?>
  <td><?php echo $producto['id'];?></td>
    <td><?php echo $producto['nombre'];?></td>
      <td><?php echo $producto['descripcion'];?></td>
        <td><?php echo $producto['precio'];?></td>
     </tr>
    <?php
      }
    ?>
  </table>
  <br><br>	
		</div>
	</div>
</div>
<div class="container">
<div class="row">
<div class col-sm-6>
<h2><center>Pedido</center></h2>
<form id="agregar" >
	<div class="form-group">
		<label>Producto</label>
		<input type="text" id="producto">
		<label>Cantidad</label>
		<input type="number" id="cantidad">

	</div>
	<input type="submit" value="Agregar al carrito">
</form>
</div>
<div class col-sm-6>
<h2><center>Registro de pedidos</center></h2>
<div id="tabla-clasificacion">
	<table class="table">
		<thead>
			<tr>
				<th>Produto</th>
				<th>Cantidad</th>
			</tr>
		</thead>
		<tbody id="productos-tabla">

		</tbody>
	</table>

</div>
<button id="mostrar-tabla">Mostrar productos del carrito</button
</div>

</div>
</div>

</body>
</html>
