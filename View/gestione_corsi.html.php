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

    <link rel="stylesheet" href="../View/css/jquery-ui.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

     <style>
     .ui-autocomplete-loading {
    background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
  }

.autocomplete-suggestions { border: 1px solid #999; background: #fff; cursor: default; overflow: auto; }
.autocomplete-suggestion { padding: 10px 5px; font-size: 1.2em; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #f0f0f0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399ff; }
     </style>
    
  </head>

  <body onLoad="controlloOra();controlloAccount();">

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
           <p><input type="radio" name="relatore" value="rel-esistente" id="rel-esistente" onclick="controlloAccount();" checked> Account Esistente</p>
            <div class="form-group" id="rel-esistente-div">
              <label for="labelUsername">Username Relatore</label>
              <input type="text" class="form-control" name="username_relatore" id="inputUsernameRelatore" placeholder="Cerca per nome">
            </div>
           <p><input type="radio" name="relatore" value="nuovo" id="rel-nuovo" onclick="controlloAccount();"> Nuovo Account</p>            
            <div class="form-group" id="rel-nuovo-div">
              <label for="labelUsername">Username </label>
              <input type="text" class="form-control" name="username_relatore" id="inputNuovoUsernameRelatore" placeholder="Username Relatore">
              <label for="labelUsername">Nome </label>
              <input type="text" class="form-control" name="nome_relatore" id="inputNuovoNomeRelatore" placeholder="Nome Relatore">
              <label for="labelUsername">Cognome </label>
              <input type="text" class="form-control" name="cognome_relatore" id="inputNuovoCognomeRelatore" placeholder="Cognome Relatore">
              <label for="labelUsername">Passowrd</label>
              <input type="text" class="form-control" name="password_relatore" id="inputNuovoPasswordRelatore" placeholder="Password">
               <label for="labelUsername">Ripeti Password</label>
              <input type="text" class="form-control" name="password2_relatore" id="inputNuovoPassword2Relatore" placeholder="Ripeti Password">
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
              <select onClick="controlloOra();"class="form-control" name="ora_inizio" id="ora_inizio">
                <option value="8.30">8:30</option>
                <option value="10.55">10:55</option>
              </select>
            </div>
             <div class="form-group">
              <label for="inputOraFine">Ora Fine</label>
              <select class="form-control" name="ora_fine" id="ora_fine">
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
    <!--<script src="../View/js/external/jquery/jquery.js"></script>-->
    <script src="../View/js/jquery-ui.min.js"></script>
      <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
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

     $("#inputUsernameRelatore").autocomplete({
        source: function(request, response){
            $.get("../Model/search_relatori.php", {
                term:request.term
                }, function(data){
                response($.map(data, function(item) {
                    return {
                        
                        value: item.username
                    }
                }))
            }, "json");
        },
        minLenght:2
     });

     function controlloOra(){
        var inizio = document.getElementById("ora_inizio");
        var ora = inizio.options[inizio.selectedIndex].text;
        var fine = document.getElementById("ora_fine");
        var output = "";
        switch(ora){
            case '8:30':  output += "<option value='10.55'>10.55</option>";
                          output += "<option value='13.00'>13.00</option>";
                          break;
            case '10:55':
                          output += "<option value='13.00'>13.00</option>";
                          break;
        }
        fine.innerHTML=output;
     }

     function controlloAccount(){
          var rel_nuovo = document.getElementById("rel-nuovo");
          var rel_esistente = document.getElementById("rel-esistente");
          var rel_nuovo_div = document.getElementById("rel-nuovo-div");
          var rel_esistente_div = document.getElementById("rel-esistente-div");

          if(rel_nuovo.checked){
              rel_esistente_div.style.display="none";
              rel_nuovo_div.style.display="";
         }
         if(rel_esistente.checked){
             rel_esistente_div.style.display="";
              rel_nuovo_div.style.display= "none";
         }
       }
    </script>
  </body>
</html>