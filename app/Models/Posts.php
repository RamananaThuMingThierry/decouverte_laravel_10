<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPosts
 */
class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'titre',
        'slug',
        'contenu',
        'categories_id'
    ];

    public function categorie(){
        return $this->belongsTo(Categories::class, 'categories_id');
    }
}
