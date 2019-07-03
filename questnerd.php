<?php

if ($ausr["QUEST"] == "nerd") {
	echo "Presidente: Você já fez o que eu precisava. Obrigado.";
} else {

echo "Presidente: 3..2..1.. oh não!!<br>
	 " . $ausr["NOMEP"] . ": O que foi?<br>
	Presidente: Nosso foguete amador não está funcionando.<br>
	" . $ausr["NOMEP"] . ": Por quê?<br>
	Presidente: Não sabemos ainda.<br>
	" . $ausr["NOMEP"] . ": Deixa que eu descubro.<br>";
	
if ($ausr["INTELIGENCIA"] > 100) {
	echo "Presidente: Sim, você pode ajudar. Você mais que 100 em inteligência.<br><br>";
	$primeiro = "select count(*) as primeiro from personagem where QUEST = 'nerd'";
	$qprimeiro = mysql_query($primeiro);
	$aprimeiro = mysql_fetch_array($qprimeiro);
	if ($aprimeiro["primeiro"] == 0) {
		$ndin = $ausr["DINHEIRO"] + 16;
		$npopul = $ausr["POPULARIDADE"] + 60;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'nerd' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você foi o primeiro a realizar a tarefa para o Presidente do Clube de Xadrez. Com isso você ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 8;
		$npopul = $ausr["POPULARIDADE"] + 30;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'nerd' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você completou a tarefa para o Presidente do Clube de Xadrez.";
	}
} else {
	echo "Presidente: Precisamos de alguém com mais de 100 em inteligência.";
}

}

?>