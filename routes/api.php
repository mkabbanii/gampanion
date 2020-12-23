<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\User'], function () {
    Route::get('/', function(){
        echo 'Welcome to User API';
    });
    
    /* API Game */
    Route::macro('gamesAndPlus', function ($uri, $controller) {
        // get all games + gampanion data
        Route::get("{$uri}/AllAndGampanions", "{$controller}@AllAndGampanions")->name("{$uri}.AllAndGampanions");
        Route::post("{$uri}/media", "{$controller}@storeMedia")->name("{$uri}.storeMedia");
        Route::resource($uri, $controller);
    });
    Route::gamesAndPlus('games', 'GamesApiController');
    
    /* API Gampanion */
    Route::macro('gamespanionAndPlus', function ($uri, $controller) {
        // get all gampanions + game data with is_featured = 1 + user data
        Route::get("{$uri}/featuredGampanions", "{$controller}@featuredGampanions")->name("{$uri}.featuredGampanions");
        Route::post("{$uri}/add", "{$controller}@add")->name("{$uri}.add");

        Route::resource($uri, $controller);
    });
    Route::gamespanionAndPlus('gampanions', 'GampanionApiController');

    /* API Order */
    Route::macro('ordersAndPlus', function ($uri, $controller) {
        Route::get("{$uri}/ordersUser1", "{$controller}@ordersUser1")->name("{$uri}.ordersUser1");
        Route::get("{$uri}/ordersUser2", "{$controller}@ordersUser2")->name("{$uri}.ordersUser2");
        Route::get("{$uri}/show1/{id}", "{$controller}@show1")->name("{$uri}.show1");
        Route::get("{$uri}/show2/{id}", "{$controller}@show2")->name("{$uri}.show2");
        //Route::resource($uri, $controller);
    });
    Route::ordersAndPlus('orders', 'OrdersApiController');


});
