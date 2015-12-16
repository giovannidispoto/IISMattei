<?php 
@defined('INCLUDED') or die("Impossibile accedere al file");
?>
<html>
  <head>
      <title>Bevenuto</title>
      <meta charset="utf8">
  </head>
  <body>
     <h1>Bevenuto nel sito <?php echo $nome." ".$cognome?></h1>
     <form action="?logout">
     <input type="submit" value="logout" name="logout">
     </form>
  </body>
</html>


