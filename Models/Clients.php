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
	
}