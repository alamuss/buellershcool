<img src="img/biblioteca.png" width="599" height="45" />

<form action="local.php?l=3" method="post">
<select name="biblioteca">
<option value="bibliotecaria">Conversar com a Bibliotecária (E -1)</option>
<option value="livro">Ler (E -12)</option>
<?php
if (time() >= $qni && time() < $qnf) {
	echo "<option value='quest'>Falar com presidente do Clube de Xadrez (E -15)</option>";
}
?>
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

$snpc = "select * from npc where CODIGON = 6";
$qnpc = mysql_query($snpc);
$anpc = mysql_fetch_array($qnpc);

if (isset($_POST["biblioteca"]) && $_POST["biblioteca"] == "bibliotecaria") {
	if ($ausr["STAMINA"] >= 1) {
		$nstamina = $ausr["STAMINA"] - 1;
		$suconv = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suconv);
		
		if ($ausr["APARENCIA"] > $anpc["APARENCIA"]) {
			$conta = "select count(*) as conta from frases where NPC = 6";
			$qconta = mysql_query($conta);
			$aconta = mysql_fetch_array($qconta);
			$sorteio = rand(1,$aconta["conta"]);
			$frase = "select * from frases where NPC = 6 and NUM = $sorteio";
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

if (isset($_POST["biblioteca"]) && $_POST["biblioteca"] == "livro") {
	if ($ausr["STAMINA"] >= 12) {
		$nstamina = $ausr["STAMINA"] - 12;
		$nintel = $ausr["INTELIGENCIA"] + 12;
		$nforca = $ausr["FORCA"] - 2;
		$updt = "update personagem set STAMINA = $nstamina,
									   INTELIGENCIA = $nintel,
									   FORCA = $nforca where CODIGOP = $_SESSION[usuario]";
		mysql_query($updt);
		echo "Ação realizada com sucesso";
	} else { 
		echo "Energia insuficiente para essa tarefa";
	}
}

if (isset($_POST["biblioteca"]) && $_POST["biblioteca"] == "quest") {
	if ($ausr["STAMINA"] >= 15) {
		$nstamina = $ausr["STAMINA"] - 15;
		$suquest = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suquest);
		
		if ($ausr["POPNERD"] > 30) {
			include "questnerd.php";
		} else {
			echo "Presidente: 'Você não é muito conhecido no nosso grupo. Xeque-Mate.'";
		}
	} else {
		echo "Seu personagem não tem energia suficiente.";		
	}
}
	
if (isset($_POST["biblioteca"]) && $_POST["biblioteca"] == "auxiliar") {

	if ($ausr["STAMINA"] >= 7) {
		$nstamina = $ausr["STAMINA"] - 7;
		$snstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($snstamina);
		
		if ($ausr["INTELIGENCIA"] > $anpc["INTELIGENCIA"]) {
			$napar= $ausr["APARENCIA"] - 3;
			$nforca = $ausr["FORCA"] -5;
			$nintel = $ausr["INTELIGENCIA"] + 4;
			$ndest = $ausr["DESTREZA"] -2;
			$nnerd = $ausr["POPNERD"] + 5;
			$nmarg = $ausr["POPMARG"] - 5;
			$nespr = $ausr["POPESPR"] - 1;
			$npati = $ausr["POPPATI"] - 1;
			$npop = $ausr["POPULARIDADE"] + $nnerd + $nmarg + $npati + $nespr;
				
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
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 6";
			mysql_query($unpc);
			echo "Ação realizada com sucesso!";
		} else {
			echo "Seu personagem não tem habilidade suficiente para essa ação.";
		}
		      
	} else {
		echo "Seu personagem não tem energia suficiente.";
	}	
}

if (isset($_POST["biblioteca"]) && $_POST["biblioteca"] == "vandalizar") {

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
			$npati = $ausr["POPPATI"] + 1;
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
			$unpc = "update npc set FORCA = $npcf, INTELIGENCIA = $npci where CODIGON = 6";
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