<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model {
    protected $fillable = [
        'event',
        'start',
        'end',
        'user_id'
    ];

    // Relasi dengan user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
