<?php

if ($ausr["QUEST"] == "diret") {
	echo "Diretor: Voc� j� fez o que eu precisava. Obrigado.";
} else {

echo "Diretor: Ol� jovem, tenho uma tarefa pra voc�.<br>
	 " . $ausr["NOMEP"] . ": O que voc� precisa?<br>
	Diretor: Bom, voc� sabe, nesse trabalho eu preciso ser respeitado pelos alunos.<br>
	" . $ausr["NOMEP"] . ": Entendo. Mas porque voc� precisa de mim?<br>
	Diretor: Na verdade eu preciso de alguem que tenha influ�ncia sobre os alunos, para passar o meu recado.<br>
	" . $ausr["NOMEP"] . ": E voc� quer que eu fa�a isso?<br>";
	
if ($ausr["POPNERD"] > 20 && $ausr["POPPATI"] > 20 && $ausr["POPMARG"] > 20 && $ausr["POPESPR"] > 20) {
	echo "Diretor: Sim. Voc� tem todos atributos que preciso. � popular com todos os grupos de alunos acima dos 20 pontos.<br><br>";
	$primeiro = "select count(*) as primeiro from personagem where QUEST = 'diret'";
	$qprimeiro = mysql_query($primeiro);
	$aprimeiro = mysql_fetch_array($qprimeiro);
	if ($aprimeiro["primeiro"] == 0) {
		$ndin = $ausr["DINHEIRO"] + 80;
		$npopul = $ausr["POPULARIDADE"] + 1200;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'diret' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� foi o primeiro a realizar a tarefa para o Diretor. Com isso voc� ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 40;
		$npopul = $ausr["POPULARIDADE"] + 600;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'diret' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parab�ns " . $ausr["NOMEP"] . " voc� completou a tarefa para o Diretor.";
	}
} else {
	echo "Diretor: Infelizmente voc� ainda n�o est� pronto. Preciso de algu�m que tenha acima de 20 pontos de popularidade com todos os grupos de alunos. Mas n�o se preocupe, ainda tenho tempo e voc� pode voltar mais tarde.";
}

}
	
?>