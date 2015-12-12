<?php
			function getDay($date){
				$days = array ("Domenica", "Lunedì", "Martedì", "Mercoledì", "Giovedì",    "Venerdì","Sabato"); 
				list($yyyy,$mm,$dd) = explode('/',$date);
				$numbrdayweek = date("w",mktime(0,0,0,$mm, $dd, $yyyy)); 

				return $days[$numbrdayweek];

			}

			function americanDate($date){
				list($dd,$mm,$yyyy) = explode('/',$date);
				$result = "$yyyy-$mm-$dd";
				return $result;
			}