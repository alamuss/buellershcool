<html>

<head>
<title>BUELLER SCHOOL</title>
<link href="layout.css" rel="stylesheet" type="text/css">
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">-->
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

<div class="topo">

</div>

<div class="cabeca">

<table width="100%" border="0">
  <tr>
    <th scope="col"><a href="index.php">Início</a></th>
    <th scope="col"><a href="ranking.php">Ranking</a></th>
    <th scope="col"><a href="regras.php">Ajuda</a></th>
  </tr>
</table>


</div>

<div class="corpo">
<img src="img/superiorprincipal.png" width="599" height="45">
<p>
  <?php

     if (isset($_GET["cad"]) && $_GET["cad"] == "v" ) {
        echo "<p align='center'><font color='#000'> Cadastro realizado com sucesso! </font></p>" ;
     }
     
     if (isset($_GET["erro"]) && $_GET["erro"] == "v" ) {
        echo "<p align='center'><font color='#000'> Usuário ou Senha inválidos! </font></p>" ;
     }
	 if (isset($_GET["round"]) && $_GET["round"] == "n" ) {
        echo "<p align='center'><font color='#000'> O Round ainda não começou!<br>O acesso só estará liberado após o início do round, as ". date("G:i",1253419200) . " do dia " . date("d/m/Y",1253419200) .  "</font></p>" ;
     }

?>
  
</p>
  <p align="center"><b>Bem-vindo à Bueller School</b></p>
  
 <p>Bueller School é um jogo onde você assume o papel de um aluno muito louco aprontando altas aventuras nessa escola da pesada, e com uma turminha do barulho.
 <p>Vá as aulas, converse com seus amigos (ou não), compre coisas, brigue .... por seus objetivos, coma, durma e seja o mais popular entre os populares.
 <p>Na Bueller School sempre há vagas para a diversão. Matricule-se agora mesmo clicando em <a href="cadusr.php">"Matricular-se"</a> no menu ao lado. 
  <br><br>
  <p align="center">Estamos no Round Beta 2 - Agora são: <?php $agora = date("G:i", time()); echo $agora; ?> do dia <?php $dia = date("d/m/Y",time()); echo $dia; ?>
<hr>
<p align="center"><B>Atualizações</B></p>
<p>17/09/2009 - Novidades da nova versão:</p>
- Novo design.<br>
- Ilustrações.<br>
- Perfil do Personagem.<br>
- Mensagem privada in-game.<br>
- Quests só disponíveis na semana em que serão realizadas.<br>
- Redução do tempo de descanso, de 6 para 3 horas.<br>
- Inclusão de novo atributo: Destreza.<br>
<hr>
<p align="center">Desenvolvido por Remanescentes do Porco Zio - Versão Beta - e-mail: contato@buellerschool.com.br</p>
<p align="center">Orkut: http://www.orkut.com.br/Main#Community?cmm=92295867</p>
<img src="img/rodapeprincipal.png" width="599" height="45"> 
</div>

<div class="lateral">
<img src="img/superiorlateral.png" width="167" height="20"> 
<form action="vuser.php" method="post" name="login">


Usuário: <input name="usuario" type="text" /><br>
Senha: <input name="senha" type="password" />

<br><br>

<input name="bt" type="button" value="Entrar" onClick="validacampo()">


</form>

<a href="cadusr.php">Matricular-se</a>

<br><br>
<img src="img/rodapelateral.png" width="167" height="20">
</div>

</body>

</html>

<script language="javascript">

function validacampo() {
	if (document.login.usuario.value == "") {
		alert("Campo Usuï¿½rio está em branco!");
	} else { 
		if (document.login.senha.value == "") {
			alert("Campo Senha está em branco!");
		} else {
			document.login.submit();
		}
	}
}
</script>