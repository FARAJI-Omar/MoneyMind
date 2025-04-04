<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
        'salary',
        'credit_day',
        'role',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function recurringExpenses()
    {
        return $this->hasMany(RecurringExpense::class);
    }

    public function wishListItems()
    {
        return $this->hasMany(WishListItem::class);
    }

    public function savingGoal()
    {
        return $this->hasOne(SavingGoal::class);
    }







    public static function createWithRole(array $data)
    {
        // Check if the users table is empty
        $role = DB::table('users')->count() === 0 ? 'admin' : 'user';

        // Add the role to the data array
        $data['role'] = $role;

        // Create and return the new user
        return self::create($data);
    }
}
