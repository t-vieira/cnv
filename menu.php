<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Controle de CNV - DA EMPRESA TAL</title>

<link rel="stylesheet" type="text/css" href="style.css" />

<script language="JavaScript">
function DataHora(evento, objeto){
	var keypress=(window.event)?event.keyCode:evento.which;
	campo = eval (objeto);
	if (campo.value == '00/00/0000')
	{
		campo.value=""
	}

	caracteres = '0123456789';
	separacao1 = '/';
	separacao2 = ' ';
	separacao3 = ':';
	conjunto1 = 2;
	conjunto2 = 5;
	conjunto3 = 10;
	conjunto4 = 13;
	conjunto5 = 16;
	if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19))
	{
		if (campo.value.length == conjunto1 )
		campo.value = campo.value + separacao1;
		else if (campo.value.length == conjunto2)
		campo.value = campo.value + separacao1;
	}
	else
		event.returnValue = false;
}
</script>
</head>
<?php
include "mysqlconecta.php";
include "mysqlexecuta.php";
?>
<body>
<!-- ******** BEGIN LIKNO WEB TOOLTIPS CODE FOR likno-tooltip-project ********
<script type="text/javascript">var lwttLinkedBy="LiknoWebTooltips [1]",lwttName="likno-tooltip-project",lwttBN="118";</script><script charset="UTF-8" src="likno-scripts/likno-tooltip-project.js" type="text/javascript"></script>
******** END LIKNO WEB TOOLTIPS CODE FOR likno-tooltip-project ******** -->

<div align="center">
<table cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td>
        	<a href="cadastrar_cidade.php"><img src="img/btn_cadastrar_cidade.png" border="0" /></a>
        </td>
        <td>
        	<a href="cadastrar_colaborador.php"><img src="img/btn_cadastrar_colaborador.png" border="0" /></a>
        </td>
        <td>
        	<a href="envio_cnv.php"><img src="img/btn_envio_cnv.png" border="0" /></a>
        </td>
        <td>
        	<a href="rel_processo_cnv.php"><img src="img/btn_relatorio_cnv.png" border="0" /></a>
        </td>
        <td>
        	<a href="colab_inativos.php"><img src="img/btn_colab_in.png" border="0" /></a>
        </td>
    </tr>
</table>

<hr />