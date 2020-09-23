<?php

Route::group(['namespace' => 'Shopadmin'], function() {
    Route::get('/', 'HomeController@index')->name('shopadmin.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('shopadmin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('shopadmin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('shopadmin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('shopadmin.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('shopadmin.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('shopadmin.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('shopadmin.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('shopadmin.verification.notice');
    Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->name('shopadmin.verification.verify');
});