<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'status',
        'description',
    ];

    // Presensi dimiliki oleh user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Presensi dimiliki oleh event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
