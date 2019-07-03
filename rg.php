<?php

echo "Ranking Geral de Popularidade<br><br>";

$str = "select * from personagem order by POPULARIDADE desc";
$qry = mysql_query($str);

?>

<table width="100%" border="0">
  <tr>
  	<th scope="col">Ranking</th>
    <th scope="col">Personagem</th>
	<th scope="col">Sexo</th>
    <th scope="col">Popularidade</th>
  </tr>

<?php

$rnk = 0;

while ($aux = mysql_fetch_array($qry)) { 
	$rnk = $rnk + 1;
	echo "<tr>
<td align='center'>" . $rnk . "</td>
<td align='center'><a href='perfil.php?p=op&per=".$aux["CODIGOP"]."'>" . htmlentities($aux["NOMEP"]) . "</a></td>
<td align='center'>" . $aux["SEXO"] . "</td>
<td align='center'>" . $aux["POPULARIDADE"] . "</td>
</tr>";
}
?>
	
</table>
    	
        		
			

