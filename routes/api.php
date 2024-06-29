<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IdeaController;
use App\Http\Controllers\Api\UserController;


Route::post('/user/create', [UserController::class, 'create']);

Route::apiResource('ideas', IdeaController::class);
