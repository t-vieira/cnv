<?php
include "menu.php";

$inativo = $_GET['inativo'];

if ($inativo != "") {
	
	$inativar = "UPDATE tab_cnv SET ativo = '0' WHERE id_colab = '$inativo'";
	
	mysql_query($inativar);
}
?>

<h1>Lançar Envio de Processo de CNV</h1>

<div>
<form action="envio_cnv.php?controle_pesquisa=1" method="post">
<font face="Tahoma, Geneva, sans-serif" size="2" color="#FFF"><b>Pesquisar: (por nome)</b>&nbsp;<input type="text" name="nome_pesquisar" size="30" onkeyup="this.value = this.value.toUpperCase();"/>
<input type="submit" value="pesquisar" />
</form>
</div><br />

<table cellpadding="3" cellspacing="0" border="0" width="700">
	<tr>
    	<td align="center">
        	<font class="text_form"><b>NOME DO COLABORADOR</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>VENC. CNV</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>OPÇÕES</b></font>
        </td>
    </tr>
    <tr>
    	<td bgcolor="#505f18" colspan="3"></td>
    </tr>
    <tr>
    	<td height="3" bgcolor="#FFFFFF" colspan="3"></td>
    </tr>
<?php
$controle_pesquisa = $_GET['controle_pesquisa'];
if ($controle_pesquisa == "1") {
	$nome_pesquisa = $_POST['nome_pesquisar'];
	$select_colab = "SELECT * FROM tab_cnv WHERE dt_env_colab = '0000-00-00' AND ativo = '1' AND nome_colab LIKE '%$nome_pesquisa%' ORDER BY venc_cnv ASC";
}else{
	$select_colab = "SELECT * FROM tab_cnv WHERE dt_env_colab = '0000-00-00' AND ativo = '1' ORDER BY venc_cnv ASC";
}
$exec_select_colab = mysql_query($select_colab);
$i = 1;
while ($select_colab = mysql_fetch_array($exec_select_colab)) {
	$dt_venc_cnv_en = $select_colab['venc_cnv'];
	$dt_venc_cnv = substr($dt_venc_cnv_en,8,2) . "/" . substr($dt_venc_cnv_en,5,2) . "/" . substr($dt_venc_cnv_en,0,4);
	
	if (($i % 2) == 1){ $fundo="#3d3d3d"; }else{ $fundo="#353535"; }
	$i++;
?>
	<tr bgcolor="<?php echo $fundo;?>">
    	<td>
        	&nbsp;&nbsp;<font class="text_form"><?php echo $select_colab['nome_colab']; ?></font>
        </td>
        <td align="center">
        	<font class="text_form"><?php echo $dt_venc_cnv; ?></font>
        </td>
        <td align="center">
        	<a href="alterar_datas.php?colab=<?php echo $select_colab['id_colab']; ?>"><img src="img/btn_calendario.png" border="0" title="Adicionar Datas ao Processo" /></a>&nbsp;
            <a href="imprimir_folha.php?colab=<?php echo $select_colab['id_colab']; ?>"><img src="img/btn_folha.png" border="0" title="Imprimir Folha para Enviar para Vigilante" /></a>&nbsp;
            <a href="envio_cnv.php?inativo=<?php echo $select_colab['id_colab']; ?>"><img src="img/btn_inativo.png" border="0" title="Colaborador Demitido"/></a>
        </td>
   	</tr>
<?php
}
?>
</table>