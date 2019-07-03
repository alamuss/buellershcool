<img src="img/parque.png" width="599" height="45" />

<form action="local.php?l=9" method="post">
<select name="parque">
<?php
if (time() >= $qmi && time() < $qmf) {
	echo "<option value='quest'>Falar com Marginal (E -15)</option>";
}
?>
<option value="passear">Passear (E -9)</option>
<option value="auxiliar">Auxiliar (E -7)</option>
<option value="vandalizar">Vandalizar (E -7)</option>
</select>

<input name="" type="submit" value="Executar" />
<br /><br />
</form>

<?php


$susr = "select * from personagem where CODIGOP = '$_SESSION[usuario]'";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);

$snpc = "select * from npc where CODIGON = 3";
$qnpc = mysql_query($snpc);
$anpc = mysql_fetch_array($qnpc);

if (isset($_POST["parque"]) && $_POST["parque"] == "quest") {
	if ($ausr["STAMINA"] >= 15) {
		$nstamina = $ausr["STAMINA"] - 15;
		$suquest = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suquest);
		
		if ($ausr["POPMARG"] > 30) {
			include "questmarg.php";
		} else {
			echo "Marginal: 'Ninguém viu você por essa quebrada.'";
		}
	} else {
		echo "Seu personagem não tem energia suficiente.";		
	}
}

if (isset($_POST["parque"]) && $_POST["parque"] == "passear") {

	if ($ausr["STAMINA"] >= 9) {
		$nstamina = $ausr["STAMINA"] - 9;
		$nforca = $ausr["FORCA"] + 5;
		$napar = $ausr["APARENCIA"] - 1;
		$nintel = $ausr["INTELIGENCIA"] - 3;
		$ndest = $ausr["DESTREZA"] + 2;
		$supas = "update personagem set STAMINA = $nstamina,
										FORCA = $nforca,
										APARENCIA = $napar,
										DESTREZA = $ndest,
										INTELIGENCIA = $nintel where CODIGOP = $_SESSION[usuario]";
		mysql_query($supas);
		echo "A ação foi realizada com sucesso.";
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}
}


if (isset($_POST["parque"]) && $_POST["parque"] == "auxiliar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["INTELIGENCIA"] > $anpc["INTELIGENCIA"]) {
			$napar= $ausr["APARENCIA"] - 1;
			$nforca = $ausr["FORCA"] + 5;
			$nintel = $ausr["INTELIGENCIA"] - 3;
			$ndest = $ausr["DESTREZA"] + 2;
			$nnerd = $ausr["POPNERD"] - 5;
			$nespr = $ausr["POPESPR"] + 1;
			$nmarg = $ausr["POPMARG"] + 5;
			$npati = $ausr["POPPATI"] - 3;
			$npop = $ausr["POPULARIDADE"] + $nnerd + $nmarg + $npati + $nespr;
				
			$suaux = "update personagem set APARENCIA = $napar,
											FORCA = $nforca,
											INTELIGENCIA = $nintel,
											DESTREZA = $ndest,
											POPULARIDADE = $npop,
											POPNERD = $nnerd,
											POPPATI = $npati,
											POPESPR = $nespr,
											POPMARG = $nmarg  where CODIGOP = $_SESSION[usuario]";
			mysql_query($suaux);
			$npcf = $anpc["FORCA"] - 1;
			$npci = $anpc["INTELIGENCIA"] + 1;
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 3";
			mysql_query($unpc);
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
		      
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}

if (isset($_POST["parque"]) && $_POST["parque"] == "vandalizar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["FORCA"] > $anpc["FORCA"]) {
			$napar= $ausr["APARENCIA"] + 1;
			$nforca = $ausr["FORCA"] - 4;
			$nintel = $ausr["INTELIGENCIA"] + 3;
			$ndest = $ausr["DESTREZA"] - 3;
			$nnerd = $ausr["POPNERD"] + 5;
			$nmarg = $ausr["POPMARG"] - 6;
			$npati = $ausr["POPPATI"] + 3;
			$nesp = $ausr["POPESPR"] - 1;
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
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 3";
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