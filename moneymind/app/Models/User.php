<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'salary',
        'credit_date',
    ];
    


    // relationship with Expense model
    public function expense(){
        return $this->hasMany(Expense::class);
    }

    // relationship with recurringExpense model
    public function recurringExpense(){
        return $this->hasMany(RecurringExpense::class);
    }

    // relationship with savingsGoal model
    public function savingGoal(){
        return $this->hasMany(SavingsGoal::class);
    }

    // relationship with wishListItem model
    public function wishListItem(){
        return $this->hasMany(WishListItem::class);
    }

    // relationship with notification model
    public function notification(){
        return $this->hasMany(Notification::class);
    }

    // relationship of user(admin) with expenseCategory model
    public function expenseCategory(){
        return $this->hasMany(ExpenseCategory::class);
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
