<?php

if (isset($_GET["msg"]) && $_GET["msg"] == "a" ) {
   echo "<p align='center'><font color='#000'> Essa é sua nova gang! </font></p>" ;
}
if (isset($_GET["msg"]) && $_GET["msg"] == "e" ) {
   echo "<p align='center'><font color='#000'> Mensagem enviada! </font></p>" ;
}

$sper = "select GANG from personagem where CODIGOP = '$_SESSION[usuario]'";
$qper = mysql_query($sper);
$aper = mysql_fetch_array($qper);

if ($aper["GANG"] > 0) {

$sngang = "select * from gang where CODIGOG = '$aper[GANG]'";
$qngang = mysql_query($sngang);
$angang = mysql_fetch_array($qngang);

$sgang = "select CODIGOP, NOMEP, POPULARIDADE from personagem where GANG = '$aper[GANG]'";
$qgang = mysql_query($sgang);

?>

<h2><?php echo $angang["NOMEG"]; ?></h2><a href="sairgang.php">Sair da Gang</a><br><br>

O Ranking de Gangs é baseado na soma dos cinco membros com mais Popularidade.<br><br>

<table width="60%">
	<tr>
		<td scope="col">Personagem</td>
		<td scope="col">Popularidade</td>
	</tr>
<?php

while ($agang = mysql_fetch_array($qgang)) {
	echo "<tr>
			<td><a href='perfil.php?pop=" . $agang["CODIGOP"] . "'>" . $agang["NOMEP"] . "</a></td>
			<td>" . $agang["POPULARIDADE"] ."</td>";
	if ($_SESSION["usuario"] == $angang["LIDER"]) {
		echo "<td><a href='exclgang.php?per=" . $agang["CODIGOP"] . "'>Excluir da Gang</a></td>";
	}	
echo "</tr>";	 
}

?>

</table>
<br><br>
Enviar mensagem a todos os membros:

<form action="mgang.php" method="post">
<input type="hidden" value='<?php echo $aper["GANG"]; ?>' id="gang">
<input type="text" size="90" id="msg">	
<input type="submit" value="Enviar">
</form>

<?php

} else {
	echo "Você não faz parte de nenhuma Gang!";
}

?>




