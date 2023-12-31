<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electricity extends Model
{
    use HasFactory;

    protected $fillable = ['kwatts', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
