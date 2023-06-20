//<!-- I: INICIALIZAÇÃO PADRÃO -->
$(function(){

    $("ul.sf-menu").superfish();
	
	
    $( "#dialog-message" ).dialog({
        modal: true,
        width: '360px',
        buttons: {
            Ok: function() {
                $( this ).dialog( "close" );
            }
        }
    });

	acaoBotaoDelete();

});


function acaoBotaoDelete(){
    //ação padrão para botão delete
    $('.btn-delete').click(function(){     
        return (confirm('Deseja realmente excluir o registro selecionado?'));
    });
}