<?php
session_start();
?>

<html>
<head>
<title>BUELLER SCHOOL</title>
<link href="layout.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	
<div class="ads">
<!-- AnÃºncio DinÃ¢mico LOMADEE - INÃCIO -->
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
Lomadee, uma nova espÃ©cie na web. A maior plataforma de afiliados da AmÃ©rica Latina</div></font></a></div>
<!-- AnÃºncio DinÃ¢mico LOMADEE - FIM -->
	
</div>			

<div class="topo"></div>

<div class="cabeca">

<?php
if(isset($_SESSION["usuario"]) && $_SESSION["usuario"] != "") {

echo "
<table width='100%' border='0'>
  <tr>
    <th scope='col'><a href='home.php'>Home</a></th>
    <th scope='col'><a href='mural.php'>Mural</a></th>
    <th scope='col'><a href='underground.php'>Underground</a></th>
    <th scope='col'><a href='ranking.php'>Ranking</a></th>
	<th scope='col'><a href='perfil.php'>Perfil</a></th>
    <th scope='col'><a href='config.php'>Configurações</a></th>
    <th scope='col'><a href='regras.php'>Ajuda</a></th>
	<th scope='col'><a href='sair.php'>Sair</a></th>
  </tr>
</table>";

} else {

echo "
<table width='100%' border='0'>
  <tr>
    <th scope='col'><a href='index.php'>Início</a></th>
    <th scope='col'><a href='ranking.php'>Ranking</a></th>
    <th scope='col'><a href='regras.php'>Ajuda</a></th>
  </tr>
</table>";

}
?>
	

</div>

<div class="lateral">
<img src="img/superiorlateral.png" width="167" height="20"> 
<a href="regras.php?r=t">Termos de Uso</a><br />
<a href="regras.php?r=r">Regras do Jogo</a><br />
<a href="regras.php?r=d">Dicas para os Iniciantes</a><br />
<a href="regras.php?r=g">Guia do Jogo</a><br />
<img src="img/rodapelateral.png" width="167" height="20">

</div>	
	
<div class="corpo">

<img src="img/regras.png" width="599" height="45">
<?php	

if (isset($_GET["r"])) {
	echo "";
} else {
	echo "<p>Não deixe de ler os Termos de Uso e as Regras do Jogo antes de começar.</p>
<p>Também leia as Dicas para Iniciantes e o Guia do Jogo, caso tenha alguma dúvida.</p>
<p>Você também pode entrar em contato através do e-mail: contato@buellerschool.com.br ou na comunidade oficial no Orkut: http://www.orkut.com.br/Main#Community?cmm=92295867</p>";
}

	if (isset($_GET["r"]) && $_GET["r"] == "t") {
		include "rt.php";
	}
	if (isset($_GET["r"]) && $_GET["r"] == "r") {
		include "rr.php";
	}
	if (isset($_GET["r"]) && $_GET["r"] == "d") {
		include "rdi.php";
	}
	if (isset($_GET["r"]) && $_GET["r"] == "g") {
		include "rgj.php";
	}

		
?>
<img src="img/rodapeprincipal.png" width="599" height="45">
</div>
