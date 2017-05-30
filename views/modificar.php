<?php
$id=$_GET['nombre'];
include_once("../controllers/updatecontroller.php");
?>
<!DOCTYPE>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- my css file -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="front absolute card col-xs-12">
  <h2 class ="white-text">Modificar producto</h2>
  <input type="text" class="form-control" id="nombre" value="<?php echo $id;?>" placeholder="Escribe el nombre del producto "><br>
  <input type="number" class="form-control" id="precio" value="" placeholder="Escribe el precio del producto "><br>
  <select id="categoria" class="form-control" name="">
    <option value="1">Pizzas</option>
    <option value="2">Pastas</option>
    <option value="3">Ensaladas</option>
    <option value="4">Bebidas</option>
  </select><br>
  <textarea class="form-control" id="descripcion"></textarea>
  <br>

  <button type="button" class="form-control" id="guardar">Actualizar producto</button>
</div>
</div>

<!-- container -->
<script src="../assets/js/script.js" charset="utf-8"></script>
<script type="text/javascript">
let guardar = document.querySelector("#guardar");
guardar.addEventListener('click',function(){

  let nombre = document.querySelector("#nombre");
  let precio = document.querySelector("#precio");
  let categoria = document.querySelector("#categoria");
  let descripcion = document.querySelector("#descripcion");



  let producto = new Producto(nombre.value,precio.value,categoria.value,descripcion.value);
  let listaproductos = new Array();
  listaproductos.push(producto);
  let arregloJSON = JSON.stringify(listaproductos);
  console.log(arregloJSON);
  $.ajax({
    method: "POST",
    url: "../controllers/updatecontroller.php",
    data: { productos: arregloJSON, editar: "insertarProductos" }
  })
  .done(function() {
     console.log( "Datos guardados ");
   });
});

</script>
</body>
</html>
