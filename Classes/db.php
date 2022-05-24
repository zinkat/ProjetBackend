<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// $pdo = new PDO('mysql:host=127.0.0.1;dbname=ecommerce_1', 'root', 'root');

class DB{
	public $pdo;
	
	function __construct(){
		$this->connect();
	}

	protected function connect(){
		try {
			$dsn = "mysql:dbname=".CONFIG['DATABASE_NAME'].";host=".CONFIG['DATABASE_HOST'].";charset=utf8";
			$this->pdo = new PDO($dsn, CONFIG['DATABASE_LOGIN'], CONFIG['DATABASE_PWD']);
			
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch (Exception $e) {
			die("Unable to connect: " . $e->getMessage());
		}
	}

	public function getDB(){
		if (!isset($this->pdo)){ 
			$this->connect(); 
		}
		return $this->pdo;
	}
}
?>