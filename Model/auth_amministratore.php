<?php
  include 'Class/Database.class.php';

            $username = $_POST['username'];
            $password = $_POST['password'];
            $db = new Database();
            $db->connect();
            $response = $db->authAmministratore($username,$password);

          if(!empty($response)){
                  $_SESSION['id'] = $response['username'];
                  $_SESSION['name'] = $response['name'];
                  $_SESSION['surname'] = $response['surname'];
                  $_SESSION['type'] = 'Amministratore';
                header("Location: /AreaAmministrazione/");
            }else{
                 header("Location: index.php?error=user_not_found");
               }





?>