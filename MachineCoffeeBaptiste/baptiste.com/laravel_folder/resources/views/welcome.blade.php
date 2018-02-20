<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/scriptVue2.js"></script>
</head>
<body id="machineCoffee">
<div id="fond">
    <div id="messageMonnaie">
        <p id="Alerte" class="msg">Nous vous remercions d'avoir choisi notre machine</p>
        <p id="msgMonnaie" class="msg tab1">Monnaie insérée :</p>
        <p id="PrixMsgMonnaie" class="msg tab1">Prix de la Boisson :</p>
        <p id="MsgRenduMonnaie" class="msg tab1">Monnaie à rendre :</p>
        <p id="MonnaieMise" class="msg tab">0 €</p>
        <p id="PrixBoisson" class="msg tab">0 €</p>
        <p id="RendreMonnaie" class="msg tab">0 €</p>
    </div>
    <div id="AffichageSucre">
        <img id="btnMoinSucre" src="image_machine/Vue1-assets/Bouton_moins_etat0.png">
        <img class="led-on" id="ledSucre1" src="image_machine/Vue1-assets/led_sucre1_etat1.png">
        <img class="led-on" id="ledSucre2" src="image_machine/Vue1-assets/led_sucre2_etat1.png">
        <img class="led-off" id="ledSucre3" src="image_machine/Vue1-assets/led_sucre3_etat1.png">
        <img class="led-off" id="ledSucre4" src="image_machine/Vue1-assets/led_sucre4_etat1.png">
        <img id="btnPluSucre" src="image_machine/Vue1-assets/Bouton_plus_etat0.png">
    </div>
    <div id="btnBoisson">
        <img id="btnExpresso" src="image_machine/Vue1-assets/Bouton_Expresso_etat0.png">
        <img id="btnDouble_expresso" src="image_machine/Vue1-assets/Bouton_Double_expresso_etat0.png">
        <img id="btncafe_long" src="image_machine/Vue1-assets/Bouton_cafe_long_etat0.png">
        <img id="btncappuccino" src="image_machine/Vue1-assets/Bouton_cappuccino_etat0.png">
    </div>
    <div id="boutonMonnaie">
        <img id="boutonRetour" src="image_machine/Vue1-assets/Bouton_rendu_monnaie_etat0.png">
        <img id="boutonPiece2" src="image_machine/Vue1-assets/Bouton_piece2_etat0.png">
        <img id="boutonPiece1" src="image_machine/Vue1-assets/Bouton_piece1_etat0.png">
        <img id="boutonPiece50" src="image_machine/Vue1-assets/Bouton_piece50_etat0.png">
        <img id="boutonPiece20" src="image_machine/Vue1-assets/Bouton_piece20_etat0.png">
        <img id="boutonPiece10" src="image_machine/Vue1-assets/Bouton_piece10_etat0.png">
        <img id="boutonPiece5" src="image_machine/Vue1-assets/Bouton_piece5_etat0.png">
    </div>
    <div id="maintenance">
        @if(Gate::allows('adminSuperAdmin'))
            <a href="{{ url('/Accueil') }}"><img id="boutonMaintenance"
                                                 src="image_machine/Vue1-assets/Manitenance_etat0.png"></a>
        @elseif(Gate::allows('user'))
            <a href="{{ url('/vente') }}"><img id="boutonMaintenance"
                                               src="image_machine/Vue1-assets/Manitenance_etat0.png"></a>
        @else
            <a href="{{ url('login') }}"><img id="boutonMaintenance"
                                              src="image_machine/Vue1-assets/Manitenance_etat0.png"></a>
        @endif
    </div>
    <div id="boisson">
        <img id="tasse" src="image_machine/Vue1-assets/tasse_vide.png">
    </div>

</div>


</body>
</html>