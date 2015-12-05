<?php
  include 'Class/Database.class.php';

            $username = $_POST['username'];
            $password = $_POST['password'];
            $db = new Database();
            $db->connect();
            $response = $db->authAmministratore($username,$password);
            print_r($response);

             foreach($response as $row){
              $_SESSION['user_id'] = $row['id'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['surname'] = $row['surname'];
            }
              $_SESSION['type'] = 'Amministratore';
              header("Location:/AreaAmministrazione/");





?>