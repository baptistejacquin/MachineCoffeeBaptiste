<?php
include "fonction.php"; //// Inclure un document php
include "config-ini.php";
$bdd = new PDO ('mysql:host=localhost;dbname=machinecoffee',$user,$pass);

$insert = 0;////////Variable pour la monnaie insérée

?>

<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 	stockSucre();
		updateIngStock();?>
	<H1>Machine à Café</H1>
	<?= date("l,j,F,Y H i A");?> <!-- Affichage de l'heure -->
	<h2> Liste des boissons</h2>
	<?= "Monnaie insérée : ".$insert;?>
	<h3> Boissons disponible</h3>

	<form method="POST" name="Formumlaire">
		<div>
			<?php radioBoisson($bdd); ?><!-- Formulaire pour les boissons -->
	  	</div>
  		  <p>Veuillez choisir votre nombre de Sucre :</p><!-- Formulaire pour le sucre -->
		  <div>
		    <?php afficheSucre(); ?><!-- Formulaire pour le sucre -->
		  </div>
		  <div>
		    <br><button type="submit">Commander</button>
		  </div>
		</form>
	</div><br>
	<div>
		<ul>
		<?php

		echo recette();
		echo sucre();
		
		
		?>
		</ul>
	</div>
</body>
</html>
