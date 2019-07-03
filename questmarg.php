<?php

if ($ausr["QUEST"] == "marg") {
	echo "Marginal: Já tá feito.";
} else {

echo "Marginal: Nós vamos acabar com os Esportistas.<br>
	 " . $ausr["NOMEP"] . ": Qual o plano?<br>
	Marginal: Roubar os troféus e destruir o vestiário.<br>
	" . $ausr["NOMEP"] . ": Vão precisar de bastante gente, não?<br>
	Marginal: Vai com a gente? <br>
	" . $ausr["NOMEP"] . ": Eu vou!<br>";
	
if ($ausr["FORCA"] > 150 ) {
	echo "Marginal: Isso aí truta. Você é um mano com mais de 150 de Força.<br><br>";
	$primeiro = "select count(*) as primeiro from personagem where QUEST = 'marg'";
	$qprimeiro = mysql_query($primeiro);
	$aprimeiro = mysql_fetch_array($qprimeiro);
	if ($aprimeiro["primeiro"] == 0) {
		$ndin = $ausr["DINHEIRO"] + 60;
		$npopul = $ausr["POPULARIDADE"] + 1500;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'marg' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você foi o primeiro a realizar a tarefa para o Marginal. Com isso você ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 30;
		$npopul = $ausr["POPULARIDADE"] + 750;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'marg' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você completou a tarefa para o Marginal.";
	}
} else {
	echo "Marginal: Você não tem condições. Não tem força (mais que 150).";
}

}

?>
	