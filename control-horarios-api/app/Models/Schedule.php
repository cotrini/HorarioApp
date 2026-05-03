<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'user_id',
        'entry_time',
        'lunch_time',
        'lunch_end',
        'exit_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
