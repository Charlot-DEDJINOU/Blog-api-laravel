<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

Route::delete('/article/{article}', [ArticleController::class , 'destroy']);
Route::post('/article' , [ArticleController::class , 'create']) ;
Route::get('/article' , [ArticleController::class , 'getArticle']);
Route::get('/articles' , [ArticleController::class , 'getArticles']);
Route::put('/article' , [ArticleController::class , 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
