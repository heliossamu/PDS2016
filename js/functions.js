//aqui vai todas as funçoes js utilizadas pelo site

function insertMedicine(){
	var serialized = $("#cadastro_remedio").serialize();
	//primeiro, preciso pegar o pessoaid atraves do facebookid
	var ajax = $.ajax({
		url: 'action/carregarPessoaIdAction.php',
		type: 'POST',
		async: true,
		data: $("#cadastro_remedio").serialize(),
		success: function (data) {
			var pessoaid = data;
    		var ajax2 = $.ajax({
				url: 'action/cadastrarMedicamentoAction.php',
				type: 'POST',
				async: true,
				data: serialized + "&pessoaid=" + pessoaid,
				success: function (data) {
		        	alert("cadastro realizado com sucesso!");
		    	},

				error: function (xhr, ajaxOptions, thrownError) {
			        //alert(xhr.status);
			        //alert(thrownError);
		      	}
			});    	



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

	//por ser utilizado em mapa.js, sabemos qual o facebookid esta sendo utilizado
	//so carregarei os pessoaid. Assim, ao clicar no marcador, podemos carregar os remedios 
	//de acordo com o id dela. Pessoaid eh uma FK para a tabela remedio.

	//preciso carregar o pessoaid juntamente com as coordenadas dela.

	var ajax = $.ajax({
		url: 'action/carregarTudoPessoaAction.php',
		type: 'POST',
		async: true,
		data: {facebookid: facebookid},
		//data: $("#cadastro_remedio").serialize(),
		success: function (data) {
        	$.each($.parseJSON(data), function() {
        		var pessoaid = this.pessoaid;

		        var marker = new google.maps.Marker({
	                position: new google.maps.LatLng(this.lat, this.lng),
	                title: 'ue: ' + this.pessoaid,
	                map: map
	            });

	            marker.addListener('click', function() {
				    //alert('ueueue: ' + pessoaid);
				    checkMedicine(pessoaid, "", "")
				    
				});

				markers.push(marker);
		    });
			
    	},

		error: function (xhr, ajaxOptions, thrownError) {
	        alert(xhr.status);
	        alert(thrownError);
      	}
	});
}


function loadMedicine(pessoaid){
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
}


function clear(){
	for (var i = 0; i < markers.length; i++) {
    	markers[i].setMap(null);
  	}
  	markers = [];
}

//vai filtras as pessoas e adicionar novos marcadores
function filter(){

	var remedio = $("#nomeremedio").val();
	var sintomas = $("#sintomas").val();

	clear();
	//pego apenas as pessoas com os remedios desejados utilizando o filtro

	var ajax = $.ajax({
		url: 'action/carregarPessoaFiltroAction.php',
		type: 'POST',
		async: true,
		data: {facebookid: facebookid, remedio: remedio, sintomas: sintomas},
		//data: $("#cadastro_remedio").serialize(),
		success: function (data) {
        	$.each($.parseJSON(data), function() {
        		var pessoaid = this.pessoaid;

		        var marker = new google.maps.Marker({
	                position: new google.maps.LatLng(this.lat, this.lng),
	                title: 'ue: ' + this.pessoaid,
	                map: map
	            });

	            marker.addListener('click', function() {
				    //alert('ueueue: ' + pessoaid);
				    checkMedicine(pessoaid, remedio, sintomas)
				    
				});

				markers.push(marker);
		    });
			map.setZoom(10);
    	},

		error: function (xhr, ajaxOptions, thrownError) {
	        alert(xhr.status);
	        alert(thrownError);
      	}
	});



	//depois ao abrir para checar os remedios, preciso utilizar os filtros também

}

