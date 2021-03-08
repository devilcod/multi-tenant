<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Product Categories
    Route::post('product-categories/media', 'ProductCategoryApiController@storeMedia')->name('product-categories.storeMedia');
    Route::apiResource('product-categories', 'ProductCategoryApiController');

    // Product Tags
    Route::apiResource('product-tags', 'ProductTagApiController');

    // Products
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Teams
    Route::post('teams/media', 'TeamApiController@storeMedia')->name('teams.storeMedia');
    Route::apiResource('teams', 'TeamApiController');

    // Orders
    Route::apiResource('orders', 'OrderApiController');

    // Tables
    Route::apiResource('tables', 'TableApiController');

    // Kitchens
    Route::apiResource('kitchens', 'KitchenApiController');

    // Events
    Route::apiResource('events', 'EventApiController');
});