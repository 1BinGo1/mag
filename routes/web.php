<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth', [\App\Http\Controllers\Yandex\CounterController::class, 'auth']);
Route::get('/get_oauth_key', [\App\Http\Controllers\Yandex\CounterController::class, 'getAuth']);

Route::prefix('yandex_metrica')->group(function () {
    Route::get('/get_counters', [\App\Http\Controllers\Yandex\CounterController::class, 'getCounters']);
    Route::get('/get_counters_info', [\App\Http\Controllers\Yandex\CounterController::class, 'getCountersInfo']);
    Route::get('/get_browsers_info', [\App\Http\Controllers\Yandex\CounterController::class, 'getBrowsersInfo']);
});

Route::prefix('google_page_speed')->group(function () {
    Route::get('/run_page_speed', [\App\Http\Controllers\Google\PageSpeedController::class, 'runPageSpeed']);
});



