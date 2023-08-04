<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'title' => 'string' ,
            'content' => 'text'
        ]) ;

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $article = Article::create($data) ;

        if($article)
            return response()->json(['message' => "Article crée avec succes"],200) ;
        else
            return response()->json(['message' => 'Erreur lors de la création de produit'],300) ;
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'id' => 'required',
            'title' => 'string' ,
            'content' => 'text'
        ]) ;

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $id = $request->input('id');
        $article = Article::find($id);

        if(!$article)
            return response()->json(['message' => "Cet article n'exite pas"] , 200) ;

        $data = $request->all();

        if($article->update($data))
            return response()->json(['message' => 'Mise à jour efectué avec suces'] , 200);
        else
            return response()->json(['message' => 'Erreur lors du mise à jour'] , 300);
    }

    public function getArticle(Request $request)
    {
       $id = $request->query('id') ;
       if(isset($id))
        {
            $article = Article::find($id);
            if(!$article)
                return response()->json(['message' => "Cet article n'exite pas"] , 200) ;
    
            return response()->json($article,200) ;
        }
        else
            return response()->json(['message' => 'Pas assez de donnée'],422);
    }

    public function getArticles()
    {
        return response()->json(Article::all(),200);
    }

    public function destroy(Article $article)
    {
        if($article->delete())
            return response()->json(['message' => 'Article supprimer avec succes'] , 200);
        else
            return response()->json(['message' => 'Erreur de la suppression'] , 422);
    }
}
