<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    /** @use HasFactory<\Database\Factories\HouseFactory> */
    use HasFactory;

    protected $fillable = [
        'location',
        'description'
    ];

    public function colocations(){
        return $this->hasMany(Colocation::class);
    }
}
