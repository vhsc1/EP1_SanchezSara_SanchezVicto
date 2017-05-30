<?php

if( isset($_POST['funcion']) ) {
	require_once("../models/Product.php");
	require_once("../models/Cliente.php");//se agrega clase cliente
	require_once("../models/Pedido.php");//se agrega clase pedido
	require_once("../models/PedidoProducto.php");//se agrega clase pedido
	require_once("../models/Cleaner.php");

	echo 'Hola AJAX '.$_POST['funcion'];
	$nombre = Cleaner::cleanInput($_POST['nombre']);
	$direccion = Cleaner::cleanInput($_POST['direccion']);
	$telefono = Cleaner::cleanInput($_POST['telefono']);

	$cliente = new Cliente($nombre, $direccion, $telefono);
	$idCliente = $cliente->save();
	echo "cliente registrado: ".$idCliente;
	$pedido = new Pedido($idCliente);
	$idPedido = $pedido->save();
	echo "pedido registrado: ".$idPedido;

	$productos = json_decode($_POST['productos']);

	foreach ($productos as $item) {
		$idProducto = (int)Cleaner::cleanInput($item->_idProducto);
		$cantidad = (int)Cleaner::cleanInput($item->_cantidad);
		$pedido = new PedidoProducto($idPedido,$idProducto,$cantidad);
		$iPedidoProducto = $pedido->save();
		echo $iPedidoProducto;

	}

} else {
	include_once("models/Product.php");
	$productos = Product::get();
}
