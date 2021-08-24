<?php

use Illuminate\Support\Facades\Route;

// Pages Statiques
Route::get('/contact', function () {
    return view('contact');
});

// Route::get('/element', function () {
//     return view('element');
// });

// Front office
Route::get('/', 'ClientPagesController@Accueil');
Route::post('/RechercherProduit', 'ClientPagesController@RechercherProduit');
Route::get('/Panier', 'ClientPagesController@Panier');
Route::get('/Catalogue', 'ClientPagesController@Category');
Route::get('/Paiement', 'ClientPagesController@InfoPaiement');
Route::post('/PrepareConfirmation', 'ClientPagesController@PrepareConfirmation')->name("PrepareConfirmation");
Route::get('/ConfirmationFinal', 'ClientPagesController@ConfirmationFinal')->name("ConfirmationFinal");


route::post('login', 'AuthController@AuthentificatedGoingToPage');
route::get('logout', 'AuthController@LogOut');

Route::get('/Produit/{product}', 'ClientPagesController@ProduitOverview');
route::get('/Descriptions', 'ClientPagesController@importDescriptions')->name('importDescriptions');
route::post('/AjoutPanier', 'ClientPagesController@AjoutPanier')->name("AjoutPanier");
route::get('/viderPanier', 'ClientPagesController@viderPanier')->name("viderPanier");
route::get('/backToHome', 'ClientPagesController@backToHome')->name("backToHome");

Route::post('/StoreMessage', 'ClientPagesController@StoreMessage')->name('StoreMessage');
Route::post('/StoreCommentaire', 'ClientPagesController@StoreCommentaire')->name('StoreCommentaire');
Route::post('/StoreDemo', 'ClientPagesController@StoreDemo')->name('StoreDemo');

// Back office
route::get('/Admin/Accueil', 'AdminPagesController@Accueil');
route::get('/Admin/ListeProduits', 'AdminPagesController@ListeProduits');
route::get('/Admin/NouveauProduit', 'AdminPagesController@NouveauProduit');
route::post('/Admin/AjoutNouveauProduit', 'AdminPagesController@AjoutNouveauProduit')->name('AjoutNouveauProduit');
route::post('/Admin/AjoutDecriptionAuProduit', 'AdminPagesController@AjoutDecriptionAuProduit')->name('AjoutDecriptionAuProduit');
route::get('/Admin/importTypes', 'AdminPagesController@ImportTypes')->name('ImportTypes');
route::get('/Admin/NosMarques', 'AdminPagesController@NosMarques');
route::get('/Admin/Statistiques', 'AdminPagesController@Statistiques');
route::post('/Admin/AjoutNouvelleMarque', 'AdminPagesController@AjoutNouvelleMarque')->name('AjoutNouvelleMarque');
route::get('/Admin/SupprimerMarque/{id_marque}', 'AdminPagesController@SupprimerMarque');
