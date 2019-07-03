<p align='center'>Lista de Gangs Existentes</p>
<p>A popularidade da Gang é a soma das Popularidades dos cinco membros mais altos.</p>

<?php

$sg = "select g.CODIGOG, g.NOMEG, g.LIDER, p.NOMEP, p.CODIGOP from gang g, personagem p where g.LIDER = p.CODIGOP";
$qg = mysql_query($sg);

?>

<table width="100%" border="0">
<tr>
<td>Nome da Gang</td>
<td>Líder</td>
<td>Popularidade</td>
</tr>
<?php
while ($ag = mysql_fetch_array($qg)) {

$spopgang = "select POPULARIDADE from personagem where GANG = 'ag[CODIGOG]' order by POPULARIDADE desc limit 0,4";
$qpopgang = mysql_query($spopgang);
$somapopg = 0;

while ($apopgang = mysql_fetch_array($qpopgang)) {
		$somapopg = $somapopg + $apopgang["POPULARIDADE"];
}


	
?>	
<tr>
<td><?php echo $ag["NOMEG"]; ?></td>
<td><?php echo "<a href='perfil.php?p=op&per=".$ag["CODIGOP"]."'>".$ag["NOMEP"]."</a>"; ?></td>
<td><?php echo $somapopg; ?></td>
</tr>
<?php } ?>
</table>
 