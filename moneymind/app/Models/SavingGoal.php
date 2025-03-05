<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingGoal extends Model
{

    protected $fillable = [
        'target_amount',
        'current_amount',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
