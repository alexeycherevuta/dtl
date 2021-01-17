<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/configurations', 'ConfigurationController@index')->name('configurations.index');
Route::get('/configurations/create', 'ConfigurationController@create')->name('configurations.create');
Route::get('/configurations/{id}/edit/{key}', 'ConfigurationController@update')->name('configurations.update');
Route::post('/configurations/store', 'ConfigurationController@store')->name('configurations.store');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
