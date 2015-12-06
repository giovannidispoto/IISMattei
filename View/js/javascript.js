function inizia(){
	document.getElementById("corsiUno").style.display = "none";
	document.getElementById("corsiDue").style.display = "none";
	document.getElementById("corsiTre").style.display = "none";
	document.getElementById("button1").innerHTML = "Corsi giorno 21 -mostra";
	document.getElementById("button2").innerHTML = "Corsi giorno 22 -mostra";
	document.getElementById("button3").innerHTML = "Corsi giorno 23 -mostra";
}

function mostra(cours, day){

	switch(cours){
		case '1':
					var corsi = document.getElementById("corsiUno");
					if(corsi.style.display == "block"){
									corsi.style.display = "none";
										inizia();
										document.getElementById("button1").innerHTML = "Corsi giorno 21 -mostra";
									}else{
										inizia();
										corsi.style.display = "block";
										document.getElementById("button1").innerHTML = "Corsi giorno 21 -nascondi";
									}

							break;
		case '2':
					var corsi = document.getElementById("corsiDue");
					if(corsi.style.display == "block"){
										corsi.style.display = "none";
										inizia();
										document.getElementById("button2").innerHTML = "Corsi giorno 22 -mostra";
									}else{
										inizia();
										corsi.style.display = "block";
										document.getElementById("button2").innerHTML = "Corsi giorno 22 -nascondi";
									}
							break;
		case '2':
		var corsi = document.getElementById("corsiTre");
					if(corsi.style.display == "block"){
										inizia();
										document.getElementById("button3").innerHTML = "Corsi giorno 23 -mostra";
									}else{
										inizia();
										corsi.style.display = "block";
										document.getElementById("button3").innerHTML = "Corsi giorno 23 -nascondi";
									}
						break;
	}
}