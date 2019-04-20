<?php

Route::group(['namespace'=> 'Hestabit\Module\Http\Controllers'], function(){	
	Route::get('module','ModuleController@create',['data'=> null])->name('module');
	Route::post('module','ModuleController@store')->name('module');
});

