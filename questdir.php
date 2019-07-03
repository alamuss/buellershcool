<?php

if ($ausr["QUEST"] == "diret") {
	echo "Diretor: Você já fez o que eu precisava. Obrigado.";
} else {

echo "Diretor: Olá jovem, tenho uma tarefa pra você.<br>
	 " . $ausr["NOMEP"] . ": O que você precisa?<br>
	Diretor: Bom, você sabe, nesse trabalho eu preciso ser respeitado pelos alunos.<br>
	" . $ausr["NOMEP"] . ": Entendo. Mas porque você precisa de mim?<br>
	Diretor: Na verdade eu preciso de alguem que tenha influência sobre os alunos, para passar o meu recado.<br>
	" . $ausr["NOMEP"] . ": E você quer que eu faça isso?<br>";
	
if ($ausr["POPNERD"] > 20 && $ausr["POPPATI"] > 20 && $ausr["POPMARG"] > 20 && $ausr["POPESPR"] > 20) {
	echo "Diretor: Sim. Você tem todos atributos que preciso. É popular com todos os grupos de alunos acima dos 20 pontos.<br><br>";
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
		echo "Parabéns " . $ausr["NOMEP"] . " você foi o primeiro a realizar a tarefa para o Diretor. Com isso você ganhou os pontos dessa tarefa em dobro.";
	} else {
		$ndin = $ausr["DINHEIRO"] + 40;
		$npopul = $ausr["POPULARIDADE"] + 600;
		$uqdp = "update personagem set DINHEIRO = $ndin,
									  POPULARIDADE = $npopul,
									  QUEST = 'diret' where CODIGOP = $_SESSION[usuario]";
		mysql_query($uqdp);
		echo "Parabéns " . $ausr["NOMEP"] . " você completou a tarefa para o Diretor.";
	}
} else {
	echo "Diretor: Infelizmente você ainda não está pronto. Preciso de alguém que tenha acima de 20 pontos de popularidade com todos os grupos de alunos. Mas não se preocupe, ainda tenho tempo e você pode voltar mais tarde.";
}

}
	
?>