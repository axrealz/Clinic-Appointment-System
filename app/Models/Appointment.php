<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Appointment extends Model
{
    protected $fillable = [
        'patient_name',
        'email',
        'date',
        'start_time',
        'end_time',
        'status',
        'doctor_id', 
        'gender',
        'contact',
        'address',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
    return $this->belongsTo(\App\Models\Patient::class);
    }
}