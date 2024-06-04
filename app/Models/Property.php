<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperProperty
 */
class Property extends Model
{
    use HasFactory;

    public $table = "properties";

    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal_code',
        'sold',
    ];

    public function options(): BelongsToMany{
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(){
        return Str::slug($this->title);
    }
}
