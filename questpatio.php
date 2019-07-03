<?php

if ($ausr["QUEST"] == "zelad") {
	echo "Zelador: Você já fez o que eu precisava. Obrigado.";
} else {

echo "Zelador: O aniversário da minha patroa está chegando.<br>
	 " . $ausr["NOMEP"] . ": Legal, vai fazer uma surpresa?<br>
	Zelador: Eu queria dar um presente que ela vem pedidndo a um tempo.<br>
	" . $ausr["NOMEP"] . ": Aposto que ela vai gostar?<br>
	Zelador: O problema é que custa $40 e eu não tenho esse dinheiro.<br>
	" . $ausr["NOMEP"] . ": Vou conseguir o dinheiro pra você.<br>";
	
if ($ausr["DINHEIRO"] >= 40 ) {
	echo "Zelador: São os $40. Obrigado por me ajudar.<br><br>";
	$primeiro = "select count(*) as primeiro from personagem where QUEST = 'zelad'";
	$qprimeiro = mysql_query($primeiro);
	$aprimeiro = mysql_fetch_array($qprimeiro);
	if ($aprimeiro["primeiro"] == 0) {
		$ndin = $ausr["DINHEIRO"] - 40;
		$npopul = $ausr["POPULARIDADE"] + 600;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'zelad' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você foi o primeiro a realizar a tarefa para o Zelador. Com isso você ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] - 40;
		$npopul = $ausr["POPULARIDADE"] + 300;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'zelad' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você completou a tarefa para o Zelador.";
	}
} else {
	echo "Zelador: Isso não é suficiente, o presente custa $40.";
}

}
?>
	