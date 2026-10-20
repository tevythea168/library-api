<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookTypeController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BookAuthorController;

Route::apiResource('authors', AuthorController::class);
Route::apiResource('book-types', BookTypeController::class);
Route::apiResource('books', BookController::class);
Route::apiResource('book-authors', BookAuthorController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
