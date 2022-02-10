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

$consulta = "SELECT
                  reportes.id_reporte AS idReporte,
                  reportes.estado AS estado,
                  finalizados.id_mantenimiento AS mantenimiento,
                  finalizados.tipo_servicio AS tipoServicio,
                  finalizados.asignado AS asignado,
                  finalizados.fecha_realizacion AS fechaRealizacion,
                  finalizados.trabajo_realizado AS trabajoRealizado,
                  finalizados.verificado_liberado AS verificadoLiberado,
                  finalizados.fecha_verificado AS fechaVerificado,
                  finalizados.aprobado AS aprobado,
                  finalizados.fecha_aprobado AS fechaAprobado,
                  encargados.nombre AS nombreEncargado
                  FROM
                  t_reportes AS reportes
                  INNER JOIN
                  t_reportes_finalizados AS finalizados ON finalizados.id_reporte = reportes.id_reporte
                  INNER JOIN
                  t_cat_mantenimiento AS mantenimiento ON finalizados.id_mantenimiento = mantenimiento.id_mantenimiento
                  INNER JOIN
                  t_encargados AS encargados ON finalizados.aprobado = encargados.id_encargado
                  Where reportes.id_reporte = '$reporte'
                  LIMIT 1";

$resultado = mysqli_query($conexion,$consulta);

$datosReporte = array();

while($row = mysqli_fetch_assoc($resultado)){
  $datosReporte[] = $row;
}

if(count($datosReporte)==0){
	header("location:../../../vistas/inicio.php");
}

$Mantenimiento = "";
if($datosReporte[0]['mantenimiento']=="1"){
  $Mantenimiento = "Interno <strong>X</strong>        Externo  ";
}else{
  $Mantenimiento = "Interno         Externo <strong>X</strong>";
}
//echo $Mantenimiento;
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
       <td><strong>Nombre del Documento: Formato para Orden de Trabajo de Mantenimiento</strong></td>
       <td><strong>Código: ITA- AD-PO-001-04</strong></td>
   </tr>
   <tr>
       <td rowspan="2"><strong>Referencia a la Norma ISO 9001:2015 6.1, 7.1, 7.2, 7.4, 7.5.1, 8.1</strong></td>
       <td><strong>Revisión: 0</strong></td>
   </tr>
   <tr>
       <td><strong>Página 1 de 1</strong></td>
   </tr>
</table>
<p class="titulo"><strong>ORDEN DE TRABAJO DE MANTENIMIENTO</strong></p>

<table class="folio">
 <tr>
       <td width="125px"><strong>Número de control: </strong></td>
       <td width="45px" class="input">'.$reporte.'</td>
   </tr>
</table>

<table class="area_solicitante" width="100%">
 <tr>
       <td ><strong>Mantenimiento: </strong>'.$Mantenimiento.' </td>
   </tr>
 <tr>
       <td ><strong>Tipo de servicio: </strong>'.$datosReporte[0]['tipoServicio'].'</td>
   </tr>
 <tr>
       <td ><strong>Asignado a: </strong>'.$datosReporte[0]['asignado'].'</td>
   </tr>
</table>

<table class="tabla_descripcion" width="100%">

 <tr>
   <td colspan=2><strong>Fecha de realización:</strong> '.$datosReporte[0]['fechaRealizacion'].'</td>
 </tr>

 <tr>

 <td colspan=2><br><strong>Trabajo Realizado: </strong>'.$datosReporte[0]['trabajoRealizado'].'</td>

 <br>
 <br>
 </tr>

 <tr>
 <td ><strong>Verificado y Liberado por: </strong>'.$datosReporte[0]['verificadoLiberado'].'</td>
 <td ><strong>Fecha y Firma: </strong>'.$datosReporte[0]['fechaVerificado'].'</td>
 </tr>
 <tr>
 <td ><strong>Aprobado por: </strong>'.$datosReporte[0]['nombreEncargado'].'</td>
 <td ><strong>Fecha y Firma: </strong>'.$datosReporte[0]['fechaAprobado'].'</td>
 </tr>


</table>
<br>
<br>
<br>



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
$mpdf->SetTitle("Servicio_Terminado_".$reporte);
$mpdf->Output("Servicio_Terminado_".$reporte.".pdf","I");
?>
