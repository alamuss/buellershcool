<?php

if ($ausr["QUEST"] == "pati") {
	echo "Patricinha: Você já fez o que eu precisava. Obrigada.";
} else {

echo "Patricinha: Nós vamos realizar um desfile de moda.<br>
	 " . $ausr["NOMEP"] . ": Que interessante.<br>
	Patricinha: Sim. Mas estamos com problemas.<br>
	" . $ausr["NOMEP"] . ": Por quê?<br>
	Patricinha: Todas querem desfilar, mas nós precisavamos de alguém para ficar nos bastidores. <br>
	" . $ausr["NOMEP"] . ": Eu vou!<br>";
	
if ($ausr["APARENCIA"] > 50) {
	echo "Patricinha: Você é perfeito. Tem mais que 50 pontos em Aparencia.<br><br>";
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
		echo "Parabéns " . $ausr["NOMEP"] . " você foi o primeiro a realizar a tarefa para a Patricinha. Com isso você ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 15;
		$npopul = $ausr["POPULARIDADE"] + 75;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'pati' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você completou a tarefa para a Patricinha.";
	}
} else {
	echo "Patricinha: Não. Você não tem Aparencia suficiente. Precisamos de alguém com mais de 50.";
}

}

?>