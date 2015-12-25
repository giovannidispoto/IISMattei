<?php 
		@defined('INCLUDED') or die("Impossibile accedere al file");
		 $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
     if(!$isAjax) {
     $user_error = 'Access denied - not an AJAX request...';
     trigger_error($user_error, E_USER_ERROR);
  }
		$db = new Database();
		$db->connect() or die("Can't connect to DB");
		$relatori = $db->getListaRelatori();
?>