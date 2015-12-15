<?php
		$db = new Database();
		$db->connect() or die("Can't connect to DB");
		$id_corso = intval($_GET['show']) or die("Errore!<br>L'id del corso deve essere numerico");
		$alunni = $db->getIscritti($id_corso);
?>