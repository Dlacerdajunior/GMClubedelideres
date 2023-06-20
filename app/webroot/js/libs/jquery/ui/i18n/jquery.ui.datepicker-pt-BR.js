/* Brazilian initialisation for the jQuery UI date picker plugin. */
/* Written by Leonildo Costa Silva (leocsilva@gmail.com). */
jQuery(function($){
	$.datepicker.regional['pt-BR'] = {
		closeText: 'Fechar',
		prevText: '&#x3c;Anterior',
		nextText: 'Pr&oacute;ximo&#x3e;',
		currentText: 'Hoje',
		monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
		'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
		'Jul','Ago','Set','Out','Nov','Dez'],
		dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','S&aacute;bado'],
		dayNamesShort: ['Do','Se','Te','Qa','Qi','Se','Sa'],
		//dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','S&aacute;b'],
        dayNamesMin: ['Do','Se','Te','Qa','Qi','Se','Sa'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['pt-BR']);
    
    
    $.timepicker.regional['pt-BR'] = {
        currentText: 'Agora',
		closeText: 'Pronto',
		ampm: false,
		timeFormat: 'hh:mm tt',
		timeSuffix: '',
		timeOnlyTitle: 'Escolha o horário',
		timeText: 'Horário',
		hourText: 'Hora',
		minuteText: 'Minutos',
		secondText: 'Segundos',
		timezoneText: 'Time Zone'
    };
    $.timepicker.setDefaults($.timepicker.regional['pt-BR']);
    
});