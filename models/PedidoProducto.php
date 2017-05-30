<?php
require_once 'Database.php';
class PedidoProducto {
	public $idPedido;
	public $idProducto;
	public $cantidad;
	public function __construct($idPedido, $idProducto,$cantidad) {
		$this->idPedido = $idPedido;
			$this->idProducto = $idProducto;
      $this->cantidad = $cantidad;
  }

	// return rows
	public function save() {
		$db = new Database();
		$sql = "INSERT INTO
						 	pedido_producto(pedido_id, producto_id, cantidad)
					VALUES(
									$this->idPedido,
									$this->idProducto,
									$this->cantidad
								)
					";
		echo $sql;
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
		return $lastId;
	}

}
