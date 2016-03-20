<?php
Route::group(['namespace' => 'Athakim\Stats\Controllers','prefix'	=> 'stats'],
	 function(){

	 	Route::get('/',['as'=>'stats_path','uses' => 'StatsController@index']);

	 	Route::get('/test',['as'=>'test','uses' => 'StatsController@test']);

	 });