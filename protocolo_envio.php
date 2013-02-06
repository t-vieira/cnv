<?php
include "mysqlconecta.php";
include "mysqlexecuta.php";

$colab = $_GET['colab'];
if ($colab != "") {
	
	$select_colab = "SELECT * FROM tab_cnv WHERE id_colab = '$colab'";
	$exec_colab = mysql_query($select_colab);
	$exibir_select_colab = mysql_fetch_array($exec_colab);
	
	$id_cidade = $exibir_select_colab['num_cidade'];
	
	$select_cidade = "SELECT * FROM tab_cidades WHERE id_cidade = '$id_cidade'";
	$exec_select_cidade = mysql_query($select_cidade);
	$exibir_select_cidade = mysql_fetch_array($exec_select_cidade);

	$data = date("d/m/Y");
	$data_en = substr($data,6,4) . "-" . substr($data,3,2) . "-" . substr($data,0,2);
	$alterar_data = "UPDATE tab_cnv SET dt_env_sp = '$data_en' WHERE id_colab = '$colab'";
	
	mysql_query($alterar_data);
	
	$del_doc_faltantes = "DELETE FROM tab_docfaltantes WHERE id_colaborador = $colab";
	mysql_query($del_doc_faltantes);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Procolto de Envio - Processo de CNV</title>
</head>

<body>
<table cellpadding="0" cellspacing="0" border="0" width="720">
	<tr>
    	<td align="right">
        	<img src="img/LOGOTIPO.png" border="0" width="100" height="100" />
        </td>
    </tr>
    <tr>
    	<td align="center">
        	<font face="Tahoma, Geneva, sans-serif" size="6"><b><u>PROTOCOLO</u></b></font>
        </td>
    </tr>
    <tr>
    	<td height="20"></td>
    </tr>
    <tr>
    	<td>
        	<font face="Tahoma, Geneva, sans-serif" size="3">DE: FULANO DE TAL - CARGO TAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("d/m/Y"); ?><br /><br /><br />
            PARA: FULANO DE TAL - DEPARTAMENTO<br /><br /><br />
            <p align="justify">Segue abaixo a lista de documentação que esta sendo enviada para confecção da CNV do vigilante <?php echo $exibir_select_colab['nome_colab']; ?>:</p><br />
            
            <ul>
            	<li>Autorização de Desconto no Pagamento;</li>
                <li>Requerimento para Cadastramento de CNV; (somente assinado)</li>
                <li>01 Cópia do CPF e RG;</li>
                <li>Comprovante de Residência;</li>
                <li>Cópias da carteira de trabalho;</li>
                <li>Cópia do Certificado de Formação;</li>
                <li>Cópia da última reciclagem;</li>
                <li>1 Foto 2x2;</li>
                <li>Cópia da atual CNV.</li>
            </ul>
            <br /><br /><br><br><br><br>
        </td>
    </tr>
    <tr>
    	<td>
			<font face="Tahoma, Geneva, sans-serif" size="3">
			Recebí ______ / ________ / _______________<br><br><br><br>
			__________________________________________<br><br><br><br><br><br>
			
			FULANO DE TAL<br>
			CARGO TALbr><br><br>
		</td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="720">
	<tr>
    	<td>
     		<a href="rel_processo_cnv.php">Voltar ao início</a>
        </td>
    	<td align="right">
        	<a href="javascript:window.print();">Imprimir</a>
        </td>
    </tr>
</table>
</body>
</html>

<?php
//header("Location:Desconto.php");
?>