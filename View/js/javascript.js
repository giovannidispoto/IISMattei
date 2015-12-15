function inizia(){
       document.getElementById("corsiPrimaParte").style.display="block";
       document.getElementById("corsiSecondaParte").style.display="block";
       document.getElementById("corsiTuttoIlGiorno").style.display="block";       
    }

function deselect(nome){
		options = document.getElementsByName(nome);
		for(i = 0; i < options.length; i++){
			options[i].checked = false;
		}
}

function selectFirst(nome){
	options = document.getElementsByName(nome);
	options[0].checked = true;
}

    function nascondi(){
      var gCompleto = document.getElementById("completo");
      var gDiviso = document.getElementById("diviso");
       inizia();
      if(gDiviso.checked){
        document.getElementById("corsiTuttoIlGiorno").style.display="none";
      	 deselect("corso");
       selectFirst("corsoPrimaMezza");
       selectFirst("corsoSecondaMezza");
        }
      if(gCompleto.checked){
        document.getElementById("corsiPrimaParte").style.display="none";
        document.getElementById("corsiSecondaParte").style.display="none";
        deselect("corsoPrimaMezza");
        deselect("corsoSecondaMezza");
        selectFirst("corso");
      }
    }

     function checkError(){
      	var error = getUrlVars()['error'];
      	if(typeof error!== "undefined"){
      		switch(error){
      			case 'user_not_found':
      		}
      	}
      }

	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
		});
		return vars;
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
		var cod_matricola = document.getElementById("cod_matricola").value;
		var nome = document.getElementById("nome").value;
		var cognome = document.getElementById("cognome").value;
		
		if(cod_matricola.length == 0 || nome.length == 0 || cognome.length == 0){
				document.getElementById("erroreLogin").style.display="";
				return false;
		}
		return true;
}
