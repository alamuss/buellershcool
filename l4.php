<img src="img/cantina.png" width="599" height="45" />

<form action="local.php?l=4" method="post">
<select name="cantina">
<option value="cozinheira">Falar com a cozinheira (E -1)</option>
<option value="comer">Comer (E -3)</option>
<option value="guerra">Iniciar Guerra de comida! (E -7)</option>
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

$snpc = "select * from npc where CODIGON = 4";
$qnpc = mysql_query($snpc);
$anpc = mysql_fetch_array($qnpc);

if (isset($_POST["cantina"]) && $_POST["cantina"] == "cozinheira") {
	if ($ausr["STAMINA"] >= 1) {
		$nstamina = $ausr["STAMINA"] - 1;
		$suconv = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suconv);
		
		if ($ausr["APARENCIA"] > $anpc["APARENCIA"]) {
			$conta = "select count(*) as conta from frases where NPC = 4";
			$qconta = mysql_query($conta);
			$aconta = mysql_fetch_array($qconta);
			$sorteio = rand(1,$aconta["conta"]);
			$frase = "select * from frases where NPC = 4 and NUM = $sorteio";
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

if (isset($_POST["cantina"]) && $_POST["cantina"] == "comer") {
	if ($ausr["STAMINA"] >= 3) {
		$nstamina = $ausr["STAMINA"] - 3;
		$napar = $ausr["APARENCIA"] + 7;
		$nforca = $ausr["FORCA"] - 1;
		$updt = "update personagem set STAMINA = $nstamina,
									   APARENCIA = $napar,
									   FORCA = $nforca where CODIGOP = $_SESSION[usuario]";
		mysql_query($updt);
		echo "Ação realizada com sucesso";
	} else { 
		echo "Energia insuficiente para essa tarefa";
	}
}

if (isset($_POST["cantina"]) && $_POST["cantina"] == "guerra") {
	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$subriga = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($subriga);
		$randbriga = rand(1, $ausr["POPULARIDADE"]);
		if ($ausr["FORCA"] > $randbriga) {
			$napar = $ausr["APARENCIA"] + 4;
			$nintel = $ausr["INTELIGENCIA"] + 2;
			$nforca = $ausr["FORCA"] + 6;
			$ndest = $ausr["DESTREZA"] + 3;
			$npopnerd = $ausr["POPNERD"] + 2;
			$npopmarg = $ausr["POPMARG"] + 5;
			$npopespr = $ausr["POPESPR"] + 2;
			$npoppati = $ausr["POPPATI"] + 2;
			$npop = $ausr["POPULARIDADE"] + 15;
			$update = "update personagem set APARENCIA = $napar,
											 INTELIGENCIA = $nintel,
											 FORCA = $nforca,
											 DESTREZA = $ndest,
											 POPNERD = $npopnerd,
											 POPMARG = $npopmarg,
											 POPESPR = $npopespr,
											 POPPATI = $npoppati,
											 POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
			mysql_query($update);
			echo "Seu personagem venceu a guerra de comida";
		} else {
			$napar = $ausr["APARENCIA"] - 6;
			$nintel = $ausr["INTELIGENCIA"] - 4;
			$nforca = $ausr["FORCA"] - 8;
			$ndest = $ausr["DESTREZA"] - 4;
			$npopnerd = $ausr["POPNERD"] - 4;
			$npopmarg = $ausr["POPMARG"] - 8;
			$npopespr = $ausr["POPESPR"] - 4;
			$npoppati = $ausr["POPPATI"] - 4;
			$npop = $ausr["POPULARIDADE"] - 30;
			$update = "update personagem set APARENCIA = $napar,
											 INTELIGENCIA = $nintel,
											 FORCA = $nforca,
											 DESTREZA = $ndest,
											 POPNERD = $npopnerd,
											 POPMARG = $npopmarg,
											 POPESPR = $npopespr,
											 POPPATI = $npoppati,
											 POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
			mysql_query($update);
			echo "Seu personagem perdeu a guerra de comida";
		}
	} else {
		echo "Você não tem energia suficiente para realizar essa ação!";
	}
	
}
	
if (isset($_POST["cantina"]) && $_POST["cantina"] == "auxiliar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["INTELIGENCIA"] > $anpc["INTELIGENCIA"]) {
			$napar= $ausr["APARENCIA"] - 3;
			$nforca = $ausr["FORCA"] -5;
			$nintel = $ausr["INTELIGENCIA"] + 4;
			$ndest = $ausr["DESTREZA"] - 2;
			$nnerd = $ausr["POPNERD"] + 5;
			$nmarg = $ausr["POPMARG"] - 5;
			$nespr = $ausr["POPESPR"] + 2;
			$npati = $ausr["POPPATI"] - 2;
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
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 4";
			mysql_query($unpc);
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
		      
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}

if (isset($_POST["cantina"]) && $_POST["cantina"] == "vandalizar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["FORCA"] > $anpc["FORCA"]) {
			$napar= $ausr["APARENCIA"] - 2;
			$nforca = $ausr["FORCA"] + 2;
			$nintel = $ausr["INTELIGENCIA"] - 3;
			$ndest = $ausr["DESTREZA"] + 3;
			$nnerd = $ausr["POPNERD"] - 5;
			$nmarg = $ausr["POPMARG"] + 7;
			$npati = $ausr["POPPATI"] + 2;
			$nesp = $ausr["POPESPR"] - 3;
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
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 4";
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