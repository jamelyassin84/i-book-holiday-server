<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company',
        'date_started',
        'industry',
        'industry_others_specified',
    ];

    protected $casts = [
        'date_started' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
