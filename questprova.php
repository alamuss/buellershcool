<?php

if (time() >= $p1i && time() < $p1f) {
	if ($ausr["QUEST"] == "provu") {
		echo " Você já fez essa prova";
	} else {
		
		$tot = $ausr["APARENCIA"] + $ausr["FORCA"];
		if ($ausr["INTELIGENCIA"] > $tot) {
			$nr = rand(900,1000);
			$nota = $nr / 100;
			$npop = $ausr["POPULARIDADE"] + 500;
			$update = "update personagem set POPULARIDADE = $npop, 
											QUEST = 'provu',
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
			mysql_query($update);								
			echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
		} else {
			if ($ausr["INTELIGENCIA"] >= $ausr["APARENCIA"] && $ausr["INTELIGENCIA"] >= $ausr["FORCA"]) {
				$nr = rand(600,899);
				$nota = $nr / 100;
				$npop = $ausr["POPULARIDADE"] + 300;
				$update = "update personagem set POPULARIDADE = $npop, QUEST = 'provu', 
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
				mysql_query($update);								
				echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
			} else {
				if ($ausr["INTELIGENCIA"] >= $ausr["APARENCIA"] || $ausr["INTELIGENCIA"] >= $ausr["FORCA"]) {
					$nr = rand(500,599);
					$nota = $nr / 100;
					$npop = $ausr["POPULARIDADE"] + 100;
					$update = "update personagem set POPULARIDADE = $npop, QUEST = 'provu', 
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
					mysql_query($update);								
					echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
				} else {
					if ($ausr["INTELIGENCIA"] < $ausr["APARENCIA"] && $ausr["INTELIGENCIA"] < $ausr["FORCA"] &&  $ausr["INTELIGENCIA"] > 0 ) {
						$nr = rand(300,499);
						$nota = $nr / 100;
						$npop = $ausr["POPULARIDADE"] - 40;
						$update = "update personagem set POPULARIDADE = $npop, QUEST = 'provu', 
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
						mysql_query($update);								
						echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
					} else {	
					if ($ausr["INTELIGENCIA"] <= 0 ) {
						$nr = rand(1,299);
						$nota = $nr / 100;
						$npop = $ausr["POPULARIDADE"] - 80;
						$update = "update personagem set POPULARIDADE = $npop, QUEST = 'provu', 
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
						mysql_query($update);								
						echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
						
						}	
					}
				}
			}
		}
			
	}
}

if (time() >= $p2i && time() < $p2f) {
	if ($ausr["QUEST"] == "provd") {
		echo " Você já fez essa prova";
	} else {
		
		$tot = $ausr["APARENCIA"] + $ausr["FORCA"];
		if ($ausr["INTELIGENCIA"] > $tot) {
			$nr = rand(900,1000);
			echo $nr;
			$nota = $nr / 100;
			$npop = $ausr["POPULARIDADE"] + 1000;
			$update = "update personagem set POPULARIDADE = $npop, 
											QUEST = 'provd',
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
			mysql_query($update);								
			echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
		} else {
			if ($ausr["INTELIGENCIA"] >= $ausr["APARENCIA"] && $ausr["INTELIGENCIA"] >= $ausr["FORCA"]) {
				$nr = rand(600,899);
				$nota = $nr / 100;
				$npop = $ausr["POPULARIDADE"] + 600;
				$update = "update personagem set POPULARIDADE = $npop, QUEST = 'provd', 
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
				mysql_query($update);								
				echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
			} else {
				if ($ausr["INTELIGENCIA"] >= $ausr["APARENCIA"] || $ausr["INTELIGENCIA"] >= $ausr["FORCA"]) {
					$nr = rand(500,599);
					$nota = $nr / 100;
					$npop = $ausr["POPULARIDADE"] + 200;
					$update = "update personagem set POPULARIDADE = $npop, QUEST = 'provd', 
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
					mysql_query($update);								
					echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
				} else {
					if ($ausr["INTELIGENCIA"] < $ausr["APARENCIA"] && $ausr["INTELIGENCIA"] < $ausr["FORCA"] &&  $ausr["INTELIGENCIA"] > 0 ) {
						$nr = rand(300,499);
						$nota = $nr / 100;
						$npop = $ausr["POPULARIDADE"] - 100;
						$update = "update personagem set POPULARIDADE = $npop, QUEST = 'provd', 
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
						mysql_query($update);								
						echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
					} else {	
					if ($ausr["INTELIGENCIA"] <= 0 ) {
						$nr = rand(1,299);
						$nota = $nr / 100;
						$npop = $ausr["POPULARIDADE"] - 200;
						$update = "update personagem set POPULARIDADE = $npop, QUEST = 'provd', 
											NOTA = $nota where CODIGOP = $_SESSION[usuario]";
						mysql_query($update);								
						echo "A nota de " . $ausr["NOMEP"] . " foi: " . $nota;
						
						}	
					}
				}
			}
		}
			
	}
}

?>
