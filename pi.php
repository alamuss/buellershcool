<form action="perfil.php?p=i" method="post" id="form1" name="form1">

<p>Alterar Imagem</p>

  <table border="0" width="100%">
  	<tr>
    <td><input name="avat" type="radio" value="001.png" /><img width="64" height="64" src="avat/001.png" /></td>
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

<input name="" type="submit" value="Alterar" />   
   
</form>

<?php

if (isset($_POST["avat"])) {
	$sup = "update personagem set IMG = '$_POST[avat]' where CODIGOP = '$_SESSION[usuario]'";
	if (mysql_query($sup)) {
		echo "<p align='center'><font color='#000'> Alterado com sucesso. </font></p>";
	} else {
		echo "<p align='center'><font color='#000'> Houve algum erro. </font></p>";
	}
}

?>