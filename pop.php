<?php 

$per = $_GET["per"];

if ($_SESSION["usuario"] == $per) {
	header ("Location: perfil.php?p=p");
} else {

$susr = "select * from personagem where CODIGOP = '$per'";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);



echo "<p align='center'><b>".$ausr["NOMEP"]."</b> diz: ".$ausr["MSG"]."</p>";

?>

<table width='100%' border='0'>
  <tr>
    <td width="129"><img src="avat/<?php echo $ausr["IMG"]; ?>"></td>
    <td><?php echo "<b>Popularidade: </b>".$ausr["POPULARIDADE"]."<br>
					<b>Dinheiro: </b>".$ausr["DINHEIRO"]."<br>
					<b>Energia: </b>".$ausr["STAMINA"]."<br>
					<b>Status: </b>"; if ($ausr["ESTADO"] == "D") {
										echo "Descansando<br>";
									  } else {
										echo "Ativo<br>";
									  }
			 
$sduplo = "select count(*) as amigo from amigos where PORIGEM = '$_SESSION[usuario]' and PAMIGO = '$_GET[per]'";
$qduplo = mysql_query($sduplo);
$aduplo = mysql_fetch_array($qduplo);

			if ($aduplo["amigo"] == 0) {
				echo "<a href='addlista.php?per=".$per.">Adcionar na lista de amigos</a><br>";
			}
		$sgang = "select count(*) as conta from gang where LIDER = '$_SESSION[usuario]'";
		$qgang = mysql_query($sgang);
		$agang = mysql_fetch_array($qgang);
			if ($agang["conta"] > 0) {
				echo "<a href='msggang.php?cg=" . $agang["CODIGOG"] . "&per=" . $per . "'>
				Convidar para gang</a>";
			}
			
		?>	 
	</td>
  </tr>
</table>

<br>

<form action="enviamsgprv.php" method="post">
Enviar Mensagem Privada:<br>
<textarea name="msgp" cols="60" rows="3"></textarea><br>
<input name="codper" type="hidden" value="<?php echo $per; ?>" />
<input name="" type="submit" value="Enviar">
</form>

<?php 

} 

?>