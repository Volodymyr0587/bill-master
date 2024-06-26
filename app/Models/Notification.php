<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'message',
        'type',
        'notifiable_id',
        'notifiable_type',
    ];

    public function notifiable()
    {
        return $this->morphTo();
    }
}
