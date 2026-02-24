<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColocationRole extends Model
{
    /** @use HasFactory<\Database\Factories\ColocationRoleFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->HasMany(User::class);
    }
}
