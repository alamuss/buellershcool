<?php

if ($ausr["QUEST"] == "zelad") {
	echo "Zelador: Voc� j� fez o que eu precisava. Obrigado.";
} else {

echo "Zelador: O anivers�rio da minha patroa est� chegando.<br>
	 " . $ausr["NOMEP"] . ": Legal, vai fazer uma surpresa?<br>
	Zelador: Eu queria dar um presente que ela vem pedidndo a um tempo.<br>
	" . $ausr["NOMEP"] . ": Aposto que ela vai gostar?<br>
	Zelador: O problema � que custa $40 e eu n�o tenho esse dinheiro.<br>
	" . $ausr["NOMEP"] . ": Vou conseguir o dinheiro pra voc�.<br>";
	
if ($ausr["DINHEIRO"] >= 40 ) {
	echo "Zelador: S�o os $40. Obrigado por me ajudar.<br><br>";
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
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� foi o primeiro a realizar a tarefa para o Zelador. Com isso voc� ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] - 40;
		$npopul = $ausr["POPULARIDADE"] + 300;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'zelad' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� completou a tarefa para o Zelador.";
	}
} else {
	echo "Zelador: Isso n�o � suficiente, o presente custa $40.";
}

}
?>
	