<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\User'], function () {
    Route::get('/', function(){
        echo 'Welcome to User API';
    });
    
    // Games
    /*Route::post('games/media', 'GamesApiController@storeMedia')->name('games.storeMedia');
    Route::resource('games', 'GamesApiController');
    Route::get('game/index2', 'GamesApiController@index2')->name('games.index2');
    Route::get('games/dashboard', function () {
        return 'welcome to dashboard!';
    });*/
    Route::macro('gamesAndPlus', function ($uri, $controller) {
        // get all games + gampanion data
        Route::get("{$uri}/AllAndGampanions", "{$controller}@AllAndGampanions")->name("{$uri}.AllAndGampanions");
        Route::post("{$uri}/media", "{$controller}@storeMedia")->name("{$uri}.storeMedia");
        Route::resource($uri, $controller);
    });
    Route::gamesAndPlus('games', 'GamesApiController');
    
});
