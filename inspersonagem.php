<?php

session_start();

include "conbd.php";

$spd = "select count(*) as contagem from personagem where
                        (NOMEP = '$_POST[nomep]')";
						
$qpd = mysql_query($spd);
$apd = mysql_fetch_array($qpd);

if ($apd["contagem"] > 0 )  {
	header("Location: criapersonagem.php?erro=nd");
} else {
						
$str = "insert into personagem (CODIGOP, NOMEP, SEXO, APARENCIA, FORCA, INTELIGENCIA, DESTREZA, POPULARIDADE, STAMINA, DINHEIRO, POPPATI, POPNERD, POPMARG, POPESPR, ESTADO, UNDER, IMG) 
						values ('$_SESSION[usuario]', '$_POST[nomep]', '$_POST[sexo]', '10', '10',  '10', '10',  '10', '100', '25', '0', '0', '0', '0', 'A', 'N', '$_POST[avat]')";
						
if (mysql_query($str)) {
	header("Location: home.php");
} else { 
	header("Location: criapersonagem.php?erro=v");
}

}
	
?>
						
 