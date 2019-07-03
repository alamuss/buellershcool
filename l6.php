<img src="img/quadra.png" width="599" height="45" />

<form action="local.php?l=6" method="post">
<select name="quadra">
<?php
if (time() >= $qei && time() < $qef) {
	echo "<option value='quest'>Falar com o capitão do time (E -15)</option>";
}
?>
<option value="treinar">Treinar (E -12)</option>
<option value="limpo">Jogar Limpo (E -10)</option>
<option value="sujo">Jogar Sujo (E -10)</option>
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

$snpc = "select * from npc where CODIGON = 9";
$qnpc = mysql_query($snpc);
$anpc = mysql_fetch_array($qnpc);


if (isset($_POST["quadra"]) && $_POST["quadra"] == "quest") {
	if ($ausr["STAMINA"] >= 15) {
		$nstamina = $ausr["STAMINA"] - 15;
		$suquest = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suquest);
		
		if ($ausr["POPESPR"] > 30) {
				include "questespr.php";
		} else {
			echo "Capitão: 'Você não é conhecido entre os jogadores.'";
		}
	} else {
		echo "Seu personagem não tem energia suficiente.";		
	}
}

if (isset($_POST["quadra"]) && $_POST["quadra"] == "treinar") {
	if ($ausr["STAMINA"] >= 12) {
		$nstamina = $ausr["STAMINA"] - 12;
		$nintel = $ausr["INTELIGENCIA"] - 1;
		$napar = $ausr["APARENCIA"] + 3;
		$nforca = $ausr["FORCA"] + 5;
		$ndest = $ausr["DESTREZA"] + 8;
		$updt = "update personagem set STAMINA = $nstamina,
									   INTELIGENCIA = $nintel,
									   APARENCIA = $napar,
									   DESTREZA = $ndest,
									   FORCA = $nforca where CODIGOP = $_SESSION[usuario]";
		mysql_query($updt);
		echo "Ação realizada com sucesso";
	} else { 
		echo "Energia insuficiente para essa tarefa";
	}
}

if (isset($_POST["quadra"]) && $_POST["quadra"] == "limpo") {

	if ($ausr["STAMINA"] >= 10) {
		$nstamina = $ausr["STAMINA"] - 10;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["INTELIGENCIA"] > $anpc["INTELIGENCIA"]) {
			$napar= $ausr["APARENCIA"] - 3;
			$nforca = $ausr["FORCA"] + 2;
			$nintel = $ausr["INTELIGENCIA"] + 4;
			$ndest = $ausr["DESTREZA"] + 6;
			$nnerd = $ausr["POPESPR"] + 5;
			$nmarg = $ausr["POPMARG"] - 5;
			$npop = $ausr["POPULARIDADE"] + $nnerd + $nmarg;
				
			$suaux = "update personagem set APARENCIA = $napar,
											FORCA = $nforca,
											INTELIGENCIA = $nintel,
											DESTREZA = $ndest,
											POPULARIDADE = $npop,
											POPESPR = $nnerd,
											POPMARG = $nmarg  where CODIGOP = $_SESSION[usuario]";
			mysql_query($suaux);
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
		      
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}

if (isset($_POST["quadra"]) && $_POST["quadra"] == "sujo") {

	if ($ausr["STAMINA"] >= 10) {
		$nstamina = $ausr["STAMINA"] - 10;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["FORCA"] > $anpc["FORCA"]) {
			$napar= $ausr["APARENCIA"] - 2;
			$nforca = $ausr["FORCA"] + 6;
			$nintel = $ausr["INTELIGENCIA"] - 3;
			$ndest = $ausr["DESTREZA"] + 3;
			$nnerd = $ausr["POPNERD"] + 0;
			$nmarg = $ausr["POPMARG"] + 7;
			$npati = $ausr["POPPATI"] + 0;
			$nesp = $ausr["POPESPR"] - 6;
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
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}	


if (isset($_POST["quadra"]) && $_POST["quadra"] == "auxiliar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["INTELIGENCIA"] > $anpc["INTELIGENCIA"]) {
			$napar= $ausr["APARENCIA"] - 3;
			$nforca = $ausr["FORCA"] -5;
			$nintel = $ausr["INTELIGENCIA"] + 4;
			$ndest = $ausr["DESTREZA"] + 4;
			$nespr = $ausr["POPESPR"] + 7;
			$nmarg = $ausr["POPMARG"] - 4;
			$nnerd = $ausr["POPNERD"] - 6;
			$npati = $ausr["POPPATI"] - 2;
			$npop = $ausr["POPULARIDADE"] + $nnerd + $nmarg + $npati + $nespr;
				
			$suaux = "update personagem set APARENCIA = $napar,
											FORCA = $nforca,
											INTELIGENCIA = $nintel,
											DESTREZA = $ndest,
											POPULARIDADE = $npop,
											POPESPR = $nespr,
											POPPATI = $npati,
											POPNERD = $nnerd,
											POPMARG = $nmarg  where CODIGOP = $_SESSION[usuario]";
			mysql_query($suaux);
			$npcf = $anpc["FORCA"] - 1;
			$npci = $anpc["INTELIGENCIA"] + 1;
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 9";
			mysql_query($unpc);
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
		      
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}

if (isset($_POST["quadra"]) && $_POST["quadra"] == "vandalizar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["FORCA"] > $anpc["FORCA"]) {
			$napar= $ausr["APARENCIA"] - 2;
			$nforca = $ausr["FORCA"] + 2;
			$nintel = $ausr["INTELIGENCIA"] - 3;
			$ndest = $ausr["DESTREZA"] - 3;
			$nnerd = $ausr["POPNERD"] + 4;
			$nmarg = $ausr["POPMARG"] + 7;
			$npati = $ausr["POPPATI"] - 1;
			$nesp = $ausr["POPESPR"] - 5;
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
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 9";
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