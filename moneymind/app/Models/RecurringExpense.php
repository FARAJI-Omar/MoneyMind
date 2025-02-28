<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecurringExpense extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'price',
        'due_date',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with ExpenseCategory
    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }
}
