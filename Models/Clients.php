<?php
namespace Models;
use Core\Model;

class Clients extends Model{

	public function check($email, $senha)
	{
		$array = array();
		$sql = $this->db->prepare("SELECT * FROM clientes WHERE email=:email AND senha=:senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;
	}

	public function insert($nome, $email, $estado, $cidade, $bairro, $rua, $numero, $senha, $cep)
	{
		
		$sql = $this->db->prepare("INSERT INTO clientes (nome, email, estado, cidade, bairro, rua, numero, senha, cep) VALUES (:nome, :email, :estado, :cidade, :bairro, :rua, :numero, :senha, :cep)");
		$sql->bindValue(":nome", $nome);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":estado", $estado);
		$sql->bindValue(":cidade", $cidade);
		$sql->bindValue(":bairro", $bairro);
		$sql->bindValue(":rua", $rua);
		$sql->bindValue(":numero", $numero);
		$sql->bindValue(":senha", md5($senha));
		$sql->bindValue(":cep", $cep);
		$sql->execute();

		

		
	}
	
}