<?php

include "conbd.php";

$del = "delete from amigos where CODIGOA = '$_GET[amg]'";
if (mysql_query($del)) {
	header ("Location: perfil.php?p=a&e=v");
} else {
	header ("Location: perfil.php?erro=v");
}
?>