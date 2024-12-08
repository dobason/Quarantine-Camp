<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $table = 'symptom';
    use HasFactory;

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient_symptom', 'Symptom_ID', 'Patient_ID', 'Symptom_ID', 'Patient_ID');
    }
}
