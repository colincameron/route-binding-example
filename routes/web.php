<?php

use App\Http\Controllers\PersonController;
use App\Models\Organisation;
use App\Models\Person;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\Route;

Route::get('working/{extraparameter}/people/{person}', function(string $extraparameter, Person $person) {
    return $person->name;
});

Route::get('/fails/{extraparameter}/people/{person}', function(Person $person) {
    return $person->name;
});

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
