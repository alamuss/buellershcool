<form action="config.php?c=u" method="post">

<p>Trocar Status no Underground</p>

  <table border="0" width="100%">
  		<tr>	
            <td>Escolher Status</td>
        	<td><select name="status">
            	<option value="0">N&atilde;o participar do Underground</option>
                <option value="1">Participar do Underground</option>
                </select></td>
        </tr>
		<tr>
             <td><input name="Submit" type="submit" value="Alterar"></td>
    </tr>
   </table>
</form>

<?php

if (isset($_POST["status"])) {
	if($_POST["status"] == 0) {
		$stsnao = "update personagem set UNDER = 'N' where CODIGOP = $_SESSION[usuario]";
		if (mysql_query($stsnao)) {
			echo "<p align='center'><font color='#000'> Status alterado com sucesso. Você não está no Underground </font></p>";
		} else {
			echo "<p align='center'><font color='#000'> Houve algum erro. </font></p>";
		}
	}
	if($_POST["status"] == 1) {
		$stssim = "update personagem set UNDER = 'S' where CODIGOP = $_SESSION[usuario]";
		if (mysql_query($stssim)) {
			echo "<p align='center'><font color='#000'> Status alterado com sucesso. Você está no Underground </font></p>";
		} else {
			echo "<p align='center'><font color='#000'> Houve algum erro. </font></p>";
		}
	}
}

?>