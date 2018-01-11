// Funcion para obtener los get de la url
	function $_GET(param){
		url = document.URL;
		url = String(url.match(/\?+.+/));
		url = url.replace("?", "");
		url = url.split("&");
		x = 0;
		while (x < url.length){
			p = url[x].split("=");
			if (p[0] == param){
				return decodeURIComponent(p[1]);
			}
			x++;
		}
	}
// Funcion para dar formato a un numero
	function formato_numero(numero, decimales, separador_decimal, separador_miles){
		numero = parseFloat(numero);
		if(isNaN(numero)) return '';
		if(decimales!==undefined) numero=numero.toFixed(decimales);
		numero = numero.toString().replace('.', separador_decimal!==undefined ? separador_decimal : ',');
		if(separador_miles) {
			var miles=new RegExp("(-?[0-9]+)([0-9]{3})");
			while(miles.test(numero)) {
				numero=numero.replace(miles, '$1' + separador_miles + '$2');
			}
		}
		return numero;
	}
// Funcion para mostrar un toastr con los warnings al mandar un formulario
	function showControllerMessage(data){
		var strMessage = data.message+'<br>';
		if(typeof(data.errors)!='undefined'){
			strMessage += data.errors
		}
		if(data.class == 'success'){
			toastr.success(strMessage, 'Mensaje del sistema', {timeOut: 5000});
		} else if(data.class == 'info'){
			toastr.info(strMessage, 'Mensaje del sistema', {timeOut: 5000});
		} else if(data.class == 'warning'){
			toastr.warning(strMessage, 'Mensaje del sistema', {timeOut: 0});
		} else if(data.class == 'danger'){
			toastr.danger(strMessage, 'Mensaje del sistema', {timeOut: 5000});
		}
	}
$(document).ready(function(){
// Configuracion de los parametros del datepicker
	$.datepicker.regional['es'] = {
		changeMonth: true,
		changeYear: true,
		closeText: 'Cerrar', 
		prevText: 'Anterior', 
		nextText: 'Siguiente',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene', 'Feb',' Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
		monthStatus: 'Ver otro mes',
		yearStatus: 'Ver otro año',
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'SÃ¡b'],
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
		dateFormat: 'd-MM-yy',
		firstDay: 0,
		initStatus: 'Selecciona la fecha', isRTL: false
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);
	$('.date-picker').datepicker({});
});
// Funcion para resetear un formulario
	function reset_form(formname){
		formname[0].reset();
		$('input:hidden').val('');
	}