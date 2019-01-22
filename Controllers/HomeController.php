<?php
namespace Controllers;
use Core\Controller;
use Models\Produtos;

class HomeController extends Controller {
	public function index() {
		$data = array();

		$p = new Produtos();
		$data['produtos'] = $p->getAll();
		
		$this->loadView("home", $data);
	}
}