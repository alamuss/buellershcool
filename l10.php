<img src="img/quarto.png" width="599" height="45" />

<form action="local.php?l=10" method="post">
<select name="quarto">
<option value="descancar">Descansar</option>
<option value="estudar">Estudar (E -6)</option>
<option value="comer">Lanchar (E -6)</option>
<option value="exercitar">Exercitar-se (E -6)</option>
</select>

<input name="" type="submit" value="Executar" />
<br /><br />
</form>

<?php

include "conbd.php";

$susr = "select * from personagem where CODIGOP = '$_SESSION[usuario]'";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);

if (isset($_POST["quarto"]) && $_POST["quarto"] == "descancar") {
	$fdescan = time() + 10800;
	$udescan = "update personagem set ESTADO = 'D',
									  DF = $fdescan where CODIGOP = $_SESSION[usuario]";
	mysql_query($udescan);
	echo $ausr["NOMEP"] . " foi descansar";
}

if (isset($_POST["quarto"]) && $_POST["quarto"] == "estudar") {
	if ($ausr["STAMINA"] >= 6) {
	$nintel = $ausr["INTELIGENCIA"] + 10;
	$npop = $ausr["POPULARIDADE"] - 15;
	$nstamina = $ausr["STAMINA"] - 6;
	$update = "update personagem set INTELIGENCIA = $nintel, STAMINA = $nstamina,
									 POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
	mysql_query($update);
	echo $ausr["NOMEP"] . " estudou!";
	} else {
	echo $ausr["NOMEP"] . " não tem energia.";
	}
}

if (isset($_POST["quarto"]) && $_POST["quarto"] == "comer") {
	if ($ausr["STAMINA"] >= 6) {
	$apar = $ausr["APARENCIA"] + 10;
	$npop = $ausr["POPULARIDADE"] - 15;
	$nstamina = $ausr["STAMINA"] - 6;
	$update = "update personagem set APARENCIA = $apar, STAMINA = $nstamina,
									 POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
	mysql_query($update);
	echo $ausr["NOMEP"] . " comeu!";
	} else {
	echo $ausr["NOMEP"] . " não tem energia.";
	}
}

if (isset($_POST["quarto"]) && $_POST["quarto"] == "exercitar") {
	if ($ausr["STAMINA"] >= 6) {
	$nforca = $ausr["FORCA"] + 10;
	$npop = $ausr["POPULARIDADE"] - 15;
	$nstamina = $ausr["STAMINA"] - 6;
	$update = "update personagem set FORCA = $nforca, STAMINA = $nstamina,
									 POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
	mysql_query($update);
	echo $ausr["NOMEP"] . " exercitou-se!";
	} else {
	echo $ausr["NOMEP"] . " não tem energia.";
	}
}

?>