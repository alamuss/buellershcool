<?php

if ($ausr["QUEST"] == "pati") {
	echo "Patricinha: Voc� j� fez o que eu precisava. Obrigada.";
} else {

echo "Patricinha: N�s vamos realizar um desfile de moda.<br>
	 " . $ausr["NOMEP"] . ": Que interessante.<br>
	Patricinha: Sim. Mas estamos com problemas.<br>
	" . $ausr["NOMEP"] . ": Por qu�?<br>
	Patricinha: Todas querem desfilar, mas n�s precisavamos de algu�m para ficar nos bastidores. <br>
	" . $ausr["NOMEP"] . ": Eu vou!<br>";
	
if ($ausr["APARENCIA"] > 50) {
	echo "Patricinha: Voc� � perfeito. Tem mais que 50 pontos em Aparencia.<br><br>";
	$primeiro = "select count(*) as primeiro from personagem where QUEST = 'pati'";
	$qprimeiro = mysql_query($primeiro);
	$aprimeiro = mysql_fetch_array($qprimeiro);
	if ($aprimeiro["primeiro"] == 0) {
		$ndin = $ausr["DINHEIRO"] + 30;
		$npopul = $ausr["POPULARIDADE"] + 150;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'pati' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� foi o primeiro a realizar a tarefa para a Patricinha. Com isso voc� ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 15;
		$npopul = $ausr["POPULARIDADE"] + 75;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'pati' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� completou a tarefa para a Patricinha.";
	}
} else {
	echo "Patricinha: N�o. Voc� n�o tem Aparencia suficiente. Precisamos de algu�m com mais de 50.";
}

}

?>