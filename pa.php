<p align='center'>Lista de Amigos</p>

<?php

if (isset($_GET["e"]) && $_GET["e"] == "v" ) {
   echo "<p align='center'><font color='#000'> Personagem Excluído da Lista! </font></p>" ;
}

$samg = "select a.CODIGOA, a.PORIGEM, a.PAMIGO, p.CODIGOP, p.NOMEP from amigos a, personagem p where a.PORIGEM = $_SESSION[usuario] and p.CODIGOP = a.PAMIGO order by p.NOMEP";
$qamg = mysql_query($samg);

?>

<table width="100%" border="0">

<?php
while ($aamg = mysql_fetch_array($qamg)) {
?>
  <tr>	
   <td><?php echo "<a href='perfil.php?p=op&per=".$aamg["CODIGOP"]."'>".$aamg["NOMEP"]."</a>"; ?></td>
   <td><?php echo "<a href='examg.php?amg=".$aamg["CODIGOA"]."'>Excluir da Lista</a>"; ?></td>
  </tr>
<?php 
}
?>
</table>
