var table = null;

$( document ).ready(function() {
	$( "#tabs" ).tabs();
	
	
    $( "#dialog" ).dialog({ autoOpen: false, modal: true });
    $("#cboIngEstado").selectmenu();
    
    $( "#btnAgregar" ).click(function() {
		$("#cboIngEstado").val("");
		$("#txtIngUsuario").val("");
		$("#txtIngNombre").val("");
		
    	$( "#dialog" ).dialog( "open" );
    	
		$("#cboIngEstado option:eq(0)").prop("selected", true);
		$("#cboIngEstado").selectmenu("refresh");
    });
    
    $( "#btnGuardarUsuario" ).click(function() {
        grabarTarea();
    });

       
	$( "#btnAgregar" ).button({
		  icon: "ui-icon-plusthick"
	});
	
	$( "#btnGuardarTarea" ).button(); 
	
	
    table = $('#listausuarios').DataTable( {
    	ajax: "index.php/listausuarios",
        columns: [
            { width: "20%", data: "usuario" },
            { data: "nombre" },
            { width: "10%", data: "descestado"},
            { data: "estado"}
        ],
        columnDefs: [ { targets: [3], visible: false }],
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
			usuario : $("#txtIngUsuario").val(),
			nombre: $("#txtIngNombre").val(),
			estado: $("#cboIngEstado").val()
		}
		
		$.ajax({
			url: "index.php/ingresausuario" ,
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
	$("#lblValUsuario").html("");
	$("#lblValNombre").html("");
	
	if($("#txtIngUsuario").val() == "") {
		$("#lblValUsuario").html("Ingrese usuario correctamente");
		ret = false;
	} 

	if($("#txtIngNombre").val() == "") {
		$("#lblValNombre").html("Ingrese nombre correctamente");
		ret = false;
	} 
	return ret;
}
