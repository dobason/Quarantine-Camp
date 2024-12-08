<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  protected $table = 'patient';
  public $timestamps = false; // Disable timestamps

  protected $primaryKey = 'Patient_ID'; // Set custom primary key if necessary
  public $incrementing = false; // if the ID is not auto-incrementing
  protected $keyType = 'int'; // or 'int', depending on your Patient_ID type

  protected $fillable = [
    'Patient_ID',      // Add this field
    'Full_Name',
    'Identity_Number',
    'Phone',
    'Address',
    'Gender',
  ];

  use HasFactory;

  // Define the relationship to Testing
  public function testings()
  {
    return $this->hasMany(Testing::class, 'Patient_ID', 'Patient_ID');
  }

  // Define the relationship to Comorbidity
  public function comorbidities()
  {
      return $this->belongsToMany(Comorbidity::class, 'patient_comorbidity', 'Patient_ID', 'Comorbidity_ID', 'Patient_ID', 'Comorbidity_ID');
  }

  public function symptoms()
  {
      return $this->belongsToMany(Symptom::class, 'patient_symptom', 'Patient_ID', 'Symptom_ID', 'Patient_ID', 'Symptom_ID');
  }
}
