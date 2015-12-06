<?php
    function session_secure_start(){
      ini_set("session.cookie_httponly",1);
      session_start();
      session_regenerate_id();
    }
?>