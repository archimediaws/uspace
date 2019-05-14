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

/*
 * TEST
 */
//Route::get('salut', function(){
//return 'Salut moi ';
//});
//Route::get('salut/{slug}-{id}', ['as' => 'test', function($slug, $id){
//	return "Lien: ". route('test', ['slug' => 'thetest' , 'id' => $id]);
//}])->where ('slug','[a-z0-9\-]+')->where('id', '[0-9]+');
//
//Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
//
//	Route::get('salut', function (){
//	return 'salut utilisateur';
//	});
//});



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 * Profil
 */
Route::get('/profil','UsersController@edit')->name('profil');
Route::post('/profil','UsersController@update')->name('profil');

/*
 * Pages
 */

Route::get('a-propos', 'PagesController@about')->name('about');

/*
 * Cards
 */
Route::resource('cards', 'CardController');

//Route::get('cards', 'CardController@index')->name('cards');
//Route::get('cards/{id}', 'CardController@show');


/* Recup API Cards */
Route::get('allcards', 'API\CardController@index')->name('allcards');
Route::get('mycards', 'API\CardController@getCardsByUser')->name('mycards'); // test sur API






