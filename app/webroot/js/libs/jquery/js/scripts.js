$(function(){               
    
    //globais
    flashMessage(); //popups
    setMask(); //mascaras
    
    //inscricoes    
    comboGenerInit();
    setCepBusca('UsuarioConstrutora');    
    //setCepBusca('Usuario1');  //definido da view autores
    setCepBusca('UsuarioFotografo');
    $('#InscricaoFotografoForm').click(carregarFotografoForm);

    
    //inscricoes - autores
    $('.btn-adicionar-autor').click(adicionarAutor);  

    //inscricoes - confirmacao
    $('.btn-confirmar-dados').click(confirmacaoOk); 
    $('.btn-voltar-corrigir').click(confirmacaoVoltar); 
    
});



/**** I: GLOBAIS ****/
function flashMessage(){
    $( "#flashMessage, #authMessage" ).dialog({
        modal: true,
        buttons: {
            Ok: function() {
                $( this ).dialog( "close" );
            }
        }
    });
}

function setMask(){   
    //Em alguns casos é melhor retirar as mascaras e aplica-las novamente
    $(".m_data").unmask()
    $(".m_cpf").unmask();
    $(".m_cnpj").unmask();
    $(".m_cep").unmask();
    $(".m_tel, .m_tel_c").unmask();     
    $(".m_data").mask("99/99/9999");
    $(".m_cpf").mask("999.999.999-99");
    $(".m_cnpj").mask("99.999.999/9999-99");
    $(".m_cep").mask("99999-999");    
    $(".m_tel").mask("(99) 9999-9999");
    $(".m_tel_c").mask("(99) 9999-9999?9");

   
    $('.m_tel_c').focusout(function(){
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    }).trigger('focusout');


}


//BUSCA DE CEPS
function setCepBusca(sPref){
    $('#' + sPref + 'Cep').blur(function () {        
        //Caso tenha sido preenchido um valor valido
        if(parseInt($(this).val())>0){
            $('#' + sPref + 'Cep').cep({
                load: function(){
                    //$('input, select').attr('readonly', 'readonly');
                    //$('input, select').fadeTo('slow', 0.4);            
                    $('input').attr('readonly', 'readonly');
                    $('input, .bg-campo').fadeTo('slow', 0.4);            
                },
                success: function (data) {
                    $('#' + sPref + 'Endereco').val(data.tipoLogradouro + ' ' + data.logradouro);
                    $('#' + sPref + 'Bairro').val(data.bairro);
                    $('#' + sPref + 'EstadoUf').val(data.estado);
                    $('#' + sPref + 'Cidade').val(data.cidade);
                    //$('#' + sPref + "EstadoUf option[text=" + data.estado + "]").attr("selected","selected") ;
                    setTextCombo($('#' + sPref + 'EstadoUf'));
                },
                error: function(erro){
                    alert(erro);
                },
                complete: function () {
                    /*$('input, select').fadeTo('slow', 1, function(){
                        $(this).removeAttr('readonly');
                    });*/
                    $('input, .bg-campo').fadeTo('slow', 1, function(){
                        $(this).removeAttr('readonly');
                    });
                }
            });
        }
    });
}

function setTextCombo(x){    
    //alert($(this).parent().find(".sComboGener").length);
    if(x.parent().find(".sComboGener").length==0) x.before("<span class=\"sComboGener\"></span>");
    x.parent().find(".sComboGener").text(x.find('option:selected').text());
}

function comboGener(){    
    setTextCombo($(this));
}

function comboGenerInit(){    
    $('.bg-campo select').change(comboGener);    
    $('.bg-campo').each(function(){
        if($(this).find(".sComboGener").length==0) $(this).find("select").before("<span class=\"sComboGener\"></span>");    
        var v = $(this).find("select option:selected").text();
        $(this).find(".sComboGener").text(v);
    });
    //var v = $('.bg-campo select option:selected').val();
}
/**** F: GLOBAIS ****/



/**** I: INSCRICOES ****/
function carregarFotografoForm() {

    if(!$(this).is(':checked')){   
        $.ajax({
            type: "GET",
            url: base_url + "/inscricoes/fotografo/",
            success: function(s){            
                $('.fotografo-form').html(s);            
                $(".fotografo-form").slideDown('slow');
                setMask();
                comboGenerInit();
                setCepBusca('UsuarioFotografo');  
            }
        });
    } else {
        $('.fotografo-form').slideUp('slow', function(){
            $(this).html('');    
        });        
    }

}
/**** F: INSCRICOES ****/



/**** I: INSCRICOES - CHECKLIST ****/
var hiddenInputId = '';
var spanLabelId = '';
var sAcceptFileTypes = /(\.|\/)(gif|jpe?g|png)$/i;
var nw;
function selecionar_arquivo(hId, sId, sExtss){   

    //Se a janela nunca tiver sido aberta ou estiver fechada, abre ela      
    if(typeof(nw)=='undefined' || nw.closed){
        hiddenInputId = hId;
        spanLabelId = sId;    
        sAcceptFileTypes = sExtss;
        nw = window.open(base_url + "/arquivos/index", "arquivos", "width=640,height=350,resizable=yes,scrollbars=auto");    
        nw.focus();

    //A janela está aberta    
    } else {
        alert('Não é possível enviar novos arquivos, por favor, finalize o processo de envio anterior.');
        nw.focus();
    }
    
    return false;
}

function devolver_arquivo(files, arquivo_id){ 
    $(hiddenInputId).val(arquivo_id);   
    $(spanLabelId).html(files.replace(/\|/g,'; '));     
}
/**** F: INSCRICOES - CHECKLIST ****/



/**** I: INSCRICOES - AUTORES ****/
var mAutores = 1;   
function adicionarAutor(){
    mAutores++;        
    $.ajax({
        type: "GET",
        url: base_url + "/inscricoes/autor/" + mAutores,
        success: function(s){            
            $('.adicionar-autor').before(s);            
            $(".autor." + mAutores).slideDown('slow');
            setMask();
            comboGenerInit();
            setCepBusca('Usuario' + mAutores);  
        }
    });
    return false;
}
function excluirAutor(i){
    $(".autor." + i).slideUp('slow', function(){
        $(this).remove();    
    });      
}
/**** F: INSCRICOES - AUTORES ****/



/**** I: INSCRICOES - CONFIRMAÇÃO ****/
function confirmacaoOk(){
    document.location.href = base_url + "/inscricoes/confirmacao_ok";
}

function confirmacaoVoltar(){    
    if($(this).hasClass('construtora'))
        document.location.href = base_url + "/inscricoes/construtora";
    else
        document.location.href = base_url + "/inscricoes/profissionais";
}
/**** F: INSCRICOES - CONFIRMAÇÃO  ****/
