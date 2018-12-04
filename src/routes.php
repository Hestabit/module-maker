<?php

// use Illuminate\Http\Request;

// Route::get('module', function(){
// 	return view('module::module');
// })->name('module');
// Route::post('module', function(Request $request){
// 	return $request->all();
// })->name('module');

Route::group(['namespace'=> 'hestalabs\Module\Http\Controllers'], function(){	
Route::get('module','ModuleController@create',['data'=> null])->name('module');
Route::post('module','ModuleController@store')->name('module');
});
