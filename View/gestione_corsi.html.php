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
    <link href="../View/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../View/js/ie-emulation-modes-warning.js"></script>

    <link href="../View/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../View/css/datepicker.css" rel="stylesheet">

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
          <h1>Crea un nuovo corso</h1>
          <button type="button" onclick=" location.href='index.php' " class="btn btn-primary">Torna indietro</button>
          <br>
          <br>
         <form>
            <div class="form-group">
              <label for="labelCorso">Corso</label>
              <input type="text" class="form-control" id="inputCorso" name="descrizione" placeholder="Nome Corso">
            </div>
            <div class="form-group">
              <label for="labelUsername">Username Relatore</label>
              <input type="text" class="form-control" name="username_relatore" id="inputUsernameRelatore" placeholder="Username Relatore">
            </div>
            <div class="form-group">
              <label for="inputAlula">Aula</label>
              <input type="text" class="form-control" name="aula" id="inputAula" placeholder="Aula">
            </div>
            <div class="form-group">
                 <label for="labelData">Data </label>
                  <div class='input-group date' id='datepicker1'>
                      <input type='text' class="form-control" placeholder="Data"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                   </div>
              </div>
            <div class="form-group">
              <label for="inputOraInizio">Ora Inizio</label>
              <select class="form-control">
                <option>8:30</option>
                <option>10:55</option>
              </select>
            </div>
             <div class="form-group">
              <label for="inputOraFine">Ora Fine</label>
              <select class="form-control">
                <option>10:55</option>
                <option>13:00</option>
              </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
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
    <script src="../View/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../View/js/ie10-viewport-bug-workaround.js"></script>
    <script>
     $(document).ready(function () {
                $("#datepicker1").datepicker({
                  format: "yyyy-mm-dd",
                  startDate: '2015-12-21',
                  endDate: '2015-12-23'
                });
            });
    </script>
  </body>
</html>