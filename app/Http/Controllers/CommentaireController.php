<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'article_id' => 'required|integer',
            'content' => "string"
        ]);

        if($validator->fails())
            return response()->json(['errors' => $validator->errors()] , 422);

        $commentaire = Commentaire::create($request->all());

        if($commentaire)
            return response()->json(['message' => 'commentaire ajouté avec succes'],200) ;
        
        return response()->json(['message' => 'Erreur lors de l\'ajout'],200) ;
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'article_id' => 'required|integer',
            'content' => "string"
        ]);

        if($validator->fails())
            return response()->json(['errors' => $validator->errors()] , 422);

        $commentaire = Commentaire::find($request->input('id'));

        if(!$commentaire)
            return response()->json(['message' => "Commentaire n\'existe"],200);
        
        if($commentaire->update($request->all()))
            return response()->json(['message' => "Mise à jour reussir"],200);

        return response()->json(['message' => "Erreur lors de la mise à jour reussir"],200);
    }

    public function destroy(Commentaire $commentaire)
    {
        if(!$commentaire)
            return response()->json(['message' => "Commentaire n\'existe"],200);

        if($commentaire->delete())
            return response()->json(['message' => "Commentaire supprimer avec succes"],200);

        return response()->json(['message' => "Erreur lors de la suppression"],200);
    }

    public function getCommentaire($id)
    {
        $commentaire = Commentaire::find($id);

        if(!$commentaire)
            return response()->json(['message' => "Ce commentaire n'existe pas"],200);
        
        return response()->json($commentaire,200);
    }

    public function getCommentaires($article_id)
    {
        $commentaires = Commentaire::where('article_id',$article_id)->get() ;

        return response()->json($commentaires,200);
    }
}
