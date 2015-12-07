<?php
  include 'Class/Database.class.php';

            $username = $_POST['username'];
            $password = $_POST['password'];
            $db = new Database();
            $db->connect();
            $response = $db->authAlunno($username,$password);


             if(!empty($response)){
              $_SESSION['id'] = hash("sha512",uniqid($response['cod_matricola']));
               $_SESSION['name'] = $response['name'];
               $_SESSION['surname'] = $response['surname'];
               $_SESSION['type'] = "Alunno";
               header("Location: AreaAlunni/index.php");
             }







?>