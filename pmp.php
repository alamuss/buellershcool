<p align='center'>Suas Mensagens Privadas</p>

<?php

if (isset($_GET["e"]) && $_GET["e"] == "v" ) {
   echo "<p align='center'><font color='#000'> A Mensagem foi Excluída! </font></p>" ;
}

$smsg = "select m.CODIGOMS, m.MENSAGEM, m.ESTADO, m.DATA, p.CODIGOP, p.NOMEP from mensagens m, personagem p where m.PDESTINO = $_SESSION[usuario] and p.CODIGOP = m.PORIGEM order by m.CODIGOMS desc";
$qmsg = mysql_query($smsg);
while ($amsg = mysql_fetch_array($qmsg)) {
?>	
	
<table width='100%' border='0'>
  <tr>
    <th scope='col'>ORIGEM</th>
    <th scope='col'>ESTADO</th>
    <th scope='col'>DATA</th>
    <th scope='col'>HORA</th>
    <th scope='col'>&nbsp;</th>
  </tr>
  <tr>
    <td><?php if ($amsg["ESTADO"] == 'S') {echo "SISTEMA BUELLER SCHOOL"; } else {echo "<a href='perfil.php?p=op&per=".$amsg["CODIGOP"]."'>".$amsg["NOMEP"]."</a>";} ?></td>
    <td><?php if ($amsg["ESTADO"] == 'N' || $amsg["ESTADO"] == 'S') { echo "Nova"; } else { echo "Lida"; } ?></td>
    <td><?php echo date("d/m/Y",$amsg["DATA"]); ?></td>
    <td><?php echo date("G:i",$amsg["DATA"]); ?></td>
    <td><?php echo "<a href='delmsgprv.php?msg=".$amsg["CODIGOMS"]."'>Excluir</a>"; ?></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
<td>
<?php if ($amsg["ESTADO"] == 'S') {echo $amsg["MENSAGEM"]; } else {echo htmlentities($amsg["MENSAGEM"]); } ?>
</td>
  </tr>
</table>

<?php

echo "<br><hr><br>";

}

$sestado = "update mensagens set ESTADO = 'L' where PDESTINO = $_SESSION[usuario]";
mysql_query($sestado);

?>