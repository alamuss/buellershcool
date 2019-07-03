<?php
session_start();

if ($_SESSION["usuario"] == "") {
	echo "Você não tem autorização para acessar essa página!";
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
<img src="img/config.png" width="599" height="45">
<?php

$susr = "select * from usuarios where CODIGO = '$_SESSION[usuario]'";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);

if (isset($_GET["c"])) {
	echo "";
} else {
	echo "Olá " . $ausr["NOME"] . " escolha uma das opções ao lado.<br><br>
	Seus dados atuais são:<br>
	Nome: " . $ausr["NOME"] . "<br>
	Usuário: " . $ausr["USUARIO"] . "<br>
	Cidade: " . $ausr["CIDADE"] . "<br>
	Pais: " . $ausr["PAIS"] . "<br>
	E-mail: " . $ausr["EMAIL"];
}

	if (isset($_GET["c"]) && $_GET["c"] == "s") {
		include "cs.php";
	}
	if (isset($_GET["c"]) && $_GET["c"] == "e") {
		include "ce.php";
	}
	if (isset($_GET["c"]) && $_GET["c"] == "c") {
		include "cc.php";
	}
	if (isset($_GET["c"]) && $_GET["c"] == "u") {
		include "cu.php";
	}

?>
<img src="img/rodapeprincipal.png" width="599" height="45">
</div>

<div class="lateral">
<img src="img/superiorlateral.png" width="167" height="20"> 
<a href="config.php?c=s">Trocar Senha</a><br>
<a href="config.php?c=e">Trocar E-mail</a><br>
<a href="config.php?c=c">Trocar Cidade e Pais</a><br>
<a href="config.php?c=u">Trocar Status no Underground</a><br>
<img src="img/rodapelateral.png" width="167" height="20">
</div>

</body>
</html>

<script language="javascript">
	function valida() {
		
		if (document.form.senhaatual.value == "") {
			alert("Senha Atual está em branco");
		} else {
			if (document.form.novasenha.value == "") {
				alert("Nova Senha está em branco"); 
			} else {
				if (document.form.cnovasenha.value == "") {
					alert("Confirmar Nova Senha está em branco");
				} else {
					if (document.form.novasenha.value != document.form.cnovasenha.value) {
						alert("As novas senhas estão diferentes");
					} else {
						document.form.submit();
					}
				}
			}
		}
	}

</script>

<script language="javascript">
	function valida2() {
		if (document.form2.novomail.value == "") {
			alert("E-mail não pode estar em branco");
		} else {
			var exr = /^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
			var str = document.form2.novomail.value;
			if (exr.test(str)) {
				document.form2.submit();
			} else {
				alert ("E-Mail inválido");
			}
		}
	}
</script>	
