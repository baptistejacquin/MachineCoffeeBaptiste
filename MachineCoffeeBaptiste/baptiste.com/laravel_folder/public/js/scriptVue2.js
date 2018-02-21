
//Fonction permettant d'allumer la led lorsqu'on click sur le bouton puis de l'éteindre quand on click de nouveau

function selectDrink(doSelect, drink) {
	if(doSelect===true) {

		let $srcImage = $("#btn"+drink).attr('src');

		if ($srcImage==="image_machine/Vue1-assets/Bouton_"+drink+"_etat0.png") {
			resetDrink();
			$("#btn"+drink).attr('src','image_machine/Vue1-assets/Bouton_'+drink+'_etat2.png');
		}
		else if ($srcImage==="image_machine/Vue1-assets/Bouton_"+drink+"_etat1.png"){
			resetDrink();
			$("#btn"+drink).attr('src','image_machine/Vue1-assets/Bouton_'+drink+'_etat2.png');
		}
		else if ($srcImage==="image_machine/Vue1-assets/Bouton_"+drink+"_etat2.png"){
			resetDrink();
			$("#btn"+drink).attr('src','image_machine/Vue1-assets/Bouton_'+drink+'_etat1.png');
		}

	}
}

//Fonction permettant d'allumer la led lorsqu'on survole le bouton puis de l'éteindre quand on leave la zone
function overDrink(doSelect, drink) {
	if(doSelect===true) {
		let $srcImage = $("#btn"+drink).attr('src');
		if ($srcImage==="image_machine/Vue1-assets/Bouton_"+drink+"_etat0.png") {
			$("#btn"+drink).attr('src','image_machine/Vue1-assets/Bouton_'+drink+'_etat1.png');
		}
		else if ($srcImage==="image_machine/Vue1-assets/Bouton_"+drink+"_etat2.png"){
			$("#btn"+drink).attr('src','image_machine/Vue1-assets/Bouton_'+drink+'_etat2.png');
		}
		else if($srcImage==="image_machine/Vue1-assets/Bouton_"+drink+"_etat3.png"){

		}
		else {
			$("#btn"+drink).attr('src','image_machine/Vue1-assets/Bouton_'+drink+'_etat0.png');
		}
	}
}


//Fonction permettant de déselectionner toutes les boissons
function resetDrink() {
	$('#btnExpresso').attr('src','image_machine/Vue1-assets/Bouton_Expresso_etat0.png');
	$('#btnDouble_expresso').attr('src','image_machine/Vue1-assets/Bouton_Double_expresso_etat0.png');
	$('#btncafe_long').attr('src','image_machine/Vue1-assets/Bouton_cafe_long_etat0.png');
	$('#btncappuccino').attr('src','image_machine/Vue1-assets/Bouton_cappuccino_etat0.png');
}

//Fonction permettant d'ajouter du sucre (allumer les leds correspondantes)
function addSugar() {
	$("#AffichageSucre .led-off:first").toggleClass("led-off led-on");
}

//Fonction permettant d'enlever du sucre (éteindre les leds correspondantes)
function removeSugar() {
	$('#AffichageSucre .led-on:last').toggleClass("led-on led-off");
}


//Fonction permettant d'ajouter une pièce
let monnaieInsert=0;
let piecesIntroduites={piece2: {value:2, nb: 0}, piece1 : {value:1, nb:0}, piece50 : {value:0.50, nb:0}, piece20 : {value:0.20, nb:0}, piece10 : {value:0.10, nb:0}, piece5 : {value:0.05, nb:0}};

function addCoin(coin){
    if (coin === 2) {
        monnaieInsert = monnaieInsert + coin;
        piecesIntroduites.piece2.nb = piecesIntroduites.piece2.nb + 1 ;
     }else if (coin === 1) {
        monnaieInsert = monnaieInsert + coin;
        piecesIntroduites.piece1.nb = piecesIntroduites.piece1.nb + 1 ;
    }else if (coin === 0.50) {
        monnaieInsert = monnaieInsert + coin;
        piecesIntroduites.piece50.nb = piecesIntroduites.piece50.nb + 1 ;
    }else if (coin === 0.20) {
        monnaieInsert = monnaieInsert + coin;
        piecesIntroduites.piece20.nb = piecesIntroduites.piece20.nb + 1 ;
    }else if (coin === 0.10) {
        monnaieInsert = monnaieInsert + coin;
        piecesIntroduites.piece10.nb = piecesIntroduites.piece10.nb + 1 ;
    }else if (coin === 0.05) {
        monnaieInsert = monnaieInsert + coin;
        piecesIntroduites.piece5.nb = piecesIntroduites.piece5.nb + 1 ;
    }

    monnaieInsert = (Math.round(monnaieInsert*100))/100;
    return monnaieInsert;
}
//fonction pour mettre à 0 le nombre de pièces introduites
function resetPiecesIntroduites() {
	piecesIntroduites.piece2.nb= 0;
	piecesIntroduites.piece1.nb= 0;
	piecesIntroduites.piece50.nb= 0;
	piecesIntroduites.piece20.nb= 0;
	piecesIntroduites.piece10.nb= 0;
	piecesIntroduites.piece5.nb= 0;
}

//Fonction permettant d'afficher le prix de la boisson
let prix=0;
function prixBoisson(boisson){

	if (boisson==="Expresso") {
		prix=0.30;
	}
	else if (boisson==="Double_expresso") {
		prix=0.60;
	}
	else if (boisson==="cafe_long") {
		prix=0.70;
	}
	else if (boisson==="cappuccino") {
		prix=0.60;
	}
	return prix;
}

//fonction permettant de retourner la monnaie 
function resetCoins(){
	let monnaieRendue = monnaieInsert - prix;
	monnaieRendue = (Math.round(monnaieRendue*100))/100;
	return monnaieRendue;
}

// Fonction hover et click sur pièces

function stylePiece(piece){
	$("#boutonPiece"+piece).mouseenter(function(){
		$(this).attr("src", "image_machine/Vue1-assets/Bouton_piece"+piece+"_etat1.png")
	});

	$("#boutonPiece"+piece).mouseleave(function(){
		$(this).attr("src", "image_machine/Vue1-assets/Bouton_piece"+piece+"_etat0.png")
	});

	$("#boutonPiece"+piece).click(function(){
		$(this).attr("src", "image_machine/Vue1-assets/Bouton_piece"+piece+"_etat2.png")
	});
}


//Fonction pour afficher l'image de la boisson sélectionnée
function imageBoisson(boisson) {
	$('#tasse').show();
	$('#tasse').attr('src','image_machine/Vue1-assets/'+boisson+'.png');
}


//Fonction vérifiant si l'utilisateur a ajouté assez de monnaie pour sa boisson
function buy(nb5cts, nb10cts, nb20cts, nb50cts, nb1e, nb2e, price) {
	let montantTotalInsere = nb5cts * 0.05 + nb10cts * 0.10 + nb20cts *0.20 + nb50cts*0.50 + nb1e*1 + nb2e*2
	let resultat;
	if (montantTotalInsere>=price) {
		resultat = true;
		$("#Alerte").html("Veuillez récupérer votre boisson et appuyez sur Return pour votre monnaie");
	}
	else {
		resultat = false;
		$("#Alerte").html("Monnaie insuffisante, insérez votre monnaie et sélectionnez votre boisson");
	}
	return resultat;
}


//---------------------------Gestion des pièces ---------------------------

//Création de l'objet stockPieces contenenant les stocks des pièces 

let stockPieces = {
	piece2 : {value : 200, stock : 100},
	piece1 : {value : 100, stock : 100},
	piece50 : {value : 50, stock : 100},
	piece20 : {value : 20, stock : 100},
	piece10 : {value : 10, stock : 100},
	piece5 : {value : 5, stock : 100}
};

//Fonction permettant d'ajouter dans le stock une pièce de 0.05€
function add5ct() {
	stockPieces.piece5.stock= stockPieces.piece5.stock + 1;
	$("#affichage5 p").html(stockPieces.piece5.stock);
}

//Fonction permettant de retirer dans le stock une pièce de 0.05€
function remove5ct() {
	stockPieces.piece5.stock= stockPieces.piece5.stock - 1;
	$("#affichage5 p").html(stockPieces.piece5.stock);
}

// Fonction ADD et REMOVE 10ct



function add10ct(){
	stockPieces.piece10.stock = stockPieces.piece10.stock + 1 ;
	$("#affichage10").html(stockPieces.piece10.stock);
};

function remove10ct(){
	stockPieces.piece10.stock = stockPieces.piece10.stock - 1 ;
	$("#affichage10").html(stockPieces.piece10.stock);
};

// Fonction ADD et REMOVE 20ct



function add20ct(){
	stockPieces.piece20.stock = stockPieces.piece20.stock + 1 ;
	$("#affichage20").html(stockPieces.piece20.stock);
};

function remove20ct(){
	stockPieces.piece20.stock = stockPieces.piece20.stock - 1 ;
	$("#affichage20").html(stockPieces.piece20.stock);
};

// Fonction ADD et REMOVE 50ct



function add50ct(){
	stockPieces.piece50.stock= stockPieces.piece50.stock + 1 ;
	$("#affichage50").html(stockPieces.piece50.stock);
};

function remove50ct(){
	stockPieces.piece50.stock = stockPieces.piece50.stock - 1 ;
	$("#affichage50").html(stockPieces.piece50.stock);
};


//Fonction permettant d'ajouter dans le stock une pièce de 1€
function add1e() {
	stockPieces.piece1.stock= stockPieces.piece1.stock + 1;
	$("#affichage1 p").html(stockPieces.piece1.stock);
}

//Fonction permettant de retirer dans le stock une pièce de 1€
function remove1e() {
	stockPieces.piece1.stock= stockPieces.piece1.stock - 1;
	$("#affichage1 p").html(stockPieces.piece1.stock);
}


//Fonction permettant d'ajouter dans le stock une pièce de 2€
function add2e(){
	stockPieces.piece2.stock=stockPieces.piece2.stock +1;
	$("#affichage2 p").html(stockPieces.piece2.stock);


}

//Fonction permettant de retirer dans le stock une pièce de 2€
function remove2e(){
	stockPieces.piece2.stock=stockPieces.piece2.stock -1;
	$("#affichage2 p").html(stockPieces.piece2.stock);

}



//------------------------------ GESTION DES STOCKS INGREDIENTS ------------------------
//Objet conteant les stocks des ingrédients
let stockIngredients = {
	cafe : 50,
	eau : 50,
	sucre : 50,
	lait : 50,
	gobelet : 50,
	touillette : 50

}

//-------------------  CAFE  -------------------------------------
//Lorsqu'on click sur le bouton + du café alors on ajoute une dose de café
function addCafe(){
	stockIngredients.cafe = stockIngredients.cafe + 1;
	$("#affichage_café p").html(stockIngredients.cafe);
}

//Lorsqu'on click sur le bouton - du café alors on retire une dose de café
function removeCafe() {
	stockIngredients.cafe = stockIngredients.cafe - 1;
	$("#affichage_café p").html(stockIngredients.cafe);
}


//-------------------  EAU  -------------------------------------
//Lorsqu'on click sur le bouton + de l'eau alors on ajoute une dose 
function addEau(){
	stockIngredients.eau = stockIngredients.eau + 1;
	$("#affichage_eau p").html(stockIngredients.eau);
}

//Lorsqu'on click sur le bouton - de l'eau alors on retire une dose 
function removeEau() {
	stockIngredients.eau = stockIngredients.eau - 1;
	$("#affichage_eau p").html(stockIngredients.eau);
}


//-------------------  SUCRE  -------------------------------------
//Lorsqu'on click sur le bouton + du sucre alors on ajoute une dose 
function addSucre(){
	stockIngredients.sucre = stockIngredients.sucre + 1;
	$("#affichage_sucre p").html(stockIngredients.sucre);
}

//Lorsqu'on click sur le bouton - du sucre alors on retire une dose 
function removeSucre() {
	stockIngredients.sucre = stockIngredients.sucre - 1;
	$("#affichage_sucre p").html(stockIngredients.sucre);
}


//-------------------  LAIT  -------------------------------------
//Lorsqu'on click sur le bouton + du lait alors on ajoute une dose 
function addLait(){
	stockIngredients.lait = stockIngredients.lait + 1;
	$("#affichage_lait p").html(stockIngredients.lait);
}

//Lorsqu'on click sur le bouton - du lait alors on retire une dose 
function removeLait() {
	stockIngredients.lait = stockIngredients.lait - 1;
	$("#affichage_lait p").html(stockIngredients.lait);
}


//-------------------  GOBELET  -------------------------------------
//Lorsqu'on click sur le bouton + du gobelet alors on ajoute une quantité 
function addGobelet(){
	stockIngredients.gobelet = stockIngredients.gobelet + 1;
	$("#affichage_gobelet p").html(stockIngredients.gobelet);
}

//Lorsqu'on click sur le bouton - du gobelet alors on retire une quantité 
function removeGobelet() {
	stockIngredients.gobelet = stockIngredients.gobelet - 1;
	$("#affichage_gobelet p").html(stockIngredients.gobelet);
}


//-------------------  TOUILLETTE  -------------------------------------
//Lorsqu'on click sur le bouton + de la touillette alors on ajoute une quantité 
function addTouillette(){
	stockIngredients.touillette = stockIngredients.touillette + 1;
	$("#affichage_touillette p").html(stockIngredients.touillette);
}

//Lorsqu'on click sur le bouton - de la touillette alors on retire une quantité 
function removeTouillette() {
	stockIngredients.touillette = stockIngredients.touillette - 1;
	$("#affichage_touillette p").html(stockIngredients.touillette);
}


//----------------------- GESTIONS DES STOCKS LORS D'UNE COMMANDE ----------------------

//Création de l'objet Boissons contenant les recettes des boissons
let boissons = {
	Expresso : {café : 1, eau : 1, lait : 0, gobelet : 1, touillette : 1},
	Double_expresso : {café : 2, eau : 2, lait : 0, gobelet : 1, touillette : 1},
	cafe_long : {café : 3, eau : 3, lait : 0, gobelet : 1, touillette : 1},
	cappuccino : {café : 1, eau : 1, lait : 1, gobelet : 1, touillette : 1},
}


// ---------------- CAFE  -----------------------------------------
//Fonction permettant de consommer des doses de café
function consommeCafe(nbDoses) {
	stockIngredients.cafe = stockIngredients.cafe - nbDoses;
}


// ---------------- EAU  -----------------------------------------
//Fonction permettant de consommer des doses d'eau
function consommeEau(nbDoses) {
	stockIngredients.eau = stockIngredients.eau - nbDoses;
}


// ---------------- SUCRE  -----------------------------------------
//Fonction permettant de consommer des doses de sucre
function consommeSucre(nbDoses) {
	stockIngredients.sucre = stockIngredients.sucre - nbDoses;
}


// ---------------- LAIT  -----------------------------------------
//Fonction permettant de consommer des doses de lait
function consommeLait(nbDoses) {
	stockIngredients.lait = stockIngredients.lait - nbDoses;
}


// ---------------- GOBELET  -----------------------------------------
//Fonction permettant de consommer un gobelet
function consommeGobelet(nbDoses) {
	stockIngredients.gobelet = stockIngredients.gobelet - nbDoses;
}

// ---------------- TOUILLETE  -----------------------------------------
//Fonction permettant de consommer une touillette
function consommeTouillette(nbDoses) {
	stockIngredients.touillette = stockIngredients.touillette - nbDoses;
}

//Fonction préparant une boisson 
function prepare(drink, nbSugar) {
	consommeEau(drink.eau);
	consommeCafe(drink.café);
	consommeSucre(nbSugar);
	consommeLait(drink.lait);
	consommeGobelet(drink.gobelet);
	if (nbSugar>0) {
		consommeTouillette(drink.touillette);
	}
}


//Fonction calculant le nombre de sucre commandé
function sucre() {
	let nbSucre = 0;
	$classLed4 = $("#ledSucre4").attr('class');//récupère la classe de la led sucre 4
	$classLed3 = $("#ledSucre3").attr('class');//récupère la classe de la led sucre 3
	$classLed2 = $("#ledSucre2").attr('class');//récupère la classe de la led sucre 2
	$classLed1 = $("#ledSucre1").attr('class');//récupère la classe de la led sucre 1

	if($classLed4==="led-on") {
		nbSucre = 4;
	}
	else if ($classLed3==="led-on") {
		nbSucre = 3;
	}
	else if ($classLed2==="led-on") {
		nbSucre = 2;
	}
	else if ($classLed1==="led-on") {
		nbSucre = 1;
	}

	return nbSucre;
}

function remove (drink) {
	let $srcImageBoisson = $("#btn"+ drink).attr('src');
	if ($srcImageBoisson === "image_machine/Vue1-assets/Bouton_"+drink+"_etat0.png") {
	    let refus = stockPieces.piece2.stock - piecesIntroduites.piece2.nb;
		$("#affichage2 p").html(refus);
		 stockPieces.piece2.stock = refus;

	    let refus1 = stockPieces.piece1.stock - piecesIntroduites.piece1.nb;
		$("#affichage1 p").html(refus1);
		stockPieces.piece1.stock = refus1;

	    let refus2 = stockPieces.piece50.stock - piecesIntroduites.piece50.nb;
		$("#affichage50 ").html(refus2);
		stockPieces.piece50.stock = refus2;

	    let refus3 = stockPieces.piece20.stock - piecesIntroduites.piece20.nb;
		$("#affichage20 ").html(refus3);
		stockPieces.piece20.stock = refus3;

	    let refus4 = stockPieces.piece10.stock - piecesIntroduites.piece10.nb;
		$("#affichage10 ").html(refus4);
		stockPieces.piece10.stock = refus4;

	    let refus5 = stockPieces.piece5.stock - piecesIntroduites.piece5.nb;
		$("#affichage5 p").html(refus5);
		stockPieces.piece5.stock = refus5;

	}
}




//------------------------- GESTION RENDU MONNAIE -----------------------------


let dispo =[stockPieces.piece2.value, stockPieces.piece1.value, stockPieces.piece50.value, stockPieces.piece20.value, stockPieces.piece10.value, stockPieces.piece5.value]; //tableau avec les valeurs des pièces disponibles
let nb = [stockPieces.piece2.stock, stockPieces.piece1.stock, stockPieces.piece50.stock, stockPieces.piece20.stock, stockPieces.piece10.stock, stockPieces.piece5.stock]; //tableau avec le nombre de pièces disponibles par valeurs


//Fonction "renduMonnaie" permettant d'afficher les pièces à rendre ainsi que le nombre de pièces restantes dans la machine  
function renduMonnaie (sommeEntree, cout) {
let rendu = [];//tableau contenant toutes les pièces à rendre
  let solde = 0; //variable correspondant au montant à rendre
  solde = sommeEntree - cout; //calcul du montant à rendre

  //boucle permettant de regarder toutes les pièces disponibles
  for (let i=0; i<dispo.length; i++) {

    //boucle permettant de constituer le tableau "rendu" et comptabiliser le nombre de pièces restantes
    while ((solde>=dispo[i]) && (nb[i]>0)) //tant que le solde est supérieur à la pièce analysée et qu'il reste des pièces la boucle s'effectue
      {
        rendu.push(dispo[i]); //ajoute dans le tableau "rendu" les pièces à restituer
        solde = solde - dispo[i]; //calcul du nouveau solde
        nb[i]--; //enlever la pièce utilisée du nombre de pièces disponibles
      }
  }

  return rendu;

}

function majStockPieces(rendu) {

	for (let i = 0; i < rendu.length; i++) {
		if (rendu[i]===stockPieces.piece2.value) {
			stockPieces.piece2.stock = stockPieces.piece2.stock - 1;
		}
		else if (rendu[i]===stockPieces.piece1.value) {
			stockPieces.piece1.stock = stockPieces.piece1.stock - 1;
		}
		else if (rendu[i]===stockPieces.piece50.value) {
			stockPieces.piece50.stock = stockPieces.piece50.stock - 1;
		}
		else if (rendu[i]===stockPieces.piece20.value) {
			stockPieces.piece20.stock = stockPieces.piece20.stock - 1;
		}
		else if (rendu[i]===stockPieces.piece10.value) {
			stockPieces.piece10.stock = stockPieces.piece10.stock - 1;
		}
		else if (rendu[i]===stockPieces.piece5.value) {
			stockPieces.piece5.stock = stockPieces.piece5.stock - 1;
		}
	}
return stockPieces;
}


function afficherStockPieces () {
	$("#affichage2 p").html(stockPieces.piece2.stock);
	$("#affichage1 p").html(stockPieces.piece1.stock);
	$("#affichage50").html(stockPieces.piece50.stock);
	$("#affichage20").html(stockPieces.piece20.stock);
	$("#affichage10").html(stockPieces.piece10.stock);
	$("#affichage5 p").html(stockPieces.piece5.stock);

}