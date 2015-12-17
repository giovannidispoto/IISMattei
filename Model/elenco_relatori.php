<?php 
		@defined('INCLUDED') or die("Impossibile accedere al file");
		$db = new Database();
		$db->connect() or die("Can't connect to DB");
		$relatori = $db->getListaRelatori();
?>