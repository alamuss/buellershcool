<?php

if ($ausr["QUEST"] == "marg") {
	echo "Marginal: J� t� feito.";
} else {

echo "Marginal: N�s vamos acabar com os Esportistas.<br>
	 " . $ausr["NOMEP"] . ": Qual o plano?<br>
	Marginal: Roubar os trof�us e destruir o vesti�rio.<br>
	" . $ausr["NOMEP"] . ": V�o precisar de bastante gente, n�o?<br>
	Marginal: Vai com a gente? <br>
	" . $ausr["NOMEP"] . ": Eu vou!<br>";
	
if ($ausr["FORCA"] > 150 ) {
	echo "Marginal: Isso a� truta. Voc� � um mano com mais de 150 de For�a.<br><br>";
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
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� foi o primeiro a realizar a tarefa para o Marginal. Com isso voc� ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 30;
		$npopul = $ausr["POPULARIDADE"] + 750;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'marg' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� completou a tarefa para o Marginal.";
	}
} else {
	echo "Marginal: Voc� n�o tem condi��es. N�o tem for�a (mais que 150).";
}

}

?>
	