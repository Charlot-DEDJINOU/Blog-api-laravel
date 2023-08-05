<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;

Route::delete('/article/{article}', [ArticleController::class , 'destroy']);
Route::post('/article' , [ArticleController::class , 'create']) ;
Route::get('/article/{id}' , [ArticleController::class , 'getArticle']);
Route::get('/articles' , [ArticleController::class , 'getArticles']);
Route::put('/article' , [ArticleController::class , 'update']);

Route::delete('/commentaire/{commentaire}', [CommentaireController::class , 'destroy']);
Route::post('/commentaire' , [CommentaireController::class , 'create']) ;
Route::get('/commentaire/{id}' , [CommentaireController::class , 'getcommentaire']);
Route::get('/commentaires' , [CommentaireController::class , 'getcommentaires']);
Route::put('/commentaire' , [CommentaireController::class , 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
