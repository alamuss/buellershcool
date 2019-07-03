<?php

session_start();

include "conbd.php";
$data = time();
$smsg = "insert into mensagens (PORIGEM, PDESTINO, MENSAGEM, ESTADO, DATA) 
					values ('$_SESSION[usuario]', '$_POST[codper]', '$_POST[msgp]', 'N', '$data')";
if (mysql_query($smsg)) {
	header ("Location: perfil.php?msg=v");
} else {
	header ("Location: perfil.php?erro=v");
}
?>