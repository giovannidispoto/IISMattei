function Inizia(){
	//document.getElementById("loginDocente").style.display = "none";
}

function Cambia(){
	var alunno = document.getElementById("loginAlunno");
	var docente = document.getElementById("loginDocente");
	if(alunno.style.display == "none"){
		alunno.style.display = "block";
		docente.style.display = "none";
	}else{
		docente.style.display = "block";
		alunno.style.display = "none";
	}
}

function controlloFormLogin(){
		var user_alunno = document.getElementById("username").value;
		var passw_alunno = document.getElementById("password").value;
		if(user_alunno.length == 0 || passw_alunno.length == 0){
				document.getElementById("erroreLogin").style.display="";
				return false;
		}
		return true;
}
