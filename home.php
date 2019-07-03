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
    <th scope="col"><a href="regras.php">Ajuda</a></th>
    <th scope="col"><a href="sair.php">Sair</a></th>
  </tr>
</table>
</div>

<div class="corpo">

<img src="img/home.png" width="599" height="45">
<?php

$satr = "select * from personagem where CODIGOP = $_SESSION[usuario]";
$qatr = mysql_query($satr);
$atri = mysql_fetch_array($qatr);

$scm = "select count(*) as msg from mensagens where ESTADO = 'N' and PDESTINO = $_SESSION[usuario]";
$qcm = mysql_query($scm);
$acm = mysql_fetch_array($qcm);
if ($acm["msg"] > 0) {
	if ($acm["msg"] == 1) {
		echo "Voc� tem 1 nova <a href='perfil.php?p=mp'>mensagem</a>.<br>";
	} else {
		echo "Voc� tem ".$acm["msg"]." novas <a href='perfil.php?p=mp'>mensagens</a>.<br>";
	}
}

echo "<br>Agora s�o " . date("G:i",time()) . " do dia " . date("d/m/Y",time()) . "<br> Atributos do personagem " . $atri['NOMEP'] . ":<br><br>";

if ($atri["ESTADO"] == "A") {
	$sts = $atri["STAMINA"];
} else {
	$sts = "D";
}

echo "
	<table>
		<tr>
			<th scope='col'>Energia</th>
			<th scope='col'>Dinheiro</th>
			<th scope='col'>Popularidade</th>
		</tr>
		<tr>
			<td>" . $sts . "</td>
			<td>" . $atri['DINHEIRO'] . "</td>
			<td>" . $atri['POPULARIDADE'] . "</td>
		</tr>
	</table>	
	<table>
		<tr>
			<th scope='col'>Apar�ncia</th>
			<th scope='col'>For�a</th>
			<th scope='col'>Intelig�ncia</th>
			<th scope='col'>Destreza</th>
		</tr>
		<tr>
			<td>" . $atri['APARENCIA'] . "</td>
			<td>" . $atri['FORCA'] . "</td>
			<td>" . $atri['INTELIGENCIA'] . "</td>
			<td>" . $atri['DESTREZA'] . "</td>
		</tr>
		<tr>
			<th scope='col'>Patricinhas</th>
			<th scope='col'>Nerds</th>
			<th scope='col'>Marginais</th>
			<th scope='col'>Esportistas</th>
		</tr>
		<tr>
			<td>" . $atri['POPPATI'] . "</td>
			<td>" . $atri['POPNERD'] . "</td>
			<td>" . $atri['POPMARG'] . "</td>
			<td>" . $atri['POPESPR'] . "</td>
		</tr>	
	</table>";	

?>

<p align="center">Calend�rio</p>
<table width="100%">
  <tr>
    <th scope="col">Semana</th>
    <th scope="col">In�cio</th>
    <th scope="col">Evento</th>
  </tr>
  <tr>
    <td>1</td>
    <td>20/09/2009</td>
    <td>In�cio do Round</td>
  </tr>
  <tr>
    <td>2</td>
    <td>24/09/2009</td>
    <td></td>
  </tr>
  <tr>
    <td>3</td>
    <td>27/09/2009</td>
    <td></td>
  </tr>
  <tr>
    <td>4</td>
    <td>01/10/2009</td>
    <td>Semana de Provas 1</td>
  </tr>
  <tr>
    <td>5</td>
    <td>04/10/2009</td>
    <td></td>
  </tr>
  <tr>
    <td>6</td>
    <td>08/10/2009</td>
    <td></td>
  </tr>
  <tr>
    <td>7</td>
    <td>11/10/2009</td>
    <td>Semana de Provas 2</td>
  </tr>
  <tr>
    <td>8</td>
    <td>15/10/2009</td>
    <td></td>
  </tr>
  <tr>
    <td>9</td>
    <td>18/10/2009</td>
    <td></td>
  </tr>
  <tr>
    <td>10</td>
    <td>22/10/2009</td>
    <td>Semana Final</td>
  </tr>
  <tr>
    <td></td>
    <td>25/10/2009</td>
    <td>Fim do Round</td>
  </tr>
</table><bR><Br>

<img src="img/rodapeprincipal.png" width="599" height="45">

</div>

<div class="lateral">
<img src="img/localmenu.png" width="167" height="20">
<?php

$str = "select * from locais";
$qry = mysql_query($str);

while ($aux = mysql_fetch_array($qry)) {
	
	echo "<a href='local.php?l=".$aux['CODIGOL']."'>".$aux['NOMEL']."</a><br>";
	
	}

?>
<img src="img/rodapelateral.png" width="167" height="20">
</div>



</body>
</html>
