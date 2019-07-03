<?php

$sbriga = "select * from underground order by CODIGOUND desc limit 0,30";
$qbriga = mysql_query($sbriga);

while ($abriga = mysql_fetch_array($qbriga)) {
	$sper = "select * from personagem where CODIGOP = $abriga[PERSONAGEM]";
	$sadv = "select * from personagem where CODIGOP = $abriga[ADVERSARIO]";
	$qper = mysql_query($sper);
	$qadv = mysql_query($sadv);
	$aper = mysql_fetch_array($qper);
	$aadv = mysql_fetch_array($qadv);
	
	echo $aper["NOMEP"] . " brigou com " . $aadv["NOMEP"] . " e " . $abriga["RESULTADO"] . "!<br><hr><br>";
	
}

?>