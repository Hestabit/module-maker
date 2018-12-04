<?php

Route::group(['namespace'=> 'Hestalabs\Module\Http\Controllers'], function(){	
	Route::get('module','ModuleController@create',['data'=> null])->name('module');
	Route::post('module','ModuleController@store')->name('module');
});

