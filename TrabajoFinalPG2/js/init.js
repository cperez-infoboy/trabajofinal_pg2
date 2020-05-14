var table = null;

$( document ).ready(function() {
	$( "#tabs" ).tabs();
	
    $( "#dialog" ).dialog({ autoOpen: false, modal: true });
    $( "#btnAgregar" ).click(function() {
    });
    
    $( "#btnGuardarTarea" ).click(function() {
        grabarTarea();
    });

    /*
	$.ajax({
		url: "controller/listaestados.php",
	}).done(function( data ) {
	      var objdata = JSON.parse(data);
	      
	      for(var indice in objdata.data) {
	    		$("#cboBusEstado").append($('<option>', {
	    	        value: objdata.data[indice][0],
	    	        text: objdata.data[indice][1]
	    	    }));
	      }
	  	$( '#cboBusEstado' ).selectmenu( "refresh" );
	});
	*/
    
	$( "#btnAgregar" ).button({
		  icon: "ui-icon-plusthick"
	});
	
	$( "#btnGuardarTarea" ).button(); 
	
	
    table = $('#listausuarios').DataTable( {
        columns: [
            { title: "Usuario" },
            { title: "Nombre" },
            { title: "Activo"}
        ],
        language: {
            "decimal":        "",
            "emptyTable":     "No hay datos disponibles",
            "info":           "Mostrando _START_ a _END_ de _TOTAL_",
            "infoEmpty":      "Mostrando 0 a 0 de un total de 0 registros",
            "infoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar:",
            "zeroRecords":    "No se encontraron resultados",
            "paginate": {
                "first":      "Primero",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    } );
    
  
});

function grabarTarea() {
	
	if(validaIngresoTarea()) {
		var data = {
			idusuario : parseInt($("#cboIngUsuario").val()),
			descripcion: $("#txtIngDescripcion").val(),
			fechavencimiento: $("#txtIngFecha").val(),
			avance: parseInt($("#txtIngAvance").val())
		}
		
		$.ajax({
			url: "controller/ingresatarea.php" ,
			data: JSON.stringify(data),
			method: "POST",
			success: function(response) {
				try {
					var datatarea = JSON.parse(response);
					
					if(datatarea instanceof Object && Array.isArray(datatarea.data)) {
						//Agregamos la fila al datatables
						
						table.ajax.reload();
					}
					
					
				}catch(e) {
					
				}
				
				$( "#dialog" ).dialog("close");
			}
		});
	}
}

function validaIngresoTarea() {
	var ret = true;
	$("#lblValDescripcion").html("");
	$("#lblValIngFecha").html("");
	$("#lblValAvance").html("");
	
	if($("#txtIngDescripcion").val() == "") {
		$("#lblValDescripcion").html("Ingrese descripción correctamente");
		ret = false;
	} 
	
	if(!validaFecha($("#txtIngFecha").val())) {
		$("#lblValIngFecha").html("Ingrese fecha de vencimiento correctamente");
		ret = false;
	} 
	
	if(!$.isNumeric($("#txtIngAvance").val()) || parseInt($("#txtIngAvance").val()) < 0 || parseInt($("#txtIngAvance").val()) > 100) {
		$("#lblValAvance").html("Ingrese avance correctamente");
		ret = false;
	} 
	
	return ret;
}

function validaFecha(fecha) {
	var ret = true;
	
	try {
		if(fecha.trim() == "") {
			ret = false;
		} else {
			$.datepicker.parseDate( "yy-mm-dd", fecha);
		}
		
	}catch(e) {
		ret = false;
	}
	
    return ret;
}