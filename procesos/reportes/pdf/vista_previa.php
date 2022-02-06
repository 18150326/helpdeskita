<?php
$reporte ="";

if(!isset($_GET['reporte'])){
		header("location:../../../vistas/inicio.php");
}else{
	$reporte = $_GET['reporte'];
}

date_default_timezone_set("America/Mexico_City");
$hoy = date('Y-m-d G:i:s', time());
// Require composer autoload
require_once __DIR__ . '/../../../public/mpdf/vendor/autoload.php';

$servidor = "b1o04dzhm1guhvmjcrwb-mysql.services.clever-cloud.com";
$usuario = "ulpt7sduld7rn0so";
$password = "88bFiBTpsfGsC3WbaBaT";
$db = "b1o04dzhm1guhvmjcrwb";
$conexion = mysqli_connect($servidor,$usuario,$password,$db);

$consulta = "SELECT tr.id_reporte, tp.nombre, tr.area_solicitante, tr.fecha_elaboracion, tr.descripcion
			 FROM t_reportes tr 
			 INNER JOIN t_usuarios tu on tr.id_usuario = tu.id_usuario 
			 INNER JOIN t_persona tp on tp.id_persona = tu.id_persona 
			 WHERE tr.id_reporte = '$reporte'";
$resultado = mysqli_query($conexion, $consulta);

// if($resultado){
// 	echo "esta funcionado la consulta";
// }

$datosReporte = array();

while($row = mysqli_fetch_assoc($resultado)){
	$datosReporte[] = $row;
}

if(count($datosReporte)==0){
	header("location:../../../vistas/inicio.php");
}

$html = '
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	 <table class="table_footer">
	    <tr>
	        <td rowspan="3"><img src="logoITA.png" with="100px" height="75px" class="logo_ita_header"></td>
	        <td><strong>Nombre del Documento: Formato para  Solicitud de Mantenimiento Correctivo</strong></td>
	        <td><strong>Código: ITA- AD-PO-001-02</strong></td>
	    </tr>
	    <tr>
	        <td rowspan="2"><strong>Referencia a la Norma ISO 9001:2015 6.1, 7.1, 7.2, 7.4, 7.5.1, 8.1</strong></td>
	        <td><strong>Revisión: 0</strong></td>
	    </tr>
	    <tr>
	        <td><strong>Página 1 de 2</strong></td>
	    </tr>
	</table>
	<p class="titulo"><strong>SOLICITUD MANTENIMIENTO CORRECTIVO</strong></p>

	<table class="tabla_1">
		<tr>
	        <td width="200px"><strong>Recursos Materiales y Servicios</strong></td>
	        <td width="35px"></td>
	    </tr>
	    <tr>
	        <td ><strong>Mantenimiento de Equipo</strong></td>
	        <td></td>
	    </tr>
	    <tr>
	        <td ><strong>Centro de Cómputo</strong></td>
	        <td></td>
	    </tr>
	</table>

	<table class="folio">
		<tr>
	        <td ><strong>Folio:</strong></td>
	        <td width="45px" class="input">'.$reporte.'</td>
	    </tr>
	</table>

	<table class="area_solicitante" width="100%">
		<tr>
	        <td ><strong>Área Solicitante: </strong> '.$datosReporte[0]["area_solicitante"].'</td>
	    </tr>
	</table>

	<table class="tabla_descripcion" width="100%">
		<tr>
	        <td ><strong>Nombre y Firma del Solicitante: </strong> '.$datosReporte[0]["nombre"].'</td>
	    </tr>
	    <tr>
	        <td ><strong>Fecha de Elaboración:</strong> '.$datosReporte[0]["fecha_elaboracion"].'</td>
	    </tr>
	    <tr>
					<td ><br><strong>Descripción del servicio solicitado o falla a reparar:</strong> <p><br>'.$datosReporte[0]["descripcion"].'</p></td>
					<br>
	    </tr>

	</table>
	<div class="texto_departamento">
		c.c.p. Departamento de Planeación Programación y Presupuestación
		<br>
		c.c.p. Área Solicitante
	</div>
</body>
</html>
';

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Añadimos el html de la primera página
$mpdf->WriteHTML($html);
// Agregamos el footer
$mpdf->SetHTMLFooter('
<table width="100%" class="footer">
    <tr>
        <td width="33%">ITA -AD-PO-001-02</td>
        <td width="33%" align="center"></td>
        <td width="33%" style="text-align: right;">Rev. 0</td>
    </tr>
</table>');
// Agregamos los estilos css con la variable anteriormente cargada con la ruta del archivo
//$mpdf -> WriteHTML($css,1);
// Output a PDF file directly to the browser
$mpdf->SetTitle("Servicio_Pendiente_".$reporte);
$mpdf->Output("Servicio_Pendiente_".$reporte.".pdf","I");

?>
