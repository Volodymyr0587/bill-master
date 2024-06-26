<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electricity extends Model
{
    use HasFactory;

    protected $fillable = ['kwatts', 'price', 'payment_date', 'is_paid'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    protected $casts = [
        'payment_date' => 'datetime',
    ];
}
