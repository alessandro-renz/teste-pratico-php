<?php
namespace Controllers;
use Core\Controller;
use Models\Produtos;
use Models\Clients;

class HomeController extends Controller {
	public function index() 
	{
		$data = array();

		$p = new Produtos();
		$data['produtos'] = $p->getAll();
		
		$this->loadView("home", $data);
	}
	public function getProdsByAjax($id) 
	{
		$data = array();

		$p = new Produtos();
		if(isset($id)){
			$data = $p->getProdById($id);
		}
		
		echo json_encode($data);
	}

	public function insertProdsByAjax()
	{
		if(!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['preco'])){
			$_SESSION['prods'][] = array("id"=>$_POST['id'], "nome"=>$_POST['nome'], "preco"=>$_POST['preco'], "url"=>$_POST['url']);
			echo json_encode($_SESSION['prods']);
		}
	}

	public function getQtProds()
	{
		echo json_encode($_SESSION['prods']);
		exit;
	}

	public function checkUser()
	{
		if(!empty($_POST['email']) && !empty($_POST['senha'])){
			$c = new Clients;
			$user = $c->check($_POST['email'], $_POST['senha']);	
			if(isset($user) && !empty($user)){
				$user["response"] = true;

			}else{
				$user['response'] = false;
			}
			echo json_encode($user);

		}
	}
	public function verificaSessao()
	{	
		$array = array();
		if(isset($_SESSION['user'])){
			$array['response'] = true;
			$array['id'] = $_SESSION['user'];
		}else{
			$array['response'] = false;
		}

		echo json_encode($array);
	}

	public function insertUser()
	{
		if(!empty($_POST['nome_cadastro']) && !empty($_POST['email_cadastro'])&& !empty($_POST['estado_cadastro']) && !empty($_POST['cidade_cadastro']) && !empty($_POST['bairro_cadastro']) && !empty($_POST['rua_cadastro']) && !empty($_POST['numero_cadastro']) && !empty($_POST['senha_cadastro']) && !empty($_POST['cep_cadastro'])){

			$c = new Clients;
			$c->insert($_POST['nome_cadastro'], $_POST['email_cadastro'], $_POST['estado_cadastro'], $_POST['cidade_cadastro'], $_POST['bairro_cadastro'], $_POST['rua_cadastro'], $_POST['numero_cadastro'], $_POST['senha_cadastro'], $_POST['cep_cadastro']);	

		}
	}

	public function getUserById($id){
		if(!empty($id)){
			$c = new Clients;
			$dados = $c->getUserById($id);
			echo json_encode($dados);
		}
	}

	public function sair(){
		if(isset($_SESSION['user'])){
			unset($_SESSION['user']);
			header("Location: /onehost");
			exit;
		}else{
			header("Location: /onehost");
		}
	}
}