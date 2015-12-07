<?php

    $nome = $_SESSION["name"];
    $cognome = $_SESSION["surname"];
    $db = new Database();
    $db->connect();
    $primo_giorno_courses = $db->getCourses('2015/12/21');
    $secondo_giorno_courses = $db->getCourses('2015/12/22');
    $terzo_giorno_courses = $db->getCourses('2015/12/23');


