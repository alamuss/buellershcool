<?php

session_start();

include "conbd.php";
	
$ins = "insert into mural (DATA, CODUSR, CODPER, TEXTO) 
				values (now(), '$_SESSION[usuario]', '$_SESSION[usuario]', '$_POST[mural]')";
				
if (mysql_query($ins)) {
	header("Location: mural.php");
} else {
	header("Location: mural.php?erro=v");
}

?>



