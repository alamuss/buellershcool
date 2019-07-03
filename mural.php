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

<img src="img/mural.png" width="599" height="45">
<form action="insmural.php" method="post">
  <p>Use o espa&ccedil;o abaixo para deixar sua mensagem para os oturos jogadores.</p>
<textarea name="mural" cols="80" rows="5"></textarea>
<br>
<input name="" type="submit" value="Enviar">
<hr><hr><hr><hr>
</form>


<?php

if (isset($_GET["erro"]) && $_GET["erro"] == "v" ) {
        echo "<p align='center'><font color='#000'> Algum erro aconteceu. Tente outra vez. </font></p>" ;
     }

$smural = "select * from mural order by CODIGOMU desc limit 0,20";
$qmural = mysql_query($smural);

while ($amural = mysql_fetch_array($qmural)) {
	
	$susr = "select * from usuarios where CODIGO = $amural[CODUSR]";
	$qusr = mysql_query($susr);
	$ausr = mysql_fetch_array($qusr);
	
	$sper = "select * from personagem where CODIGOP = $amural[CODPER]";
	$qper = mysql_query($sper);
	$aper = mysql_fetch_array($qper);
	
$tdata = explode("-",$amural["DATA"]);
$data = $tdata[2] . "/" . $tdata[1] . "/" . $tdata[0];
	
echo "	<table width='100%' border='0'>
  <tr>
    <th scope='col'>Usu�rio</th>
    <th scope='col'>Personagem</th>
    <th scope='col'>Data</th>
  </tr>
  <tr>
    <td align='center'>" . htmlentities($ausr["USUARIO"]) . "</td>
    <td align='center'>" . htmlentities($aper["NOMEP"]) . "</td>
    <td align='center'>" . $data. "</td>
  </tr>    
</table>

<br>" . htmlentities($amural["TEXTO"]) . "

<br><hr>";

}

?>
<img src="img/rodapeprincipal.png" width="599" height="45">
</div>

<div class="lateral">


</div>



</body>
</html>
