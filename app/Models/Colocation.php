<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    /** @use HasFactory<\Database\Factories\ColocationFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'slug',
        'house_id',
        'owner_id',
        'status'
    ];

    public function owner(){
        return $this->BelongsTo(User::class, 'id');
    }

    public function members(){
        return $this->hasMany(ColocationMember::class);
    }
}
