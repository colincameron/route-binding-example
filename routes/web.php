<?php

use App\Http\Controllers\PersonController;
use App\Models\Organisation;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\Route;

Route::domain(config('app.url'))->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::domain('{subdomain}.' . config('app.url'))->group(function() {
    Route::get('/', function() {
        $organisation = Organisation::findOrFail(Context::get('organisation'));
        return $organisation->name;
    });

    Route::resource('people', PersonController::class);
});
