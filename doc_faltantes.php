<?php
include "menu.php";

$colab = $_GET['colab'];

if ($colab != "") {
	$sel_colab = "SELECT * FROM tab_cnv WHERE id_colab = $colab";
	$ex_sel_colab = mysql_query($sel_colab);
	$sel_colab = mysql_fetch_array($ex_sel_colab);
}
?>

<h1>Cadastrar Documentos Faltantes</h1>

<table cellpadding=0 cellspacing=0 border=0 width=600>
	<tr>
		<td widhth=200 align=right>
			<font class="text_form"><b>COLABORADOR:</b>&nbsp;&nbsp;
		</td>
		<td width=400>
			<font class="text_form"><?php echo $sel_colab['nome_colab']; ?>
		</td>
	</tr>
	<tr>
		<td height=30></td>
	<tr>
		<td colspan=2>
			<font class="text_form">Escolha abaixo os documentos que estão faltando:
		</td>
	</tr>
	<tr>
		<td height=10></td>
	</tr>
	<form action="imp_doc_faltantes.php" method="post">
	<tr>
		<td colspan=2 align=center>
			<select name="doctos_faltantes[]" class="box" size=13 MULTIPLE>
				<option value="autorizacao">Autorização de Desconto no Pagamento</option>
				<option value="requerimento">Requerimento para Cadastramento de CNV</option>
				<option value="cpf">Cópia do CPF legível</option>
				<option value="rg">Cópia do RG legível</option>
				<option value="comprovante">Comprovante de Residência</option>
				<option value="carteira">Cópia do Registro da Power na Carteira</option>
				<option value="policia">Cópia do Registro da Polícia Federal na Carteira de Trabalho</option>
				<option value="formacao">Cópia do Certificado de Formação</option>
				<option value="reciclagem">Cópia do Certificado de Reciclagem</option>
				<option value="foto">Foto 2x2</option>
				<option value="cnv">Cópia da CNV Atual</option>
				<option value="ctps">Carteira de Trabalho para Atualização</option>
				<option value="transferencia">Cópia da Transferência de Empresa e Promoção na Carteira de Trabalho</option>
			</select>
		</td>
	</tr>
	<tr>
		<td height=40></td>
	</tr>
	<tr>
		<td colspan=2 align=center>
			<input type="hidden" value="<?php echo $sel_colab['id_colab']; ?>" name="id">
			<input type="submit" value="Imprimir Pedido" class=botao>
		</td>
	</tr>
	</form>
	<tr>
		<td height=10></td>
	</tr>
</table>