<?php
  include 'Class/Database.class.php';
  include 'Helpers/helpers.php';

            $cod_matricola = intval($_POST['cod_matricola']) or die("Errore! il codice matricola è un intero");
            $nome = htmlspecialchars($_POST['nome'],ENT_QUOTES,"utf-8");
            $nome = escape_string($nome);
            $cognome = htmlspecialchars($_POST['cognome'],ENT_QUOTES,"utf-8");
            $cognome = escape_string($cognome);

            $db = new Database();
            $db->connect();
            $response = $db->authAlunno($cod_matricola,$nome,$cognome);


             if(!empty($response)){
              // $_SESSION['id'] = hash("sha512",uniqid($response['cod_matricola']));
               $_SESSION['id'] = $response['cod_matricola'];
               $_SESSION['name'] = $response['name'];
               $_SESSION['surname'] = $response['surname'];
               $_SESSION['type'] = "Alunno";
               header("Location: /AreaAlunni/index.php");
             }else{
               header("Location: index.php?error=user_not_found");
             }







?>