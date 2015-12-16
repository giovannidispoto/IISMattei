<?php
@defined('INCLUDED') or die("Impossibile accedere al file");
			$db = new Database();
			$db->connect();
			$result = $db->getCoursesList();
?>