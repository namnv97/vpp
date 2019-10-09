<?php

/**
* 
*/
class Database
{
	//Store connection for database
	private static $connection;

	public function __construct()
	{
		
	}

	//Return PDO instance
	public static function getInstance(){
		//if connection is not init
		if(!isset(self::$connection)){
			$driverName = 'mysql';
			$databaseName = 'tmdt';
			$host = '127.0.0.1';
			$dsn = "$driverName:dbname=$databaseName;host=$host";
			$userName = 'root';
			$password = '';
			try{
				self::$connection = new PDO($dsn, $userName, $password,array(
        		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    		));
			}catch(Exception $e){
				echo 'Connection failed: ' . $e->getMessage();
			}
		}
		return self::$connection;
	}

}