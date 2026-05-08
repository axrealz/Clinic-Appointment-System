<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'total_patients',
        'total_appointments',
        'pending',
        'approved',
        'cancelled',
    ];
}