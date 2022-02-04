$(document).ready(function()
{
	// Función para hacer ufncionar los tooltips
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	// Iniciamos las viarbales de fecha
	var desde = document.getElementById("fecha-desde").value;
    var hasta = document.getElementById("fecha-hasta").value;
    
    $('#cargartablareportes').load("Reportes/tablareportesT_Admin.php?desde="+desde+"&hasta="+hasta);       	
});
