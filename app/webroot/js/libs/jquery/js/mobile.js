

function irPara_nao_avaliados(id){
	sUrl = base_url + "/admin/votos/visualizar/" + id + "/nao_avaliados";
	document.location.href = sUrl;
	//$.mobile.changePage(sUrl, { transition: 'slidedown', ajaxEnabled : false} );
}
function irPara_avaliados(id){
	sUrl = base_url + "/admin/votos/visualizar/" + id + "/avaliados";
	document.location.href = sUrl;
	//$.mobile.changePage(sUrl, { transition: 'slidedown', ajaxEnabled : false} );
}

function votar(isValido){
	$('#VotoValido').val(isValido);

	var s = isValido ? 'SIM' : 'NÃO';
	if(confirm("Você votou \""+s+"\", clique em \"OK\" para continuar.")){
		$('#VotoAdminVisualizarForm').submit();
	}

}




$(function() { 
	$.mobile.ajaxEnabled = false; 

});

$(document).bind('pagechange', function(event){
	//alert('teste');
	$('#btn-votar-sim').click(function(){
		votar(1);
	});

	$('#btn-votar-nao').click(function(){
		votar(0);
	});

	verificarPosGaleria();

});


$( document ).bind( "orientationchange", function( event, data ){	
	
	verificarPosGaleria();

});

function verificarPosGaleria(){
	if($(document).height() > $(document).width()){
		$("#inscricao_galeria").css('height', '720');
	} else {
		$("#inscricao_galeria").css('height', '464');
	}
}