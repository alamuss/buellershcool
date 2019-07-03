<?php

$sgang = "select * from gang where CODIGOG = '$_GET[cg]'";
$qgang = mysql_query($sgang);
$agang = mysql_fetch_array($qgang);

$data = time();
$estado = "S";
$mensagem = "Você foi convidado para ingressar na Gang <b>" . $agang["NOMEG"] . "</b> ! <br>
<b><a href='acgang.php?cg=" . $_GET["cg"] . "'>Clique aqui</a></b>para aceitar. <br>
Atenção: Se você já faz parte de uma gang, você será automaticamente substituído para a nova gang!";
$destino = $_GET[per]; 

$smsggang = "insert into mensagens (DATA, ESTADO, MENSAGEM, DESTINO) 
							values ($data, $estado, $mensagem, $destino)";
if (mysql_query($smsggang)) {
	header("Location: gang.php?msg=v");
} else {
	header("Location: gang.php?erro=v");
}							

?>