<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensePayer extends Model
{
    /** @use HasFactory<\Database\Factories\ExpensePayerFactory> */
    use HasFactory;

    protected $fillablbe = [
        'expense_id',
        'payer_id',
        'mount_to_pay',
        'status'
    ];

    public function expenses(){
        return $this->belongsToMany(Expense::class);
    }

    public function payers(){
        return $this->belongsToMany(User::class, 'id');
    }
}
