<?php
require_once 'Database.php';
class Product {

	public $name;
	public $price;
	public $category;
	public $description;


	public function __construct($name, $price, $category, $description) {
		 $db=new Database();
      $this->name = $name;
			$this->price = $price;
	    $this->category = $category;
	    $this->description = $description;

  }
	static function soloId($id){
	 return new self('','','','', $id);
 }

 static function ningunDato(){
		return new self('', '', '', '', '');
	}
	// return rows
	public function save() {
		$db = new Database();
		$sql = "INSERT INTO
						 	producto(nombre, precio, categoria_id, descripcion)
					VALUES(
									'".$this->name."',
									$this->price,
									$this->category,
									'".$this->description."'
								)
					";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
		return true;
	}
	static function get() {
		$sql = " SELECT
		 						*
							FROM
								producto
						";
		$db = new Database();
		if($rows = $db->query($sql)) {
			return $rows;
		}
		return false;
	}
	public function update() {
		$db = new Database();
		$sql = "UPDATE `producto` SET`descripcion`='$this->description',
		`precio`=$this->price,`categoria_id`='$this->category' WHERE `nombre`='$this->name'";
		$db->query($sql);
		//$lastId = (int)$db->mysqli->insert_id;
		//echo $lastId;
		$db->close();
		return true;
	}



	public function delete(){
		$db = new Database();
		$sql="DELETE FROM `producto` WHERE `nombre`= '$this->name'";
		$db->query($sql);
		$db->close();
		return true;

	}




}
