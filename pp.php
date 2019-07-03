<?php 

$susr = "select * from personagem where CODIGOP = '$_SESSION[usuario]'";
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
										echo "Descansando";
									  } else {
										echo "Ativo";
									  }
			 echo "<br><b>Turma: </b>";
		?>	 
	</td>
  </tr>
</table>
