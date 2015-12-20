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

    <title>IIS Iscrizione Corsi </title>

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
  </head>

  <body onLoad="nascondi();controllo();">

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
      <?php if(isset($corso_pieno)):?>
    <div class="alert alert-warning" id="erroreLogin">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Errore!<br></strong>Il corso <?php echo $corso_pieno?> è pieno;
      </div>
<?php endif;?>

<?php if(isset($_GET['errore']) && $_GET['errore'] == "seleziona_un_corso"):?>
    <div class="alert alert-warning" id="erroreLogin">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Errore!<br></strong>Seleziona un corso
      </div>
<?php endif;?>
      <h1>Ciao, <?php echo stripslashes($nome)." ".stripslashes($cognome);?> <input type="button" value="logout" onClick ="location.href='index.php?logout'" class="btn btn-warning"></h1>
      <p>Scegli i corsi a cui vorresti iscriverti <b><?php echo"$day $date";?></b></p>
        <!--Scelta corsi giorno 21-->
        <br>
          <div id="formCorsi" class="">
            <form action="?register=<?php echo $control;?>" method="post">
                
                  <!-- Lista Corsi-->
                 <p style="margin-left:-10px"><input type="radio" name="divisioneCorsi" id="completo" value="completo" onClick="nascondi()" checked><b>&nbspCorsi tutta la giornata</b></p>
                 <div id="corsiTuttoIlGiorno" style="text-align: left;"> 
                 <?php if(!isset($corsi) || empty($corsi)):?>
                 <p>Non ci sono corsi da mostrare</p>
               <?php else:?>
                  <?php $primo = true;
                       foreach($corsi as $course){
                        if($day == 'Mercoledì'){
                        if($course['ora_inizio'] == "09:05" && $course['ora_fine'] == "12:30"){
                          if($primo){
                            echo "<p>Corsi per tutta la giornata (09:05,12:30)</p>";
                            echo "<input type='radio' name='corso' value='".$course['id']."' id ='corsoGiornata' checked>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                            $primo = false;
                          }else{
                         echo "<input type='radio' name='corso' value='".$course['id']."' id ='corsoGiornata'>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                         }
                       }
                        }else if($course['ora_inizio'] == "09:05" && $course['ora_fine'] == "12:50"){
                          if($primo){
                            echo "<p>Corsi per tutta la giornata (09:05,12:50)</p>";
                            echo "<input type='radio' name='corso' value='".$course['id']."' id ='corsoGiornata' checked>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                            $primo = false;
                          }else{
                         echo "<input type='radio' name='corso' value='".$course['id']."' id ='corsoGiornata'>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                       }
                    }
                  }?>
                  <?php endif;?>
                  </div>

                  <br>
          <p style="margin-left:-10px"><input type="radio" name="divisioneCorsi" id="diviso" value="diviso"onClick="nascondi()"><b>&nbspCorsi divisi</b></p>

                  <div id="corsiPrimaParte">
                   <?php if(!isset($corsi) || empty($corsi)):?>
                 <p>Non ci sono corsi da mostrare</p>
               <?php else:?>
                  <?php $primo = true;
                      foreach($corsi as $course){
                    if($course['ora_inizio'] == "09:05" && $course['ora_fine'] == "11:00"){ 
                        if($primo){
                          echo "<p>Corsi per la prima metà giornata (09:05, 11:00)</p>";
                          echo "<input type='radio' name='corsoPrimaMezza' value='".$course['id']."' id ='corsoPrimaMezza' checked>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                           $primo = false;
                        }else{
                      echo "<input type='radio' name='corsoPrimaMezza' value='".$course['id']."' id ='corsoPrimaMezza'>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                        }
                     }
                   }
                  ?>
                <?php endif;?>
                   </div>
                   <div id="corsiSecondaParte">
                    <?php if(!isset($corsi) || empty($corsi)):?>
                 <p>Non ci sono corsi da mostrare</p>
               <?php else:?>
                   <?php $primo = true;
                   foreach($corsi as $course){
                    if($day == 'Mercoledì'){
                          if($course['ora_inizio'] == "11:10" && $course['ora_fine'] == "12:30"){
                          if($primo){
                            echo "<p>Corsi per la seconda metà giornata (11:10, 12:30)</p>";
                            echo "<input type='radio' name='corsoSecondaMezza' value='".$course['id']."' id ='corsoSecondaMezza' checked>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                            $primo = false;
                          }else{
                         echo "<input type='radio' name='corsoSecondaMezza' value='".$course['id']."' id ='corsoSecondaMezza'>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                        }
                      }
                        }else if($course['ora_inizio'] == "11:10" && $course['ora_fine'] == "12:50"){
                            if($primo){
                               echo "<p>Corsi per la seconda metà giornata (11:10, 12.50)</p>";
                               echo "<input type='radio' name='corsoSecondaMezza' value='".$course['id']."' id ='corsoSecondaMezza' checked>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                               $primo = false;
                            }else{
                             echo "<input type='radio' name='corsoSecondaMezza' value='".$course['id']."' id ='corsoSecondaMezza'>&nbsp".stripslashes($course['descrizione'])."</input><br>";
                            }
                          }
                   }?>
                 <?php endif;?>
                   </div>
                  <br>
                  <button type="submit" class="btn btn-success">Prossimo</button>
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
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../View/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../View/js/ie10-viewport-bug-workaround.js"></script>
    <script src="../View/js/javascript.js"></script>
  </body>
</html>