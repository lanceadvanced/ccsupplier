<?php

use App\Http\Controllers\RequestController;
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
    return view('request');
})->name('home');

Route::post('/request/example', [RequestController::class, 'sendExampleRequest'])->name('sendExampleRequest');

Route::get('/response/example', function () {
    return Session::get('onlyResponseData') ?
        view('exampleResponseData')->with([
            'response' => Session::get('exampleResponse')
        ])
        :
        view('exampleResponse')->with([
            'response' => Session::get('exampleResponse')
        ]);
})->name('exampleResponse');


