<?php

session_start();

include "conbd.php";
//testa variavel
if (is_null($_POST[nomeg])) {
	header("Location: gang.php?g=c&erro=n");
} else {
//insere na tabela gang
$sins = "insert into gang (NOMEG, LIDER) values ('$_POST[nomeg]', '$_SESSION[usuario]')";
//ver se ja nao tem gang
$svg = "select GANG from personagem where CODIGOP = '$_SESSION[usuario]'";
$qvg = mysql_query($svg);
$avg = mysql_fetch_array($qvg);
//teste ver se ja nao tem gang
if ($avg["GANG"] > 0) {
	header ("Location: gang.php?g=c&erro=g");
} else {
	//insere no banco tabela gang
	if (mysql_query($sins)) {
		//procura codigo da gang criada
		$sscg = "select CODIGOG from gang where LIDER = '$_SESSION[usuario]'";
		$qscg = mysql_query($sscg);
		$ascg = mysql_fetch_array($qscg);
		//insere codigo da gang em personagem
		$insp = "update personagem set GANG = '$ascg[CODIGOG]' where CODIGOG = '$_SESSION[usuario]";
		mysql_query($insp);
		
		header ("Location: gang.php?amg=v");
	} else {
		header ("Location: gang.php?erro=v");
	}
}

}

?>
