<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return redirect()->to('/game/session');
});

Route::get('/game/session', [GameController::class, 'index']);

Route::post('/game/session', [GameController::class, 'spin']);