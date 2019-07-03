<?php
session_start();

if ($_SESSION["usuario"] == "") {
	echo "Voc� n�o tem autoriza��o para acessar essa p�gina!";
	break;
}

include "conbd.php";

?>

<html>
<head>
<link href="layout.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body>

<div class="topo"></div>

<div class="cabeca">
<table width="100%" border="0">
  <tr>
    <th scope="col"><a href="home.php">Home</a></th>
    <th scope="col"><a href="mural.php">Mural</a></th>
    <th scope="col"><a href="underground.php">Underground</a></th>
    <th scope="col"><a href="ranking.php">Ranking</a></th>
    <th scope="col"><a href="config.php">Configura&ccedil;&otilde;es</a></th>
    <th scope="col"><a href="regras.php">Ajuda</a></th>
    <th scope="col"><a href="sair.php">Sair</a></th> 
  </tr>
</table>
</div>


<div class="corpo">
<br>

<?php

if (isset($_GET["msg"]) && $_GET["msg"] == "v" ) {
   echo "<p align='center'><font color='#000'> Mensagem de pedido Enviada! </font></p>" ;
}

if (isset($_GET["amg"]) && $_GET["amg"] == "v" ) {
   echo "<p align='center'><font color='#000'> Criada com sucesso! </font></p>" ;
}

if (isset($_GET["sair"]) && $_GET["sair"] == "v" ) {
   echo "<p align='center'><font color='#000'> Voc� saiu da Gang! </font></p>" ;
}
     
if (isset($_GET["erro"]) && $_GET["erro"] == "v" ) {
   echo "<p align='center'><font color='#000'> Houve algum Erro! </font></p>" ;
}
if (isset($_GET["erro"]) && $_GET["erro"] == "g" ) {
   echo "<p align='center'><font color='#000'> Voc� j� faz parte de uma Gang! </font></p>" ;
}
if (isset($_GET["erro"]) && $_GET["erro"] == "n" ) {
   echo "<p align='center'><font color='#000'> N�o � poss�vel criar Gang sem nome! </font></p>" ;
}


if (isset($_GET["g"])) {
	echo "";
} else {
	echo "<p align='center'>Gangs</p>
<p>Crie sua Gang ou junte-se a alguma existente.</p>
<p>L�deres de gang podem convidar os personagens para fazer parte de sua gang. 
Voc� s� poder� fazer parte de uma gang criando a sua pr�pria gang, ou aceitando um convite.</p>";

}

	if (isset($_GET["g"]) && $_GET["g"] == "c") {
		include "gc.php";
	}
	if (isset($_GET["g"]) && $_GET["g"] == "v") {
		include "gv.php";
	}
	if (isset($_GET["g"]) && $_GET["g"] == "s") {
		include "gs.php";
	}

?>

</div>

<div class="lateral">

<a href="gang.php?g=c">Criar Gang</a><br>
<a href="gang.php?g=v">Ver Gangs</a><br>
<a href="gang.php?g=s">Sua Gang</a><br>


</div>

</body>
</html>