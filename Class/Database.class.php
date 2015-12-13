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
			$sql = "SELECT Nome,Cognome, A.cod_matricola FROM Alunni A INNER JOIN LoginAlunni L ON A.cod_matricola = L.cod_matricola WHERE  A.cod_matricola = :username and L.pass = :password";
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
		if($stmt->rowCount() > 0){
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
			$sql = "SELECT Nome,Cognome, A.username FROM Amministratori A INNER JOIN LoginAmministratori L ON A.username= L.username_amministratore WHERE A.username= :username and L.pass = :password";

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
		if($stmt->rowCount() > 0){
			while($row = $stmt->fetch()){
				$user = array(
					'username' => $row['username'],
					'name' => $row['Nome'],
					'surname' => $row['Cognome']
					);
			}
			return $user;
		}

	}

	function authRelatore($username, $password){
			$sql = "SELECT Nome,Cognome, R.id FROM  Relatori R INNER JOIN LoginRelatori L ON R.id = L.id_relatore WHERE A.username= :username and L.pass = :password";

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
		if($stmt->rowCount() > 0){
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

	function getCourseName($id){
		$sql = "SELECT descrizione FROM Corsi WHERE id_corso = :id_corso";
		try{
			  $stmt = $this->pdo->prepare($sql);
			  $stmt->bindValue(":id_corso",$id);
			  $result = $stmt->execute();
		}catch(PDOException $e){
			echo "Error selecting Courses <br>".$e->getMessage();
		}
		if($stmt->rowCount() > 0){
			while($row = $stmt->fetch()){
					return $row['descrizione'];
			}
		}

	}

	function getCourses($date){
		$sql = "SELECT id_corso,descrizione,time_format(sec_to_time(time_to_sec(ora_inizio)),'%H:%i') as ora_inizio, time_format(sec_to_time(time_to_sec(ora_fine)),'%H:%i') as ora_fine FROM Corsi WHERE data = :data";
		try{
			  $stmt = $this->pdo->prepare($sql);
			  $stmt->bindValue(":data",$date);
			  $result = $stmt->execute();
		}catch(PDOException $e){
			echo "Error selecting Courses <br>".$e->getMessage();
		}
		if($stmt->rowCount() > 0){
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
		$sql = "SELECT A.Nome, A.Cognome FROM Alunni A, Iscrizioni I WHERE A.cod_matricola = I.cod_matricola and I.id = :id_corso";

	try{
			  $stmt = $this->pdo->prepare($sql);
			  $stmt->bindValue(":id_corso",$id_corso);
			  $result = $stmt->execute();
		}catch(PDOException $e){
			echo "Error Listing Courses <br>".$e->getMessage();
		}
		if($stmt->rowCount() > 0){
			while($row = $stmt->fetch()){
					$subscribed[] = array(
						'nome' => $row['nome'],
						'cognome' => $row['cognome']
						);
			}
			if(isset($subscribed)) return $subscribed;
		}
	}

	function corsoPieno($id){
		$sql = "SELECT C.max_iscritti, COUNT(*) as numero_iscritti FROM Corsi C INNER JOIN Iscrizioni I ON C.id_corso = I.id_corso WHERE C.id_corso = :id GROUP BY C.max_iscritti";
		try{
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindValue(":id",$id);
			$stmt->execute();
		}catch(PDOException $e){
				echo "Error Getting numero max corso <br>".$e->getMessage();
		}
			if($stmt->rowCount() > 0){
			while($row = $stmt->fetch()){
					if($row['max_iscritti'] > $row['numero iscritti']){
						return true;
					}
					return false;
			}
			if(isset($subscribed)) return $subscribed;
		}
	}

		function getStatoRegistrazione($cod_matricola){
			$sql = "SELECT stato_registrazione FROM Alunni WHERE cod_matricola = :cod_matricola";
				try{
					$stmt = $this->pdo->prepare($sql);
					$stmt->bindValue(":cod_matricola",$cod_matricola);
					$stmt->execute();
				}catch(PDOException $e){
					echo "Error<br>".$e->getMessage();
				}
				$user_states = $stmt->fetchAll();
				if($stmt->rowCount() > 0){
			 		foreach($user_states as $state){
			 			return $state['stato_registrazione'];
			 		}
			}else{
					die("utente non esistente");
			}

		}
		function subscribe($cod_matricola,$id_corso){

				$sql = "INSERT INTO Iscrizioni(cod_matricola,id_corso) ( SELECT :cod_matricola, :id_corso FROM Dual WHERE (SELECT COUNT(*) as numero_iscritti FROM Corsi C INNER JOIN Iscrizioni I ON C.id_corso = I.id_corso and C.id_corso = :id_corso) < (SELECT C.max_iscritti FROM Corsi C WHERE C.id_corso = :id_corso))";
				try{
					$stmt = $this->pdo->prepare($sql);
					$stmt->bindValue(":cod_matricola",$cod_matricola);
					$stmt->bindValue(":id_corso",$id_corso);
					$stmt->execute();
					$stmt = $this->pdo->query("SELECT ROW_COUNT() as inseriti");
				}catch(PDOException $e){
					echo "Error<br>".$e->getMessage();
				}
				while($result = $stmt->fetch()){
					if($result['inseriti'] > 0) return true;
					return false;
				}
				
		}

		function getSubscribedCourses($id){
			$sql = "SELECT C.descrizione, R.nome,R.cognome ,time_format(sec_to_time(time_to_sec(C.ora_inizio)),'%H:%i') as ora_inizio,time_format(sec_to_time(time_to_sec(C.ora_fine)),'%H:%i') as ora_fine, C.aula, C.data FROM Alunni A, Corsi C, Iscrizioni I, Relatori R WHERE A.cod_matricola = I.cod_matricola and I.id_corso = C.id_corso and C.username_relatore = R.username and A.cod_matricola = :id";

			try{
						$stmt = $this->pdo->prepare($sql);
						$stmt->bindValue(":id",$id);
						$stmt->execute();
			}catch(PDOException $e){
				echo "Errore aggiornamento stato<br>".$e->getMessage();
			}

		if($stmt->rowCount() > 0){
			return $stmt->fetchAll();
		}

		}

		function updateStato($id, $giorno){
			$sql = "UPDATE Alunni SET stato_registrazione = :giorno WHERE cod_matricola = :cod_matricola";

			try{
						$stmt = $this->pdo->prepare($sql);
						$stmt->bindValue(":giorno",$giorno);
						$stmt->bindValue(":cod_matricola",$id);
						$stmt->execute();
			}catch(PDOException $e){
				echo "Errore aggiornamento stato<br>".$e->getMessage();
			}

			if($stmt->rowCount() > 0) return true;
			return false; 
		}

		function getElenco($iscritti){
			if($iscritti) $sql = "SELECT * FROM Alunni ORDER BY Classe DESC";
			if(!$iscritti) $sql = "SELECT * FROM Alunni WHERE cod_matricola not in ( SELECT cod_matricola FROM Iscrizioni ) ORDER BY Classe DESC";
			try{
					$result = $this->pdo->query($sql);
			}catch(PDOException $e){
				echo "Errore richiamo lista alunni<br>".$e->getMessage();
			}
				$result = $result->fetchAll();
				return $result;
		}

	function getRelatori($term,$term2=""){
		$sql = "SELECT username FROM Relatori WHERE nome like :nome and cognome like :cognome ";
		//$sql = "SELECT username FROM Relatori WHERE nome like '%ant%' and cognome like '%%'";
		try{
					$stmt = $this->pdo->prepare($sql);
		//$result = $this->pdo->query($sql);
					$stmt->bindValue(":nome",'%'.$term.'%');
					$stmt->bindValue(":cognome",'%'.$term2.'%');
					$result = $stmt->execute();
			}catch(PDOException $e){
				echo "Errore richiamo lista relatori <br>".$e->getMessage();
			}
				//$result = $stmt->fetchAll();
				$result = $stmt->fetchAll();
				//print_r($result);
				return $result;
		
	}
}
?>
