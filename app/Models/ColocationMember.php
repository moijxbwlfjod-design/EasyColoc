<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColocationMember extends Model
{
    /** @use HasFactory<\Database\Factories\ColocationMemberFactory> */
    use HasFactory;

    protected $fillable = [
        'colocation_id',
        'member_id'
    ];

    public function colocation(){
        return $this->belongsToMany(Colocation::class);
    }

    public function member(){
        return $this->belongsToMany(User::class, 'id', 'users');
    }
}
