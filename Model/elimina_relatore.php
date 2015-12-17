<?php 
@defined('INCLUDED') or die("Impossibile accedere al file");
			$username = htmlspecialchars($_GET['delete'],ENT_QUOTES,'utf-8');
			$username = escape_string($username);
			$db = new Database();
			$db->connect() or die("Impossibile collegarsi al DB");
			$result = $db->deleteRelatore($username);
			if(!$result) header("Location: index.php?error=imp_cancellare");
?>