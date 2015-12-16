<?php
include '../Helpers/secure_session.php';
include'../Class/Database.class.php';
include'../Helpers/helpers.php';
  session_secure_start();
  define("INCLUDED",1);

  if(isset($_GET["logout"])){
    $_SESSION = array();
    session_destroy();
  }

   if(!isset($_SESSION['id'])){
    header("Location:../index.php");
  }

  if(isset($_SESSION['id']) && $_SESSION['type'] == 'Alunno'){
  	if(isset($_GET['register']) && isset($_POST['divisioneCorsi'])){
      		include '../Model/register_course.php';
      }
    include'../Model/courses.php';

			    switch($_SESSION['giorno']){
			    				case 0:	
			    				case 1:	
			    				case 2:	include '../View/corsi.html.php';
			    								break;
			    				case 3:	
			    								include '../View/riepilogo.html.php';
			    								break;
			  }

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

