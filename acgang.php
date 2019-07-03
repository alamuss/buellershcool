<?php

session_start();

$gang = $_GET["cg"];
$user = $_SESSION["usuario"];

$insgang = "update personagem set GANG = '$gang' where CODIGOP = '$user'";
if (mysql_query($insgang)) {
	header("Location: gang.php?g=s&msg=a");
} else {
	header("Location: gang.php?erro=v");
}
