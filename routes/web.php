<?php

Route::view('/', 'welcome');
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Games
    Route::delete('games/destroy', 'GamesController@massDestroy')->name('games.massDestroy');
    Route::post('games/media', 'GamesController@storeMedia')->name('games.storeMedia');
    Route::post('games/ckmedia', 'GamesController@storeCKEditorImages')->name('games.storeCKEditorImages');
    Route::resource('games', 'GamesController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Statuses
    Route::delete('statuses/destroy', 'StatusesController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusesController', ['except' => ['show']]);

    // Reviews
    Route::delete('reviews/destroy', 'ReviewsController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewsController');

    // Wallets
    Route::delete('wallets/destroy', 'WalletsController@massDestroy')->name('wallets.massDestroy');
    Route::resource('wallets', 'WalletsController');

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentsController');

    // Payment Methods
    Route::delete('payment-methods/destroy', 'PaymentMethodsController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodsController');

    // Favorites
    Route::delete('favorites/destroy', 'FavoritesController@massDestroy')->name('favorites.massDestroy');
    Route::resource('favorites', 'FavoritesController');

    // Withdraws
    Route::delete('withdraws/destroy', 'WithdrawsController@massDestroy')->name('withdraws.massDestroy');
    Route::post('withdraws/media', 'WithdrawsController@storeMedia')->name('withdraws.storeMedia');
    Route::post('withdraws/ckmedia', 'WithdrawsController@storeCKEditorImages')->name('withdraws.storeCKEditorImages');
    Route::resource('withdraws', 'WithdrawsController');

    // Coupons
    Route::delete('coupons/destroy', 'CouponsController@massDestroy')->name('coupons.massDestroy');
    Route::resource('coupons', 'CouponsController');

    // Redemptions
    Route::delete('redemptions/destroy', 'RedemptionsController@massDestroy')->name('redemptions.massDestroy');
    Route::resource('redemptions', 'RedemptionsController');

    // Announcements
    Route::delete('announcements/destroy', 'AnnouncementsController@massDestroy')->name('announcements.massDestroy');
    Route::resource('announcements', 'AnnouncementsController');

    // Messages
    Route::delete('messages/destroy', 'MessagesController@massDestroy')->name('messages.massDestroy');
    Route::resource('messages', 'MessagesController');

    // Gampanions
    Route::delete('gampanions/destroy', 'GampanionController@massDestroy')->name('gampanions.massDestroy');
    Route::post('gampanions/media', 'GampanionController@storeMedia')->name('gampanions.storeMedia');
    Route::post('gampanions/ckmedia', 'GampanionController@storeCKEditorImages')->name('gampanions.storeCKEditorImages');
    Route::get('gampanions/membershipslist', 'GampanionController@membershipslist')->name('gampanions.membershipslist');;
    Route::post('gampanions/acceptmembership', 'GampanionController@acceptmembership')->name('gampanions.acceptmembership');
    Route::post('gampanions/declinemembership', 'GampanionController@declinemembership')->name('gampanions.declinemembership');
    Route::resource('gampanions', 'GampanionController');

    // Banners
    Route::delete('banners/destroy', 'BannersController@massDestroy')->name('banners.massDestroy');
    Route::post('banners/media', 'BannersController@storeMedia')->name('banners.storeMedia');
    Route::post('banners/ckmedia', 'BannersController@storeCKEditorImages')->name('banners.storeCKEditorImages');
    Route::resource('banners', 'BannersController');

    // System Strings
    Route::delete('system-strings/destroy', 'SystemStringsController@massDestroy')->name('system-strings.massDestroy');
    Route::resource('system-strings', 'SystemStringsController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('user-alerts/read', 'UserAlertsController@read');

   

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
   // Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Games
    Route::delete('games/destroy', 'GamesController@massDestroy')->name('games.massDestroy');
    Route::resource('games', 'GamesController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Statuses
    Route::delete('statuses/destroy', 'StatusesController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusesController', ['except' => ['show']]);

    // Reviews
    Route::delete('reviews/destroy', 'ReviewsController@massDestroy')->name('reviews.massDestroy');
    Route::resource('reviews', 'ReviewsController');

    // Wallets
    Route::delete('wallets/destroy', 'WalletsController@massDestroy')->name('wallets.massDestroy');
    Route::resource('wallets', 'WalletsController');

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentsController');

    // Payment Methods
    Route::delete('payment-methods/destroy', 'PaymentMethodsController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodsController');

    // Favorites
    Route::delete('favorites/destroy', 'FavoritesController@massDestroy')->name('favorites.massDestroy');
    Route::resource('favorites', 'FavoritesController');

    // Withdraws
    Route::delete('withdraws/destroy', 'WithdrawsController@massDestroy')->name('withdraws.massDestroy');
    Route::resource('withdraws', 'WithdrawsController');

    // Coupons
    Route::delete('coupons/destroy', 'CouponsController@massDestroy')->name('coupons.massDestroy');
    Route::resource('coupons', 'CouponsController');

    // Redemptions
    Route::delete('redemptions/destroy', 'RedemptionsController@massDestroy')->name('redemptions.massDestroy');
    Route::resource('redemptions', 'RedemptionsController');

    // Announcements
    Route::delete('announcements/destroy', 'AnnouncementsController@massDestroy')->name('announcements.massDestroy');
    Route::resource('announcements', 'AnnouncementsController');

    // Messages
    Route::delete('messages/destroy', 'MessagesController@massDestroy')->name('messages.massDestroy');
    Route::resource('messages', 'MessagesController');

    // Gampanions
    Route::delete('gampanions/destroy', 'GampanionController@massDestroy')->name('gampanions.massDestroy');
    Route::resource('gampanions', 'GampanionController');

    // Banners
    Route::delete('banners/destroy', 'BannersController@massDestroy')->name('banners.massDestroy');
    Route::resource('banners', 'BannersController');

    // System Strings
    Route::delete('system-strings/destroy', 'SystemStringsController@massDestroy')->name('system-strings.massDestroy');
    Route::resource('system-strings', 'SystemStringsController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
