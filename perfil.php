<?php
session_start();

if ($_SESSION["usuario"] == "") {
	//echo "Voc� n�o tem autoriza��o para acessar essa p�gina!";
	header("Location: erro.php");
	break;
}

include "conbd.php";

?>

<html>
<head>
<title>BUELLER SCHOOL</title>
<link href="layout.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

<body>
	
<div class="ads">
<!-- Anúncio Dinâmico LOMADEE - INÍCIO -->
<div style="width:728px; height:90px; overflow:hidden;">
<div style="overflow:hidden;">
<script language="javascript" 
 src="http://ivitrine.buscape.com/bpadsvar.js"></script>
<script language="javascript" ><!--
buscapeads_afiliado = "44547611";
buscapeads_tipo_cliente = "2";
buscapeads_vitrine_local = "BR";
buscapeads_site_origem = "9827259";
buscapeads_vitrine_vers = "1.23";
buscapeads_formato = "728x90";
buscapeads_id_keyword = "226470";
buscapeads_txt_keyword = "";
buscapeads_tipo_canal = "42";
buscapeads_categorias = "";
buscapeads_excluir = "3";
buscapeads_idioma = "pt";
buscapeads_pais = "BR";
buscapeads_area = "";
buscapeads_estado = "";
buscapeads_cidade = "";
buscapeads_cep = "";
//--></script>
<script language="javascript" 
 src="http://ivitrine.buscape.com/bpads.js"></script></div>
<a href="http://www.lomadee.com/"><font size="1"><div align="right">
Lomadee, uma nova espécie na web. A maior plataforma de afiliados da América Latina</div></font></a></div>
<!-- Anúncio Dinâmico LOMADEE - FIM -->
	
</div>			

<div class="topo"></div>

<div class="cabeca">
<table width="100%" border="0">
  <tr>
    <th scope="col"><a href="home.php">Home</a></th>
    <th scope="col"><a href="mural.php">Mural</a></th>
    <th scope="col"><a href="underground.php">Underground</a></th>
    <th scope="col"><a href="ranking.php">Ranking</a></th>
    <th scope="col"><a href="perfil.php">Perfil</a></th>
    <th scope="col"><a href="config.php">Configura&ccedil;&otilde;es</a></th>
    <th scope="col"><a href="regras.php">Ajuda</a></th>
    <th scope="col"><a href="sair.php">Sair</a></th> 
  </tr>
</table>
</div>


<div class="corpo">
<img src="img/perfil.png" width="599" height="45"><br>

<?php

if (isset($_GET["msg"]) && $_GET["msg"] == "v" ) {
   echo "<p align='center'><font color='#000'> Mensagem Enviada! </font></p>" ;
}

if (isset($_GET["amg"]) && $_GET["amg"] == "v" ) {
   echo "<p align='center'><font color='#000'> Adicionado com sucesso! </font></p>" ;
}

if (isset($_GET["img"]) && $_GET["img"] == "v" ) {
   echo "<p align='center'><font color='#000'> Alterado com sucesso! </font></p>" ;
}

if (isset($_GET["erro"]) && $_GET["erro"] == "v" ) {
   echo "<p align='center'><font color='#000'> Houve algum Erro! </font></p>" ;
}


if (isset($_GET["p"])) {
	echo "";
} else {
	echo "<p align='center'>Perfil</p>
<p>Um contato mais direto com os outros jogadores. Crie e edite aqui, o perfil do seu Personagem. </p>
<p>Escolha entre as op��es do menu ao lado...</p>
";

}

	if (isset($_GET["p"]) && $_GET["p"] == "p") {
		include "pp.php";
	}
	if (isset($_GET["p"]) && $_GET["p"] == "i") {
		include "pi.php";
	}
	if (isset($_GET["p"]) && $_GET["p"] == "m") {
		include "pm.php";
	}
	if (isset($_GET["p"]) && $_GET["p"] == "mp") {
		include "pmp.php";
	}
	if (isset($_GET["p"]) && $_GET["p"] == "a") {
		include "pa.php";
	}
	if (isset($_GET["p"]) && $_GET["p"] == "op") {
		include "pop.php";
	}

?>
<img src="img/rodapeprincipal.png" width="599" height="45">
</div>

<div class="lateral">
<img src="img/superiorlateral.png" width="167" height="20"> 
<a href="perfil.php?p=p">Seu Perfil</a><br>
<a href="perfil.php?p=i">Alterar Imagem</a><br>
<a href="perfil.php?p=m">Alterar Mensagem Pessoal</a><br>
<a href="perfil.php?p=mp">Ver Mensagens Privadas</a><br>
<a href="perfil.php?p=a">Lista de Amigos</a>
<img src="img/rodapelateral.png" width="167" height="20">
</div>

</body>
</html>