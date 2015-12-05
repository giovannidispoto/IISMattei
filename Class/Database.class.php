<?php

class Database{

	private $host = "localhost";
	private $name = "GestioneIscrizioni";
	private $username = "Gestore";//inserire username database
	private $password ="admin123";//inserire password database
	protected $pdo;


	 function connect(){
		try{
			$this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->name,$this->username,$this->password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->pdo->exec('SET NAMES "utf8"');
		}catch(PDOException $e){
			echo "Impossibile connettersi al DB ".$e->getMessage();
			return false;
		}
		return true;
	}

	function authAlunno($username, $password){
			$sql = "SELECT * FROM Alunni A INNER JOIN Login L ON A.cod_matricola = L.cod_matricola WHERE A.cod_matricola = :username and L.pass = :password";
			//$password = hash("sha512",$password);
			$username = htmlspecialchars($username, ENT_QUOTES, "utf-8");
		try{
				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(":username",$username);
				$stmt->bindValue(":password",$password);
				$result = $stmt->execute();
		}catch(PDOException $e){
				echo "An Error Occured ".$e->getMessage();
				die();
		}
		if($result > 0){
			while($row = $stmt->fetch()){
				 $user = array(
				 	'cod_matricola' => $row['Cod_matricola'],
				 	'name' => $row['Nome'],
					'surname' => $row['Cognome']
				 	);
			}
			return $user;
		}
	}

	function AuthAmministratore($username, $password){

		$sql = "SELECT * FROM Amministratore A INNER JOIN Login L ON A.id = L.cod_matricola WHERE A.username = :username and L.pass = :password";
			//$password = hash("sha512",$password);
			$username = htmlspecialchars($username, ENT_QUOTES, "utf-8");
		try{
				$stmt = $this->pdo->prepare($sql);
				$stmt->bindValue(":username",$username);
				$stmt->bindValue(":password",$password);
				$result = $stmt->execute();
		}catch(PDOException $e){
				echo "An Error Occured ".$e->getMessage();
				die();
		}
		if($result > 0){
			while($row = $stmt->fetch()){
				$user[] = array(
					'id' => $row['id'],
					'name' => $row['name'],
					'surname' => $row['surname']
					);
				return $user;
			}
		}

	}

}
?>
