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
        'location',
        'slug',
        'owner_id',
        'status'
    ];

    public function owner(){
        return $this->BelongsTo(User::class, 'id');
    }

    public function members(){
        return $this->belongsToMany(User::class, 'colocation_members')->withPivot('colocation_role_id', 'lefted_at')->withTimestamps();
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
