<?php

$susr = "select * from personagem where CODIGOP = $_SESSION[usuario]";
$qusr = mysql_query($susr);
$ausr = mysql_fetch_array($qusr);

$sadv = "select * from personagem where UNDER = 'S' and CODIGOP != $_SESSION[usuario]";
$qadv = mysql_query($sadv);
?>

<form action="underground.php?u=b" method="post">
Selecione o Oponente.<br><br>
<select name="briga">
<?php
while ($aadv = mysql_fetch_array($qadv)) {
echo "<option value='".$aadv['CODIGOP']."'>".$aadv['NOMEP']."</option>";
}
?>
</select>

<input name="" type="submit" value="Brigar">

<br /><br />

<?php

		require_once('recaptchalib.php');
		$publickey = "6LcmYAcAAAAAAOgxclXAceACSs_bbbMQkdKf72or";
		$privatekey = "6LcmYAcAAAAAAOzbS3QgkIP_UtM9OVYEiZTA3bly";
		
		$resp = null;
		$error = null;

echo recaptcha_get_html($publickey, $error);
echo "<br><br>";

if ($ausr["UNDER"] == 'S') {

	if(isset($_POST["briga"])) {
		
		$resp = recaptcha_check_answer ($privatekey,
                                  $_SERVER["REMOTE_ADDR"],
                                  $_POST["recaptcha_challenge_field"],
                                  $_POST["recaptcha_response_field"]);

  		if ($resp->is_valid) {
		
		$sadvb = "select * from personagem where CODIGOP = $_POST[briga]";
		$qadvb = mysql_query($sadvb);
		$aadvb = mysql_fetch_array($qadvb);
		
		$valorusr = (($ausr["FORCA"] * 7) + ($ausr["INTELIGENCIA"] * 1) + ($ausr["DESTREZA"] * 2)) / 10;
		$valoradv = (($aadvb["FORCA"] * 7) + ($aadvb["INTELIGENCIA"] * 1) + ($aadvb["DESTREZA"] * 2)) / 10;
		
		if ($valorusr > $valoradv) {
			$isnt = "insert into underground (PERSONAGEM, ADVERSARIO, RESULTADO)
									values ($ausr[CODIGOP], $aadvb[CODIGOP], 'venceu')";
			$npv = $ausr["UV"] + 1;						
			$uusr = "update personagem set UV = $npv where CODIGOP = $ausr[CODIGOP]";
			$nav = $aadvb["UD"] + 1;
			$uadv = "update personagem set UD = $nav where CODIGOP = $aadvb[CODIGOP]";
			mysql_query($isnt);
			mysql_query($uusr);
			mysql_query($uadv);
			echo $ausr["NOMEP"] . " brigou com " . $aadvb["NOMEP"] . " e venceu a briga!";
		} else {
			$isnt = "insert into underground (PERSONAGEM, ADVERSARIO, RESULTADO)
									values ($ausr[CODIGOP], $aadvb[CODIGOP], 'perdeu')";
			$npv = $ausr["UD"] + 1;						
			$uusr = "update personagem set UD = $npv where CODIGOP = $ausr[CODIGOP]";
			$nav = $aadvb["UV"] + 1;
			$uadv = "update personagem set UV = $nav where CODIGOP = $aadvb[CODIGOP]";
			mysql_query($isnt);
			mysql_query($uusr);
			mysql_query($uadv);
			echo $ausr["NOMEP"] . " brigou com " . $aadvb["NOMEP"] . " mas perdeu a briga!";
	
		}
		} else {
    		$error = $resp->error;
  		}
	}
} else {
	echo "Você não pode brigar porque não participa do Underground. Vá até a página de configuração de usuário e escolha 'Trocar Status no Underground'";
}

?>

</form>