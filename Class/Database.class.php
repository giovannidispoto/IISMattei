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
			$sql = "SELECT Nome,Cognome, A.cod_matricola FROM Alunni A INNER JOIN LoginAlunni L ON A.cod_matricola = L.cod_matricola WHERE A.cod_matricola = :username and L.pass = :password";
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
				 	'cod_matricola' => $row['cod_matricola'],
				 	'name' => $row['Nome'],
					'surname' => $row['Cognome']
				 	);
			}
			if(isset($user))return $user;
		}
	}

	function authAmministratore($username, $password){

		$sql = "SELECT * FROM Amministratori A INNER JOIN LoginAmministratori L ON A.cod_amministratore = L.cod_amministratore WHERE A.cod_amministratore = :username and L.pass = :password ";
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
					'cod_amministratore' => $row['cod_amministratore'],
					'name' => $row['Nome'],
					'surname' => $row['Cognome']
					);
			}
			return $user;
		}

	}

	function authRelatore($username, $password){

		$sql = "SELECT * FROM Relatori A INNER JOIN LoginRelatori L ON A.id = L.cod_matricola WHERE A.username = :username and L.pass = :password";
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
					'cod_relatore' => $row['cod_relatore'],
					'name' => $row['Nome'],
					'surname' => $row['Cognome']
					);

			}
			return $user;
		}

	}

	function getCourses($date){
		$sql = "SELECT id_corso,descrizione, time_format(sec_to_time(time_to_sec(ora_inizio)),'%H:%i') as ora_inizio, time_format(sec_to_time(time_to_sec(ora_fine)),'%H:%i') as ora_fine FROM Corsi WHERE date(ora_inizio) = :data";
		try{
			  $stmt = $this->pdo->prepare($sql);
			  $stmt->bindValue(":data",$date);
			  $result = $stmt->execute();
		}catch(PDOException $e){
			echo "Error selecting Courses <br>".$e->getMessage();
		}
		if($result > 0){
			while($row = $stmt->fetch()){
					$courses[]= array(
						'id' => $row['id_corso'],
						'descrizione' => $row['descrizione'],
						'ora_inizio' => $row['ora_inizio'],
						'ora_fine' => $row['ora_fine']
						);
			}
			if(isset($courses)) return $courses;
		}

	}

	function getSubscribed($id_corso){
		$sql = "SELECT A.Nome, A.Cognome FROM Alunni A, Corsi C, Iscrizioni I, Relatori R WHERE A.cod_matricola = I.cod_matricola and I.id_corso = C.id_corso and C.cod_relatore = R.cod_relatore and C.id = :id_corso";

	try{
			  $stmt = $this->pdo->prepare($sql);
			  $stmt->bindValue(":id_corso",$id_corso);
			  $result = $stmt->execute();
		}catch(PDOException $e){
			echo "Error Listing Courses <br>".$e->getMessage();
		}
		if($result > 0){
			while($row = $stmt->fetch()){
					$subscribed[] = array(
						'nome' => $row['nome'],
						'cognome' => $row['cognome']
						);
			}
			if(isset($subscribed)) return $subscribed;
		}
	}

}
?>
