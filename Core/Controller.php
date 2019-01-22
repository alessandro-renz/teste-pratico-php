<?php
namespace Core;

class Controller {
	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		require 'Views/'.$viewName.'.php';
	}
	/*
	public function loadTemplate($viewName, $viewData = array())
	{ 
		require 'views/tpl.php';
	}
	
	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require 'Views/'.$viewName.'.php';
	}
	*/
}