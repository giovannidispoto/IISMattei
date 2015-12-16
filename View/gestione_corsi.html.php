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
          <?php if(isset($_GET['error']) && $_GET['error'] == 'riempi'):?>
             <div class="alert alert-warning" id="erroreCampi">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Errore!<br></strong>Riempi tutti i campi!
            </div>
          <?php endif;?>

           <?php if(isset($_GET['error']) && $_GET['error'] == 'invalid_username'):?>
             <div class="alert alert-warning" id="erroreUsername">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Errore!<br></strong>Username non valido
            </div>
          <?php endif;?>

           <?php if(isset($_GET['error']) && $_GET['error'] = 'exist_username'):?>
             <div class="alert alert-warning" id="erroreCampi">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Errore!<br></strong>Username Esistente!
            </div>
          <?php endif;?>

            <div class="alert alert-warning" style="display:none" id="erroreCampi">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Errore!<br></strong>Riempi tutti i campi!
            </div>

             <div class="alert alert-warning" style="display:none" id="erroreUsernameEsistente">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Errore!<br></strong>L'username inserito è già stato utilizzato
            </div>

           <div class="alert alert-warning" style="display:none" id="errorePassword">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Errore!<br></strong>Le password non corrispondono!
            </div>
            <div class="alert alert-warning" style="display:none" id="erroreAula">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Errore!<br></strong>L'aula deve essere numerica!
            </div>
             <div class="alert alert-warning" style="display:none" id="erroreMaxIscritti">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Errore!<br></strong>Il Numero massimo di iscritti deve essere numerico!
            </div>
            <br>
          <!-- Form Corso -->
         <form action="?course=new_course" method="post">
            <div class="form-group">
              <label for="labelCorso">Corso</label>
              <input type="text" class="form-control" id="inputCorso" name="descrizione" placeholder="Nome Corso">
            </div>
           <p><input type="radio" name="relatore" value="rel-esistente" id="rel-esistente" onclick="controlloAccount();" checked> Account Esistente</p>
            <div class="form-group" id="rel-esistente-div">
              <label for="labelUsername">Username Relatore</label>
              <input type="text" class="form-control" name="username_relatore" id="inputUsernameRelatore" placeholder="Cerca per nome">
            </div>
           <p><input type="radio" name="relatore" value="rel-nuovo" id="rel-nuovo" onclick="controlloAccount();"> Nuovo Account</p>            
            <div class="form-group" id="rel-nuovo-div">
              <div class="form-group" id="usernameDiv">
                   <label for="labelUsername">Username </label>
                    <input type="text" class="form-control" name="username_nuovo_relatore" id="inputNuovoUsernameRelatore" placeholder="Username Relatore">
              </div>
              <label for="labelUsername">Nome </label>
              <input type="text" class="form-control" name="nome_relatore" id="inputNuovoNomeRelatore" placeholder="Nome Relatore">
              <label for="labelUsername">Cognome </label>
              <input type="text" class="form-control" name="cognome_relatore" id="inputNuovoCognomeRelatore" placeholder="Cognome Relatore">
              <label for="labelUsername">Passowrd</label>
              <input type="password" class="form-control" name="password_relatore" id="inputNuovoPasswordRelatore" placeholder="Password">
              <label for="labelUsername">Ripeti Password</label>
              <input type="password" class="form-control" id="inputNuovoPassword2Relatore" placeholder="Ripeti Password">
            </div>
             <div class="form-group">
              <label for="inputAlula">Aula</label>
              <input type="text" class="form-control" name="aula" id="inputAula" placeholder="Aula">
            </div>
            <div class="form-group">
              <label for="inputMaxIscritti">Numero Massimo Iscritti</label>
              <input type="text" class="form-control" name="max_iscritti" id="inputMaxIscritti" placeholder="Numero Massimo Iscritti">
            </div>
            <div class="form-group">
     
                 <label for="labelData">Data </label>
                  <div class='input-group date' id='datepicker1'>
                      <input type='text' class="form-control" name="data" id="inputData" placeholder="Data"/>
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                   </div>
      
              </div>
            <div class="form-group">
              <label for="inputOraInizio">Ora Inizio</label>
              <select onClick="controlloOra();"class="form-control" name="ora_inizio" id="ora_inizio">
                <option value="9:05:00">9:05</option>
                <option value="11:10:00">11:10</option>
              </select>
            </div>
             <div class="form-group">
              <label for="inputOraFine">Ora Fine</label>
              <select class="form-control" name="ora_fine" id="ora_fine">
              </select>
            </div>
            <button type="submit" onClick="alert(ajax());return checkForm();"class="btn btn-default">Submit</button>
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
        }
     });
    $("#inputNuovoUsernameRelatore").keydown(function (e){
        if(e.keyCode == 13){
          ajaxCall();
        }
    });

    $("#inputNuovoUsernameRelatore").focusout(function(){
        ajaxCall();
    });

    $('#inputData').focusout(controlloData());

    function ajaxCall(){
        var term =  $("#inputNuovoUsernameRelatore").val();
          var richiesta = $.ajax({
                url: "../Model/controllo_username.php",
                type: "GET",
                data: "username="+term,
                dataType: "html",
                success: function (risposta){
                  if(risposta == "false"){
                        $("#usernameDiv").attr("class","form-group has-error");
                  }else if(risposta == "true"){
                            $("#usernameDiv").attr("class","form-group has-success");
                  }

                },
                error: function(){
                  alert("Chiamata Fallita!");
                }
          });
    }

    function controlloData(){
      var data = document.getElementById("inputData");
      var fine = document.getElementById("ora_fine");
      if(data.value == "2015-12-23"){
        outputFine += "<option value='11:00:00'>11:00</option>";
        outputFine += "<option value='12:30:00'>12.30</option>";
        fine.innerHTML=output;
      }

    }
     

     function controlloOra(){
        var inizio = document.getElementById("ora_inizio");
        var ora = inizio.options[inizio.selectedIndex].text;
        var fine = document.getElementById("ora_fine");
        var data = document.getElementById("inputData");
        var inizio = document.getElementById("ora_inizio");
        var fine = document.getElementById("ora_fine");
        var output = "";
        if(data.value=="2015-12-23"){
          switch(ora){
            case '9:05':  output += "<option value='11:00:00'>11:00</option>";
                          output += "<option value='12:30:00'>12.30</option>";
                          break;
            case '11:10':
                          output += "<option value='12:30:00'>12:30</option>";
                          break;
           
        }
        }else{
      switch(ora){
            case '9:05':  output += "<option value='11:00:00'>11:00</option>";
                          output += "<option value='12:50:00'>12.50</option>";
                          break;
            case '11:10':
                          output += "<option value='12:50:00'>12:50</option>";
                          break;
           
        }
      }
        fine.innerHTML=output;
     }

     function checkForm(){
          if((document.getElementById('inputCorso').value.trim()).length > 0){
              if(document.getElementById("rel-esistente").checked){
                  if((document.getElementById('inputUsernameRelatore').value.trim()).length > 0){
                    if((document.getElementById('inputAula').value.trim()).length > 0){
                      if(isNaN(document.getElementById('inputAula').value.trim())){
                                    document.getElementById('inputData').value = "";
                                    document.getElementById('erroreAula').style.display="";
                                    return false;
                                  }
                          if(isNaN(document.getElementById('inputMaxIscritti').value.trim())){
                                 document.getElementById('inputMaxIscritti').value="";
                                 document.getElementById('erroreMaxIscritti').style.display="";
                                 return false;
                             }
                      if((document.getElementById('inputData').value.trim()).length > 0){
                              return true;
                  }
                }
              }
              document.getElementById('erroreCampi').style.display="";
                return false;
              }else if(document.getElementById("rel-nuovo").checked){
                  if((document.getElementById('inputNuovoUsernameRelatore').value.trim()).length > 0){
                    if((document.getElementById('inputNuovoNomeRelatore').value.trim()).length > 0){
                      if((document.getElementById('inputNuovoCognomeRelatore').value.trim()).length > 0){
                        if((document.getElementById('inputNuovoPasswordRelatore').value.trim()).length > 0){
                          if((document.getElementById('inputNuovoPassword2Relatore').value.trim()).length > 0){
                             if((document.getElementById('inputAula').value.trim()).length > 0){
                              if((document.getElementById('inputData').value.trim())){
                                 if(isNaN(document.getElementById('inputAula').value.trim())){
                                    document.getElementById('inputData').value = "";
                                    document.getElementById('erroreAula').style.display="";
                                    return false;
                                  }
                                  if(isNaN(document.getElementById('inputMaxIscritti').value.trim())){
                                    document.getElementById('inputMaxIscritti').value="";
                                     document.getElementById('erroreMaxIscritti').style.display="";
                                     return false;
                                  }
                                  if(document.getElementById('usernameDiv').getAttribute("class") == "form-group has-error"){
                                     document.getElementById('erroreUsernameEsistente').style.display="";
                                     return false;
                                  }
                                  if(document.getElementById('inputNuovoPasswordRelatore').value.trim() != document.getElementById('inputNuovoPassword2Relatore').value.trim()){
                                      document.getElementById('errorePassword').style.display="";
                                      return false;
                                  }else 
                                      return true;
                              }
                            }
                          }
                        }
                      }
                    }
                  }
               }
             }
    document.getElementById('erroreCampi').style.display="";
    return false;
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