<?php
  session_start();

  if(isset($_GET["logout"])){
    $_SESSION = array();
    session_destroy();
  }
   if(!isset($_SESSION['id'])){
    header("Location:../index.php");
  }else{
    $nome = $_SESSION["name"];
    $cognome = $_SESSION["surname"];
    include '../View/corsi.html.php';
  }

  ?>

