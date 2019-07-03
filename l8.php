<img src="img/lanchonete.png" width="599" height="45" />

<form action="local.php?l=8" method="post">
<select name="lanchonete">
<option value="gar">Falar com a garçonete (E -1)</option>
<option value="comer">Comer (- $5)</option>
<option value="energetico">Comprar Energético (- $12)</option>
<option value="faxineiro">Trabalhar como faxineiro (+ $7)</option>
<option value="cozinheiro">Trabalhar como cozinheiro (+ $10)</option>
<option value="atendente">Trabalhar como atendente (+ $12)</option>
</select>

<input name="" type="submit" value="Executar" />
<br /><br />
</form>

<?php

include "conbd.php";

$susr = "select * from personagem where CODIGOP = '$_SESSION[usuario]'";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);

$snpc = "select * from npc where CODIGON = 8";
$qnpc = mysql_query($snpc);
$anpc = mysql_fetch_array($qnpc);

if (isset($_POST["lanchonete"]) && $_POST["lanchonete"] == "gar") {
	if ($ausr["STAMINA"] >= 1) {
		$nstamina = $ausr["STAMINA"] - 1;
		$suconv = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suconv);
		
		if ($ausr["APARENCIA"] > $anpc["APARENCIA"]) {
			$conta = "select count(*) as conta from frases where NPC = 8";
			$qconta = mysql_query($conta);
			$aconta = mysql_fetch_array($qconta);
			$sorteio = rand(1,$aconta["conta"]);
			$frase = "select * from frases where NPC = 8 and NUM = $sorteio";
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

if (isset($_POST["lanchonete"]) && $_POST["lanchonete"] == "comer") {
	if ($ausr["DINHEIRO"] >= 5) {
		$ndin = $ausr["DINHEIRO"] - 5;
		$napar = $ausr["APARENCIA"] + 11;
		$updt = "update personagem set DINHEIRO = $ndin,
									   APARENCIA = $napar where CODIGOP = $_SESSION[usuario]";
		mysql_query($updt);
		echo "Ação realizada com sucesso";
	} else { 
		echo "Seu personagem não tem dinheiro suficiente para comer na lanchonete";
	}
}

if (isset($_POST["lanchonete"]) && $_POST["lanchonete"] == "energetico") {
	if ($ausr["DINHEIRO"] >= 12) {
		if ($ausr["STAMINA"] <= 75) {
			$nstamina = $ausr["STAMINA"] + 15;
			$napar = $ausr["APARENCIA"] - 6;
			$nforca = $ausr["FORCA"] - 6;
			$ninte = $ausr["INTELIGENCIA"] - 6;
			$ndest = $ausr["DESTREZA"] - 6;
			$ndin = $ausr["DINHEIRO"] - 12;
			$update = "update personagem set STAMINA = $nstamina,
											 APARENCIA = $napar,
											 FORCA = $nforca,
											 INTELIGENCIA = $ninte,
											 DINHEIRO = $ndin where CODIGOP = $_SESSION[usuario]";
			mysql_query($update);
			echo "Seu personagem bebeu energético";
		} else {
			$nstamina = 100;
			$napar = $ausr["APARENCIA"] - 6;
			$nforca = $ausr["FORCA"] - 6;
			$ninte = $ausr["INTELIGENCIA"] - 6;
			$ndest = $ausr["DESTREZA"] - 6;
			$ndin = $ausr["DINHEIRO"] - 12;
			$update = "update personagem set STAMINA = $nstamina,
											 APARENCIA = $napar,
											 FORCA = $nforca,
											 INTELIGENCIA = $ninte,
											 DINHEIRO = $ndin where CODIGOP = $_SESSION[usuario]";
			mysql_query($update);
			echo "Seu personagem bebeu energético";
		}
	} else {
		echo "Seu personagem não tem dinheiro suficiente para comprar energético";
	}
}

if (isset($_POST["lanchonete"]) && $_POST["lanchonete"] == "faxineiro") {
		if ($ausr["STAMINA"] >= 30) {
			$nstamina = $ausr["STAMINA"] - 30;
			$upstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
			mysql_query($upstamina);
			if ($ausr["FORCA"] > 15) {
				$ndin = $ausr["DINHEIRO"] + 7;
				$npop = $ausr["POPULARIDADE"] - 15;
				$updin = "update personagem set DINHEIRO = $ndin,
												POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
				mysql_query($updin);
				echo "Você trabalhou como faxineiro";
			} else {
				echo "Você não tem habilidada suficiente para trabalhar como faxineiro.";
			}
		} else {
			echo "Você não tem energia suficiente para trabalhar.";
		}
}

if (isset($_POST["lanchonete"]) && $_POST["lanchonete"] == "cozinheiro") {
		if ($ausr["STAMINA"] >= 30) {
			$nstamina = $ausr["STAMINA"] - 30;
			$upstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
			mysql_query($upstamina);
			if ($ausr["INTELIGENCIA"] > 18) {
				$ndin = $ausr["DINHEIRO"] + 10;
				$npop = $ausr["POPULARIDADE"] - 20;
				$updin = "update personagem set DINHEIRO = $ndin, 
												POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
				mysql_query($updin);
				echo "Você trabalhou como cozinheiro. Cozinha como eu cozinho?";
			} else {
				echo "Você não tem habilidada suficiente para trabalhar como cozinheiro.";
			}
		} else {
			echo "Você não tem energia suficiente para trabalhar.";
		}
}

if (isset($_POST["lanchonete"]) && $_POST["lanchonete"] == "atendente") {
		if ($ausr["STAMINA"] >= 30) {
			$nstamina = $ausr["STAMINA"] - 30;
			$upstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
			mysql_query($upstamina);
			if ($ausr["APARENCIA"] > 22) {
				$ndin = $ausr["DINHEIRO"] + 12;
				$npop = $ausr["POPULARIDADE"] - 25;
				$updin = "update personagem set DINHEIRO = $ndin, 
												POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
				mysql_query($updin);
				echo $ausr["NOMEP"] . " trabalhou como atendente.";
			} else {
				echo "Você não tem habilidada suficiente para trabalhar como atendente.";
			}
		} else {
			echo "Você não tem energia suficiente para trabalhar.";
		}
}
?>

