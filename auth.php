<?php
  include 'Class/Database.class.php';
  session_start();

  if($_SESSION['token'] != $_POST['token']){
    die("Error with token!");
  }

  if(isset($_POST['username']) && !empty($_POST['username'])){
        if(isset($_POST['password']) && !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $db = new Databse();
            $response = $db->auth($username,$password);
            if($response == 1){
             foreach($response as $row){
               $_SESSION['user_id'] = $row['id'];
               $_SESSION['name'] = $row['name'];
               $_SESSION['surname'] = $row['surname'];

            }
          }
       }else{
        header("Location: index.php?error=password");
       }
  }else{
    header("Location: index.php?error=username");
  }



?>