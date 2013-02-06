<?php
include "menu.php";

$reativar = $_GET['reativar'];

if ($reativar != "") {
	
	$reativar_colab = "UPDATE tab_cnv SET ativo = '1' WHERE id_colab = '$reativar'";
	
	mysql_query($reativar_colab);
}
?>

<h1>Relatório de Colaboradores Inativos</h1>

<div>
<form action="colab_inativos.php?controle_pesquisa=1" method="post">
<font face="Tahoma, Geneva, sans-serif" size="2" color="#FFF"><b>Pesquisar: (por nome)</b>&nbsp;<input type="text" name="nome_pesquisar" size="30" onkeyup="this.value = this.value.toUpperCase();"/>
<input type="submit" value="pesquisar" />
</form>
</div><br />

<table cellpadding="3" cellspacing="0" border="0" width="980">
	<tr>
    	<td align="center">
        	<font class="text_form"><b>NOME DO COLABORADOR</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>VENC. CNV</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>DATA ENV. COLAB.</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>DATA ENV. SP</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>DATA ENTR. SIND.</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>PROTOCOLO?</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>OPÇÕES</b></font>
        </td>
    </tr>
    <tr>
    	<td bgcolor="#505f18" colspan="7"></td>
    </tr>
    <tr>
    	<td height="3" bgcolor="#FFFFFF" colspan="7"></td>
    </tr>
<?php
$controle_pesquisa = $_GET['controle_pesquisa'];
if ($controle_pesquisa == "1") {
	$nome_pesquisa = $_POST['nome_pesquisar'];
	$select_colab = "SELECT * FROM tab_cnv WHERE ativo = '0' AND nome_colab LIKE '%$nome_pesquisa%' ORDER BY venc_cnv ASC";
}else{
	$select_colab = "SELECT * FROM tab_cnv WHERE ativo = '0' ORDER BY venc_cnv ASC";
}
$exec_select_colab = mysql_query($select_colab);
$i = 1;
while ($select_colab = mysql_fetch_array($exec_select_colab)) {
	$dt_venc_cnv_en = $select_colab['venc_cnv'];
	$dt_venc_cnv = substr($dt_venc_cnv_en,8,2) . "/" . substr($dt_venc_cnv_en,5,2) . "/" . substr($dt_venc_cnv_en,0,4);
	
	$dt_env_colab_en = $select_colab['dt_env_colab'];
	$dt_env_colab = substr($dt_env_colab_en,8,2) . "/" . substr($dt_env_colab_en,5,2) . "/" . substr($dt_env_colab_en,0,4);
	
	$dt_env_sp_en = $select_colab['dt_env_sp'];
	$dt_env_sp = substr($dt_env_sp_en,8,2) . "/" . substr($dt_env_sp_en,5,2) . "/" . substr($dt_env_sp_en,0,4);
	
	$dt_entr_sind_en = $select_colab['dt_entr_sind'];
	$dt_entr_sind = substr($dt_entr_sind_en,8,2) . "/" . substr($dt_entr_sind_en,5,2) . "/" . substr($dt_entr_sind_en,0,4);
	
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
        	<font class="text_form"><?php echo $dt_env_colab; ?></font>
        </td>
        <td align="center">
        	<font class="text_form"><?php echo $dt_env_sp; ?></font>
        </td>
        <td align="center">
        	<font class="text_form"><?php echo $dt_entr_sind; ?></font>
        </td>
        <td align="center">
        	<font class="text_form"><?php echo $select_colab['protocolo']; ?></font>
        </td>
        <td>
        	<a href="colab_inativos.php?reativar=<?php echo $select_colab['id_colab']; ?>"><img src="img/btn_reativar.png" border="0" title="Readmitir Colaborador" /></a>
        </td>
   	</tr>
<?php
}
?>
</table>