<?php

include "conbd.php";

$susr = "select * from personagem where CODIGOP = '$_SESSION[usuario]'";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);

?>
<img src="img/diretoria.png" width="599" height="45" />

<form action="local.php?l=1" method="post">
<select name="diretor">
<option value="nota">Quero ver minhas notas</option>
<option value="conversar">Conversar (E -1)</option>
<?php
if (time() >= $qdi && time() <  $qdf) {
	echo "<option value='quest'>Você tem algo especial para mim hoje? (E -15)</option>";
}
?>
<option value="auxiliar">Auxiliar (E -7)</option>
<option value="vandalizar">Vandalizar (E -7)</option>
</select>
<input name="" type="submit" value="Executar" />
<br /><br />
</form>

<?php

$snpc = "select * from npc where CODIGON = 5";
$qnpc = mysql_query($snpc);
$anpc = mysql_fetch_array($qnpc);

if (isset($_POST["diretor"]) && $_POST["diretor"] == "nota") {
	if (time() <  1247367600) { 
		echo "Ainda não houve nenhuma avaliação. Continue estudando.";
	} else {
		echo "Sua ultima nota foi: " . $ausr["NOTA"];
	}
}

if (isset($_POST["diretor"]) && $_POST["diretor"] == "conversar") {
	
	if ($ausr["STAMINA"] >= 1) {
		$nstamina = $ausr["STAMINA"] - 1;
		$suconv = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suconv);
		
		if ($ausr["APARENCIA"] > $anpc["APARENCIA"]) {
			$conta = "select count(*) as conta from frases where NPC = 5";
			$qconta = mysql_query($conta);
			$aconta = mysql_fetch_array($qconta);
			$sorteio = rand(1,$aconta["conta"]);
			$frase = "select * from frases where NPC = 5 and NUM = $sorteio";
			$qfrase = mysql_query($frase);
			$afrase = mysql_fetch_array($qfrase);
			echo $afrase["FRASE"];
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
	} else {
		echo "Seu personagem não tem energia suficiente.";		
	}
}
	
if (isset($_POST["diretor"]) && $_POST["diretor"] == "quest") {

	if ($ausr["STAMINA"] >= 15) {
		$nstamina = $ausr["STAMINA"] - 15;
		$suquest = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suquest);
		include "questdir.php";
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}
}

if (isset($_POST["diretor"]) && $_POST["diretor"] == "auxiliar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["INTELIGENCIA"] > $anpc["INTELIGENCIA"]) {
			$napar= $ausr["APARENCIA"] - 1;
			$nforca = $ausr["FORCA"] - 2;
			$nintel = $ausr["INTELIGENCIA"] + 5;
			$ndest = $ausr["DESTREZA"] -1;
			$nnerd = $ausr["POPNERD"] + 5;
			$nmarg = $ausr["POPMARG"] - 5;
			$npop = $ausr["POPULARIDADE"] + $nnerd + $nmarg;
				
			$suaux = "update personagem set APARENCIA = $napar,
											FORCA = $nforca,
											INTELIGENCIA = $nintel,
											DESTREZA = $ndest,
											POPULARIDADE = $npop,
											POPNERD = $nnerd,
											POPMARG = $nmarg  where CODIGOP = $_SESSION[usuario]";
			mysql_query($suaux);
			$npcf = $anpc["FORCA"] - 1;
			$npci = $anpc["INTELIGENCIA"] + 1;
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 5";
			mysql_query($unpc);
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
		      
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}

if (isset($_POST["diretor"]) && $_POST["diretor"] == "vandalizar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["FORCA"] > $anpc["FORCA"]) {
			$napar= $ausr["APARENCIA"] - 2;
			$nforca = $ausr["FORCA"] + 2;
			$nintel = $ausr["INTELIGENCIA"] - 3;
			$ndest = $ausr["DESTREZA"] + 2;
			$nnerd = $ausr["POPNERD"] - 1;
			$nmarg = $ausr["POPMARG"] + 7;
			$npati = $ausr["POPPATI"] + 3;
			$nesp = $ausr["POPESPR"] + 3;
			$npop = $ausr["POPULARIDADE"] + $nnerd + $nmarg + $npati + $nesp;
				
			$suaux = "update personagem set APARENCIA = $napar,
											FORCA = $nforca,
											INTELIGENCIA = $nintel,
											POPULARIDADE = $npop,
											DESTREZA = $ndest,
											POPNERD = $nnerd,
											POPMARG = $nmarg,
											POPPATI = $npati,
											POPESPR = $nesp  where CODIGOP = $_SESSION[usuario]";
			mysql_query($suaux);
			$npcf = $anpc["FORCA"] + 1;
			$npci = $anpc["INTELIGENCIA"] - 1;
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 5";
			mysql_query($unpc);
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}


?>

