<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
    protected $table = 'testing';
    protected $primaryKey = 'Test_ID';
    public $incrementing = false; // if the ID is not auto-incrementing
    protected $keyType = 'int'; // or 'int', depending on your Patient_ID type
    public $timestamps = false; // Disable timestamps

    protected $fillable = [
      'Test_ID',
      'Patient_ID',
      'Test_Type',
      'Result',
      'CT_Value',
      'SP02',
      'Respiratory_Rate',
      'Warning',
    ];

    use HasFactory;

    // Define the relationship to Patient
    public function patient()
    {
      return $this->belongsTo(Patient::class, 'Patient_ID', 'Patient_ID');
    }
}
