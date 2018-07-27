<?php

Route::group(['namespace'=>'Farena\MeliAuth\Http\Controllers'],function(){
    Route::get('/meli/authorize','MeliAuthController@auth')->name('MeliAuthorize');
    Route::get('/meli/callback','MeliAuthController@callback');
});

