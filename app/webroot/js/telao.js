var nTimer = 5000;
var nTeloes = $('#telao .carousel2-inner .item').length; //qto de telões
var nTelW = $('#telao .carousel2-inner .item').width(); //largura dos itens
var nSpaco = parseInt($('#telao .carousel2-inner .item').css('margin-left')); //recuo
var nTelWM = nTelW + nSpaco; //area util do item, ou seja, descontando o recuo
$('#telao .carousel2-inner').width(nTelWM*nTeloes); // define o inner com a largura do item * qtd
var vTimer;

telaoInit();

function telaoInit(){


	telaoDefineClassesNum();


	//move o ultimo para o inicio
	$('#telao .item').first().before($('#telao .item').last());

	//Define as classes iniciais
	telaoDefineClassesIniciais();

	//Define acoes de navegacao
	telaoDefineAcaoBotoes();

	telaoDefineCaptions(); 

	telaoDefineIndicador();

	vTimer=setTimeout(function(){telaoProx()}, nTimer);

}

function telaoProx(){		

	telaoInitTroca();

	$('#telao .carousel2-inner').animate({    
	    left: '-=' + nTelWM
	  }, 1000, function() {

	  	//move o primeiro item para o final
	    $('#telao .item.last').after($('#telao .item.prev'));
	    
	    //reposiciona o item para não alterar o telao
	    $(this).css('left', '+=' + nTelWM);		

	    
	    telaoFimTroca(); 

	});

	return false;
}


function telaoPrev(){

	telaoInitTroca();

	//move o ultimo para o inicio
	$('#telao .item.prev').before($('#telao .item.last'));

	//reposiciona o inner para o local correto
	$('#telao .carousel2-inner').css('left', '-=' + nTelWM);
	
	$('#telao .carousel2-inner').animate({    
	    left: '+=' + nTelWM
	  }, 1000, function() {	  	

	   telaoFimTroca(); 

	});

	return false;
	
}

function telaoInitTroca(){

	$('#telao > .carousel2-caption').fadeOut();

	//reinicia contador
	clearTimeout(vTimer);

	//Remove a acao de clique durante a animação
	$('#telao .item a').unbind('click');

}

function telaoFimTroca(){
	telaoDefineClassesIniciais();
	telaoDefineAcaoBotoes();
	telaoDefineCaptions();

	vTimer=setTimeout(function(){telaoProx()}, nTimer);

	telaoDefineIndicador();
}

function telaoDefineIndicador(){
	var sClasses = $('#telao .item.active').attr('class');
	aClasses = sClasses.split(" ");
	$('#telao .carousel2-indicators li').removeClass('active');
	$('#telao .carousel2-indicators li.' + aClasses[1]).addClass('active');
}

function telaoDefineClassesNum(){

	$("#telao .item" ).each(function( index ) {
		$(this).addClass('item-' + index);

		$('#telao .carousel2-indicators').append('<li data-target="#telao" data-slide-to="'+index+'" class="item-'+index+'"></li>');
	});
}

function telaoDefineClassesIniciais(){
	$('#telao .item').removeClass('prev active next last');
	//Define as classes iniciais
	$('#telao .item').eq(0).addClass('prev');
	$('#telao .item').eq(1).addClass('active');
	$('#telao .item').eq(2).addClass('next');
	$('#telao .item').last().addClass('last');	
}

function telaoDefineAcaoBotoes(){
    $('#telao .item.prev a').click(telaoPrev);
    $('#telao .item.next a').click(telaoProx);
    /*
	$('#telao .item.prev').hover(
		function () {
			$(this).animate({    
	    		marginLeft: (nSpaco+10) + 'px'
	  		}, 100);
		},
		function () {
			$(this).animate({    
	    		marginLeft: (nSpaco) + 'px'
	  		}, 100);			
		}
	);
    $('#telao .item.next').hover(
		function () {
			$(this).animate({    
	    		marginLeft: (nSpaco-10) + 'px'
	  		}, 100);
		},
		function () {
			$(this).animate({    
	    		marginLeft: (nSpaco) + 'px'
	  		}, 100);			
		}
	);
	*/
}


function telaoDefineCaptions(){
	$('#telao > .carousel2-caption').html($('#telao .item.active .carousel2-caption').html());
	$('#telao > .carousel2-caption').fadeIn();
}