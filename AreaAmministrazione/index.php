<?php
include '../Helpers/secure_session.php';
include'../Class/Database.class.php';
include'../Helpers/helpers.php';
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

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Relatore'){
         $area = 'AreaRelatori';
          include '../View/access_denied.html.php';
      }

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Amministratore'){
      	if(isset($_GET['elenco']) and $_GET['elenco'] == "all"){
      		$iscritto = true;
      		include '../Model/elenco_alunni.php';
      		include '../View/elenco_alunni.html.php';
      	}else if (isset($_GET['elenco']) and $_GET['elenco'] == "not"){
      		$iscritto = false;
      		include '../Model/elenco_alunni.php';
      		include '../View/elenco_alunni.html.php';
      	}else if(isset($_GET['course']) and $_GET['course'] == "create"){
      			include '../View/gestione_corsi.html.php';
      	}else{
        $nome = $_SESSION['name'];
        $cognome = $_SESSION['surname'];
        include '../View/amministratore.html.php';
      }
      }
  ?>