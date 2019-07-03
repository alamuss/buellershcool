<?php

echo "Ranking de Popularidade entre as Patricinhas<br><br>";

$str = "select * from personagem order by POPPATI desc";
$qry = mysql_query($str);

?>

<table width="100%" border="0">
  <tr>
  	<th scope="col">Ordem</th>
    <th scope="col">Personagem</th>
	<th scope="col">Sexo</th>
  </tr> 
  

<?php

$rnk = 0;

while ($aux = mysql_fetch_array($qry)) { 
	$rnk = $rnk + 1;
	echo "<tr>
<td align='center'>" . $rnk . "</td>
<td align='center'><a href='perfil.php?p=op&per=".$aux["CODIGOP"]."'>" . htmlentities($aux["NOMEP"]) . "</a></td>
<td align='center'>" . $aux["SEXO"] . "</td>
</tr>";
}
?>
				
</table>			