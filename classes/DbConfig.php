<?php
class DbConfig
{
	private $_host = 'localhost';
	private $_username = $_SERVER["DATABASE_USER"];
	private $_password = $_SERVER["DATABASE_PASSWORD"];
	private $_database = $_SERVER["DATABASE_NAME"];
	
	protected $connection;
	
	public function __construct()
	{
		if (!isset($this->connection)){
			
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
			
			if(!$this->connection){
				echo 'Não foi possível estabelecer conexão.';
				exit;
			}
		}
		
		return $this->connection;
		
	}
}

?>