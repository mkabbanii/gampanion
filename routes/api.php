<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Games
    Route::post('games/media', 'GamesApiController@storeMedia')->name('games.storeMedia');
    Route::apiResource('games', 'GamesApiController');

    // Orders
    Route::apiResource('orders', 'OrdersApiController');

    // Statuses
    Route::apiResource('statuses', 'StatusesApiController', ['except' => ['show']]);

    // Reviews
    Route::apiResource('reviews', 'ReviewsApiController');

    // Wallets
    Route::apiResource('wallets', 'WalletsApiController');

    // Payments
    Route::apiResource('payments', 'PaymentsApiController');

    // Payment Methods
    Route::apiResource('payment-methods', 'PaymentMethodsApiController');

    // Favorites
    Route::apiResource('favorites', 'FavoritesApiController');

    // Withdraws
    Route::post('withdraws/media', 'WithdrawsApiController@storeMedia')->name('withdraws.storeMedia');
    Route::apiResource('withdraws', 'WithdrawsApiController');

    // Coupons
    Route::apiResource('coupons', 'CouponsApiController');

    // Redemptions
    Route::apiResource('redemptions', 'RedemptionsApiController');

    // Announcements
    Route::apiResource('announcements', 'AnnouncementsApiController');

    // Messages
    Route::apiResource('messages', 'MessagesApiController');

    // Gampanions
    Route::post('gampanions/media', 'GampanionApiController@storeMedia')->name('gampanions.storeMedia');
    Route::apiResource('gampanions', 'GampanionApiController');

    // Banners
    Route::post('banners/media', 'BannersApiController@storeMedia')->name('banners.storeMedia');
    Route::apiResource('banners', 'BannersApiController');

    // System Strings
    Route::apiResource('system-strings', 'SystemStringsApiController');
});
