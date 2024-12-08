<?php

namespace App\Http\Controllers\hospital;

use App\Http\Controllers\Controller;
use App\Models\Patient as Patient;
use App\Models\Testing as TestingModel;
use Illuminate\Http\Request;

class Report extends Controller
{
  public function index(Request $request)
  {
    $patient_id = $request->input('patient_id'); // Get search input from request

    $testings = TestingModel::where('Patient_ID', $patient_id)->get();

    // Find the patient using the Patient_ID
    $patient = Patient::where('Patient_ID', $patient_id)->first();

    return view('content.hospital-content.report', compact('testings', 'patient'));

  }
}
