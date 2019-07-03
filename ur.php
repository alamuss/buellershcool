<?php

$sranking = "select * from personagem where UNDER = 'S' order by UV desc, UD asc";
$qranking = mysql_query($sranking);

?>

<table width="100%" border="0">
  <tr>
  	<th scope="col">Ordem</th>
    <th scope="col">Personagem</th>
    <th scope="col">Vitorias</th>
    <th scope="col">Derrotas</th>
  </tr>

<?php

$cont = 0;

while ($rank = mysql_fetch_array($qranking)) {

$cont = $cont + 1;

echo "
  <tr>
  	<td align='center'>". $cont ."</td>
    <td align='center'>". $rank["NOMEP"] ."</td>
    <td align='center'>". $rank["UV"] ."</td>
    <td align='center'>". $rank["UD"] ."</td>
  </tr>";
  
}

?>
</table>