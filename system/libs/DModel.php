 <?php
	/**
	 * Main (DModel) Model to create database object
	 */
	class DModel{
		protected $db = array();
		function __construct(){
		$dsn = 'mysql:dbname=db_mvcs;host=localhost';
		$user = 'root';
		$pass = '';
		
		$this->db = new Database($dsn,$user,$pass);
		}
	}
?>