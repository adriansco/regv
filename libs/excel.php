<?php
 header("Pragma: ");
 header('Cache-control: ');
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Cache-Control: no-store, no-cache, must-revalidate");
 header("Cache-Control: post-check=0, pre-check=0", false);
 header("Content-type: application/vnd.ms-excel");
 header("Content-disposition: attachment; filename='Archivo.xls'");
?>
<html>
  <head>
    <title>Tu Titulo</title>
  </head>
  <body>
    <table width="400" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td bgcolor="#66CCFF">titulo 1</td>
        <td bgcolor="#66CCFF">titulo 2</td>
        <td bgcolor="#66CCFF">titulo 3</td>
        <td bgcolor="#66CCFF">titulo 4</td>
        <td bgcolor="#66CCFF">titulo 5</td>
</tr>
      <tr>
        <td width="138">dato 1</td>
        <td width="58">dato 2</td>
        <td width="52">dato 3</td>
        <td width="105">dato 4</td>
        <td width="19">dato 5</td>
      </tr>
</table> </body> </html>