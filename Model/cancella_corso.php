<?php 
@defined('INCLUDED') or die("Impossibile accedere al file");
			$id_corso = intval($_GET['delete']) or die("Errore!<br>Corso non numerico");
			$db = new Database();
			$db->connect() or die("Impossibile collegarsi al DB");
			$result = $db->deleteCourse($id_corso);
			if(!$result) header("Location: index.php?error=imp_cancellare");
?>