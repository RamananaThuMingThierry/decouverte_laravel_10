<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'image_path'];

    public function properties()
    {
        return $this->belongsTo(Property::class);
    }
}
