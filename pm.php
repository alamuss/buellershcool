<form action="perfil.php?p=m" method="post" id="form" name="form">

<p>Alterar Mensagem Pessoal</p>

  <table border="0" width="100%">
  		<tr>	
            <td>Nova Mensagem</td>
        	<td><input type="text" size="45" name="nmsg" id="nmsg"> </td>
        </tr>
        <tr>
             <td><input name="" type="submit" value="Alterar"></td>
    </tr>
   </table>
</form>

<?php

if (isset($_POST["nmsg"])) {
	$msg = "update personagem set MSG = '$_POST[nmsg]' where CODIGOP = $_SESSION[usuario]";
	if (mysql_query($msg)) {
		echo "<p align='center'><font color='#000'> Alterado com sucesso. </font></p>";
	} else {
		echo "<p align='center'><font color='#000'> Houve algum erro. </font></p>";
	}
}

?>