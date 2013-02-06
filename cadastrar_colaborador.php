<?php
include "menu.php";

$cadastrar = $_POST['cadastrar'];

if ($cadastrar == "1") {
	$drt = $_POST['drt'];
	$nome = $_POST['nome'];
	$num_cidade = $_POST['cidade'];
	$venc_cnv = $_POST['venc_cnv'];
	$venc_cnv_en = substr($venc_cnv,6,4) . "-" . substr($venc_cnv,3,2) . "-" . substr($venc_cnv,0,2);
	
	$inserir_colaborador = "INSERT INTO tab_cnv (num_drt, nome_colab, num_cidade, venc_cnv, ativo) VALUES ('$drt', '$nome', '$num_cidade', '$venc_cnv_en', '1')";
	
	mysql_query($inserir_colaborador);
	
	header("Location: cadastrar_colaborador.php?cadastro=ok");
}

$deletar = $_GET['deletar'];

if($deletar != "") {
		
	$deletar_colab = "DELETE FROM tab_cnv WHERE id_colab = '$deletar'";
	
	mysql_query($deletar_colab);
}
?>

<h1>Cadastrar Colaborador</h1>

<?php
$cadastro = $_GET['cadastro'];
if ($cadastro == "ok") {
?>
<div class="alert">
Cadastro do Colaborador Efetuado com Sucesso!
</div><br>
<?php
}
?>

<table cellpadding="0" cellspacing="0" border="0" width="600">
	<tr>
    	<form action="cadastrar_colaborador.php" method="post">
    	<td width="200" align="right">
        	<p class="text_form">DRT:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="drt" class="box" size="10" maxlength="7" />
        </td>
    </tr>
	<tr>
    	<td width="200" align="right">
        	<p class="text_form">Nome:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="nome" class="box" size="50" onkeyup="this.value = this.value.toUpperCase();"/>
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
                <option value="<?php echo $id_cidade; ?>"><?php echo $cidade; ?></option>
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
        	<input type="text" name="venc_cnv" class="box" size="10" maxlength="10" onKeyPress="DataHora(event, this)"/>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center">
        	<input type="hidden" name="cadastrar" value="1" />
        	<input type="submit" value="CADASTRAR COLABORADOR" class="botao" />
        </td>
    </tr>
    </form>
    <tr>
    	<td height="10"></td>
    </tr>
</table>

<hr>

<table cellpadding="3" cellspacing="0" border="0" width="700">
	<tr>
    	<td align="center">
        	<font class="text_form"><b>DRT</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>NOME</b></font>
        </td>
		<td>
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
		$select_colab = "SELECT * FROM tab_cnv ORDER BY nome_colab ASC";
		$exec_select_colab = mysql_query($select_colab);
		$i = 1;
		while ($select_colab = mysql_fetch_array($exec_select_colab)) {
		
		if (($i % 2) == 1){ $fundo="#3d3d3d"; }else{ $fundo="#353535"; }
		$i++;
	?>
	<tr>
		<td align=center bgcolor="<?php echo $fundo; ?>">
			<font class="text_form"><?php echo $select_colab['num_drt']; ?>
		</td>
		<td align=center bgcolor="<?php echo $fundo; ?>">
			<font class="text_form"><?php echo $select_colab['nome_colab']; ?>
		</td>
		<td align=center bgcolor="<?php echo $fundo; ?>">
			<a href="cadastrar_colaborador.php?deletar=<?php echo $select_colab['id_colab']; ?>"><img src = "img/btn_deletar.png" border=0 title="Deletar Colaborador"></a><br>
		</td>
	</tr>
	<?php
		}
	?>
</table>