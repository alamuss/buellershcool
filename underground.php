<?php
session_start();

if ($_SESSION["usuario"] == "") {
	echo "Voc� n�o tem autoriza��o para acessar essa p�gina!";
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
<img src="img/underground.png" width="599" height="45"><br>

<?php

if (isset($_GET["u"])) {
	echo "";
} else {
	echo "<p align='center'>UNDERGROUND</p>
<p>Esse � um espa�o para voc� se divertir com outros jogadores. Testes as for�as do seu personagem contra um oponente, brigando no Underground. </p>
<p>Escolha entre as op��es do menu ao lado</p>
";
}

	if (isset($_GET["u"]) && $_GET["u"] == "b") {
		include "ub.php";
	}
	if (isset($_GET["u"]) && $_GET["u"] == "u") {
		include "uu.php";
	}
	if (isset($_GET["u"]) && $_GET["u"] == "s") {
		include "us.php";
	}
	if (isset($_GET["u"]) && $_GET["u"] == "r") {
		include "ur.php";
	}

?>
<img src="img/rodapeprincipal.png" width="599" height="45">
</div>

<div class="lateral">
<img src="img/superiorlateral.png" width="167" height="20"> 
<a href="underground.php?u=b">Brigar</a><br>
<a href="underground.php?u=u">Ultimas Brigas</a><br>
<a href="underground.php?u=s">Suas Brigas</a><br>
<a href="underground.php?u=r">Ranking</a><br>
<img src="img/rodapelateral.png" width="167" height="20">
</div>

</body>
</html>