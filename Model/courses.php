<?php
@defined('INCLUDED') or die("Impossibile accedere al file");
    $nome = $_SESSION["name"];
    $cognome = $_SESSION["surname"];
    $db = new Database();
    $db->connect();
    $_SESSION['giorno'] = $db->getStatoRegistrazione($_SESSION['id']);
    if(isset($_GET['corso_pieno']) && !empty($_GET['corso_pieno'])){
    		$corso_pieno = $_GET['corso_pieno'];
    		$corso_pieno = $db->getCourseName($corso_pieno); //gestire corso pieno nella View
    	}
	   
    switch($_SESSION['giorno']){

    		case 0:
    						$date = '21/12/2015';
    						$control = 0;
    						$courses = $db->getCourses(americanDate($date));
    						$day = getDay($date);
    						
    						break;
    		case 1:
    						$date = '22/12/2015';
    						$control = 1;
    						$courses = $db->getCourses(americanDate($date));
    						$day = getDay($date);
    						
    						break;
    		case 2:
    						$date = '23/12/2015';
    						$control = 2;
    						$courses = $db->getCourses(americanDate($date));
    						$day = getDay($date);
    						
    						break;
    		case 3:    $corsi = $db->getSubscribedCourses($_SESSION['id']);
    						break;

    }

    switch($_SESSION['giorno']){
        case 0:
        case 1:
        case 2:
                 foreach($courses as $course){
                        if($db->corsoPieno($course['id'])){
                             continue;
                               
                        }else {
                            $corsi[] = array(
                                    'id' => $course['id'],
                                    'descrizione' => $course['descrizione'],
                                    'ora_inizio' => $course['ora_inizio'],
                                    'ora_fine' => $course['ora_fine'],
                                            );
                        }
                    }
                    break;
           
          }

  	
  	


