

//esta funcao sempre é chamada durante a inicializacao da pagina
//carrega o autocomplete do input de endereco.
function initialize(){

	
	
	checkFacebookId(1);

	var input = (document.getElementById('endereco'));
	var autocomplete = new google.maps.places.Autocomplete(input);

}

initialize();

//verifica se ja existe um cadastro na tabela Pessoa com o facebookid informado
function checkFacebookId(facebookid){
	//fazer uma query para contar o numero de cadastros com o facebookid informado
	//deve retornar 0 se nao existir ou 1, caso contrario. (nao da pra ter mais de 1 cadastro com o mesmo facebookid)
	var ajax = $.ajax({
		url: 'action/verificaPessoaAction.php',
		type: 'POST',
		async: true,
		data: {fbid: facebookid},
		success: function (data) {
        	alert(data);
    	},

		error: function (xhr, ajaxOptions, thrownError) {
	        //alert(xhr.status);
	        //alert(thrownError);
      	}
	});
}

//funcao que trata o evento de clickar no botao confirmar da pagina first.php
function confirmButton(){
	var address = $("#endereco").val();
	if(!address || address.length == 0){
		alert("Informe um endereco!");
	}else{
		//inserir dados na tabela Pessoa


		//redirecionar para a home.php

		alert("ok");
	}
}

function insertPerson(){
	var ajax = $.ajax({
		url: 'action/cadastrarPessoaAction.php',
		type: 'POST',
		async: true,
		data: {fbid: facebookid, coordx: coordx, coordy: coordy},
		success: function (data) {
        	alert(data);
    	},

		error: function (xhr, ajaxOptions, thrownError) {
	        //alert(xhr.status);
	        //alert(thrownError);
      	}
	});	

}