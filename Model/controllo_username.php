<?php
 $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
     if(!$isAjax) {
     $user_error = 'Access denied - not an AJAX request...';
     trigger_error($user_error, E_USER_ERROR);
  }
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