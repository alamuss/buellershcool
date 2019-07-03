<?php

include "conbd.php";

$pass = md5($_POST["senha"]);
//banco
$sinsdata = "insert into usuarios (NOME, CIDADE, PAIS, USUARIO, SENHA, EMAIL) values
       ('$_POST[nome]', '$_POST[cidade]', '$_POST[pais]',
        '$_POST[usuario]', '$pass', '$_POST[email]')";

//ver se já existe usuario
$sverduplo = "select count(*) as contagem from usuarios where
                        (USUARIO = '$_POST[usuario]')";
				
	$qry = mysql_query($sverduplo);
	$aux = mysql_fetch_array($qry);

	if ($aux["contagem"] > 0 )  {
		header("Location: cadusr.php?erro=nd");
	} else {
//testa email duplo
		$smailduplo = "select count(*) as contmail from usuarios where
                        (EMAIL = '$_POST[email]')";
		$mailqry = mysql_query($smailduplo);
		$mailaux = mysql_fetch_array($mailqry);
		
		if ($mailaux["contmail"] > 0 ) {
			header("Location: cadusr.php?erro=ed");	
		} else {
						
//insere no banco
    		if (mysql_query ($sinsdata)) {
    			header("Location: index.php?cad=v");
     		} else {
     			header("Location: cadusr.php?erro=bd");
        	}
		}
    }

?>
