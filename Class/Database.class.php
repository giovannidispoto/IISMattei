<?php

class Database{

	static private $host = "localhost";
	static private $name = "JMessanger";
	static private $username = "JMAdmin";//inserire username database
	static private $password ="admin";//inserire password database
		   protected $pdo;
		   private $error;


	 function connect(){
		try{
			$this->pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$name,self::$username,self::$password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->pdo->exec('SET NAMES "utf8"');
		}catch(PDOException $e){
			echo "Impossibile connettersi al DB ".$e->getMessage();
			return false;
		}
		return true;
	}

	function getError(){
		return $this->error;
	}

	function auth($username, $password){
			$password = hash("sha512",$password);
			$username = mysql_real_escape_string($username);
		try{
				$stmt = $this->pdo->prepare(
					"SELECT * FROM Alunni A INNER JOIN Login L ON A.cod_matricola = L.cod_matricola WHERE A.cod_matricola = :username and L.password = :password");
				$stmt->bindValue(":username",$username);
				$stmt->bindValue(":password",$password);
				$result = $stmt->exec();
		}catch(PDOException $e){
				echo "An Error Occured ".$e->getMessage();
				die();
		}

		return $result;
	}

}
?>
