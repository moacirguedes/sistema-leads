<?php

Route::get('customfieldtype/{id}', 'CustomFieldController@customFieldType');

Route::group(['middleware' => ['auth:admin,web']], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::get('/home', 'HomeController@index');
});

//User Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::resource('lead', 'LeadController')->except(['index', 'show']);
    Route::resource('customfield', 'CustomFieldController')->except(['create', 'edit', 'show']);
    Route::put('customfieldvalue', 'CustomFieldValueController@update')->name('customfieldvalue.update');
});

Route::group(['middleware' => 'auth:web,admin'], function () {
    //User Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    Route::resource('lead', 'LeadController')->except(['create', 'store', 'edit', 'update', 'destroy', 'show']);
    Route::get('clients', 'LeadController@clients')->name('clients');
    
    Route::resource('lead/interest', 'LeadInterestController')->except(['index', 'create', 'store']);
    Route::get('lead/interest/{id}/create', 'LeadInterestController@create')->name('interest.create');       
    Route::post('lead/interest/{id}', 'LeadInterestController@store')->name('interest.store');    
    
    Route::resource('client/consumed', 'ClientInterestController')->except(['index', 'create', 'store']);
    Route::get('client/consumed/{id}/create', 'ClientInterestController@create')->name('consumed.create');    
    Route::post('client/consumed/{id}', 'ClientInterestController@store')->name('consumed.store');   

    Route::resource('interests', 'InterestController')->except(['create', 'show', 'edit']);
});

Route::group(['middleware' => ['guest']], function () {
    // User Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.form');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
});

Route::group(['prefix' => 'admin'], function () {
    // Admin Login Routes...
    Route::get('login', 'AdminAuth\LoginController@index')->name('admin.login');
    Route::post('login', 'AdminAuth\LoginController@login');
    Route::get('logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        // Admin Registration Routes...
        Route::get('register', 'AdminAuth\RegisterController@index')->name('admin.register');
        Route::post('register', 'AdminAuth\RegisterController@register');
        
        Route::get('users', 'TableController@users');
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        
        //Import Leads Routes...
        Route::get('import', 'ImportController@import')->name('import');
        Route::post('import', 'ImportController@importCSV')->name('importParser');
    });

    Route::group(['middleware' => 'guest:admin'], function () {
        Route::group(['guard' => 'admin'], function () {
            // Admin Password Reset Routes...
            Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
            Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
            Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.form');
            Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.reset');
        });
    });
});