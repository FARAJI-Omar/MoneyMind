<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $fillable = ['name'];

    // Relationship with Expense
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    
    public function recurringExpenses()
    {
        return $this->hasMany(RecurringExpense::class);
    }
}
