<?php

declare(strict_types = 1);

Auth::routes(['verify' => false]);

Route::group(['as' => 'task', 'middleware' => 'auth'], function () {
    Route::get('/', 'TaskController@index')->name('.index');
    Route::get('create', 'TaskController@create')->name('.create');
    Route::post('/', 'TaskController@store')->name('.store');
    Route::get('{task}/edit', 'TaskController@edit')->name('.edit');
    Route::post('{task}', 'TaskController@action')->name('.action');
    Route::patch('{task}', 'TaskController@update')->name('.update');
    Route::patch('{task}/done', 'TaskController@done')->name('.done');
    Route::delete('{task}', 'TaskController@destroy')->name('.destroy');
});
