<?php


Route::middleware(['auth'])->group(function(){

    Route::get('/', ['as'=>'admin.index', 'uses'=>'AppController@index']);

    Route::get('/editar-bio-{id}', 'AppController@edit')->name('edit');
    Route::get('/criar-bio', 'AppController@create')->name('create');
    Route::post('/store', 'AppController@store')->name('store');
    Route::get('/visualizar-bio-{id}', 'AppController@show')->name('show');
    Route::get('/destroy{id}', 'AppController@destroy')->name('destroy');
    Route::post('/update{id}', 'AppController@update')->name('update');

});
Auth::routes();
