<?php

		$db = new Database();
		$db->connect();
		$alunni = $db->getElenco($iscritto);		

?>