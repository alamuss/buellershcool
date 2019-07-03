<?php

session_start();

include "conbd.php";

$smsg = "insert into amigos (PORIGEM, PAMIGO) 
					values ('$_SESSION[usuario]', '$_GET[per]')";
if (mysql_query($smsg)) {
	header ("Location: perfil.php?amg=v");
} else {
	header ("Location: perfil.php?erro=v");
}

?>