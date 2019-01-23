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
	public function getProdById($id)
	{
		$array = array();
		$sql = $this->db->prepare("SELECT * FROM produtos WHERE id=?");
		$sql->bindValue(1, $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getProds($txt)
	{
		$array = array();

		$sql = $this->db->prepare("SELECT nome FROM produtos WHERE nome LIKE :nome");
		$sql->bindValue(":nome", "%".$txt."%");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
}