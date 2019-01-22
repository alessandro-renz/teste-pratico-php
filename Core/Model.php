<?php 
namespace Core;

class Model {
	private $db;
	
	public function __construct()
	{
		global $db;
		$this->db = $db;
	}

}
