<?php

include "conbd.php";

$del = "delete from mensagens where CODIGOMS = '$_GET[msg]'";
if (mysql_query($del)) {
	header ("Location: perfil.php?p=mp&e=v");
} else {
	header ("Location: perfil.php?erro=v");
}
?>