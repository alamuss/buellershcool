<img src="img/aula.png" width="599" height="45" />

<form action="local.php?l=5" method="post">
<select name="sala">
<?php
if ((time() >= $p1i && time() < $p1f) || (time() >= $p2i && time() < $p2f)) {
	echo "<option value='prova'>Fazer a Prova</option>";
}
?>
<option value="professor">Falar com professor (E -1)</option>
<option value="estudar">Estudar (E -10)</option>
<option value="auxiliar">Auxiliar (E -7)</option>
<option value="vandalizar">Vandalizar (E -7)</option>
</select>

<input name="" type="submit" value="Executar" />
<br /><br />
</form>

<?php

include "conbd.php";

$susr = "select * from personagem where CODIGOP = '$_SESSION[usuario]'";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);

$snpc = "select * from npc where CODIGON = 7";
$qnpc = mysql_query($snpc);
$anpc = mysql_fetch_array($qnpc);

if (isset($_POST["sala"]) && $_POST["sala"] == "prova") {
	include "questprova.php";
}

if (isset($_POST["sala"]) && $_POST["sala"] == "professor") {
	if ($ausr["STAMINA"] >= 1) {
		$nstamina = $ausr["STAMINA"] - 1;
		$suconv = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suconv);
		
		if ($ausr["APARENCIA"] > $anpc["APARENCIA"]) {
			$conta = "select count(*) as conta from frases where NPC = 7";
			$qconta = mysql_query($conta);
			$aconta = mysql_fetch_array($qconta);
			$sorteio = rand(1,$aconta["conta"]);
			$frase = "select * from frases where NPC = 7 and NUM = $sorteio";
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

if (isset($_POST["sala"]) && $_POST["sala"] == "estudar") {
	if ($ausr["STAMINA"] >= 10) {
		$nstamina = $ausr["STAMINA"] - 10;
		$nintel = $ausr["INTELIGENCIA"] + 15;
		$updt = "update personagem set STAMINA = $nstamina,
									   INTELIGENCIA = $nintel where CODIGOP = $_SESSION[usuario]";
		mysql_query($updt);
		echo "Ação realizada com sucesso";
	} else { 
		echo "Energia insuficiente para essa tarefa";
	}
}

if (isset($_POST["sala"]) && $_POST["sala"] == "auxiliar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["INTELIGENCIA"] > $anpc["INTELIGENCIA"]) {
			$napar= $ausr["APARENCIA"] - 3;
			$nforca = $ausr["FORCA"] -5;
			$nintel = $ausr["INTELIGENCIA"] + 4;
			$ndest = $ausr["DESTREZA"] - 2;
			$nnerd = $ausr["POPNERD"] + 1;
			$nmarg = $ausr["POPMARG"] - 5;
			$nespr = $ausr["POPESPR"] - 2;
			$npati = $ausr["POPPATI"] - 1;
			$npop = $ausr["POPULARIDADE"] + $nnerd + $nmarg + $nespr + $npati;
				
			$suaux = "update personagem set APARENCIA = $napar,
											FORCA = $nforca,
											INTELIGENCIA = $nintel,
											DESTREZA = $ndest,
											POPULARIDADE = $npop,
											POPNERD = $nnerd,
											POPESPR = $nespr,
											POPPATI = $npati,
											POPMARG = $nmarg  where CODIGOP = $_SESSION[usuario]";
			mysql_query($suaux);
			$npcf = $anpc["FORCA"] - 1;
			$npci = $anpc["INTELIGENCIA"] + 1;
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 7";
			mysql_query($unpc);
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
		      
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}

if (isset($_POST["sala"]) && $_POST["sala"] == "vandalizar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["FORCA"] > $anpc["FORCA"]) {
			$napar= $ausr["APARENCIA"] - 2;
			$nforca = $ausr["FORCA"] + 2;
			$nintel = $ausr["INTELIGENCIA"] - 3;
			$ndest = $ausr["DESTREZA"] + 2;
			$nnerd = $ausr["POPNERD"] - 5;
			$nmarg = $ausr["POPMARG"] + 7;
			$npati = $ausr["POPPATI"] + 2;
			$nesp = $ausr["POPESPR"] + 3;
			$npop = $ausr["POPULARIDADE"] + $nnerd + $nmarg + $npati + $nesp;
				
			$suaux = "update personagem set APARENCIA = $napar,
											FORCA = $nforca,
											INTELIGENCIA = $nintel,
											DESTREZA = $ndest,
											POPULARIDADE = $npop,
											POPNERD = $nnerd,
											POPMARG = $nmarg,
											POPPATI = $npati,
											POPESPR = $nesp  where CODIGOP = $_SESSION[usuario]";
			mysql_query($suaux);
			$npcf = $anpc["FORCA"] + 1;
			$npci = $anpc["INTELIGENCIA"] - 1;
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 7";
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