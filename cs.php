<form action="config.php?c=s" method="post" id="form" name="form">

<p>Trocar Senha</p>

  <table border="0" width="100%">
  		<tr>	
            <td>Senha Atual</td>
        	<td><input type="password" size="15" name="senhaatual" id="senhaatual"> </td>
        </tr>
        <tr>
            <td>Nova Senha</td>
            <td><input type="password" size="15" name="novasenha" id="novasenha"> (m&aacute;x. 15 caracteres)</td>
        </tr>
        <tr>
            <td>Confrimar Nova Senha</td>
            <td><input type="password" size="15" name="cnovasenha" id="cnovasenha"></td>
        </tr>
         <tr>
            <td><input type="button" value="Alterar" onClick="valida()"></td>
         </tr>
   </table>

</form>

<?php

if (isset($_POST["senhaatual"])) {
	if (md5($_POST["senhaatual"]) == $ausr["SENHA"]) {
		if (isset($_POST["novasenha"])) {
			$pass = md5($_POST["novasenha"]);
			$trocasenha = "update usuarios set SENHA = '$pass' where CODIGO = $_SESSION[usuario]";
			if (mysql_query($trocasenha)) {
				echo "<p align='center'><font color='#000'> Alterado com sucesso. </font></p>";
			} else {
				echo "<p align='center'><font color='#000'> Houve algum erro. </font></p>";
			}
		}
	} else {
		echo "<p align='center'><font color='#000'> Senha atual incorreta! </font></p>";
	}
}
?>