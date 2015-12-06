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
  }else{
    $nome = $_SESSION["name"];
    $cognome = $_SESSION["surname"];
    $db = new Database();
    $db->connect();
    $primo_giorno_courses = $db->getCourses('2015/12/21');
    $secondo_giorno_courses = $db->getCourses('2015/12/22');
    $terzo_giorno_courses = $db->getCourses('2015/12/23');
    include '../View/corsi.html.php';
  }

  ?>

