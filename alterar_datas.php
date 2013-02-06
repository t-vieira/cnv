<?php
include "menu.php";

$colab = $_GET['colab'];

if (isset($colab)) {
	
	$select_colab = "SELECT * FROM tab_cnv WHERE id_colab = '$colab'";
	
	$exec_select_colab = mysql_query($select_colab);
	
	$exibir_select_colab = mysql_fetch_array($exec_select_colab);
	
	$venc_cnv_en = $exibir_select_colab['venc_cnv'];
	$dt_venc_cnv = substr($venc_cnv_en,8,2) . "/" . substr($venc_cnv_en,5,2) . "/" . substr($venc_cnv_en,0,4);
	
	$dt_env_colab_en = $exibir_select_colab['dt_env_colab'];
	$dt_env_colab = substr($dt_env_colab_en,8,2) . "/" . substr($dt_env_colab_en,5,2) . "/" . substr($dt_env_colab_en,0,4);
	
	$dt_env_sp_en = $exibir_select_colab['dt_env_sp'];
	$dt_env_sp = substr($dt_env_sp_en,8,2) . "/" . substr($dt_env_sp_en,5,2) . "/" . substr($dt_env_sp_en,0,4);
	
	$dt_entr_sind_en = $exibir_select_colab['dt_entr_sind'];
	$dt_entr_sind = substr($dt_entr_sind_en,8,2) . "/" . substr($dt_entr_sind_en,5,2) . "/" . substr($dt_entr_sind_en,0,4);
	
}

$controle = $_POST['controle'];

if ($controle == "1") {
	$atualizar = $_POST['atualizar'];
	
	$drt = $_POST['drt'];
	$nome = $_POST['nome'];
	$cidade = $_POST['cidade'];
	
	$data_venc_cnv = $_POST['data_venc_cnv'];
	$data_venc_cnv_en = substr($data_venc_cnv,6,4) . "-" . substr($data_venc_cnv,3,2) . "-" . substr($data_venc_cnv,0,2);
	
	$data_env_colab = $_POST['data_env_colab'];
	$data_env_colab_en = substr($data_env_colab,6,4) . "-" . substr($data_env_colab,3,2) . "-" . substr($data_env_colab,0,2);
	
	$data_env_sp = $_POST['data_env_sp'];
	$data_env_sp_en = substr($data_env_sp,6,4) . "-" . substr($data_env_sp,3,2) . "-" . substr($data_env_sp,0,2);
	
	$data_entr_sind = $_POST['data_entr_sind'];
	$data_entr_sind_en = substr($data_entr_sind,6,4) . "-" . substr($data_entr_sind,3,2) . "-" . substr($data_entr_sind,0,2);
	
	$protocolo = $_POST['protocolo'];
	
	$atualizar_datas = "UPDATE tab_cnv SET num_drt = '$drt', nome_colab = '$nome', num_cidade = '$cidade', venc_cnv = '$data_venc_cnv_en', dt_env_colab = '$data_env_colab_en', dt_env_sp = '$data_env_sp_en', dt_entr_sind = '$data_entr_sind_en', protocolo = '$protocolo' WHERE id_colab = '$atualizar'";
	
	mysql_query($atualizar_datas);
	
	header("Location: alterar_datas.php?atualizado=ok");
}
?>

<h1>Alterar Datas</h1>

<?php
$atualizado = $_GET['atualizado'];
if ($atualizado == "ok") {
?>
<div class="alert">
Cadastro do Colaborador Alterado com Sucesso!
</div><br>
<?php
}
?>

<table cellpadding="0" cellspacing="0" border="0" width="600">
	<tr>
    	<form action="alterar_datas.php" method="post">
    	<td width="200" align="right">
        	<p class="text_form">DRT:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="drt" class="box" size="10" maxlength="7" value="<?php echo $exibir_select_colab['num_drt']; ?>" />
        </td>
    </tr>
	<tr>
    	<td width="200" align="right">
        	<p class="text_form">Nome:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="nome" class="box" size="50" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $exibir_select_colab['nome_colab']; ?>" />
        </td>
    </tr>
	<tr>
    	<td width="200" align="right">
        	<p class="text_form">Cidade:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<select name="cidade" class="box">
            	<option value="">Selecione um Cidade</option>
                <?php
                $select_cidade = "SELECT * FROM tab_cidades ORDER BY cidade";
				
				$exec_select_cidade = mysql_query($select_cidade);
				
				while ($select_cidade = mysql_fetch_array($exec_select_cidade)) {
					$id_cidade = $select_cidade['id_cidade'];
					$cidade = $select_cidade['cidade'];
				?>
                <option value="<?php echo $id_cidade; ?>" <?php if ($id_cidade == $exibir_select_colab['num_cidade']) { echo "selected"; }?>><?php echo $cidade; ?></option>
                <?php
				}
				?>
            </select>
        </td>
    </tr>
    <tr>
    	<td width="200" align="right">
        	<p class="text_form">Venc. CNV:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="data_venc_cnv" class="box" size="10" maxlength="10" onKeyPress="DataHora(event, this)" value="<?php echo $dt_venc_cnv; ?>"/>
        </td>
    </tr>
    <tr>
    	<td width="200" align="right">
        	<p class="text_form">Data Env. Colaborador:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="data_env_colab" class="box" size="10" maxlength="10" onKeyPress="DataHora(event, this)" value="<?php echo $dt_env_colab; ?>"/>
        </td>
    </tr>
    <tr>
    	<td width="200" align="right">
        	<p class="text_form">Data Env. SP:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="data_env_sp" class="box" size="10" maxlength="10" onKeyPress="DataHora(event, this)" value="<?php echo $dt_env_sp; ?>"/>
        </td>
    </tr>
    <tr>
    	<td width="200" align="right">
        	<p class="text_form">Data Entr. Sindicato:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="data_entr_sind" class="box" size="10" maxlength="10" onKeyPress="DataHora(event, this)" value="<?php echo $dt_entr_sind; ?>"/>
        </td>
    </tr>
    <tr>
    	<td width="200" align="right">
        	<p class="text_form">Chegou o Protocolo?&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="protocolo" class="box" size="10" value="<?php echo $exibir_select_colab['protocolo']; ?>" />
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center">
        	<input type="hidden" name="controle" value="1">
        	<input type="hidden" name="atualizar" value="<?php echo $colab; ?>" />
        	<input type="submit" value="ATUALIZAR DATAS" class="botao" />
        </td>
    </tr>
    </form>
    <tr>
    	<td height="10"></td>
    </tr>
</table>