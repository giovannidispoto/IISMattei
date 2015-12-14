<?php
			/*
					Array ( [descrizione] => Corso 
									[relatore] => rel-esistente 
									[username_relatore] => a 
									[username_nuovo_relatore] => 
									[nome_relatore] => 
									[cognome_relatore] => 
									[password_relatore] => 
									[aula] => 1 
									[data] => 2015-12-21 
									[ora_inizio] => 8.30 
									[ora_fine] => 10.55 ) 
			*/
			
			$descrizione = htmlspecialchars($_POST['descrizione'],ENT_QUOTES,"utf-8");
			$descrizione = escape_string($descrizione);

			$db = new Database();
			$db->connect();

			$username_relatore = htmlspecialchars($_POST['username_nuovo_relatore'],ENT_QUOTES,"utf-8");
			$username_relatore = escape_string($username_relatore);

			$nome_relatore = htmlspecialchars($_POST['nome_relatore'],ENT_QUOTES,"utf-8");
			$nome_relatore = escape_string($nome_relatore);

			$cognome_relatore = htmlspecialchars($_POST['cognome_relatore'],ENT_QUOTES,"utf-8");
			$cognome_relatore = escape_string($cognome_relatore);

			$password_relatore = htmlspecialchars($_POST['password_relatore'],ENT_QUOTES,"utf-8");
			$password_relatore = escape_string($password_relatore);

			$result = $db->createRelatore($username_relatore,$nome_relatore,$cognome_relatore,$password_relatore);
			if(!$result) die("Problema nella creazione del Relatore");
		
			$result = $db->checkRelatore($username_relatore);
			if(!$result) header("Location: index.php?error=invalid_username");

			$aula = intval($_POST['aula']) or die("L'aula è numerica!<br> Qualcosa è andato storto!");
			$max_iscritti = intval($_POST['max_iscritti']) or die("il numero max di iscritti è numerico <br> Qualcosa è andato storto!");
			$data = htmlspecialchars($_POST['data'],ENT_QUOTES,"utf-8");
			$data = escape_string($data);

			//if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date) header("Location: index.php?error=invalid_date");

			$ora_inizio = $_POST['ora_inizio'];
			$ora_fine = $_POST['ora_fine'];

			$result = $db->registraCorso($descrizione,$username_relatore,$aula,$max_iscritti,$data,$ora_inizio,$ora_fine);
			if(!$result) header("Location:index?error=error_create_course");
?>