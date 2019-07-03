<form action="config.php?c=c" method="post">

<p>Trocar Cidade e Pais</p>

  <table border="0" width="100%">
  		<tr>	
            <td>Nova Cidade</td>
        	<td><input type="text" size="30" name="novacidade" id="novacidade"> </td>
        </tr>
        <tr>	
            <td>Novo Pais</td>
        	<td><input type="text" size="30" name="novopais" id="novopais"> </td>
        </tr>
<tr>
             <td><input name="Submit" type="submit" value="Alterar"></td>
    </tr>
   </table>
</form>

<?php

if (isset($_POST["novacidade"]) && isset($_POST["novopais"])) {
	if($_POST["novacidade"] == "" && $_POST["novopais"] != "") {
		$trocapais = "update usuarios set PAIS = '$_POST[novopais]' where CODIGO = $_SESSION[usuario]";
		if (mysql_query($trocapais)) {
			echo "<p align='center'><font color='#000'> Pais alterado com sucesso. </font></p>";
		} else {
			echo "<p align='center'><font color='#000'> Houve algum erro. </font></p>";
		}
	}
	if($_POST["novopais"] == "" && $_POST["novacidade"] != "") {
		$trocacidade = "update usuarios set CIDADE = '$_POST[novacidade]' where CODIGO = $_SESSION[usuario]";
		if (mysql_query($trocacidade)) {
			echo "<p align='center'><font color='#000'> Cidade alterada com sucesso. </font></p>";
		} else {
			echo "<p align='center'><font color='#000'> Houve algum erro. </font></p>";
		}
	}
	if($_POST["novopais"] != "" && $_POST["novacidade"] != "") {	
		$trocacidpas = "update usuarios set CIDADE = '$_POST[novacidade]',
											PAIS = '$_POST[novopais]' where CODIGO = $_SESSION[usuario]";
		if (mysql_query($trocacidpas)) {
			echo "<p align='center'><font color='#000'> Cidade e Pais alterados com sucesso. </font></p>";
		} else {
			echo "<p align='center'><font color='#000'> Houve algum erro. </font></p>";
		}
	}
}

?>