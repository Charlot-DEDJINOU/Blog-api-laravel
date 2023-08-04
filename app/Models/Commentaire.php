<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = [
        'article_id' , 'content'
    ];

     // Relation avec l'article
     public function article()
     {
         return $this->belongsTo(Article::class);
     }
}
