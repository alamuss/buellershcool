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

<div class="lateral"></div>

<div class="topo">

</div>

<div class="cabeca">

<table width="100%" border="0">
  <tr>
    <th scope="col"><a href="index.php">In�cio</a></th>
    <th scope="col"><a href="ranking.php">Ranking</a></th>
    <th scope="col"><a href="regras.php">Ajuda</a></th>
  </tr>
</table>


</div>

<div class="corpo">

 <?php

     if (isset($_GET["erro"]) && $_GET["erro"] == "nd" ) {
        echo "<p align='center'><font color='#000'> J� existe um personagem com esse nome! </font></p>" ;
     }
     
     if (isset($_GET["erro"]) && $_GET["erro"] == "v" ) {
        echo "<p align='center'><font color='#000'> Algum erro aconteceu, tente outra vez! </font></p>" ;
     }
	 
?>

Crie seu personagem

<form action="inspersonagem.php" method="post" name="formp">

  <p>Escolha um nome para o seu personagem:
    <br>
    <input name="nomep" type="text">
    <br><br>
    Escolha o sexo do seu personagem:
    <br>
    <input name="sexo" type="radio" value="M" checked>Masculino <br>
    <input name="sexo" type="radio" value="F">Feminino <br><br>
    Escolha uma imagem para o seu personagem:
      <table border="0" width="100%">
  	<tr>
    <td><input name="avat" type="radio" value="001.png" checked/><img width="64" height="64" src="avat/001.png" /></td>
    <td><input name="avat" type="radio" value="002.png" /><img width="64" height="64" src="avat/002.png" /></td> 
    <td><input name="avat" type="radio" value="003.png" /><img width="64" height="64" src="avat/003.png" /></td>
    <td><input name="avat" type="radio" value="101.png" /><img width="64" height="64" src="avat/101.png" /></td>
    <td><input name="avat" type="radio" value="102.png" /><img width="64" height="64" src="avat/102.png" /></td> 
    <td><input name="avat" type="radio" value="103.png" /><img width="64" height="64" src="avat/103.png" /></td>
    </tr>
    <tr>
    <td><input name="avat" type="radio" value="004.png" /><img width="64" height="64" src="avat/004.png" /></td>
    <td><input name="avat" type="radio" value="005.png" /><img width="64" height="64" src="avat/005.png" /></td> 
    <td><input name="avat" type="radio" value="006.png" /><img width="64" height="64" src="avat/006.png" /></td>
    <td><input name="avat" type="radio" value="104.png" /><img width="64" height="64" src="avat/104.png" /></td>
    <td><input name="avat" type="radio" value="105.png" /><img width="64" height="64" src="avat/105.png" /></td> 
    <td><input name="avat" type="radio" value="106.png" /><img width="64" height="64" src="avat/106.png" /></td>
    </tr>
    <tr>
    <td><input name="avat" type="radio" value="007.png" /><img width="64" height="64" src="avat/007.png" /></td>
    <td><input name="avat" type="radio" value="008.png" /><img width="64" height="64" src="avat/008.png" /></td> 
    <td><input name="avat" type="radio" value="009.png" /><img width="64" height="64" src="avat/009.png" /></td>
    <td><input name="avat" type="radio" value="107.png" /><img width="64" height="64" src="avat/107.png" /></td>
    <td><input name="avat" type="radio" value="108.png" /><img width="64" height="64" src="avat/108.png" /></td>
    <td><input name="avat" type="radio" value="109.png" /><img width="64" height="64" src="avat/109.png" /></td>
    </tr>
     <tr>
    <td><input name="avat" type="radio" value="010.png" /><img width="64" height="64" src="avat/010.png" /></td>
    <td><input name="avat" type="radio" value="011.png" /><img width="64" height="64" src="avat/011.png" /></td> 
    <td><input name="avat" type="radio" value="012.png" /><img width="64" height="64" src="avat/012.png" /></td>
    <td><input name="avat" type="radio" value="110.png" /><img width="64" height="64" src="avat/110.png" /></td>
    <td><input name="avat" type="radio" value="111.png" /><img width="64" height="64" src="avat/111.png" /></td>
    <td><input name="avat" type="radio" value="112.png" /><img width="64" height="64" src="avat/112.png" /></td>
    </tr>
     <tr>
    <td><input name="avat" type="radio" value="013.png" /><img width="64" height="64" src="avat/013.png" /></td>
    <td><input name="avat" type="radio" value="014.png" /><img width="64" height="64" src="avat/014.png" /></td> 
    <td><input name="avat" type="radio" value="015.png" /><img width="64" height="64" src="avat/015.png" /></td>
    <td><input name="avat" type="radio" value="113.png" /><img width="64" height="64" src="avat/113.png" /></td>
    <td><input name="avat" type="radio" value="114.png" /><img width="64" height="64" src="avat/114.png" /></td>
    <td><input name="avat" type="radio" value="115.png" /><img width="64" height="64" src="avat/115.png" /></td>
    </tr>
     <tr>
    <td><input name="avat" type="radio" value="016.png" /><img width="64" height="64" src="avat/016.png" /></td>
    <td><input name="avat" type="radio" value="017.png" /><img width="64" height="64" src="avat/017.png" /></td> 
    <td><input name="avat" type="radio" value="018.png" /><img width="64" height="64" src="avat/018.png" /></td>
    <td><input name="avat" type="radio" value="116.png" /><img width="64" height="64" src="avat/116.png" /></td>
    <td><input name="avat" type="radio" value="117.png" /><img width="64" height="64" src="avat/117.png" /></td>
    <td><input name="avat" type="radio" value="118.png" /><img width="64" height="64" src="avat/118.png" /></td>
    </tr>
     <tr>
    <td><input name="avat" type="radio" value="019.png" /><img width="64" height="64" src="avat/019.png" /></td>
    <td><input name="avat" type="radio" value="020.png" /><img width="64" height="64" src="avat/020.png" /></td> 
    <td><input name="avat" type="radio" value="021.png" /><img width="64" height="64" src="avat/021.png" /></td>
    <td><input name="avat" type="radio" value="119.png" /><img width="64" height="64" src="avat/119.png" /></td>
    <td><input name="avat" type="radio" value="120.png" /><img width="64" height="64" src="avat/120.png" /></td>
    <td><input name="avat" type="radio" value="121.png" /><img width="64" height="64" src="avat/121.png" /></td>
    </tr>
   </table>
	
	<p>Todos os personagens come�am no jogo com o mesmo valor em cada atrubutos. Os dados preenchidos aqui n�o ir�o interferir no futuro de seu personagem, mas eles n&atilde;o poder&atilde;o mais ser trocados.</p>

<p><input name="btn" type="button" value="Confirmar" onClick="validap()"></p>

	 
</form>

</div>

</body>
</html>

<script language="javascript">

	function validap() {
		
		if (document.formp.nomep.value == "") {
			alert("Nome do Personagem � um campo obrigat�rio");
		} else {
			if (document.formp.sexo[0].checked == true || document.formp.sexo[1].checked == true) {
				document.formp.submit();
			} else {
				alert("Sexo do Personagem � um campo obrigat�rio");
			}
		}	
	}

</script>
