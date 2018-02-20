console.log("Machine à café");

$(document).ready(function(){

//Lorsqu'on click sur les boutons monnaie, afficher la monnaie insérée
	$("#boutonPiece2").click(function(){
        let result2 = addCoin(2);
        $("#MonnaieMise").html(result2 +" €");
        add2e();
        $("#affichage2 p").html( stockPieces.piece2.stock);
        let rendu =0;
        $("#RendreMonnaie").html(rendu+" €");

    });

    $("#boutonPiece1").click(function(){
        let result1 = addCoin(1);
        $("#MonnaieMise").html(result1 +" €");
        add1e();
        let rendu =0;
        $("#RendreMonnaie").html(rendu+" €");
    });

    $("#boutonPiece50").click(function(){
        let result50 = addCoin(0.50);
        $("#MonnaieMise").html(result50+"€");
        add50ct();
        let rendu =0;
        $("#RendreMonnaie").html(rendu+" €");
    });

    $("#boutonPiece20").click(function(){
        let result20 = addCoin(0.20);
        $("#MonnaieMise").html(result20+" €");
        add20ct();
        let rendu =0;
        $("#RendreMonnaie").html(rendu+" €");
    });

    $("#boutonPiece10").click(function(){
        let result10 = addCoin(0.10);
        $("#MonnaieMise").html(result10 +" €");
        add10ct();
        let rendu =0;
        $("#RendreMonnaie").html(rendu+" €");
    });

    $("#boutonPiece5").click(function(){
        let result5 = addCoin(0.05);
        $("#MonnaieMise").html(result5 +" €");
        add5ct();
        let rendu =0;
        $("#RendreMonnaie").html(rendu+" €");
    });



//Appuyer sur un bouton d'une boisson pour la sélectionner + mouseover qd survol de la selection
	
//EXPRESSO
	$("#btnExpresso").click(function(){
		
		let isSelected = buy(piecesIntroduites.piece5.nb, piecesIntroduites.piece10.nb, piecesIntroduites.piece20.nb, piecesIntroduites.piece50.nb, piecesIntroduites.piece1.nb, piecesIntroduites.piece2.nb, prixBoisson("Expresso"));
		selectDrink(isSelected, "Expresso");

		let $srcImageBoisson = $("#btnExpresso").attr('src');
	//Si la boisson est commandée 
		if ($srcImageBoisson === "image_machine/Vue1-assets/Bouton_Expresso_etat2.png"){
			prixBoisson("Expresso"); 
			$("#PrixBoisson").html(prix+" €"); //afficher le prix de la boisson
			let rendu =0;
        	$("#RendreMonnaie").html(rendu+" €"); //afficher le rendu monnaie
        	imageBoisson('expresso'); //afficher l'image de la boisson
        	prepare(boissons.Expresso, sucre()); // déduire des stocks les ingrédients consommés, sucre() calcul le nombre de sucre
			
			//Rendu Monnaie 
			let prixCts = prixBoisson("Expresso")*100;
			let monnaieInsereeEnCts = monnaieInsert * 100;
			let resultatRenduMonnaie = renduMonnaie(monnaieInsereeEnCts, prixCts);
			majStockPieces(resultatRenduMonnaie);

			//afficher les stocks :
			$('#affichage_café p').html(""+stockIngredients.cafe);
			$("#affichage_eau p").html(stockIngredients.eau);
			$("#affichage_sucre p").html(stockIngredients.sucre);
			$("#affichage_lait p").html(stockIngredients.lait);
			$("#affichage_gobelet p").html(stockIngredients.gobelet);
			$("#affichage_touillette p").html(stockIngredients.touillette);

		}
	//Sinon 
		else {
			prix=0;
			prixBoisson("Expresso");
			$("#PrixBoisson").html(prix+" €");
			$('#tasse').attr('src','image_machine/Vue1-assets/tasse_vide.png'); //afficher le gobelet vide lorsqu'on déselectionne une boisson
		}
	});

	$("#btnExpresso").mouseover(function(){
		overDrink(true, "Expresso");
	});
	$("#btnExpresso").mouseleave(function(){
		overDrink(true, "Expresso");
	});

//DOUBLE EXPRESSO
	$("#btnDouble_expresso").click(function(){
		let isSelected = buy(piecesIntroduites.piece5.nb, piecesIntroduites.piece10.nb, piecesIntroduites.piece20.nb, piecesIntroduites.piece50.nb, piecesIntroduites.piece1.nb, piecesIntroduites.piece2.nb, prixBoisson("Double_expresso"));
		selectDrink(isSelected, "Double_expresso");
		let $srcImageBoisson = $("#btnDouble_expresso").attr('src');
		if ($srcImageBoisson === "image_machine/Vue1-assets/Bouton_Double_expresso_etat2.png"){
			prixBoisson("Double_expresso");
			$("#PrixBoisson").html(prix+" €");
			let rendu =0;
        	$("#RendreMonnaie").html(rendu+" €");
        	imageBoisson('double_expresso'); //afficher l'image de la boisson
        	prepare(boissons.Double_expresso, sucre()); // déduire des stocks les ingrédients consommés, sucre() calcul le nombre de sucre
        	
        	//Rendu Monnaie 
			let prixCts = prixBoisson("Double_expresso")*100;
			let monnaieInsereeEnCts = monnaieInsert * 100;
			let resultatRenduMonnaie = renduMonnaie(monnaieInsereeEnCts, prixCts);
			majStockPieces(resultatRenduMonnaie);


        	//afficher les stocks :
			$('#affichage_café p').html(""+stockIngredients.cafe);
			$("#affichage_eau p").html(stockIngredients.eau);
			$("#affichage_sucre p").html(stockIngredients.sucre);
			$("#affichage_lait p").html(stockIngredients.lait);
			$("#affichage_gobelet p").html(stockIngredients.gobelet);
			$("#affichage_touillette p").html(stockIngredients.touillette);
		}
		else {
			prix=0;
			prixBoisson("Double_expresso");
			$("#PrixBoisson").html(prix+" €");
			$('#tasse').attr('src','image_machine/Vue1-assets/tasse_vide.png'); //afficher le gobelet vide lorsqu'on déselectionne une boisson
		}	
	});

	$("#btnDouble_expresso").mouseover(function(){
		overDrink(true, "Double_expresso");
	});
	$("#btnDouble_expresso").mouseleave(function(){
		overDrink(true, "Double_expresso");
	});

//CAFE LONG
	$("#btncafe_long").click(function(){
		let isSelected = buy(piecesIntroduites.piece5.nb, piecesIntroduites.piece10.nb, piecesIntroduites.piece20.nb, piecesIntroduites.piece50.nb, piecesIntroduites.piece1.nb, piecesIntroduites.piece2.nb, prixBoisson("cafe_long"));
		selectDrink(isSelected, "cafe_long");
		let $srcImageBoisson = $("#btncafe_long").attr('src');
		if ($srcImageBoisson === "image_machine/Vue1-assets/Bouton_cafe_long_etat2.png"){
			prixBoisson("cafe_long");
			$("#PrixBoisson").html(prix+" €");
			let rendu =0;
        	$("#RendreMonnaie").html(rendu+" €");
        	imageBoisson('cafe_long'); //afficher l'image de la boisson
        	prepare(boissons.cafe_long, sucre()); // déduire des stocks les ingrédients consommés, sucre() calcul le nombre de sucre
        	
        	//Rendu Monnaie 
			let prixCts = prixBoisson("cafe_long")*100;
			let monnaieInsereeEnCts = monnaieInsert * 100;
			let resultatRenduMonnaie = renduMonnaie(monnaieInsereeEnCts, prixCts);
			majStockPieces(resultatRenduMonnaie);

        	//afficher les stocks :
			$('#affichage_café p').html(""+stockIngredients.cafe);
			$("#affichage_eau p").html(stockIngredients.eau);
			$("#affichage_sucre p").html(stockIngredients.sucre);
			$("#affichage_lait p").html(stockIngredients.lait);
			$("#affichage_gobelet p").html(stockIngredients.gobelet);
			$("#affichage_touillette p").html(stockIngredients.touillette);
		}
		else {
			prix=0;
			prixBoisson("cafe_long");
			$("#PrixBoisson").html(prix+" €");
			$('#tasse').attr('src','image_machine/Vue1-assets/tasse_vide.png'); //afficher le gobelet vide lorsqu'on déselectionne une boisson
			
		}
	});

	$("#btncafe_long").mouseover(function(){
		overDrink(true, "cafe_long");
	});
	$("#btncafe_long").mouseleave(function(){
		overDrink(true, "cafe_long");
	});

//CAPPUCCINO
	$("#btncappuccino").click(function(){
		let isSelected = buy(piecesIntroduites.piece5.nb, piecesIntroduites.piece10.nb, piecesIntroduites.piece20.nb, piecesIntroduites.piece50.nb, piecesIntroduites.piece1.nb, piecesIntroduites.piece2.nb, prixBoisson("cappuccino"));
		selectDrink(isSelected, "cappuccino");
		let $srcImageBoisson = $("#btncappuccino").attr('src');
		if ($srcImageBoisson === "image_machine/Vue1-assets/Bouton_cappuccino_etat2.png"){
			prixBoisson("cappuccino");
			$("#PrixBoisson").html(prix+" €");
			let rendu =0;
        	$("#RendreMonnaie").html(rendu+" €");
        	imageBoisson('cappuccino'); //afficher l'image de la boisson
        	prepare(boissons.cappuccino, sucre()); // déduire des stocks les ingrédients consommés, sucre() calcul le nombre de sucre
        	
        	//Rendu Monnaie 
			let prixCts = prixBoisson("cappuccino")*100;
			let monnaieInsereeEnCts = monnaieInsert * 100;
			let resultatRenduMonnaie = renduMonnaie(monnaieInsereeEnCts, prixCts);
			majStockPieces(resultatRenduMonnaie);

        	//afficher les stocks :
			$('#affichage_café p').html(""+stockIngredients.cafe);
			$("#affichage_eau p").html(stockIngredients.eau);
			$("#affichage_sucre p").html(stockIngredients.sucre);
			$("#affichage_lait p").html(stockIngredients.lait);
			$("#affichage_gobelet p").html(stockIngredients.gobelet);
			$("#affichage_touillette p").html(stockIngredients.touillette);
		}
		else {
			prix=0;
			prixBoisson("cappuccino");
			$("#PrixBoisson").html(prix+" €");
			$('#tasse').attr('src','image_machine/Vue1-assets/tasse_vide.png'); //afficher le gobelet vide lorsqu'on déselectionne une boisson
		}
	});

	$("#btncappuccino").mouseover(function(){
		overDrink(true, "cappuccino");
	});
	$("#btncappuccino").mouseleave(function(){
		overDrink(true, "cappuccino");
	});


//Appuyer sur les boutons + et - pour régler la quantité de sucre
	$("#btnPluSucre").click(function(){
		addSugar();
		$(this).attr('src','image_machine/Vue1-assets/Bouton_plus_etat2.png');

	});

	$("#btnMoinSucre").click(function(){
		removeSugar();
		$(this).attr('src','image_machine/Vue1-assets/Bouton_moins_etat2.png');
	});

// Hover sucre

	$("#btnPluSucre").mouseenter(function(){
		$(this).attr('src','image_machine/Vue1-assets/Bouton_plus_etat1.png')
	});

	$("#btnMoinSucre").mouseenter(function(){
		$(this).attr('src','image_machine/Vue1-assets/Bouton_moins_etat1.png')
	});

	$("#btnPluSucre").mouseleave(function(){
		$(this).attr('src','image_machine/Vue1-assets/Bouton_plus_etat0.png')
	});

	$("#btnMoinSucre").mouseleave(function(){
		$(this).attr('src','image_machine/Vue1-assets/Bouton_moins_etat0.png')
	})


//Lorsqu'on click sur "return" 
	$("#boutonRetour").click(function(){
		let monnaieRendueAffiche = resetCoins();
		monnaieInsert = 0;
		$("#RendreMonnaie").html(monnaieRendueAffiche+" €");
		$("#MonnaieMise").html(monnaieInsert +" €");
		
		//Bloquer le retrait du stock de toutes les pièces si boisson sélectionnée
		let $srcImageBoisson1 = $("#btnExpresso").attr('src');
		let $srcImageBoisson2 = $("#btnDouble_expresso").attr('src');
		let $srcImageBoisson3 = $("#btncafe_long").attr('src');
		let $srcImageBoisson4 = $("#btncappuccino").attr('src');


		if ($srcImageBoisson1 === "image_machine/Vue1-assets/Bouton_Expresso_etat2.png") {
			remove("Expresso");
		}
		else if ($srcImageBoisson2 === "image_machine/Vue1-assets/Bouton_Double_expresso_etat2.png") {
			remove("Double_expresso");
		}
		else if ($srcImageBoisson3 === "image_machine/Vue1-assets/Bouton_cafe_long_etat2.png") {
			remove("cafe_long");
		}
		else if ($srcImageBoisson2 === "image_machine/Vue1-assets/Bouton_cappuccino_etat2.png") {
			remove("cappuccino");
		}else{
			remove("Expresso");
		}			
		
		//Afficher le nouveau stock des pieces 
		afficherStockPieces();


		// remove("cappuccino");
		resetPiecesIntroduites(); //mettre à 0 le nombre de pièces introduites
		$(this).attr('src','image_machine/Vue1-assets/Bouton_rendu_monnaie_etat2.png');
		resetDrink();
		$('#tasse').attr('src','image_machine/Vue1-assets/tasse_vide.png'); //afficher le gobelet vide
		$("#PrixBoisson").html("0 €");
		$("#Alerte").html("Nous vous remercions d'avoir choisi notre machine");


	});

	

//Allumer la pièce quand on click dessus et hover (appel de fonction)
   
	stylePiece(2);
	stylePiece(1);
	stylePiece(50);
	stylePiece(20);
	stylePiece(10);
	stylePiece(5);

// Fonction hover et click pour le bouton return

	$("#boutonRetour").mouseenter(function(){
		$(this).attr('src','image_machine/Vue1-assets/Bouton_rendu_monnaie_etat1.png')
	})

	$("#boutonRetour").mouseleave(function(){
		$(this).attr('src','image_machine/Vue1-assets/Bouton_rendu_monnaie_etat0.png')
	});

//---------------Ajout de pièces -------------------------------------------


//afficher le stock des pièces de 0.05€ dans la vue 2
	$('#affichage5 p').html(""+stockPieces.piece5.stock);

//Ajouter une pièce de 1€ dans le stock lorsqu'on click sur le bouton + 
	$("#bouton_plus_5").click(function(){
		add5ct();
	});
//Retirer une pièce de 0.05€ dans le stock lorsqu'on click sur le bouton - 
	$("#bouton_moins_5").click(function(){
		if(stockPieces.piece5.stock>0) {
			remove5ct();
		}
	});

// Fonction ADD et REMOVE 10ct

	$("#affichage10").html(""+stockPieces.piece10.stock);

	$("#bouton_plus_10").click(function(){
		add10ct();
	});

	$("#bouton_moins_10").click(function(){
		if (stockPieces.piece10.stock>0) {
			remove10ct();			
		}
	});


// Fonction ADD et REMOVE 20ct

	$("#affichage20").html(stockPieces.piece20.stock);

	$("#bouton_plus_20").click(function(){
		add20ct();
	});

	$("#bouton_moins_20").click(function(){
		if (stockPieces.piece20.stock>0) {
			remove20ct();			
		}
	});


// Fonction ADD et REMOVE 50ct

	$("#affichage50").html(stockPieces.piece50.stock);

	$("#bouton_plus_50").click(function(){
		add50ct();
	});

	$("#bouton_moins_50").click(function(){
		if (stockPieces.piece50.stock>0) {
			remove50ct();		
		}
	});


//afficher le stock des pièces de 1€ dans la vue 2
	$('#affichage1 p').html(""+stockPieces.piece1.stock);

//Ajouter une pièce de 1€ dans le stock lorsqu'on click sur le bouton + 
	$("#bouton_plus_1").click(function(){
		add1e();
	});
//Retirer une pièce de 1€ dans le stock lorsqu'on click sur le bouton +=- 
	$("#bouton_moins_1").click(function(){
		if (stockPieces.piece1.stock>0) {
			remove1e();
		}
	});


//afficher le stock des pièces de 2€ dans la vue 2
	$('#affichage2 p').html(""+stockPieces.piece2.stock);

//Lorsqu'on click sur le bouton + on ajoute des pièces de 2€

	$("#bouton_plus_2").click(function(){
		add2e();
	});

//Lorsqu'on click sur le bouton - on retire des pièces de 2€
	$("#bouton_moins_2").click(function(){
		if(stockPieces.piece2.stock>0) {
			remove2e();
		}
	});


//-----------------------------Gestion du stock d'ingrédients -------------------


//----------------------- CAFE  ----------------------------------------------
//afficher le stock des doses de café dans la vue 2
	$('#affichage_café p').html(""+stockIngredients.cafe);

//Lorsqu'on click sur le bouton + on ajoute des une dose de café
	$("#bouton_plus_café").click(function(){
		addCafe();
	});

//Lorsqu'on click sur le bouton - on retire une dose de café
	$("#bouton_moins_café").click(function(){
		if(stockIngredients.cafe>0) {
			removeCafe();
		}
	});


//----------------------- EAU ----------------------------------------------
//afficher le stock des doses d'eau dans la vue 2
	$('#affichage_eau p').html(""+stockIngredients.eau);

//Lorsqu'on click sur le bouton + on ajoute des une dose d'eau
	$("#bouton_plus_eau").click(function(){
		addEau();
	});

//Lorsqu'on click sur le bouton - on retire une dose d'eau
	$("#bouton_moins_eau").click(function(){
		if(stockIngredients.eau>0) {
			removeEau();
		}
	});


//----------------------- SUCRE ----------------------------------------------
//afficher le stock des doses de sucre dans la vue 2
	$('#affichage_sucre p').html(""+stockIngredients.sucre);

//Lorsqu'on click sur le bouton + on ajoute des une dose de sucre
	$("#bouton_plus_sucre").click(function(){
		addSucre();
	});

//Lorsqu'on click sur le bouton - on retire une dose de sucre
	$("#bouton_moins_sucre").click(function(){
		if(stockIngredients.sucre>0) {
			removeSucre();
		}
	});


//----------------------- LAIT ----------------------------------------------
//afficher le stock des doses de lait dans la vue 2
	$('#affichage_lait p').html(""+stockIngredients.lait);

//Lorsqu'on click sur le bouton + on ajoute des une dose de lait
	$("#bouton_plus_lait").click(function(){
		addLait();
	});

//Lorsqu'on click sur le bouton - on retire une dose de lait
	$("#bouton_moins_lait").click(function(){
		if(stockIngredients.lait>0) {
			removeLait();
		}
	});

//----------------------- GOBELET ----------------------------------------------
//afficher le stock des gobelets dans la vue 2
	$('#affichage_gobelet p').html(""+stockIngredients.gobelet);

//Lorsqu'on click sur le bouton + on ajoute des une quantité 
	$("#bouton_plus_gobelet").click(function(){
		addGobelet();
	});

//Lorsqu'on click sur le bouton - on retire une quantité
	$("#bouton_moins_gobelet").click(function(){
		if(stockIngredients.gobelet>0) {
			removeGobelet();
		}
	});


//----------------------- TOUILLETTE ----------------------------------------------
//afficher le stock des touillette dans la vue 2
	$('#affichage_touillette  p').html(""+stockIngredients.touillette );

//Lorsqu'on click sur le bouton + on ajoute des une quantité 
	$("#bouton_plus_touillette ").click(function(){
		addTouillette ();
	});

//Lorsqu'on click sur le bouton - on retire une quantité
	$("#bouton_moins_touillette ").click(function(){
		if(stockIngredients.touillette >0) {
			removeTouillette ();
		}
	});

});

