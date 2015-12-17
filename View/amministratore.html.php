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

    <title>IIS Iscrizione Corsi | Area Amministrazione</title>

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
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a id="textNavBar" class="navbar-brand" href="#">IIS Iscrizione Corsi Autogestione</a>
        </div>
        <div align="right" id="navbar" class="navbar-collapse collapse">


        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      <h1>Ciao, <?php echo "$nome $cognome"?> <button type="submit" onClick ="location.href='index.php?logout'" class="btn btn-warning">Logout</button></h1>
      <p>Seleziona una opzione per vederne il contenuto<br><b>Da grandi poteri derivano grandi responsabilità</b></p>
      <?php if(isset($_GET['error']) && $_GET['error'] == "imp_cancellare"):?>
        <div class="alert alert-warning" id="erroreLogin">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Errore!<br></strong>Impossibile cancellare il corso!
      </div>
      <?endif;?>
      <br>
        <ul class="list-group" style="font-size:140%">
           <button type="button" onclick="location.href='index.php?elenco=all'" class="list-group-item">Vedi l'elenco degli alunni</button>
           <button type="button" onclick="location.href='index.php?elenco=not'" class="list-group-item">Vedi le persone non ancora iscritte</button>
            <button type="button" onclick="location.href='index.php?elenco=relatori'" class="list-group-item">Elimina un relatore</button>
           <button type="button" onclick="location.href='index.php?course=create'" class="list-group-item">Crea un nuovo corso</button>
           <button type="button" onclick="location.href='index.php?course=delete'" class="list-group-item">Elimina un corso</button>
         </ul>
        </div>
      </div>

      <hr>

      <footer>
       <p align="center" style="font-size:15px">Developed by <a href="http://www.giovannidispoto.it/" target="_blank" style="font-size:15px">Giovanni Dispoto</a></p>
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
  </body>
</html>