<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'mount',
        'category_id',
        'colocation_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function colocation(){
        return $this->belongsTo(Colocation::class);
    }
}
