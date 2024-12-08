<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comorbidity extends Model
{
    protected $table = 'comorbidity';
    use HasFactory;

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient_comorbidity', 'Comorbidity_ID', 'Patient_ID', 'Comorbidity_ID', 'Patient_ID');
    }
}
