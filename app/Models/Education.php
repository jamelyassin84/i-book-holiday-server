<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'highest_level',
        'school',
        'date_completed',
    ];

    protected $casts = [
        'date_completed' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
