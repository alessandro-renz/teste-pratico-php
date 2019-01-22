<?php
namespace Controllers;
use Core\Controller;
use Models\Produtos;
use Models\Clients;

class HomeController extends Controller {
	public function index() {
		$data = array();

		$p = new Produtos();
		$data['produtos'] = $p->getAll();
		
		$this->loadView("home", $data);
	}
	public function getProdsByAjax($id) {
		$data = array();

		$p = new Produtos();
		if(isset($id)){
			$data = $p->getProdById($id);
		}
		
		echo json_encode($data);
	}

	public function insertProdsByAjax(){
		if(!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['preco'])){
			$_SESSION['prods'][] = array("id"=>$_POST['id'], "nome"=>$_POST['nome'], "preco"=>$_POST['preco'], "url"=>$_POST['url']);
			echo json_encode($_SESSION['prods']);
		}
	}

	public function getQtProds(){
		echo json_encode($_SESSION['prods']);
		exit;
	}

	public function checkUser(){
		if(!empty($_POST['email']) && !empty($_POST['senha'])){
			$c = new Clients;
			$user = $c->check($_POST['email'], $_POST['senha']);	

			echo json_encode($user);

		}
	}
}