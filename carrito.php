<?php
	include_once("controllers/ProductsController.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pizza</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>
  <body>
    <!-- header -->
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Pedido en línea</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
		<!-- FORMULARIO PARA MOSTRAR LOS PRODUCTOS REGISTRADOS -->

			<?php
				foreach ($productos as $producto) {
			?>
				<div class="col-md-3">

					<h4><?php echo $producto['nombre'];?></h4>
					<p><?php echo $producto['descripcion'];?></p>
					<h5>$<?php echo $producto['precio'];?></h5>
					<input type="number" class="cantidad" id="cantidad" placeholder="Cantidad" onchange="document.getElementById('cantidad').value=this.value">
					<br><br>
					<button type="button" class="btn btn-danger form-control"
					 					id="carrito" onclick="agregarCarrito(<?php echo $producto['id'];?>)">Agregar al carrito</button>
				</div>

			<?php
				}
			?>
			<h2><center>Datos del pedido<center></h2>
			<center>
			<label>Nombre del cliente</label><br>
			<input type="text" id="nombre" placeholder="nombre"><br><br>
			<label>Dirección:</label><br>
			<input type="text" id="direccion" placeholder="dirección"><br><br>
			<label>Telefono:</label><br>
			<input type="text" id="telefono" placeholder="teléfono"><br><br>
			<button type="button" class="btn-primary" name="button" onclick="realizarPedido()">Realizar pedido</button>
			</center>

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
			<button id="mostrar-tabla" onclick="mostrarTabla()">Mostrar productos del carrito</button
			</div>
    <!-- container -->
		<script src="./assets/js/script.js" charset="utf-8"></script>
    <script src="./assets/js/carrito.js" charset="utf-8"></script>
    <script type="text/javascript">
			var listaproductos = new Array();


			function mostrarTabla(){
			var cuerpoTabla=document.getElementById('productos-tabla');
			var tablallena= "";
			for (var i =0; i<listaproductos.length; i++) {
				tablallena+="<tr><td>" + listaproductos[i].idProducto + "</td><td>" + listaproductos[i].cantidad + "</td></tr>";
			}
			cuerpoTabla.innerHTML=tablallena;
			}


			function realizarPedido() {
				let nombre = document.querySelector("#nombre");
				let telefono = document.querySelector("#telefono");
				let direccion = document.querySelector("#direccion");

				let arregloJSON = JSON.stringify(listaproductos);
				console.log(arregloJSON);
				$.ajax({
				  method: "POST",
				  url: "controllers/CarritoController.php",
				  data: { productos: arregloJSON,
									nombre: nombre.value,
									direccion: direccion.value,
						 			telefono: telefono.value,
									funcion: "agregarCarrito"
								}
				})
				.done(function() {
				   console.log( "Datos guardados ");
				 });

			}
			function agregarCarrito(idProducto) {
				console.log("asda")
				let cantidad = document.querySelector("#cantidad");
				// listaproductos.push()
				let carrito = new Carrito(idProducto,cantidad.value);
				listaproductos.push(carrito);

				console.log(listaproductos)
				$(".input").val("");//jquery

			}
    </script>
  </body>
</html>
