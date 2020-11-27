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



Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/terms', function() {
    return view('terms');
})->name('terms');

Route::post('/participate/{competition}', 'ParticipantCompetitionController@store')->name('participant_competition.store');

Auth::routes(/* ['register' => false] */);

Route::get('/dashboard', 'AdminController@index')->middleware('auth');

Route::prefix('dashboard')->middleware('admin')->group(function() {
    Route::get('admin', 'AdminController@admin');
    Route::post('admin', 'AdminController@update')->name('dashboard.admin.update');

    Route::get('competitions', 'AdminCompetitionsController@index')->name('dashboard.competitions.index');
    Route::get('competitions/create', 'AdminCompetitionsController@create')->name('dashboard.competitions.create');
    Route::get('competitions/{competition}/edit', 'AdminCompetitionsController@edit')->name('dashboard.competitions.edit');
    Route::patch('competitions/{competition}', 'AdminCompetitionsController@update')->name('dashboard.competitions.update');
    Route::post('competitions', 'AdminCompetitionsController@store')->name('dashboard.competitions.store');
    Route::delete('competitions/{competition}', 'AdminCompetitionsController@destroy')->name('dashboard.competitions.destroy');
    Route::get('competitions/{competition}', 'AdminCompetitionsController@show')->name('dashboard.competitions.show');

    Route::get('marketers/create', 'AdminMarketersController@create');
    
    Route::get('marketers/info', 'MarketersController@info');
    Route::get('marketers/services', 'MarketersController@services');
    Route::get('marketers/archive', 'MarketersController@archive');
    Route::get('marketers/charge', 'MarketersController@charge');
    Route::get('marketers/settings', 'MarketersController@settings');

    Route::get('reservations/confirm', 'ReservationsController@confirm')->name('dashboard.reservations.confirm');
    Route::get('reservations/postpone', 'ReservationsController@postpone')->name('dashboard.reservations.postpone');
    Route::get('reservations/cancel', 'ReservationsController@cancel')->name('dashboard.reservations.cancel');

    Route::get('providers/create', 'AdminProvidersController@create');

    Route::get('participants', 'AdminParticipantController@index')->name('dashboard.participants.index');
    Route::get('participants/create', 'AdminParticipantController@create')->name('dashboard.participants.create');
    Route::delete('participants/{participant}', 'AdminParticipantController@destroy')->name('dashboard.participants.destroy');

});

/* Route::prefix('dashboard')->middleware('marketer')->group(function() {
    Route::get('marketers/info', 'MarketersController@info');
    Route::get('marketers/services', 'MarketersController@services');
    Route::get('marketers/archive', 'MarketersController@archive');
    Route::get('marketers/charge', 'MarketersController@charge');
    Route::get('marketers/settings', 'MarketersController@settings');
}); */