<?php
	include_once("../controllers/ClientsController.php");
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
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="video-container vertical-center">
    <div class="front absolute card col-xs-12">
      <h2 class ="white-text">Registrar Cliente</h2>
      <input type="text" class="form-control" id="nombre" value="" placeholder="Escribe tu nombre "><br>
      <input type="text" class="form-control" id="direccion" value="" placeholder="Escribe tu direccion "><br>
      <input type="text" class="form-control" id="telefono" value="" placeholder="Escribe tu telefono "><br>
      <br>

      <button type="button" class="form-control" id="guardar">Registrar Cliente</button>
    </div>
  </div>
  <script src="../assets/js/cliente.js" charset="utf-8"></script>
  <script type="text/javascript">
    let guardar = document.querySelector("#guardar");
    guardar.addEventListener('click',function(){
      let nombre = document.querySelector("#nombre");
      let direccion = document.querySelector("#direccion");
      let telefono = document.querySelector("#telefono");




      let cliente = new Cliente(nombre.value,direccion.value,telefono.value);
      let listaclientes = new Array();
      listaclientes.push(cliente);
      let arregloJSON = JSON.stringify(listaclientes);
      console.log(arregloJSON);
      $.ajax({
        method: "POST",
        url: "../controllers/ClientsController.php",
        data: { clientes: arregloJSON, funcion: "insertarClientes" }
      })
      .done(function() {
         console.log( "Datos guardados ");
       });
    });

  </script>
</body>
</html>
