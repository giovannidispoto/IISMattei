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
      <h1>Elimina i corsi</h1>
      <p>Puoi eliminare solo i corsi che non hanno iscritti!(tutti quelli che sono sotto)</p>
      <br>
      <button type="button" onclick=" location.href='index.php' " class="btn btn-primary">Torna indietro</button>
      <!-- Elenco corsi -->
      <br>
      <br>
      <table class="table table-striped">
      <?php if(empty($result)):?>
      	<p> Non ci sono corsi da mostrare </p>
      <?php else:?>
        <tr>
            <td><b>Corso </b></td>
            <td><b> Relatore</b></td>
            <td><b> Aula</b> </td>
            <td><b> Data</b> </td>
            <td><b> Ora Inizio</b> </td>
            <td><b> Ora Fine</b></td>
            <td></td>
        </tr>
      <?php foreach($result as $corso):?>
        <tr>
          <td><?php echo stripslashes($corso['descrizione']);?></td>
          <td><?php echo stripslashes($corso['username_relatore']);?></td>
          <td><?php echo $corso['aula'];?></td>
          <td><?php echo changeFormatDate($corso['data']);?></td>
          <td><?php echo dropSeconds($corso['ora_inizio']);?></td>
          <td><?php echo dropSeconds($corso['ora_fine']);?></td>
         <td><input type="button" style=""value="elimina" onclick="location.href='index.php?course=delete&delete=<?php echo $corso['id_corso']?>'" class="btn btn-primary"></td>
      </tr>
      <?php endforeach;endif;?>
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
  </body>
</html>