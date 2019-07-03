<form action="config.php?c=e" method="post" id="form2" name="form2">

<p>Trocar E-mail</p>

  <table border="0" width="100%">
  		<tr>	
            <td>Novo E-mail</td>
        	<td><input type="text" size="45" name="novomail" id="novomail"> </td>
        </tr>
        <tr>
             <td><input type="button" value="Alterar" onClick="valida2()"></td>
    </tr>
   </table>
<p>OBS: Use sempre um e-mail v&aacute;lido, pois ele &eacute; mais uma forma de contato que os administradores do jogo tem com voc&ecirc;.</p>
</form>

<?php

if (isset($_POST["novomail"])) {
	$trocamail = "update usuarios set EMAIL = '$_POST[novomail]' where CODIGO = $_SESSION[usuario]";
	if (mysql_query($trocamail)) {
		echo "<p align='center'><font color='#000'> Alterado com sucesso. </font></p>";
	} else {
		echo "<p align='center'><font color='#000'> Houve algum erro. </font></p>";
	}
}

?>