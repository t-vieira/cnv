<?php
include "mysqlconecta.php";
include "mysqlexecuta.php";

$colab = $_GET['colab'];

if ($colab != "") {
	
	$sel_docfaltantes = "SELECT * FROM tab_docfaltantes WHERE id_colaborador = $colab";
	$ex_sel_docfaltantes = mysql_query($sel_docfaltantes);
	$sel_docfaltantes = mysql_fetch_array($ex_sel_docfaltantes);
	
	$doc_faltantes = $sel_docfaltantes['str_doc_faltantes'];
	$dt_doc_faltantes_en = $sel_docfaltantes['dt_env_faltantes'];
	$dt_doc_faltantes = substr($dt_doc_faltantes_en,8,2) . "/" . substr($dt_doc_faltantes_en,5,2) . "/" . substr($dt_doc_faltantes_en,0,4);
	
	$sel_colab = "SELECT * FROM tab_cnv WHERE id_colab = $colab";
	$ex_sel_colab = mysql_query($sel_colab);
	$sel_colab = mysql_fetch_array($ex_sel_colab);
	
	$num_cidade = $sel_colab['num_cidade'];
	
	$sel_cidade = "SELECT * FROM tab_cidades WHERE id_cidade = $num_cidade";
	$ex_sel_cidade = mysql_query($sel_cidade);
	$sel_cidade = mysql_fetch_array($ex_sel_cidade);
	
	//$doctos_faltantes = $_POST['doctos_faltantes'];
	//$total_doctos = count($doctos_faltantes);
	//$primeiro_doctos = $doctos_faltantes[0];
	
	//for ($i=0; $i < count($doc_faltantes); $i++) {
		
	//	$doctos .= $doctos_faltantes[$i] . ",";
	
	//}
	
	//$datahoje = date("Y-m-d");
	
	//$inserir_docfaltante = "INSERT INTO tab_docfaltantes(id_colaborador, str_doc_faltantes, dt_env_faltantes) VALUES ('$id', '$doctos', '$datahoje')";
	//mysql_query($inserir_docfaltante);
	
	//$upd_dt_env_sp = "UPDATE tab_cnv SET dt_env_sp = '0000-00-00' WHERE id_colab = $id";
	//mysql_query($upd_dt_env_sp);
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documentos Faltantes para Entrada CNV</title>
</head>

<body>
<table cellpadding="0" cellspacing="0" border="0" width="710">
	<tr>
    	<td align="right">
        	<img src="img/LOGOTIPO.png" border="0" width="100" height="100" />
        </td>
    </tr>
    <tr>
    	<td align="center">
        	<font face="Tahoma, Geneva, sans-serif" size="6"><b><u>Documentação Faltante para Entrada CNV</u></b></font>
        </td>
    </tr>
    <tr>
    	<td height="20"></td>
    </tr>
    <tr>
    	<td>
        	<font face="Tahoma, Geneva, sans-serif" size="3">DE: FULANO DE TAL - CARGO TAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dt_doc_faltantes; ?><br /><br /><br />
            PARA: <b><?php echo $sel_colab['nome_colab'] . " - " . $sel_cidade['cidade']; ?></b><br /><br /><br />
            <p align="justify">Solicito ao senhor que nos envie os documentos faltantes abaixo para dar continuidade ao processo de entrada na renovação/concessão da CNV:</p><br />
            <?php
			$sep_doctos = explode(",", $doc_faltantes);
			
			foreach ($sep_doctos as $total_doctos) {
			?>
            <ul>
				<?php 
				switch ($total_doctos) {
					case "autorizacao":
						echo "<li>Autorização de Desconto no Pagamento; (em anexo)</li>";
						break;
					case "requerimento":
						echo "<li>Requerimento para Cadastramento de CNV; (em anexo, assinar somente)</li>";
						break;
					case "cpf":
						echo "<li>Cópia legível do CPF;</li>";
						break;
					case "rg":
						echo "<li>Cópia legível do RG;</li>";
						break;
					case "comprovante":
						echo "<li>Cópia legível do Comprovante de Residência;</li>";
						break;
					case "carteira":
						echo "<li>Cópia legível do Registro da Power na Carteira de Trabalho;</li>";
						break;
					case "policia":
						echo "<li>Cópia do Registro da Polícia Federal na Carteira de Trabalho;</li>";
						break;
					case "formacao":
						echo "<li>Cópia legível do Certificado de Formação de Vigilante; (frente e verso)</li>";
						break;
					case "reciclagem":
						echo "<li>Cópia legível do Certificado de Reciclagem; (frente e verso)</li>";
						break;
					case "foto":
						echo "<li>1 Foto 2x2;</li>";
						break;
					case "cnv":
						echo "<li>Cópia legível da CNV; (mesmo se estiver vencida)</li>";
						break;
					case "ctps":
						echo "<li>Deixar disponível a Carteira de Trabalho para recolhimento; (mudar endereço da Power que esta registrado na Carteira de Trabalho)</li>";
						break;
					case "transferencia":
						echo "<li>Deixar disponível a Carteira de Trabalho para fazer a transferência de empresa e/ou mudança de cargo;</li>";
						break;
				}
				?>
            </ul>
			<?php
			}
			?>
            <br /><br /><br><br>
			Fico no aguardo o mais breve possível da documentação solicitada.<br><br><br><br><br><br><br>
			
			Atenciosamente<br><br><br><br><br><br>
			
			FULANO DE TAL<br>
			CARGO TAL
        </td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="720">
	<tr>
    	<td>
     		<a href="rel_processo_cnv.php">Voltar ao início</a>
        </td>
    </tr>
</table>
</body>
</html>

<?php
//header("Location:Desconto.php");
?>