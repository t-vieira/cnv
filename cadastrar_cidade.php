<?php
include "menu.php";

$cadastrar = $_POST['cadastrar'];

if ($cadastrar == "1") {
	$cidade = $_POST['cidade'];
	
	$inserir_cidade = "INSERT INTO tab_cidades (cidade) VALUES ('$cidade')";
	
	mysql_query($inserir_cidade);
	
	header("Location: cadastrar_cidade.php?cadastro=ok");

}

$deletar = $_GET['deletar'];

if ($deletar != "") {
	
	$deletar_cidade = "DELETE FROM tab_cidades WHERE id_cidade = '$deletar'";
	
	mysql_query($deletar_cidade);
}
?>

<h1>Cadastrar Cidade</h1>

<?php
$cadastro = $_GET['cadastro'];
if ($cadastro == "ok") {
?>
<div class="alert">
Cadastro da Cidade Efetuado com Sucesso!
</div><br />
<?php
}
?>

<table cellpadding="0" cellspacing="0" border="0" width="600">
	<form action="cadastrar_cidade.php" method="post">
	<tr>
    	<td width="200" align="right">
        	<p class="text_form">Cidade:&nbsp;&nbsp;</p>
        </td>
        <td width="400" align="left">
        	<input type="text" name="cidade" class="box" size="40" onkeyup="this.value = this.value.toUpperCase();"/>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center">
        	<input type="hidden" name="cadastrar" value="1" />
        	<input type="submit" value="CADASTRAR CIDADE" class="botao" />
        </td>
    </tr>
    </form>
    <tr>
    	<td height="20"></td>
    </tr>
</table>

<hr>

<table cellpadding="3" cellspacing="0" border="0" width="700">
	<tr>
    	<td align="center">
        	<font class="text_form"><b>CIDADE</b></font>
        </td>
        <td align="center">
        	<font class="text_form"><b>OPÇÕES</b></font>
        </td>
    </tr>
    <tr>
    	<td bgcolor="#505f18" colspan="2"></td>
    </tr>
    <tr>
    	<td height="3" bgcolor="#FFFFFF" colspan="3"></td>
    </tr>
	<?php
		$select_cidade = "SELECT * FROM tab_cidades ORDER BY cidade ASC";
		$exec_select_cidade = mysql_query($select_cidade);
		$i = 1;
		while ($select_cidade = mysql_fetch_array($exec_select_cidade)) {
		
		if (($i % 2) == 1){ $fundo="#3d3d3d"; }else{ $fundo="#353535"; }
		$i++;
	?>
	<tr>
		<td bgcolor="<?php echo $fundo; ?>">
			<font class="text_form"><?php echo $select_cidade['cidade']; ?>
		</td>
		<td align=center bgcolor="<?php echo $fundo; ?>">
			<a href="cadastrar_cidade.php?deletar=<?php echo $select_cidade['id_cidade']; ?>"><img src = "img/btn_deletar.png" border=0 title="Deletar Cidade"></a><br>
		</td>
	</tr>
	<?php
		}
	?>
</table>