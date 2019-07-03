<?php

session_start();

if (time() > 1256443200) {
	header("Location: ranking.php?v=fim");
} else {

include "conbd.php";

$pass = md5($_POST["senha"]);

$sql = "select count(*) as contagem from usuarios where
                        (USUARIO = '$_POST[usuario]') and
                        (SENHA = '$pass')";
$qry = mysql_query($sql);
$aux = mysql_fetch_array($qry);

$sqls = "select * from usuarios where (USUARIO = '$_POST[usuario]')";
$qrys = mysql_query($sqls);
$auxs = mysql_fetch_array($qrys);

if ($aux["contagem"] == 1)  {	
	
	$svalp = "select count(*) as contpers from personagem where (CODIGOP = '$auxs[CODIGO]')";
	$qvalp = mysql_query($svalp);
	$avalp = mysql_fetch_array($qvalp);

		if ($avalp["contpers"] == 1) { 
			
			$_SESSION["usuario"] = $auxs["CODIGO"];
			$slog = "insert into logins (USUARIO, DATA) values ('$auxs[CODIGO]', now())";
			mysql_query($slog);
			header("Location: home.php");
			
		} else {
			$_SESSION["usuario"] = $auxs["CODIGO"];
			header("Location: criapersonagem.php");
		}
		
} else {
header("Location: index.php?erro=v");
}

}


?>