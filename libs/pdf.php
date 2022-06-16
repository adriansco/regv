<?php

ob_start();

$nombre = $_REQUEST['nombre'];
$nomina = $_REQUEST['nomina'];
$departamento = $_REQUEST['departamento'];
/* total de días */
/* fecha reincorporación */
/* Centro de trbajao */
/* Área */
$fechaInicio = $_REQUEST['fechaInicio'];
$fechaFin = $_REQUEST['fechaFin'];
$observaciones = $_REQUEST['observaciones'];
$folio = $_REQUEST['folio'];
$area = $_REQUEST['area'];
$planta = $_REQUEST['planta'];
$regreso = $_REQUEST['regreso'];
$cantidad = $_REQUEST['cantidad'];

if (!$observaciones) {
    $observaciones = 'N/A';
}

?>

<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
	<!-- Formato primera parte -->
	<table cellspacing="0" style="width: 100%; border: solid 0.8px #000000; text-align: center; font-size: 15px">
		<tr>
			<td style="width: 25%; color: #444444; padding: 3px;">
				<img style="width: 75%;" src="../app/img/logo/logo.png" alt="Logo" />
				<!-- Equipos Médicos Vizcarra -->
			</td>
			<td style="width: 50%; border-left: solid 0.8px #000000; border-right: solid 0.8px #000000;">
				<h4>SOLICITUD DE VACACIONES<br>
					<span style="font-size: 12px; font-weight: bold;">RECURSOS HUMANOS</span>
				</h4>
			</td>
			<td style="width: 25%;">
				<p style="font-size: 15px; font-weight: bold; text-align: center">
					Folio:<br>
					<?php echo $folio; ?>
				</p>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<!-- Primer sección -->
		<tr>
			<td style="text-align: left; width: 13%;">Fecha:</td>
			<td style="width: 40%; border-bottom: solid 1px #000000;">
				<?php echo date('Y/m/d'); ?>
			</td>
			<td style="text-align: left; width: 20%;">&nbsp;&nbsp;Centro de Trabajo:</td>
			<td style="width: 27%; border-bottom: solid 1px #000000;">
				<?php echo $planta; ?>
			</td>
		</tr>
		<!-- segunda sección -->
		<tr>
			<td style="text-align: left; width: 13%;">Nombre:</td>
			<td style="width: 40%; border-bottom: solid 1px #000000;">
				<?php echo $nombre ?>
			</td>
			<td style="text-align: left; width: 20%;">&nbsp;&nbsp;Área:</td>
			<td style="width: 27%; border-bottom: solid 1px #000000;">
				<?php echo $area; ?>
			</td>
		</tr>
		<!-- tercer sección -->
		<tr>
			<td style="text-align: left; width: 13%;">No. Nomina:</td>
			<td style="width: 40%; border-bottom: solid 1px #000000;">
				<?php echo $nomina ?>
			</td>
			<td style="text-align: left; width: 20%;">&nbsp;&nbsp;Departamento:</td>
			<td style="width: 27%; border-bottom: solid 1px #000000;">
				<?php echo $departamento ?>
			</td>
		</tr>
	</table>

	<p style="text-align: justify; font-size: 15px;">Por medio de la presente, solicito me sea autorizado el siguiente día (s) a cuenta
		de vacaciones a que tengo derecho de acuerdo con mi contrato individual de trabajo celebrado con la empresa, las
		cuales me serán otorgadas con apego en los artículos 76, 79, 80, 81 y 516 de la Ley Federal del Trabajo, de
		acuerdo con las siguientes fechas:</p>

	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<!-- Primer sección -->
		<tr>
			<td style="text-align: left; width: 25%;">Total de días a disfrutar:</td>
			<td style="width: 5%; border-bottom: solid 1px #000000;">
				<?php echo $cantidad; ?>
			</td>
			<td style="text-align: left; width: 18%;">&nbsp;&nbsp;Fecha de Inicio:</td>
			<td style="width: 17%; border-bottom: solid 1px #000000;">
				<?php echo $fechaInicio ?>
			</td>
			<td style="text-align: left; width: 20%;">&nbsp;&nbsp;Fecha de Termino:</td>
			<td style="width: 15%; border-bottom: solid 1px #000000;">
				<?php echo $fechaFin ?>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<td style="text-align: left; width: 48%;">Fecha en que deberá de incorporarse a laborar:</td>
			<td style="width: 52%; border-bottom: solid 1px #000000;">
				<?php echo $regreso; ?>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<td style="text-align: left; width: 17%;">Observaciones:</td>
			<td style="width: 83%; border-bottom: solid 1px #000000;">
				<?php echo $observaciones ?>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; border: solid 0.8px #000000; text-align: center; font-size: 15px">
		<tr style="border: solid 1px #000000;">
			<td style="width: 33%;border-bottom: solid 1px #000000;">
				<br><br><br>
			</td>
			<td
				style="width: 34%;border-bottom: solid 1px #000000; border-left: solid 1px #000000; border-right: solid 1px #000000;">
			</td>
			<td style="width: 33%;border-bottom: solid 1px #000000;"></td>
		</tr>
		<tr>
			<td style="width: 33%">Firma del Empleado.</td>
			<td style="width: 34%; border-left: solid 1px #000000; border-right: solid 1px #000000;">Firma del Jefe
				Inmediato.</td>
			<td style="width: 33%">VoBo. Recursos Humanos.</td>
		</tr>
	</table>
	<span style="color: #444444; font-size: 9px;">ORIGINAL.- RECURSOS HUMANOS.</span>
	<table cellspacing="0" style="width: 100%; text-align: center;">
		<tr>
			<td style="width: 100%; font-size: 25px;">
				-----------------------------------------------------------------------------------
			</td>
		</tr>
	</table>
	<br>
	<!-- Formato segunda parte -->
	<table cellspacing="0" style="width: 100%; border: solid 0.8px #000000; text-align: center; font-size: 15px">
		<tr>
			<td style="width: 25%; color: #444444; padding: 3px;">
				<img style="width: 75%;" src="../app/img/logo/logo.png" alt="Logo" />
				<!-- Equipos Médicos Vizcarra -->
			</td>
			<td style="width: 50%; border-left: solid 0.8px #000000; border-right: solid 0.8px #000000;">
				<h4>SOLICITUD DE VACACIONES<br>
					<span style="font-size: 12px; font-weight: bold;">RECURSOS HUMANOS</span>
				</h4>
			</td>
			<td style="width: 25%;">
				<p style="font-size: 15px; font-weight: bold; text-align: center">
					Folio:<br>
					<?php echo $folio; ?>
				</p>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<!-- Primer sección -->
		<tr>
			<td style="text-align: left; width: 13%;">Fecha:</td>
			<td style="width: 40%; border-bottom: solid 1px #000000;">
				<?php echo date('Y/m/d'); ?>
			</td>
			<td style="text-align: left; width: 20%;">&nbsp;&nbsp;Centro de Trabajo:</td>
			<td style="width: 27%; border-bottom: solid 1px #000000;">
				<?php echo $planta; ?>
			</td>
		</tr>
		<!-- segunda sección -->
		<tr>
			<td style="text-align: left; width: 13%;">Nombre:</td>
			<td style="width: 40%; border-bottom: solid 1px #000000;">
				<?php echo $nombre ?>
			</td>
			<td style="text-align: left; width: 20%;">&nbsp;&nbsp;Área:</td>
			<td style="width: 27%; border-bottom: solid 1px #000000;">
				<?php echo $area; ?>
			</td>
		</tr>
		<!-- tercer sección -->
		<tr>
			<td style="text-align: left; width: 13%;">No. Nomina:</td>
			<td style="width: 40%; border-bottom: solid 1px #000000;">
				<?php echo $nomina ?>
			</td>
			<td style="text-align: left; width: 20%;">&nbsp;&nbsp;Departamento:</td>
			<td style="width: 27%; border-bottom: solid 1px #000000;">
				<?php echo $departamento ?>
			</td>
		</tr>
	</table>

	<p style="text-align: justify; font-size: 15px;">Por medio de la presente, solicito me sea autorizado el siguiente día (s) a cuenta
		de vacaciones a que tengo derecho de acuerdo con mi contrato individual de trabajo celebrado con la empresa, las
		cuales me serán otorgadas con apego en los artículos 76, 79, 80, 81 y 516 de la Ley Federal del Trabajo, de
		acuerdo con las siguientes fechas:</p>

	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<!-- Primer sección -->
		<tr>
			<td style="text-align: left; width: 25%;">Total de días a disfrutar:</td>
			<td style="width: 5%; border-bottom: solid 1px #000000;">
				<?php echo $cantidad; ?>
			</td>
			<td style="text-align: left; width: 18%;">&nbsp;&nbsp;Fecha de Inicio:</td>
			<td style="width: 17%; border-bottom: solid 1px #000000;">
				<?php echo $fechaInicio ?>
			</td>
			<td style="text-align: left; width: 20%;">&nbsp;&nbsp;Fecha de Termino:</td>
			<td style="width: 15%; border-bottom: solid 1px #000000;">
				<?php echo $fechaFin ?>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<td style="text-align: left; width: 48%;">Fecha en que deberá de incorporarse a laborar:</td>
			<td style="width: 52%; border-bottom: solid 1px #000000;">
				<?php echo $regreso; ?>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<td style="text-align: left; width: 17%;">Observaciones:</td>
			<td style="width: 83%; border-bottom: solid 1px #000000;">
				<?php echo $observaciones ?>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; border: solid 0.8px #000000; text-align: center; font-size: 15px">
		<tr style="border: solid 1px #000000;">
			<td style="width: 33%;border-bottom: solid 1px #000000;">
				<br><br><br>
			</td>
			<td
				style="width: 34%;border-bottom: solid 1px #000000; border-left: solid 1px #000000; border-right: solid 1px #000000;">
			</td>
			<td style="width: 33%;border-bottom: solid 1px #000000;"></td>
		</tr>
		<tr>
			<td style="width: 33%">Firma del Empleado.</td>
			<td style="width: 34%; border-left: solid 1px #000000; border-right: solid 1px #000000;">Firma del Jefe
				Inmediato.</td>
			<td style="width: 33%">VoBo. Recursos Humanos.</td>
		</tr>
	</table>
	<span style="color: #444444; font-size: 9px">COPIA.- EMPLEADO.</span>

	<!-- <table cellspacing="0" style="
			width: 100%;
			border: none;
			text-align: center;
			font-size: 10pt;
		">
		<tr>
			<td style="width: 33%"></td>
			<td style="width: 33%"><input type="button" name="btn_print" value="Imprimir" onclick="print(true);" /></td>
			<td style="width: 33%"></td>
		</tr>
	</table> -->
</page>

<?php

$content = ob_get_clean();
require_once dirname(__FILE__) . '/../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('PDF-CF.pdf');
    /* $html2pdf->Output("C:/xampp/htdocs/regv/docs/PDF-CF.pdf", "F"); */
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}

/* $path = "C:/xampp/htdocs/regv/docs/";
$file = "PDF-CF.pdf";
$path = $path . $file;
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="PDF-CF.pdf"');
header('Content-Disposition: attachment; filename="PDF-CF.pdf"');
readfile($path); */

?>