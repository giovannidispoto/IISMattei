<?php
@defined('INCLUDED') or die("Impossibile accedere al file");
	$db = new Database();
	$db->connect();
	if($_GET['register'] != $_SESSION['giorno']) header("Location:".$_SERVER['PHP_SELF']);
	switch($_POST['divisioneCorsi']){
		case "completo":

										if($_SESSION['giorno'] == 3) break;
										if(!isset($_POST['corso']) || empty($_POST['corso'])){
											header("Location:index.php?errore=seleziona_un_corso");
											exit;
										}
										$corso = intval($_POST['corso']) or die("Errore!");
									 	$result = $db->subscribe($_SESSION['id'],$corso);
									 	if(!$result) exit(header("Location: index.php?corso_pieno=$corso"));
											break;
		case "diviso":
									if($_SESSION['giorno'] == 3) break;
									if(!isset($_POST['corsoPrimaMezza']) || empty($_POST['corsoPrimaMezza']) || !isset($_POST['corsoSecondaMezza']) || empty($_POST['corsoSecondaMezza'])){
										header("Location:index.php?errore=seleziona_un_corso");
										exit;
									}
									$corsoPrimaMezza = intval($_POST['corsoPrimaMezza']) or die("Errore!");
									$result = $db->subscribe($_SESSION['id'],$corsoPrimaMezza);
									if(!$result) exit(header("Location: index.php?corso_pieno=$corsoPrimaMezza"));

									 	$corsoSecondaMezza = intval($_POST['corsoSecondaMezza']) or die("Errore!");
									 	$result = $db->subscribe($_SESSION['id'],$corsoSecondaMezza);
									 	if(!$result) exit(header("Location: index.php?corso_pieno=$corsoSecondaMezza"));
									 
										break;
		default:	die("Errore");
							break;
	}

	switch($_SESSION['giorno']){
      		case 0:	$_SESSION['giorno'] = 1;
      						$result = $db->updateStato($_SESSION['id'],1);
      						if(!$result) die("Errore nel aggiornare stato");
      						break;
      		case 1:$_SESSION['giorno'] = 2;
      						$result = $db->updateStato($_SESSION['id'],2);
      						if(!$result) die("Errore nel aggiornare stato");
      						break;
      		case 2:$_SESSION['giorno'] = 3;
      						$result = $db->updateStato($_SESSION['id'],3);
      						if(!$result) die("Errore nel aggiornare stato");
      						break;
      		case 3:	
      						break;
      	}
      	header("Location:".$_SERVER['PHP_SELF']);

?>