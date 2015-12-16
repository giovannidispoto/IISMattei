<?php
include '../Helpers/secure_session.php';
include'../Class/Database.class.php';
include'../Helpers/helpers.php';
      session_secure_start();
      define("INCLUDED",1);

    if(isset($_GET["logout"])){
        $_SESSION = array();
        session_destroy();
      }
       if(!isset($_SESSION['id'])){
        header("Location:../index.php");
      }

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Alunno'){
        $area = 'AreaAlunni';
        include '../View/access_denied.html.php';
      }

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Relatore'){
         $area = 'AreaRelatori';
          include '../View/access_denied.html.php';
      }

      if(isset($_SESSION['id']) && $_SESSION['type'] == 'Amministratore'){
      	if(isset($_GET['elenco']) and $_GET['elenco'] == "all"){
		      		$iscritto = true;
		      		include '../Model/elenco_alunni.php';
		      		include '../View/elenco_alunni.html.php';
      	}else if (isset($_GET['elenco']) && $_GET['elenco'] == "not"){
		      		$iscritto = false;
		      		include '../Model/elenco_alunni.php';
		      		include '../View/elenco_alunni.html.php';
      	}else if(isset($_GET['course']) && $_GET['course'] == "create"){
      			include '../View/gestione_corsi.html.php';
      	}else if(isset($_GET['course']) && $_GET['course'] == "new_course"){
								   if(isset($_POST['descrizione']) && !empty($_POST['descrizione'])){
										if(isset($_POST['relatore']) && !empty($_POST['relatore'])){
											switch($_POST['relatore']){
												case "rel-esistente":
																						if(isset($_POST['username_relatore']) && !empty($_POST['username_relatore'])){
																							if(isset($_POST['aula']) && !empty($_POST['aula'])){
																								if(isset($_POST['data']) && !empty($_POST['data'])){
																									if(isset($_POST['ora_inizio']) && !empty($_POST['ora_inizio'])){
																										if(isset($_POST['ora_fine']) && !empty($_POST['ora_fine'])){
																											include'../Model/create_course.php';
																											include'../View/corso_creato.html.php';
																										}else header("Location:index.php?course=create&error=riempi");
																									}else header("Location:index.php?course=create&error=riempi");
																								}else header("Location:index.php?course=create&error=riempi");
																							}else header("Location:index.php?course=create&error=riempi");
																						}else header("Location:index.php?course=create&error=riempi");
																							break;
												case "rel-nuovo":
															if(isset($_POST['username_nuovo_relatore'])&& !empty($_POST['username_nuovo_relatore'])){
																	if(isset($_POST['nome_relatore'])&& !empty($_POST['nome_relatore'])){
																			if(isset($_POST['cognome_relatore'])&& !empty($_POST['cognome_relatore'])){
																				if(isset($_POST['password_relatore'])&& !empty($_POST['password_relatore'])){
																					if(isset($_POST['aula']) && !empty($_POST['aula'])){
																								if(isset($_POST['data']) && !empty($_POST['data'])){
																									if(isset($_POST['ora_inizio']) && !empty($_POST['ora_inizio'])){
																										if(isset($_POST['ora_fine']) && !empty($_POST['ora_fine'])){
																											include'../Model/create_relator_course.php';
																											include'../View/corso_creato.html.php';
																										}else header("Location:index.php?course=create&error=riempi");
																									}else header("Location:index.php?course=create&error=riempi");
																								}else header("Location:index.php?course=create&error=riempi");
																							}else header("Location:index.php?course=create&error=riempi");
																						}else header("Location:index.php?course=create&error=riempi");
																					}else header("Location:index.php?course=create&error=riempi");
																				}else header("Location:index.php?course=create&error=riempi");
																			}else header("Location:index.php?error=riempi");
																					break;
											}
										}else header("Location:index.php?error=riempi");
									}else header("Location:index.php");
      	}else if(isset($_GET['course']) && $_GET['course'] == 'delete'){
      			if(isset($_GET['course']) && !empty($_GET['delete'])){
      				include '../Model/cancella_corso.php';
      			}
      				include '../Model/elenco_corsi.php';
      				include '../View/elenco_corsi.html.php';
      	}else if(isset($_GET['course']) && $_GET['course'] == 'edit'){
      				die("Modifica");
      	}else{
        $nome = $_SESSION['name'];
        $cognome = $_SESSION['surname'];
        include '../View/amministratore.html.php';
      }
      }
  ?>