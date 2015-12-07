<?php
      include '../Helpers/secure_session.php';
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
        $nome = $_SESSION['name'];
        $cognome = $_SESSION['surname'];
        include '../View/amministratore.html.php';
      }
  ?>