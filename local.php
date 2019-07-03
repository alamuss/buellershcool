<?php
session_start();

if ($_SESSION["usuario"] == "") {
	echo "Voc� n�o tem autoriza��o para acessar essa p�gina!";
	header("Location: erro.php");
	break;
}

?>


<html>
<head>
<title>BUELLER SCHOOL</title>
<link href="local.css" rel="stylesheet" type="text/css">
</head>

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
    <th scope="col"><a href="config.php">Configura��es</a></th>
    <th scope="col"><a href="regras.php">Regras</a></th>
    <th scope="col"><a href="sair.php">Sair</a></th>
  </tr>
</table>
</div>

<div class="lateral">

<img src="img/localmenu.png" width="167" height="20">

<?php

include "conbd.php";

$str = "select * from locais";
$qry = mysql_query($str);

while ($aux = mysql_fetch_array($qry)) {
	
	echo "<a href='local.php?l=".$aux['CODIGOL']."'>".$aux['NOMEL']."</a><br>";
	
	}
?>	
<img src="img/rodapelateral.png" width="167" height="20">
</div>	
	
<div class="corpo">

<?php

$susr = "select * from personagem where CODIGOP = '$_SESSION[usuario]'";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);	

$qdi = 1254628800;
$qei = 1254974400;
$qzi = 1254024000;
$qmi = 1255838400;
$qni = 1255579200;
$qpi = 1253764800;
$p1i = 1254369600;
$p2i = 1255233600;

$tq = ((60*60)*24)*3;

$qdf = $qdi + $tq;
$qef = $qei + $tq;
$qzf = $qzi + $tq;
$qmf = $qmi + $tq;
$qnf = $qni + $tq;
$qpf = $qpi + $tq;
$p1f = $p1i + $tq;
$p2f = $p2i + $tq;

if ($ausr["ESTADO"] == "A") {

	if ($_GET["l"] == 1) {
		include "l1.php";
	}
	if ($_GET["l"] == 2) {
		include "l2.php";
	}
	if ($_GET["l"] == 3) {
		include "l3.php";
	}
	if ($_GET["l"] == 4) {
		include "l4.php";
	}
	if ($_GET["l"] == 5) {
		include "l5.php";
	}
	if ($_GET["l"] == 6) {
		include "l6.php";
	}
	if ($_GET["l"] == 7) {
		include "l7.php";
	}
	if ($_GET["l"] == 8) {
		include "l8.php";
	}
	if ($_GET["l"] == 9) {
		include "l9.php";
	}
	if ($_GET["l"] == 10) {
		include "l10.php";
	}
		
} else {
	if ($ausr["DF"] < time()) {
		$update = "update personagem set ESTADO = 'A',  
										 STAMINA = 100 where CODIGOP = $_SESSION[usuario]";
		mysql_query($update);
		echo "Seu personagem j� descansou!";
	} else {
		$agora = date("G:i", time());
		$termina = date("G:i", $ausr["DF"]);
					
		echo $ausr["NOMEP"] . " est� descansando. Agora s�o " . $agora . ". O descan�o termina as " . $termina . ".";
	}
}

?>
<img src="img/rodapeprincipal.png" width="599" height="45">

</div>

<div class="status"> 
<?php

$ssts = "select * from personagem where CODIGOP = '$_SESSION[usuario]'";
$qsts = mysql_query($ssts);
$asts = mysql_fetch_array($qsts);

if ($asts["ESTADO"] == "A") {
	$energia = $asts["STAMINA"];
} else {
	$energia = "D";
}

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Personagem:</b> " . $asts["NOMEP"] . " | <b>Energia:</b> " . $energia . " | <b>Dinheiro:</b> " . $asts["DINHEIRO"];

?>
 </div>
</body>

</html>