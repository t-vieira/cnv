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
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documenta&ccedil;&atilde;o para CNV</title>
<script language="javascript">
function imprimir() {
	window.print() ;
	
	window.location = "Desconto.php?colab=<?php echo $colab; ?>";
}
</script>
</head>

<body>
<table cellpadding="0" cellspacing="0" border="0" width="700">
	<tr>
    	<td align="right">
        	<img src="img/LOGOTIPO.png" border="0" width="100" height="100" />
        </td>
    </tr>
    <tr>
    	<td align="center">
        	<font face="Tahoma, Geneva, sans-serif" size="6"><b><u>Documenta&ccedil;&atilde;o para CNV</u></b></font>
        </td>
    </tr>
    <tr>
    	<td height="20"></td>
    </tr>
    <tr>
    	<td>
        	<font face="Tahoma, Geneva, sans-serif" size="3">DE: FULANO DE TAL - CARGO TAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("d/m/Y"); ?><br /><br /><br />
            PARA: Sr. <?php echo $exibir_select_colab['nome_colab']; ?> - <?php echo $exibir_select_cidade['cidade']; ?><br /><br /><br />
            <p align="justify">Solicito ao senhor que envie 01 <u>cópia</u> de cada documento descrito abaixo (<b>no máximo em 5 dias</b>) para (LOCAL TAL), para providenciar a confecção de sua nova CNV junto a Polícia Federal.</p><br />
            
            <ul>
            	<li>01 RG;</li>
                <li>01 CPF;</li>
                <li>01 Comprovante de residência;</li>
                <li>01 Registro da Power Segurança na carteira de trabalho;</li>
                <li>01 Certificado do curso de formação de vigilante; (frente e verso)</li>
                <li>01 Certificado da última reciclagem do curso de formação de vigilante; (frente e verso)</li>
                <li>01 CNV (Carteira Nacional do Vigilante) mesmo que esteja vencida. (se possuir)</li>
                <li>Requerimento para Cadastramento da CNV. (somente assinado, em anexo)</li>
                <li>1 Foto 2x2.</li>
            </ul>
            <br /><br />
            ENDEREÇO COMPLETO DA EMPRESA
        </td>
    </tr>
    <tr>
    	<td align="right">
        	<font face="Tahoma, Geneva, sans-serif" size="3">
        	<p>Sem mais,<br /><br />
            Atenciosamente<br /><br /><br /><br />
       FULANO DE TAL</p></td>
    </tr>
    <tr>
    	<td></td>
    </tr>
</table>

<a href="javascript:imprimir();">Imprimir</a>
</body>
</html>

<?php
//header("Location:Desconto.php");
?>