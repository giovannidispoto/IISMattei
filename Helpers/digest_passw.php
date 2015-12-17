<?php
		$txt = $argv[1];
		$password = hash("sha512",$txt);
		print $password."\n";
	?>