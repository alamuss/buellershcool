<?php

if ($ausr["QUEST"] == "nerd") {
	echo "Presidente: Voc� j� fez o que eu precisava. Obrigado.";
} else {

echo "Presidente: 3..2..1.. oh n�o!!<br>
	 " . $ausr["NOMEP"] . ": O que foi?<br>
	Presidente: Nosso foguete amador n�o est� funcionando.<br>
	" . $ausr["NOMEP"] . ": Por qu�?<br>
	Presidente: N�o sabemos ainda.<br>
	" . $ausr["NOMEP"] . ": Deixa que eu descubro.<br>";
	
if ($ausr["INTELIGENCIA"] > 100) {
	echo "Presidente: Sim, voc� pode ajudar. Voc� mais que 100 em intelig�ncia.<br><br>";
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
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� foi o primeiro a realizar a tarefa para o Presidente do Clube de Xadrez. Com isso voc� ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 8;
		$npopul = $ausr["POPULARIDADE"] + 30;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'nerd' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� completou a tarefa para o Presidente do Clube de Xadrez.";
	}
} else {
	echo "Presidente: Precisamos de algu�m com mais de 100 em intelig�ncia.";
}

}

?>