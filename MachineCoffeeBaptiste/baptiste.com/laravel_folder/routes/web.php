<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/Accueil', function () {
    return view('Accueil');
})->middleware('auth');

// Ingredient
Route::get('ingredients','ControllerIngredients@bdd')->name('listeIng')->middleware('auth');

Route::post('ingredients','ControllerIngredients@search')->name("triNomIngredient")->middleware('auth');

Route::post('ingredientsStore','ControllerIngredients@store')->name('PostIng')->middleware('auth');

Route::get('ingredients/{id}', 'ControllerIngredients@edit')->name('ingredientsEdit')->middleware('auth');

Route::get('modifIngredient/{id}','ControllerIngredients@mod')->name('ingredientModif')->middleware('auth');

Route::post('modifIngredient/{id}','ControllerIngredients@modif')->name('ingredientModification')->middleware('auth');

Route::delete('suppIngredient/{id}', 'ControllerIngredients@supp')->name('IngredientSupp')->middleware('auth');

Route::get('ingredientsZA','ControllerIngredients@orderZA')->middleware('auth');

Route::get('IngPrixUp','ControllerIngredients@orderUp')->middleware('auth');

Route::get('IngPrixDown','ControllerIngredients@orderDown')->middleware('auth');

Route::get('FormAjout','ControllerIngredients@ajout')->name('FormAjout')->middleware('auth');


// Boissons

Route::get('boisson/{id}', 'ControllerBoisson@edit')->name('boissonEdit')->middleware('auth');

Route::delete('supp/{id}', 'ControllerBoisson@supp')->name('boissonSupp')->middleware('auth');

Route::get('boisson','ControllerBoisson@bdd')->name('boissonBdd')->middleware('auth');

Route::get('FormAjoutboisson','ControllerBoisson@ajout')->name('formAjoutBoisson')->middleware('auth');

Route::get('boissonZA','ControllerBoisson@orderZA')->middleware('auth');

Route::get('prixUp','ControllerBoisson@orderUp')->middleware('auth');

Route::get('prixDown','ControllerBoisson@orderDown')->middleware('auth');

Route::get('modif/{id}','ControllerBoisson@mod')->name('boissonModif')->middleware('auth');

Route::post('modif/{id}','ControllerBoisson@modif')->name('boissonModification')->middleware('auth');

Route::post('boissonRecette','ControllerBoisson@store')->middleware('auth');

Route::post('boisson','ControllerBoisson@search')->name('triNom')->middleware('auth');
//Recettes

Route::get('recette', 'ControllerRecette@bdd')->name('listeRecettes')->middleware('auth');

Route::post('recette','ControllerRecette@search')->name('TriNomRecette')->middleware('auth');

Route::get('recette/{id}', 'ControllerRecette@edit')->name('recetteEdit')->middleware('auth');

Route::get('formRecetteAjout','ControllerRecette@formajout')->name('formRecetteAjout')->middleware('auth');

Route::delete('suppRecette/{id}', 'ControllerRecette@supp')->name('RecetteSupp')->middleware('auth');

Route::post('ajoutRecette', 'ControllerRecette@store')->name('AjoutRecette')->middleware('auth');

Route::get('ModifRecette/{id}', 'ControllerRecette@mod')->name('ModifAvantFormRecette')->middleware('auth');

Route::post('ModifPost/{id}', 'ControllerRecette@modif')->name('ModifApresFormRecette')->middleware('auth');

Route::delete('suppLigne/{id}', 'ControllerRecette@suppligne')->name('suppLigne')->middleware('auth');




Route::get('monnaie', 'ControllerMonnaie@mon')->name('listePiece')->middleware('auth');

Route::get('modifStock/{id}','ControllerMonnaie@edit')->name('editPiece')->middleware('auth');

Route::put('modif/{id}','ControllerMonnaie@modif')->name('CoinModification')->middleware('auth');



Route::get('vente', 'ControllerVente@index')->name('listeVente')->middleware('auth');

Route::post('vente','ControllerVente@trier')->name('triVente')->middleware('auth');




Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

//Les routes pour la resource Front
Route::resource('/', 'FrontController') ;

//Les routes pour la resource Admin
Route::resource('admin', 'AdminController') ;

Route::post('admin','AdminController@trier')->name('triUser')->middleware('auth');

Route::get('/welcome','FrontController@test');