<?php
  include 'Class/Database.class.php';

            $username = $_POST['username'];
            $password = $_POST['password'];
            $db = new Database();
            $db->connect();
            $response = $db->authRelatore($username,$password);

             if(!empty($response)){
              $_SESSION['id'] =  $response['cod_relatore'];
              $_SESSION['name'] = $response['name'];
              $_SESSION['surname'] = $response['surname'];
              $_SESSION['type'] = "Relatore";
              header("Location: AreaRelatori/index.php");
            }







?>