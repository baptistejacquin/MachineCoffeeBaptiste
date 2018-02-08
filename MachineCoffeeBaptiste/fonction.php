<?php

$insert = 0;////////Variable pour la monnaie insérée

function recette (){
	$message="";
	$fin = "";
	$nom = "";
	global $bdd;
	if (isset($_POST["boisson"]) && isset($_POST["Sucre"])) { //////// isset(); Détermine si une variable est définie et est différente de NULL.
		$roquette = $bdd-> prepare("SELECT ingredients.nom as 'nom', recette.nb_doses as 'dose', boisson.nom as 'test'
							 FROM recette
							 INNER JOIN ingredients ON recette.Ingredients_Code = ingredients.Code
							 INNER JOIN boisson ON recette.Boisson_Code = boisson.Code
							 WHERE Boisson_Code = '".$_POST['boisson']."'");	
		$roquette -> execute(array($_POST['boisson']));
		while ($donnees = $roquette->fetch()) {
				$nom = $donnees['test'];
				$message =$message.'<li>'.$donnees['nom']." : ".$donnees['dose'].'</li>';
		}
		$fin = "<p>".$nom."<ul>".$message;
	}else{
		$fin = "Veuillez séléctionner la boisson et le sucre !";
	}
	return $fin;
};




function radioBoisson($database){
	$reponse = $database->query("SELECT boisson.nom as 'dispos',boisson.Code as 'code'
						FROM `boisson`
						INNER JOIN recette ON boisson.Code = recette.Boisson_Code
						INNER JOIN ingredients ON recette.Ingredients_Code = ingredients.Code
						GROUP BY boisson.nom  HAVING min((ingredients.stock >= nb_doses))=1");

	while ($donnees = $reponse->fetch()) {
			echo '<input type="radio" name = "boisson" value ="'.$donnees['code'].'">'.$donnees['dispos'].'</>';
		}
};


function sucre(){
	global $bdd;
	$sucre = "";
	if (isset($_POST["boisson"]) && isset($_POST["Sucre"])) {
		$sucre = "<li> Sucre : ".$_POST["Sucre"]."</li></ul></p>";
	}
	return $sucre;
};

function choixSucre(){
    global $bdd;
    $nbsugar = 0;

    $reponse = $bdd->query('SELECT ingredients.stock FROM ingredients
    WHERE ingredients.Code = 4');
    $donnees = $reponse->fetch();
    $nbsugar = $donnees['stock'];
    return $nbsugar;
};


function afficheSucre(){
    $nbsucre = choixSucre();

for ($i=0; $i <= $nbsucre && $i <= 5; $i++) {
    echo '<input type="radio" name="Sucre" value="'.$i.'">'.$i;
    }
};

function stockSucre(){
	global $bdd;
	if (isset($_POST["boisson"]) && isset($_POST["Sucre"])) {
		$sucre = $_POST["Sucre"];
		$roquette = $bdd-> prepare("UPDATE ingredients
									SET stock = stock - ?
									WHERE ingredients.nom = 'Sucre'");
		$roquette -> execute(array($sucre));
	}
};

function updateIngStock(){
	global $bdd;
	if (isset($_POST['boisson']) && isset($_POST['Sucre'])) {
		$boisson= $_POST['boisson'];
		$requete=$bdd->prepare('SELECT recette.Ingredients_Code as "ingredient", nb_doses
						FROM recette
						INNER JOIN ingredients ON recette.Ingredients_Code = ingredients.Code
						INNER JOIN boisson on recette.Boisson_Code = boisson.Code
						WHERE recette.Boisson_Code = ?');
		$requete->execute(array($boisson));
		while($donnees = $requete->fetch()){
			$ingredient= $donnees['ingredient'];
			$quantite= $donnees['nb_doses'];
    		$requetes= $bdd->prepare('UPDATE ingredients
									SET stock = stock - ?
									WHERE ingredients.Code = ?');
    		$requetes->execute(array($quantite, $ingredient));
    	}
    	$requete->closeCursor();
	}
}

// function stockRecette(){
// 	global $bdd;
// 	if (isset($_POST["boisson"]) && isset($_POST["Sucre"])) {
// 		$boisson = $_POST["boisson"];
// 		$roquette = $bdd-> prepare("SELECT recette.ingredients_Code
// 									FROM ");

// 		$roquette -> execute(array($sucre));
// 	}
// }

?>
