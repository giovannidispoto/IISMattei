<?php
include '../Helpers/secure_session.php';
include'../Class/Database.class.php';
  session_secure_start();

  if(isset($_GET["logout"])){
    $_SESSION = array();
    session_destroy();
  }

   if(!isset($_SESSION['id'])){
    header("Location:../index.php");
  }

  if(isset($_SESSION['id']) && $_SESSION['type'] == 'Alunno'){
    include'../Model/courses.php';
    include '../View/corsi.html.php';
      }

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Relatore'){
         $area = 'AreaRelatori';
          include '../View/access_denied.html.php';
      }

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Amministratore'){
        $area = 'AreaAmministrazione';
          include '../View/access_denied.html.php';
      }

  ?>

