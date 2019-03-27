<?php
require_once 'psl-config.php';  

class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$servername=HOST;
		$dbname=DATABASE;
		$username=USER;
		$password=PASSWORD;
		
		$conn=new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8",
		$username,$password, $pdo_options);
		
        self::$instance = $conn;
      }
      return self::$instance;
    }
  }
  
?>