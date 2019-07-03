<?php

if ($ausr["QUEST"] == "espr") {
	echo "Capitão: Você já fez o que eu precisava. Obrigado.";
} else {

echo "Capitão: O time está pronto. Mas temos outro problema.<br>
	 " . $ausr["NOMEP"] . ": Que problema?<br>
	Capitão: Preciso realizar um treinamento específico, mas não tenho ninguém pra ajudar.<br>
	" . $ausr["NOMEP"] . ": Como é esse treinamento?<br>
	Capitão: Preciso que alguém segure esse alvo, para meus jogadores tentarem acertar. <br>
	" . $ausr["NOMEP"] . ": Eu vou!.<br>";
	
if ($ausr["DESTREZA"] > 50) {
	echo "Capitão: É isso aí. Sabia que você conseguiria.<br><br>";
	$primeiro = "select count(*) as primeiro from personagem where QUEST = 'espr'";
	$qprimeiro = mysql_query($primeiro);
	$aprimeiro = mysql_fetch_array($qprimeiro);
	if ($aprimeiro["primeiro"] == 0) {
		$ndin = $ausr["DINHEIRO"] + 30;
		$npopul = $ausr["POPULARIDADE"] + 2000;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'espr' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você foi o primeiro a realizar a tarefa para o Capitão do Time. Com isso você ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 15;
		$npopul = $ausr["POPULARIDADE"] + 1000;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'espr' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você completou a tarefa para o Capitão do Time.";
	}
} else {
	echo "Capitão: Não. Você precisa de mais Destreza. Talvez mais tarde.";
}

}
	
?>