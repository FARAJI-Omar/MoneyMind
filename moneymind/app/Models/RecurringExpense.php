<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecurringExpense extends Model
{
    protected $fillable = [
        'name',
        'price',
        'due_date',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    // Relationship with Expense
    public function recurringExpenses()
    {
        return $this->hasMany(RecurringExpense::class);
    }

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }
}
