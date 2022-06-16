<?php

ob_start();

$nombre = $_REQUEST['nombre'];
$nomina = $_REQUEST['nomina'];
$departamento = $_REQUEST['departamento'];
$motivo = $_REQUEST['motivo'];
$fechaInicio = $_REQUEST['fechaInicio'];
$fechaFin = $_REQUEST['fechaFin'];
$observaciones = $_REQUEST['observaciones'];
$folio = $_REQUEST['folio'];

if (!$observaciones) {
    $observaciones = 'N/A';
}

?>

<page backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm">
	<!-- Formato primera parte -->
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
		<tr>
			<td style="width: 20%; color: #444444">
				<img style="width: 100%" src="../app/img/logo/logo.png" alt="Logo" /><br />
				<!-- Equipos Médicos Vizcarra -->
			</td>
			<td style="width: 60%">
				<h4>INASISTENCIA EMPLEADOS Y/O ADMINISTRATIVOS</h4>
			</td>
			<td>
				<p style="font-size: 15px; font-weight: bold; text-align: right">
					Folio:
					<?php echo $folio; ?>
					<br />
					Fecha:
					<?php echo date('d/m/Y'); ?>
				</p>

			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<!-- #444444 -->
			<td style="width: 30%">
				<p style="text-align: left">Nombre del empleado&nbsp;

					<!-- <-?php echo $nombre ?> -->
				</p>
			</td>
			<td style="border: 0.5px solid black; width: 70%">
				<span>
					<?php echo $nombre ?>
				</span>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<!-- #444444 -->
			<td style="width: 7%">
				<p style="text-align: left">Área&nbsp;</p>
			</td>

			<td style="border: 0.5px solid black; width: 63%">
				<span>
					<?php echo $departamento ?>
				</span>
			</td>

			<td style="width: 10%">
				<p style="text-align: left">&nbsp;Nomina&nbsp;
					<!-- <-?php echo $nombre ?> -->
				</p>
			</td>
			<td style="border: 0.5px solid black; width: 20%">
				<span>
					<?php echo $nomina ?>
				</span>
			</td>

		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<!-- #444444 -->
			<td style="width: 10%">
				<p style="text-align: left">Permiso&nbsp;</p>
			</td>

			<td style="border: 0.5px solid black; width: 90%">
				<span>
					<?php echo $motivo ?>
				</span>
			</td>
		</tr>
	</table>

	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<!-- #444444 -->
			<td style="width: 15%">
				<p style="text-align: left">Fecha Inicio&nbsp;</p>
			</td>

			<td style="border: 0.5px solid black; width: 35%">
				<span>
					<?php echo $fechaInicio ?>
				</span>
			</td>

			<td style="width: 15%">
				<p style="text-align: left">&nbsp;Fecha Fin&nbsp;
					<!-- <-?php echo $nombre ?> -->
				</p>
			</td>
			<td style="border: 0.5px solid black; width: 35%">
				<span>
					<?php echo $fechaFin ?>
				</span>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<td style="width: 17%">
				<p style="text-align: left">Observaciones&nbsp;
					<!-- <-?php echo $nombre ?> -->
				</p>
			</td>
			<td style="text-align:  justify; border: 0.5px solid black; width: 83%; height: 5%">
				<span>
					<?php echo $observaciones ?>
				</span>
			</td>

		</tr>
	</table>

	<br />
	<table cellspacing="0" style="
			width: 100%;
			border: none;
			text-align: center;
			font-size: 10pt;
		">
		<tr>
			<td style="width: 33%">Solicitante</td>
			<td style="width: 33%">Autorizo</td>
			<td style="width: 33%">V.° B.°</td>
		</tr>
		<tr>
			<td style="width: 33%">
				<br /><br />_____________________<br />Empleado
			</td>
			<td style="width: 33%">
				<br /><br />_____________________<br />Gerente
				de área
			</td>
			<td style="width: 33%">
				<br /><br />_____________________<br />Recursos
				humanos
			</td>
		</tr>
	</table>
	<p style="color: #444444">Original RH</p>
	<!-- Formato segunda parte -->
	<p>------------------------------------------------------------------------------------------------------------------------------------------
	</p>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 14px">
		<tr>
			<td style="width: 20%; color: #444444">
				<img style="width: 100%" src="../app/img/logo/logo.png" alt="Logo" /><br />
				<!-- Equipos Médicos Vizcarra -->
			</td>
			<td style="width: 60%">
				<h4>INASISTENCIA EMPLEADOS Y/O ADMINISTRATIVOS</h4>
			</td>
			<td>
				<p style="font-size: 15px; font-weight: bold; text-align: right">
					Folio:
					<?php echo $folio; ?>
					Fecha:
					<?php echo date('d/m/Y'); ?>
				</p>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<!-- #444444 -->
			<td style="width: 30%">
				<p style="text-align: left">Nombre del empleado&nbsp;

					<!-- <-?php echo $nombre ?> -->
				</p>
			</td>
			<td style="border: 0.5px solid black; width: 70%">
				<span>
					<?php echo $nombre ?>
				</span>
			</td>
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<!-- #444444 -->
			<td style="width: 7%">
				<p style="text-align: left">Área&nbsp;</p>
			</td>

			<td style="border: 0.5px solid black; width: 63%">
				<span>
					<?php echo $departamento ?>
				</span>
			</td>

			<td style="width: 10%">
				<p style="text-align: left">&nbsp;Nomina&nbsp;
					<!-- <-?php echo $nombre ?> -->
				</p>
			</td>
			<td style="border: 0.5px solid black; width: 20%">
				<span>
					<?php echo $nomina ?>
				</span>
			</td>

		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<!-- #444444 -->
			<td style="width: 10%">
				<p style="text-align: left">Permiso&nbsp;</p>
			</td>

			<td style="border: 0.5px solid black; width: 90%">
				<span>
					<?php echo $motivo ?>
				</span>
			</td>
		</tr>
	</table>

	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<!-- #444444 -->
			<td style="width: 15%">
				<p style="text-align: left">Fecha Inicio&nbsp;</p>
			</td>

			<td style="border: 0.5px solid black; width: 35%">
				<span>
					<?php echo $fechaInicio ?>
				</span>
			</td>

			<td style="width: 15%">
				<p style="text-align: left">&nbsp;Fecha Fin&nbsp;
					<!-- <-?php echo $nombre ?> -->
				</p>
			</td>
			<td style="border: 0.5px solid black; width: 35%">
				<span>
					<?php echo $fechaFin ?>
				</span>
			</td>

		</tr>
	</table>

	<br>
	<table cellspacing="0" style="width: 100%; text-align: center; font-size: 15px ">
		<tr>
			<td style="width: 17%">
				<p style="text-align: left">Observaciones&nbsp;
					<!-- <-?php echo $nombre ?> -->
				</p>
			</td>
			<td style="text-align:  justify; border: 0.5px solid black; width: 83%; height: 5%">
				<span>
					<?php echo $observaciones ?>
				</span>
			</td>

		</tr>
	</table>

	<br />
	<table cellspacing="0" style="
			width: 100%;
			border: none;
			text-align: center;
			font-size: 10pt;
		">
		<tr>
			<td style="width: 33%">Solicitante</td>
			<td style="width: 33%">Autorizo</td>
			<td style="width: 33%">V.° B.°</td>
		</tr>
		<tr>
			<td style="width: 33%">
				<br /><br />_____________________<br />Empleado
			</td>
			<td style="width: 33%">
				<br /><br />_____________________<br />Gerente
				de área
			</td>
			<td style="width: 33%">
				<br /><br />_____________________<br />Recursos
				humanos
			</td>
		</tr>
	</table>
	<p style="color: #444444">Copia empleado</p>
	<table cellspacing="0" style="
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
	</table>
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