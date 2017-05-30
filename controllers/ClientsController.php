<?php

if( isset($_POST['funcion']) ) {
	require_once("../models/Client.php");
	require_once("../models/Cleaner.php");

	//echo 'Hola AJAX '.$_POST['funcion'];
	$clientes = json_decode($_POST['clientes']);

	foreach ($clientes as $item) {

		$cliente = new Client($item->_nombre,
                          $item->_direccion,
                          $item->_telefono);
		$cliente->save();
	}

} else {
	include_once("../models/Client.php");
	$clientes = Client::get();
}
