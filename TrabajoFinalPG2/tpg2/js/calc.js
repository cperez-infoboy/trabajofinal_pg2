/**
 * 
 */

function calcular() {
	var expresion;
	
	if(validar()) {
		$.ajax({
			url: "server/calcular.php",
			type: "GET",
			data: {
				numero: parseInt($('#txtNumero1').val())
			}
			
		}).done(function( data ) {
		      //var objdata = JSON.parse(data);
		      
		      $('#lblRes').text(data);
		});
	
		
	}

}

function validar() {
	var num1 = $('#txtNumero1').val().trim();
	
	if(!Number.isInteger(+num1) || num1 == "") {
		alert('Ingrese el número correctamente.'); 
		return false;
	} else if(parseInt(num1) <= 0) {
		alert('Número debe ser mayor a cero(0).'); 
		return false;
	} else if(parseInt(num1) > 170) {
		alert('Numero genera un resultado muy grande.'); 
		return false;
	}
	 
	return true;
}

function limpiarResultado() {
	$('#lblRes').text('');
}