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
    <th scope="col"><a href="index.php">In�cio</a></th>
    <th scope="col"><a href="ranking.php">Ranking</a></th>
    <th scope="col"><a href="regras.php">Ajuda</a></th>
  </tr>
</table>


</div>

<div class="lateral"></div>

<div class="corpo">
<?php

     if (isset($_GET["erro"]) && $_GET["erro"] == "nd" ) {
        echo "<p align='center'><font color='#000'> Esse nome de usu�rio j� existe! </font></p>" ;
     }
	 
	 if (isset($_GET["erro"]) && $_GET["erro"] == "ed" ) {
        echo "<p align='center'><font color='#000'> Esse e-mail j� existe! </font></p>" ;
     }
     
     if (isset($_GET["erro"]) && $_GET["erro"] == "bd" ) {
        echo "<p align='center'><font color='#000'> Houve algum erro. Tente novamente. </font></p>" ;
     }
	 
?>

<h4>
  <p align="center">Preencha os campos abaixo e clique em "Cadastrar" para realizar seu cadastro. Todos os campos s�o obrigat�rios.</p></h4>

<form method="POST" action="instusr.php" id="form" name="form">

      <table border="0" width="100%">
             <tr>
                 <td>Nome</td>
                 <td><input type="text" size="20" name="nome"></td>
             </tr>
             <tr>
                 <td>Cidade</td>
                 <td><input type="text" size="40" name="cidade"></td>
             </tr>
             <tr>
                 <td>Pais</td>
                 <td><input type="text" size="30" name="pais" id="pais"></td>
             </tr>
             <tr>
                 <td>Usu�rio</td>
                 <td><input type="text" size="40" name="usuario" id="usuario"></td>
             </tr>
             <tr>
                 <td>Senha</td>
                 <td><input type="password" size="15" name="senha" id="senha"></td>
             </tr>
             <tr>
                 <td>Confirmar Senha</td>
                 <td><input type="password" size="15" name="csenha" id="csenha"></td>
             </tr>
             <tr>
                 <td>E-mail</td>
                 <td><input type="text" size="20" name="email"></td>
             </tr>
			 <tr>
			 	 <td align="right"><input name="regras" type="checkbox" value="v" id="chbox"></td>
				 <td>Li e concordo com as <a href="regras.php" target="_blank">regras do jogo</a>.</td>
			</tr>	 
			 <tr>
                 <td><input type="button" value="Cadastrar" onClick="valida()"></td>
             </tr>
       </table>
	   
	   

</form>

</div>

</body>

</html>

<script language="javascript">
	function valida() {
		
		if (document.form.nome.value == "") {
			alert("Nome � um campo obrigat�rio");
		} else {
			if (document.form.cidade.value == "") {
				alert("Cidade � um campo obrigat�rio");
			} else {				
				if (document.form.pais.value == "") {
					alert("Pais � um campo obrigat�rio"); 
				} else {
					if (document.form.email.value == "") {
						alert("E-mail � um campo obrigat�rio");
					} else {
						if (document.form.usuario.value == "") {
							alert("Usu�rio � um campo obrigat�rio");
						} else {
							if (document.form.senha.value == "") {
								alert("Senha � um campo obrigat�rio");
							} else {
								if (document.form.senha.value != document.form.csenha.value) {
									alert("Confirme a Senha");
								} else {
									if (document.form.chbox.checked != true) {
										alert ("Confirme os termos de servi�o");
									} else {
										var exr = /^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
										var str = document.form.email.value;
										if (exr.test(str)) {
											document.form.submit();
										} else {
											alert ("E-Mail inv�lido");
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}

</script>
