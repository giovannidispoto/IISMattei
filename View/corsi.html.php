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

    <title>IIS Iscrizione Corsi</title>

    <!-- Bootstrap core CSS -->
    <link href="../View/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../View/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../View/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../View/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onLoad="inizia()">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a id="textNavBar" class="navbar-brand" href="#">IIS Iscrizione Corsi Autogestione</a>
        </div>
      </div>
    </nav>
<center>
    <h1>Bevenuto <?php echo "$nome $cognome"?></h1>
    <p>scegli i corsi a cui ti vuoi iscrivere</p>

    <input type="button" value="Logout" onclick="location.href='index.php?logout'">

</center>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container" >
        <div id="corsiForm" align="center">
        <ul id="listeCorsi">
        <!--Scelta corsi giorno 21-->
        <li>
          <div id="formUno" class="">
            <form name="GiornoUno"action="" method="post">
                <a class="btn btn-success" id="button1" onClick="mostra('1');">Corsi giorno 21 - mostra</a>
                <br>
                <div id="corsiUno">
                  <!-- Lista Corsi-->
                  <?php
                  if(isset($primo_giorno_courses)){
                      foreach($primo_giorno_courses as $cours){
                        echo "<input name='".$cours['id']."'type='checkbox'>".$cours['descrizione']." ".$cours['ora_inizio'].", ".$cours['ora_fine']."<br>";
                      }
                      echo ' <br><button type="submit" class="btn btn-success">Vai</button>';
                    }
                  ?>

                </div>
            </form>
          </div>
        </li>

        <!--Scelta corsi giorno 22-->
        <li>
          <div id="formDue" class="">
            <form name="GiornoDue" action="" method="post">
                <a class="btn btn-success" id="button2" onClick="mostra('2');">Corsi giorno 22 - mostra</a>
                <div id="corsiDue">
                  <!-- Lista Corsi -->
                  <?php
                  if(isset($secondo_giorno_courses)){
                      foreach($secondo_giorno_courses as $cours){
                        echo "<input name='".$cours['id']."'type='checkbox'>".$cours['descrizione']." ".$cours['ora_inizio'].", ".$cours['ora_fine']."<br>";
                      }
                        echo'<br><button type="submit" class="btn btn-success">Vai</button>';
                      }
                  ?>
                  <!---->

                </div>
            </form>
          </div>
        </li>

        <!--Scelta corsi giorno 23-->
        <li>
          <div id="formTre" class="">
            <form name="GiornoTre" action="" method="post">
                <a class="btn btn-success" id="button3" onClick="mostra('3');">Corsi giorno 23 - mostra</a>
                <div id="corsiTre">
                  <!-- Lista Corsi-->
                  <?php
                  if(isset($terzo_giorno_courses)){
                      foreach($terzo_giorno_courses as $cours){
                        echo "<input id ='".$cours['id']."'type='checkbox'>".$cours['descrizione']." ".$cours['ora_inizio'].", ".$cours['ora_fine']."<br>";

                      }
                        echo '<br><button type="submit" class="btn btn-success">Conferma</button>';
                    }
                  ?>
                  <!---->

                </div>
              </form>
            </div>
          </li>
          </ul>
        </div>
      </div>
    </div>

      <hr>

      <footer>
        <p align="center">&copy; Giovanni Dispoto 2015 Company, Inc.</p>
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