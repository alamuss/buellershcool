<img src="img/patio.png" width="599" height="45" />

<form action="local.php?l=2" method="post">
<select name="patio">
<option value="nerd">Conversar com os nerds (E -11)</option>
<option value="esporte">Conversar com os esportistas (E -11)</option>
<option value="patricinhas">Conversar com as patricinhas (E -11)</option>
<option value="marginais">Conversar com os marginais(E -11)</option>
<?php
if (time() >= $qzi && time() < $qzf) {
	echo "<option value='quest'>Falar com o Zelador (E -15)</option>";
}
?>
<option value="brigar">Brigar (E -8)</option>
<option value="discursar">Discursar (E -8)</option>
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

$snpc = "select * from npc where CODIGON = 1";
$qnpc = mysql_query($snpc);
$anpc = mysql_fetch_array($qnpc);

if (isset($_POST["patio"]) && $_POST["patio"] == "nerd") {
	if ($ausr["STAMINA"] >= 11) {
		if ($ausr["INTELIGENCIA"] >= $ausr["POPNERD"]) {
		$nstamina = $ausr["STAMINA"] - 11;
		$npnerd = $ausr["POPNERD"] + 6;
		$npmarg = $ausr["POPMARG"] - 2;
		$npespr = $ausr["POPESPR"] - 1;
		$nppati = $ausr["POPPATI"] - 1;
		$npopularidade = $ausr["POPULARIDADE"] + $npnerd + $npmarg + $npespr + $nppati;
		$nintel = $ausr["INTELIGENCIA"] + 1;
		
		$supdtnerd = "update personagem set STAMINA = $nstamina,
											POPNERD = $npnerd,
											POPMARG = $npmarg,
											POPESPR = $npespr,
											POPPATI = $nppati,
											POPULARIDADE = $npopularidade,
											INTELIGENCIA = $nintel where CODIGOP = $_SESSION[usuario]";
		mysql_query($supdtnerd);
		$conta = "select count(*) as conta from frases where NPC = 10";
		$qconta = mysql_query($conta);
		$aconta = mysql_fetch_array($qconta);
		$sorteio = rand(1,$aconta["conta"]);
		$frase = "select * from frases where NPC = 10 and NUM = $sorteio";
		$qfrase = mysql_query($frase);
		$afrase = mysql_fetch_array($qfrase);
		echo $afrase["FRASE"];
		} else {
			echo "Nerd: Você não é inteligente o bastante para conversar conosco.";
		}
	} else {
		echo "Seu personagem não tem energia suficiente para essa ação.";
	}
}

if (isset($_POST["patio"]) && $_POST["patio"] == "esporte") {
	if ($ausr["STAMINA"] >= 11) {
		if ($ausr["DESTREZA"] >= $ausr["POPESPR"]) {
		$nstamina = $ausr["STAMINA"] - 11;
		$npnerd = $ausr["POPNERD"] - 1;
		$npmarg = $ausr["POPMARG"] - 1;
		$npespr = $ausr["POPESPR"] + 6;
		$nppati = $ausr["POPPATI"] - 2;
		$npopularidade = $ausr["POPULARIDADE"] + $npnerd + $npmarg + $npespr + $nppati;
		$ndest = $ausr["DESTREZA"] + 1;
		
		$supdtesp = "update personagem set STAMINA = $nstamina,
											POPNERD = $npnerd,
											POPMARG = $npmarg,
											POPESPR = $npespr,
											POPPATI = $nppati,
											POPULARIDADE = $npopularidade,
											DESTREZA = $ndest where CODIGOP = $_SESSION[usuario]";
		mysql_query($supdtesp);
		$conta = "select count(*) as conta from frases where NPC = 9";
		$qconta = mysql_query($conta);
		$aconta = mysql_fetch_array($qconta);
		$sorteio = rand(1,$aconta["conta"]);
		$frase = "select * from frases where NPC = 9 and NUM = $sorteio";
		$qfrase = mysql_query($frase);
		$afrase = mysql_fetch_array($qfrase);
		echo $afrase["FRASE"];
		} else {
			echo "Esportista: Você não é forte ou inteligente o suficiente para conversar com os esportistas.";
		}
	} else {
		echo "Seu personagem não tem energia suficiente para essa ação.";
	}
}

if (isset($_POST["patio"]) && $_POST["patio"] == "patricinhas") {
	if ($ausr["STAMINA"] >= 11) {
		if ($ausr["APARENCIA"] >= $ausr["POPPATI"]) {
		$nstamina = $ausr["STAMINA"] - 11;
		$npnerd = $ausr["POPNERD"] - 1;
		$npmarg = $ausr["POPMARG"] - 1;
		$npespr = $ausr["POPESPR"] - 2;
		$nppati = $ausr["POPPATI"] + 6;
		$npopularidade = $ausr["POPULARIDADE"] + $npnerd + $npmarg + $npespr + $nppati;
		$naparencia = $ausr["APARENCIA"] + 1;
		
		$supdtpati = "update personagem set STAMINA = $nstamina,
											POPNERD = $npnerd,
											POPMARG = $npmarg,
											POPESPR = $npespr,
											POPPATI = $nppati,
											POPULARIDADE = $npopularidade,
											APARENCIA = $naparencia where CODIGOP = $_SESSION[usuario]";
		mysql_query($supdtpati);
		$conta = "select count(*) as conta from frases where NPC = 2";
		$qconta = mysql_query($conta);
		$aconta = mysql_fetch_array($qconta);
		$sorteio = rand(1,$aconta["conta"]);
		$frase = "select * from frases where NPC = 2 and NUM = $sorteio";
		$qfrase = mysql_query($frase);
		$afrase = mysql_fetch_array($qfrase);
		echo $afrase["FRASE"];
		} else {
			echo "Patricinha: Não vamos conversar com você porque sua aparencia é muito baixa.";
		}
	} else {
		echo "Seu personagem não tem energia suficiente para essa ação.";
	}
}

if (isset($_POST["patio"]) && $_POST["patio"] == "marginais") {
	if ($ausr["STAMINA"] >= 11) {
		if ($ausr["FORCA"] >= $ausr["POPMARG"]) {
		$nstamina = $ausr["STAMINA"] - 11;
		$npnerd = $ausr["POPNERD"] - 2;
		$npmarg = $ausr["POPMARG"] + 6;
		$npespr = $ausr["POPESPR"] - 1;
		$nppati = $ausr["POPPATI"] - 1;
		$npopularidade = $ausr["POPULARIDADE"] + $npnerd + $npmarg + $npespr + $nppati;
		$nforca = $ausr["FORCA"] + 1;
		
		$supdtmarg = "update personagem set STAMINA = $nstamina,
											POPNERD = $npnerd,
											POPMARG = $npmarg,
											POPESPR = $npespr,
											POPPATI = $nppati,
											POPULARIDADE = $npopularidade,
											FORCA = $nforca where CODIGOP = $_SESSION[usuario]";
		mysql_query($supdtmarg);
		$conta = "select count(*) as conta from frases where NPC = 3";
		$qconta = mysql_query($conta);
		$aconta = mysql_fetch_array($qconta);
		$sorteio = rand(1,$aconta["conta"]);
		$frase = "select * from frases where NPC = 3 and NUM = $sorteio";
		$qfrase = mysql_query($frase);
		$afrase = mysql_fetch_array($qfrase);
		echo $afrase["FRASE"];
		} else {
			echo "Marginal: Não falamos com quem é fraco.";
		}
	} else {
		echo "Seu personagem não tem energia suficiente para essa ação.";
	}
}

if (isset($_POST["patio"]) && $_POST["patio"] == "quest") {
	if ($ausr["STAMINA"] >= 15) {
		$nstamina = $ausr["STAMINA"] - 15;
		$suquest = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suquest);
		include "questpatio.php";
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}
}

if (isset($_POST["patio"]) && $_POST["patio"] == "brigar") {
	if ($ausr["STAMINA"] >= 8) {
		$nstamina = $ausr["STAMINA"] - 8;
		$subriga = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($subriga);
		$randbriga = rand(1, $ausr["POPULARIDADE"]);
		if ($ausr["FORCA"] > $randbriga) {
			$napar = $ausr["APARENCIA"] + 4;
			$nintel = $ausr["INTELIGENCIA"] + 2;
			$nforca = $ausr["FORCA"] + 6;
			$ndest = $ausr["DESTREZA"] + 4;
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
			echo "Seu personagem venceu a briga";
		} else {
			$napar = $ausr["APARENCIA"] - 6;
			$nintel = $ausr["INTELIGENCIA"] - 4;
			$nforca = $ausr["FORCA"] - 8;
			$ndest = $ausr["DESTREZA"] - 7;
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
			echo "Seu personagem perdeu a briga";
		}
	} else {
		echo "Você não tem energia suficiente para realizar essa ação!";
	}
	
}

if (isset($_POST["patio"]) && $_POST["patio"] == "discursar") {
	if ($ausr["STAMINA"] >= 8) {
		$nstamina = $ausr["STAMINA"] - 8;
		$sudisc = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($sudisc);
		$randdisc = rand(1, $ausr["POPULARIDADE"]);
		if ($ausr["INTELIGENCIA"] > $randdisc) {
			$napar = $ausr["APARENCIA"] + 3;
			$nintel = $ausr["INTELIGENCIA"] + 6;
			$nforca = $ausr["FORCA"] + 2;
			$ndest = $ausr["DESTREZA"] + 1;
			$npopnerd = $ausr["POPNERD"] + 5;
			$npopmarg = $ausr["POPMARG"] + 1;
			$npopespr = $ausr["POPESPR"] + 2;
			$npoppati = $ausr["POPPATI"] + 3;
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
			echo "Seu personagem conseguiu fazer um bom discurso";
		} else {
			$napar = $ausr["APARENCIA"] - 4;
			$nintel = $ausr["INTELIGENCIA"] - 8;
			$nforca = $ausr["FORCA"] - 3;
			$ndest = $ausr["DESTREZA"] - 3;
			$npopnerd = $ausr["POPNERD"] - 7;
			$npopmarg = $ausr["POPMARG"] - 3;
			$npopespr = $ausr["POPESPR"] - 3;
			$npoppati = $ausr["POPPATI"] - 5;
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
			echo "Seu personagem não conseguiu fazer um bom discurso.";
		}
	} else {
		echo "Você não tem energia suficiente para realizar essa ação!";
	}
	
}

if (isset($_POST["patio"]) && $_POST["patio"] == "auxiliar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["INTELIGENCIA"] > $anpc["INTELIGENCIA"]) {
			$napar= $ausr["APARENCIA"] - 1;
			$nforca = $ausr["FORCA"] + 4;
			$nintel = $ausr["INTELIGENCIA"] - 2;
			$ndest = $ausr["DESTREZA"] +1;
			$nnerd = $ausr["POPNERD"] + 1;
			$npati = $ausr["POPPATI"] + 3;
			$nespr = $ausr["POPESPR"] - 2;
			$nmarg = $ausr["POPMARG"] - 6;
			$npop = $ausr["POPULARIDADE"] + $nespr + $npati + $nnerd + $nespr + $nmarg;
				
			$suaux = "update personagem set APARENCIA = $napar,
											FORCA = $nforca,
											DESTREZA = $ndest,
											INTELIGENCIA = $nintel,
											POPULARIDADE = $npop,
											POPNERD = $nnerd,
											POPESPR = $nespr,
											POPMARG = $nmarg,
											POPPATI = $npati  where CODIGOP = $_SESSION[usuario]";
			mysql_query($suaux);
			$npcf = $anpc["FORCA"] - 1;
			$npci = $anpc["INTELIGENCIA"] + 1;
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 1";
			mysql_query($unpc);
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
		      
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}

if (isset($_POST["patio"]) && $_POST["patio"] == "vandalizar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["FORCA"] > $anpc["FORCA"]) {
			$napar= $ausr["APARENCIA"] - 2;
			$nforca = $ausr["FORCA"] + 2;
			$nintel = $ausr["INTELIGENCIA"] - 3;
			$ndest = $ausr["DESTREZA"] + 1;
			$nnerd = $ausr["POPNERD"] - 1;
			$nmarg = $ausr["POPMARG"] + 7;
			$npati = $ausr["POPPATI"] - 2;
			$nesp = $ausr["POPESPR"] + 1;
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
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 1";
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