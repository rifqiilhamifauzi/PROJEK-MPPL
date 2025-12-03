<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'registered_at',
        'status',
    ];

    // Registrasi dimiliki oleh user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Registrasi juga dimiliki oleh event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
