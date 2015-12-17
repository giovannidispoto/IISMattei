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

    <title>IIS Iscrizione Corsi | Login</title>

    <!-- Bootstrap core CSS -->
    <link href="View/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="View/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="View/css/jumbotron.css" rel="stylesheet">
    <script src="View/js/ie-emulation-modes-warning.js"></script>

    <style>
  .center-block {float: none !important}

    </style>

  </head>

  <body onLoad="checkError();">

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

      <?php if(isset($_GET['error']) && $_GET['error'] = "user_not_found"):?>
             <div class="alert alert-warning" id="erroreLogin">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Errore!<br></strong>Utente non trovato!
      </div>
      <?php endif;?>


        <div id="loginAlunno" class = "row center-block">
          <form action="?auth=alunno" method="post">
            <div>
              <a>Login Alunno</a><br><br>
            </div>
              <input type="text" placeholder="Matricola alunno" name="cod_matricola" id="cod_matricola" class="form-control"><br><br>
              <input type="text" placeholder="Nome" name = "nome" id="nome" class="form-control"><br><br>
              <input type="text" placeholder="Cognome" name = "cognome" id="cognome" class="form-control"><br><br>
            <button type="submit" onClick="return controlloFormLogin();" class="btn btn-success">Entra</button>
           <div style="float:right">
            <input type="button" onClick="cambia('amm')" value="Sei un admin?" class="btn btn-success">
            <input type="button" onClick="cambia('rel')"  class="btn btn-success" value="Sei un relatore?">
             </div>
          </form>
          </div>
        </div>



        <div id="loginAmministratore" class="row center-block" style="display:none">
        <form action="?auth=amministratore"  method="post">
          <div>
            <a>Login Amministratore</a><br><br>
          </div>
            <input type="text" placeholder="username" name="username" id="usernameAmm" class="form-control"><br><br>
            <input type="password" placeholder="Password" name="password" id="passwordAmm" class="form-control"><br><br>
            <input type="hidden" name="token" value="<?php echo $token?>">
          <button type="submit" class="btn btn-success" onClick="return controllo('amm');">Entra</button>
          <div style="float:right">
          <input type="button" onClick="cambia('alu');" value="Sei un alunno?" class="btn btn-success">
          <input type="button" onClick="cambia('rel')" value="Sei un relatore?" class="btn btn-success">
          </div>
        </form>
        </div>



        <div id="loginRelatore" class="row center-block" style="display:none">
        <form action="?auth=relatore" method="post">
          <div>
            <a>Login Relatore</a><br><br>
          </div>
            <input type="text" placeholder="username" name="username" id="username" class="form-control"><br><br>
            <input type="password" placeholder="Password" name="password" id="password" class="form-control"><br><br>
            <input type="hidden" name="token" value="<?php echo $token?>">
          <button type="submit" class="btn btn-success" onClick="return controllo('rel');">Entra</button>
          <div style="float:right">
          <input type="button" onClick="cambia('alu');" value="Sei un alunno?" class="btn btn-success">
          <input type="button" onClick="cambia('amm')" value="Sei un admin?" class="btn btn-success">
        </form>
        </div>

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
    <script>window.jQuery || document.write('<script src="View/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="View/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="View/js/ie10-viewport-bug-workaround.js"></script>
    <script src="View/js/javascript.js"></script>
    <script>

    function controllo(type){
      switch (type){
        case 'amm':var username = document.getElementById("usernameAmm");
                   var password = document.getElementById("passwordAmm");
                    break;
        case 'rel':var username = document.getElementById("username");
                   var password = document.getElementById("password");
                    break;
      }
          if(username.value.length == 0 && password.value.length == 0){
            document.getElementById("erroreLogin").style.display="";
            return false;
          }
          return true;
    }

    function cambia(type){
      var amm = document.getElementById('loginAmministratore');
      var rel = document.getElementById('loginRelatore');
      var alu = document.getElementById('loginAlunno');
      switch(type){
        case 'amm': nascondiTutto();
                    amm.style.display="";
                    break;
        case 'rel':nascondiTutto();
                    rel.style.display="";
                    break;
        case 'alu':nascondiTutto();
                    alu.style.display="";
                    break;
      }
    }

    function nascondiTutto(){
       document.getElementById('loginAmministratore').style.display="none";
       document.getElementById('loginRelatore').style.display="none";
       document.getElementById('loginAlunno').style.display="none";
    }
    </script>
  </body>
</html>