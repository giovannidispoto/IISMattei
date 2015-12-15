<?php
      include '../Helpers/secure_session.php';
      include '../Class/Database.class.php';
      session_secure_start();

	   if(isset($_GET["logout"])){
	    $_SESSION = array();
	    session_destroy();
	  }

   if(!isset($_SESSION['id'])){
    header("Location:../index.php");
  }

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Alunno'){
        $area = 'AreaAlunni';
        include '../View/access_denied.html.php';
      }

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Amministratore'){
        $area = 'AreaAmministratori';
        include '../View/access_denied.html.php';
      }

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Relatore'){
      	if(isset($_GET['show']) && !empty($_GET['show'])){
      			include '../Model/elenco_alunni_corso.php';
      			include '../View/elenco_alunni_corso.html.php';
      	}else{
         	$nome = $_SESSION['name'];
         	$cognome = $_SESSION['surname'];
         	include '../Model/lista_corsi.php';
         	include '../View/relatore.html.php';
         }
      }
     
  ?>