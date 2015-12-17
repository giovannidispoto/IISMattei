<?php 
@defined('INCLUDED') or die("Impossibile accedere al file");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Riepilogo Corsi | Area Alunni</title>

    <!-- Bootstrap core CSS -->
    <link href="../View/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../View/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../View/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../View/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </script>
    <style>
    td{
      padding:5px;
    }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a id="textNavBar" class="navbar-brand" href="#">IIS Iscrizione Corsi Autogestione</a>
        </div>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container" >
      <h1>Ciao, <?php echo "$nome $cognome";?> <input type="button" value="logout" onClick ="location.href='index.php?logout'" class="btn btn-warning"></h1>
      <p>Ecco i corsi a cui sei iscritto:</p>
     
               <?php $primo = true;
              foreach($corsi as $corso){
                if($corso['data'] == '2015-12-21' && $primo){
                  echo "<p>Corsi del 21/12/2015<p>";
                  echo "<table>";
                  echo "<tr>";                  
                  echo "<td><b>Corso</b></td>";
                  echo "<td><b>Relatore<b></td>";
                  echo"<td><b>Ora Inizio</b></td>";
                  echo"<td><b>Ora Fine</b></td>";
                  echo"<td><b>Aula</b></td>";
                  echo "</tr>";
                  $primo = false;
                }
                if ($corso['data'] == '2015-12-21'){
                                  echo "<tr>";
                                    echo "<td>".$corso['descrizione']."</td>";
                                    echo "<td>".$corso['nome']." ".$corso['cognome']."</td>";
                                    echo "<td>".$corso['ora_inizio']."</td>";
                                    echo "<td>".$corso['ora_fine']."</td>";
                                    echo "<td>".$corso['aula']."</td>";
                                  echo "</tr>";
                            }
                    }
                    if(!$primo) echo "</table><br>";
                    $primo = true;
                 foreach($corsi as $corso){
                if($corso['data'] == '2015-12-22' && $primo){  
                  echo "<p>Corsi del 22/12/2015</p>";
                  echo "<table>";
                  echo "<tr>";
                  echo "<td><b>Corso</b></td>";
                  echo "<td><b>Relatore<b></td>";
                  echo"<td><b>Ora Inizio</b></td>";
                  echo"<td><b>Ora Fine</b></td>";
                  echo"<td><b>Aula</b></td>";
                  echo "</tr>";
                  $primo = false;
                }
                if ($corso['data'] == '2015-12-22'){
                                   echo "<tr>";
                                    echo "<td>".$corso['descrizione']."</td>";
                                    echo "<td>".$corso['nome']." ".$corso['cognome']."</td>";
                                    echo "<td>".$corso['ora_inizio']."</td>";
                                    echo "<td>".$corso['ora_fine']."</td>";
                                    echo "<td>".$corso['aula']."</td>";
                                    echo "</tr>";
                            }
                    }
                    if(!$primo) echo "</table><br>";
                    $primo = true;
                    foreach($corsi as $corso){
                if($corso['data'] == '2015-12-23' && $primo){

                  echo "<p>Corsi del 23/12/2015</p>";
                  echo"<table>";
                   echo "<tr>";
                  echo "<td><b>Corso</b></td>";
                  echo "<td><b>Relatore<b></td>";
                  echo"<td><b>Ora Inizio</b></td>";
                  echo"<td><b>Ora Fine</b></td>";
                  echo"<td><b>Aula</b></td>";
                  echo "</tr>";
                  $primo = false;
                }
                if ($corso['data'] == '2015-12-23'){
                                  echo "<tr>";
                                    echo "<td>".$corso['descrizione']."</td>";
                                    echo "<td>".$corso['nome']." ".$corso['cognome']."</td>";
                                    echo "<td>".$corso['ora_inizio']."</td>";
                                    echo "<td>".$corso['ora_fine']."</td>";
                                    echo "<td>".$corso['aula']."</td>";
                                    echo "</tr>";
                            }
                    }
                if(!$primo) echo "</table><br>";
          ?>
      </table>
      </div>
    </div>

      <hr>

      <footer>
      <p align="center" style="font-size:20px">Developed by <a href="http://www.giovannidispoto.it/" target="_blank" style="font-size:20px">Giovanni Dispoto</a></p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../View/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../View/js/ie10-viewport-bug-workaround.js"></script>
    <script src="../View/js/javascript.js"></script>
  </body>
</html>