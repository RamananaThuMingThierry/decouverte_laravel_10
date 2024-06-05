<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperProperty
 */
class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        'sold'
    ];

    protected $casts = [
        'created_at' => 'string',
        'sold' => 'boolean'
    ];

    public function options(): BelongsToMany{
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(){
        return Str::slug($this->title);
    }

    public function images()
    {
        return $this->hasMany(Picture::class);
    }

    public function scopeAvailable(Builder $builder, bool $available = true): Builder{
        return $builder->where('sold', !$available);
    }

    public function scopeRecent(Builder $builder): Builder{
        return $builder->orderBy('created_at', 'desc');
    }
}
