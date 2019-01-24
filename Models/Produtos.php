<?php
namespace Models;
use Core\Model;

class Produtos extends Model{

	public function getAll($skip, $take = 4)
	{
		$array = array();
		$sql = $this->db->prepare("SELECT * FROM produtos LIMIT $skip, $take");
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
		$sql->bindValue(":nome", $txt."%");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getFornecedor()
	{
		$array = array();

		$sql = $this->db->prepare("SELECT fornecedor FROM produtos GROUP BY fornecedor");
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getProdsByMarca($marca){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM produtos WHERE fornecedor=:fornecedor");
		$sql->bindValue(":fornecedor", $marca);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function countAll()
	{
		$count = 0;
		$sql = $this->db->prepare("SELECT count(*) as qt FROM produtos");
		$sql->execute();

		$count = $sql->fetch();
		
		$paginas = $count['qt']/4;
		return $paginas;
	}
}