<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Gestor de tareas</title>
<link rel="stylesheet" type="text/css" href="js/datatables/datatables.min.css"/>
<link rel="stylesheet" href="js/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="css/general.css">
<script src="js/jquery-ui/external/jquery/jquery.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/datatables/datatables.min.js"></script>
<script type="text/javascript" src="js/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script src="js/datatables/dataTables.pageResize.min.js"></script>
<script src="js/init.js"></script>
</head>
<body>
	<div class="header">
		<img align="right" src="images/logo-header.png">
	</div> 
	<div class="body">
		<div id="tabs">
			  <ul>
			    <li><a href="#tabs-1">Usuarios</a></li>
			    <li><a href="#tabs-2">Acerca de...</a></li>
			  </ul>
			  <div id="tabs-1">
			  	<div id="bartabs1">
			  		<button name="btnAgregar" id="btnAgregar"></button>
				</div>
			    <table id="listausuarios" class="display pageResize" style="width: 100%;">
			        <thead>
			            <tr>
			                <th>Usuario</th>
			                <th>Nombre</th>
			                <th>Activo</th>
			            </tr>
			        </thead>
			        <tfoot>
			            <tr>
			                <th>Usuario</th>
			                <th>Nombre</th>
			                <th>Activo</th>
			            </tr>
			        </tfoot>
			    </table>

			  </div>
			  <div id="tabs-2">
			  </div>
			  <div id="tabs-3">
			  </div>
		</div>
	</div> 
	<!--div class="footer">
	    My footer
	</div-->
	
	<div id="dialog" title="Agregar tarea">
		<p>
			<label for="cboIngUsuario">Usuario responsable: </label>
		    <select name="cboIngUsuario" id="cboIngUsuario" style="width: 100%"></select>
		</p>
		<p>
		    <label for="txtIngDescripcion">Descripción: </label>
		    <input type="text" name="txtIngDescripcion" id="txtIngDescripcion" class="ui-widget ui-state-default ui-corner-all" style="width: 100%">
		    <label id="lblValDescripcion" class="lblval"></label> 
		</p>
		
		<p>
			<label for="txtIngFecha">Fecha vencimiento: </label>
			<input type="text" id="txtIngFecha" class="ui-widget ui-state-default ui-corner-all" readonly>
			<br><label id="lblValIngFecha" class="lblval"></label> 
		</p>
		
		<p>
		    <label for="txtIngAvance">Avance(%): </label>
		    <input type="number" name="txtIngAvance" id="txtIngAvance" class="ui-widget ui-state-default ui-corner-all" min=0 max=100 step=1>
		    <br><label id="lblValAvance" class="lblval"></label>  
		</p>
		
		<button name="btnGuardarTarea" id="btnGuardarTarea">Guardar</button>
	</div> 
</body>
</html>