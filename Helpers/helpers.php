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

		function escape_string($string) {
		    $regex = "/[\\+\\-\\=\\&\\|\\!\\(\\)\\{\\}\\[\\]\\^\\\"\\~\\*\\<\\>\\?\\:\\\\\\/]/";
		    return preg_replace($regex, addslashes('\\$0'), $string);
		}

		function changeFormatDate($date){
			list($dd,$mm,$yyyy) = explode('-',$date);
			$result = "$dd/$mm/$yyyy";
			return $result;
		}

		function dropSeconds($hour){
			list($hours,$minutes,$seconds) = explode(':',$hour);
			$result = "$hours:$minutes";
			return $result;
		}

