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

    <title>IIS Iscrizine Corsi</title>

    <!-- Bootstrap core CSS -->
    <link href="View/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="View/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="View/jumbotron.css" rel="stylesheet">
    <script src="View/js/ie-emulation-modes-warning.js"></script>

  </head>

  <body onLoad="Inizia()">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a id="textNavBar" class="navbar-brand" href="#">IIS Iscrizione Corsi Autogestione</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div id="" class="container">

    <div class="alert alert-warning" style="display:none" id="erroreLogin">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Errore!<br></strong>Riempi i campi username e password!
      </div>
        <div id="loginAlunno" align="center">
        <form class="navbar-form navbar-right" action="?auth=alunno" method="post" >
          <div>
            <a>Area login alunno</a><br><br>
          </div>
            <input type="text" placeholder="Matricola alunno" name="username" id="username" class="form-control"><br><br>
            <input type="password" placeholder="Password" name = "password" id="password" class="form-control"><br><br>
            <input type="hidden" name="token" value="<?php echo $token?>">
          <button type="submit" onClick="return controlloFormLogin();" class="btn btn-success">Entra</button>
          <button onClick="Cambia();" type="submit" class="btn btn-success">Sei un docente?</button>
        </form>
        </div>



        <div id="loginDocente" align="center">
        <form class="navbar-form navbar-right">
          <div>
            <a>Area login docente</a><br><br>
          </div>
            <input type="text" placeholder="Codice docente" class="form-control"><br><br>
            <input type="password" placeholder="Password" class="form-control"><br><br>
          <button type="submit" class="btn btn-success">Entra</button>
          <button onClick="Cambia();" type="submit" class="btn btn-success">Sei un alunno?</button>
        </form>
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
    <script>window.jQuery || document.write('<script src="View/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="View/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="View/js/ie10-viewport-bug-workaround.js"></script>
    <script src="View/js/javascriptHome.js"></script>
    <script src="View/js/javascriptHome.js"></script>
  </body>
</html>