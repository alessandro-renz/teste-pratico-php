<?php
namespace Models;
use Core\Model;

class Produtos extends Model{

	public function getAll()
	{
		$array = array();
		$sql = $this->db->prepare("SELECT * FROM produtos");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
}