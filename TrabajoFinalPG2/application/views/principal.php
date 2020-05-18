<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Usuarios</title>
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
			                <th>Estado</th>
			                <th></th>
			           		<th></th>
			            </tr>
			        </thead>
			        <tfoot>
			            <tr>
			                <th>Usuario</th>
			                <th>Nombre</th>
			                <th>Estado</th>
			                <th></th>
			               	<th></th>
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
	
	<div id="dialog" title="Usuario">
		<p>
		    <label for="txtIngUsuario">Usuario: </label>
		    <input type="text" name="txtIngUsuario" id="txtIngUsuario" class="ui-widget ui-state-default ui-corner-all" style="width: 100%">
		    <label id="lblValUsuario" class="lblval"></label> 
		</p>
		
		<p>
		    <label for="txtIngNombre">Nombre: </label>
		    <input type="text" name="txtIngNombre" id="txtIngNombre" class="ui-widget ui-state-default ui-corner-all" style="width: 100%">
		    <label id="lblValNombre" class="lblval"></label> 
		</p>
		
		<p>
			<label for="cboIngEstado">Estado: </label>
		    <select name="cboIngEstado" id="cboIngEstado" style="width: 100%">
		      	<option value="0">Inactivo</option>
  				<option value="1">Activo</option>
		    </select>
		</p>
		
		<button name="btnGuardarUsuario" id="btnGuardarUsuario">Guardar</button>
	</div> 
	
	<div id="dialogError" title="Error">
		<p>
			<label id="lblDialogError"></label>
		</p>

		
		<button id="btnDialogErrorAceptar">Aceptar</button>
	</div> 
</body>
</html>