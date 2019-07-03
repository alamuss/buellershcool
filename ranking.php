<?php
session_start();
?>

<html>
<head>
<title>BUELLER SCHOOL</title>
<link href="layout.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

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
<a href="ranking.php?r=g">Popularidade Geral</a><br />
<a href="ranking.php?r=n">Popularidade entre os Nerds</a><br />
<a href="ranking.php?r=e">Popularidade entre os Esportistas</a><br />
<a href="ranking.php?r=p">Popularidade entre as Patricinhas</a><br />
<a href="ranking.php?r=m">Popularidade entre os Marginais</a><br />
<a href="ranking.php?r=d">Ranking de Dinheiro</a><br />
<img src="img/rodapelateral.png" width="167" height="20">
</div>	
	
<div class="corpo">
<img src="img/ranking.png" width="599" height="45"><br>
    
<?php

 if (isset($_GET["v"]) && $_GET["v"] == "fim" ) {
        echo "<p align='center'><font color='#000'> O Round já acabou. Você pode aproveitar a semana de descanso para descansar, e para conferir o ranking. </font></p>" ;
     }


if (isset($_GET["r"])) {
	echo "";
} else {
	echo "Através dos rankings você pode comparar o desempenho do seu personagem em relação aos personagens dos outros jogadores.
Para manter o divertimento, apenas o ranking de ''Popularidade Geral'' e o de ''Dinheiro'' apresentam valores.";
}

include "conbd.php";

	if (isset($_GET["r"]) && $_GET["r"] == "g") {
		include "rg.php";
	}
	if (isset($_GET["r"]) && $_GET["r"] == "n") {
		include "rn.php";
	}
	if (isset($_GET["r"]) && $_GET["r"] == "e") {
		include "re.php";
	}
	if (isset($_GET["r"]) && $_GET["r"] == "p") {
		include "rp.php";
	}
	if (isset($_GET["r"]) && $_GET["r"] == "m") {
		include "rm.php";
	}
	if (isset($_GET["r"]) && $_GET["r"] == "d") {
		include "rd.php";
	}
	
?>

<img src="img/rodapeprincipal.png" width="599" height="45">

</div>
  
</body>

</html>