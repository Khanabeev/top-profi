<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $m = \App\Models\Master::first();
    foreach($m->reviews as $review) {
        dd($review->rating);
    }
    dd($m->services, $m->photos, $m->reviews);

    return json_encode(['Hello']);
});
