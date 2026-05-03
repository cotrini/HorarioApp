<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkSummary extends Model
{
    protected $fillable = [
        'user_id',
        'work_date',
        'total_minutes_worked',
        'total_minutes_extra',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
