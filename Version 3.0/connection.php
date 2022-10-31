<?php
Class Connection{
	private $server = "mysql:host=localhost;dbname=at3";
	private $username = "adminer";
	private $password = "P@ssw0rd";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "'ruh roh' - scooby doo";
 		}
    }
	public function close(){
   		$this->conn = null;
 	}
}
?>