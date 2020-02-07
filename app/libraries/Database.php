<?php

/*
 * PDO Database Class
 * Connect to Database
 * Create prepared statments
 * Bind values
 * Return rows and results
 */
class Database{
	private $host = '127.0.0.1';
	private	$user = 'root';
	private	$pass = '';
	private $Database = 'safenotes';
	private $dataHandler;
	private $stmt;
	private $error;

	public function __construct(){
		//Set DSN
		$dsn = 'mysql:host='. $this->host . ';dbname=' . $this->Database;
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		//Create PDO instance
		try{
			$this->dataHandler = new PDO($dsn, $this->user, $this->pass, $options);
		} catch(PDOException $e){
			$this->error = $e->getMessage();
			echo $this->error;
		}
	}

	//prepare statements with query
	public function query($sql){
		$this->stmt = $this->dataHandler->prepare($sql);
	}

	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;

				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;

				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;


				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

		$this->stmt->bindvalue($param, $value, $type);
	}

	//Execute the prepared statements
	public function execute(){
	    return $this->stmt->execute();
	}

	//Get result set as array of objects
	public function resultSet(){
	    $this->execute();
	    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	// Get single record as object
	public function single(){
	    $this->execute();
	    return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	// Get row count
	public function rowCount(){
	    return $this->stmt->rowCount();
	}

}