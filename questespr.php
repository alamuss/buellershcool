<?php

if ($ausr["QUEST"] == "espr") {
	echo "Capit�o: Voc� j� fez o que eu precisava. Obrigado.";
} else {

echo "Capit�o: O time est� pronto. Mas temos outro problema.<br>
	 " . $ausr["NOMEP"] . ": Que problema?<br>
	Capit�o: Preciso realizar um treinamento espec�fico, mas n�o tenho ningu�m pra ajudar.<br>
	" . $ausr["NOMEP"] . ": Como � esse treinamento?<br>
	Capit�o: Preciso que algu�m segure esse alvo, para meus jogadores tentarem acertar. <br>
	" . $ausr["NOMEP"] . ": Eu vou!.<br>";
	
if ($ausr["DESTREZA"] > 50) {
	echo "Capit�o: � isso a�. Sabia que voc� conseguiria.<br><br>";
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
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� foi o primeiro a realizar a tarefa para o Capit�o do Time. Com isso voc� ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 15;
		$npopul = $ausr["POPULARIDADE"] + 1000;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'espr' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� completou a tarefa para o Capit�o do Time.";
	}
} else {
	echo "Capit�o: N�o. Voc� precisa de mais Destreza. Talvez mais tarde.";
}

}
	
?>