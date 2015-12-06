<?php
      include '../Helpers/secure_session.php';
      session_secure_start();

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Alunno'){
        $area = 'AreaAlunni';
        include '../View/access_denied.html.php';
      }
  ?>