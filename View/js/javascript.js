function Inizia(){
	document.getElementById("corsiUno").style.display = "none";
	document.getElementById("corsiDue").style.display = "none";
	document.getElementById("corsiTre").style.display = "none";
}

function MostraUno(){
	var corsiUno = document.getElementById("corsiUno");
	if(corsiUno.style.display == "block"){
		corsiUno.style.display = "none";
		Inizia();
	}else {
		Inizia();
		corsiUno.style.display = "block";
	}
}

function MostraDue() {
	var corsiDue = document.getElementById("corsiDue");
	if(corsiDue.style.display == "block"){
		corsiDue.style.display = "none";
		Inizia();
	}else {
		Inizia();
		corsiDue.style.display = "block";
	}
}

function MostraTre() {
	var corsiTre = document.getElementById("corsiTre");
	if(corsiTre.style.display == "block"){
		corsiTre.style.display = "none";
		Inizia();
	}else {
		Inizia();
		corsiTre.style.display = "block";
	}
}