<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/configurations', 'ConfigurationController@index')->name('configurations.index');
Route::get('/configurations/create', 'ConfigurationController@create')->name('configurations.create');
Route::post('/configurations', 'ConfigurationController@store')->name('configurations.store');
Route::get('/configurations/{configuration}', 'ConfigurationController@show')->name('configurations.show');
Route::get('/configurations/{configuration}/edit/{key}', 'ConfigurationController@edit')->name('configurations.edit');
Route::patch('/configurations/{configuration}/{key}', 'ConfigurationController@update')->name('configurations.update');
Route::delete('/configurations/{configuration}/{key}', 'ConfigurationController@destroy')->name('configurations.destroy');
