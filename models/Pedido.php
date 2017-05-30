<?php
require_once 'Database.php';
class Pedido {
	public $idCliente;
	public function __construct($idCliente) {
      $this->idCliente = $idCliente;
  }

	// return rows
	public function save() {
		$db = new Database();
		$sql = "INSERT INTO
						 	pedido(fecha, cliente_id, estado)
					VALUES(
									now(),
									$this->idCliente,
									'Pendiente'
								)
					";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
		return $lastId;
	}

}
