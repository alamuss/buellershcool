<?php
include "conbd.php";
?>

<img src="img/loja.png" width="599" height="45" />

<form action="local.php?l=7" method="post">
  <select name="loja">
<?php
if (time() >= $qpi && time() < $qpf) {
	echo "<option value='quest'>Falar com Patricinha (E -15)</option>";
}
?>
<option value="gadget">Comprar Gadget (- $8)</option>
<option value="roupa">Comprar Roupas (- $6)</option>
<option value="faxineiro">Trabalhar como faxineiro (+ $6)</option>
<option value="atendente">Trabalhar como atendente (+ $16)</option>

</select>
<input name="" type="submit" value="Executar" />
<br /><br />
</form>

<?php


$susr = "select * from personagem where CODIGOP = '$_SESSION[usuario]'";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);

if (isset($_POST["loja"]) && $_POST["loja"] == "quest") {
	if ($ausr["STAMINA"] >= 15) {
		$nstamina = $ausr["STAMINA"] - 15;
		$suquest = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
		mysql_query($suquest);
		
		if ($ausr["POPPATI"] > 30) {
			include "questpati.php";
		} else {
			echo "Patricinha: 'Eu te conheço? Seja mais popular com as Patricinhas antes de falar comigo.'";
		}
	} else {
		echo "Seu personagem não tem energia suficiente.";		
	}
}

if (isset($_POST["loja"]) && $_POST["loja"] == "gadget") {
	if ($ausr["DINHEIRO"] >= 8) {
		$ndin = $ausr["DINHEIRO"] - 8;
		$nintel = $ausr["INTELIGENCIA"] + 9;
		$npopn = $ausr["POPNERD"] + 11;
		$updt = "update personagem set DINHEIRO = $ndin,
									   POPNERD = $npopn, 	
									   INTELIGENCIA = $nintel where CODIGOP = $_SESSION[usuario]";
		mysql_query($updt);
		echo $ausr["NOMEP"] . " comprou gadgets.";
	} else { 
		echo "Seu personagem não tem dinheiro suficiente para comprar gadgets.";
	}
}

if (isset($_POST["loja"]) && $_POST["loja"] == "roupa") {
	if ($ausr["DINHEIRO"] >= 6) {
		$ndin = $ausr["DINHEIRO"] - 6;
		$napar = $ausr["APARENCIA"] + 11;
		$npopp = $ausr["POPPATI"] + 7;
		$updt = "update personagem set DINHEIRO = $ndin,
									   POPPATI = $npopp,	
									   APARENCIA = $napar where CODIGOP = $_SESSION[usuario]";
		mysql_query($updt);
		echo $ausr["NOMEP"] . " comprou roupas.";
	} else { 
		echo "Seu personagem não tem dinheiro suficiente para comprar roupas.";
	}
}

if (isset($_POST["loja"]) && $_POST["loja"] == "faxineiro") {
		if ($ausr["STAMINA"] >= 30) {
			$nstamina = $ausr["STAMINA"] - 30;
			$upstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
			mysql_query($upstamina);
			if ($ausr["FORCA"] > 12) {
				$ndin = $ausr["DINHEIRO"] + 6;
				$npop = $ausr["POPULARIDADE"] - 10;
				$updin = "update personagem set DINHEIRO = $ndin,
												POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
				mysql_query($updin);
				echo $ausr["NOMEP"] . " trabalhou.";
			} else {
				echo "Você não tem habilidada suficiente para trabalhar como faxineiro.";
			}
		} else {
			echo "Você não tem energia suficiente para trabalhar.";
		}
}

if (isset($_POST["loja"]) && $_POST["loja"] == "atendente") {
		if ($ausr["STAMINA"] >= 30) {
			$nstamina = $ausr["STAMINA"] - 30;
			$upstamina = "update personagem set STAMINA = $nstamina where CODIGOP = $_SESSION[usuario]";
			mysql_query($upstamina);
			if ($ausr["APARENCIA"] > 28) {
				$ndin = $ausr["DINHEIRO"] + 16;
				$npop = $ausr["POPULARIDADE"] - 30;
				$updin = "update personagem set DINHEIRO = $ndin,
												POPULARIDADE = $npop where CODIGOP = $_SESSION[usuario]";
				mysql_query($updin);
				echo $ausr["NOMEP"] . " trabalhou como atendente na loja.";
			} else {
				echo "Você não tem habilidada suficiente para trabalhar como atendente.";
			}
		} else {
			echo "Você não tem energia suficiente para trabalhar.";
		}
}

?>