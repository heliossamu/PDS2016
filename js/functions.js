//aqui vai todas as funçoes js utilizadas pelo site

function insertMedicine(){
	//primeiro, preciso pegar o pessoaid atraves do facebookid
	var ajax = $.ajax({
		url: 'action/carregarPessoaIdAction.php',
		type: 'POST',
		async: true,
		data: $("#cadastro_remedio").serialize(),
		success: function (data) {
        	alert(data);
    	},

		error: function (xhr, ajaxOptions, thrownError) {
	        //alert(xhr.status);
	        //alert(thrownError);
      	}
	});	


	/*
	var ajax = $.ajax({
		url: 'action/cadastrarMedicamentoAction.php',
		type: 'POST',
		async: true,
		data: $("#cadastro_remedio").serialize(),
		success: function (data) {
        	alert("cadastro realizado com sucesso!");
    	},

		error: function (xhr, ajaxOptions, thrownError) {
	        //alert(xhr.status);
	        //alert(thrownError);
      	}
	});
	*/
}


function loadMarkers(){

	var ajax = $.ajax({
		url: 'action/carregarMarcadoresAction.php',
		type: 'POST',
		async: true,
		//data: $("#cadastro_remedio").serialize(),
		success: function (data) {
        	
        	
        	$.each($.parseJSON(data), function() {
		        var marker = new google.maps.Marker({
	                position: new google.maps.LatLng(this.lat, this.lng),
	                title: this.nome,
	                map: map
	            });
		    });
			
    	},

		error: function (xhr, ajaxOptions, thrownError) {
	        alert(xhr.status);
	        alert(thrownError);
      	}
	});
}



