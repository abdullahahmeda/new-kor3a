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

Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::get('admin', 'AdminController@admin');
    Route::post('admin', 'AdminController@update')->name('admin.admin.update');

    Route::get('competitions', 'AdminCompetitionsController@index')->name('admin.competitions.index');
    Route::get('competitions/create', 'AdminCompetitionsController@create')->name('admin.competitions.create');
    Route::get('competitions/{competition}/edit', 'AdminCompetitionsController@edit')->name('admin.competitions.edit');
    Route::patch('competitions/{competition}', 'AdminCompetitionsController@update')->name('admin.competitions.update');
    Route::post('competitions', 'AdminCompetitionsController@store')->name('admin.competitions.store');
    Route::delete('competitions/{competition}', 'AdminCompetitionsController@destroy')->name('admin.competitions.destroy');

    Route::get('participants', 'AdminParticipantController@index')->name('admin.participants.index');
    Route::get('participants/create', 'AdminParticipantController@create')->name('admin.participants.create');
    Route::delete('participants/{participant}', 'AdminParticipantController@destroy')->name('admin.participants.destroy');
});

