<?php
namespace Models;
use Core\Model;

class Vendas extends Model{

	public function insertPurchase($id_cliente, $qt, $preco_total)
	{
		$sql = $this->db->prepare("INSERT INTO vendas (id_cliente, qt_produtos, preco_total, data) VALUES (:id_cliente, :qt_produtos, :preco_total, :data)");
		$sql->bindValue(":id_cliente", $id_cliente);
		$sql->bindValue(":qt_produtos", $qt);
		$sql->bindValue(":preco_total", $preco_total);
		$sql->bindValue(":data", date("Y-m-d", time()));
		$sql->execute();
		
	}
	
}