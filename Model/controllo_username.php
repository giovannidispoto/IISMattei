<?php
			include '../Class/Database.class.php';
			include '../Helpers/helpers.php';
			if(isset($_GET['username']) && !empty($_GET["username"])){
					$db = new Database();
					$db->connect();
					$username = htmlspecialchars($_GET['username'],ENT_QUOTES,'utf-8');
					$username = escape_string($username);
					$response = $db->existUser($username);
					if($response) echo "false";
					else echo "true";
			}
?>