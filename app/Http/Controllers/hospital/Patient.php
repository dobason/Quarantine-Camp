<?php

namespace App\Http\Controllers\hospital;

use App\Http\Controllers\Controller;
use App\Models\Comorbidity;
use App\Models\Patient as PatientModel;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class Patient extends Controller
{
  public function index(Request $request)
  {
    $query = $request->input('query'); // Get search input from request

    $patients = PatientModel::query()
    ->select(
        'patient.Patient_ID',
        'patient.Full_Name',
        'patient.Gender',
        'patient.Address',
        'patient.Phone',
        DB::raw('GROUP_CONCAT(DISTINCT symptom.Symptom_Name SEPARATOR ", ") as Symptoms'),
        DB::raw('GROUP_CONCAT(DISTINCT comorbidity.Description SEPARATOR ", ") as Comorbidities')
    )
    ->leftJoin('patient_symptom', 'patient.Patient_ID', '=', 'patient_symptom.Patient_ID')
    ->leftJoin('symptom', 'patient_symptom.Symptom_ID', '=', 'symptom.Symptom_ID')
    ->leftJoin('patient_comorbidity', 'patient.Patient_ID', '=', 'patient_comorbidity.Patient_ID')
    ->leftJoin('comorbidity', 'patient_comorbidity.Comorbidity_ID', '=', 'comorbidity.Comorbidity_ID')
    ->where(function ($queryBuilder) use ($query) {
        $queryBuilder->where('patient.Patient_ID', 'LIKE', "%{$query}%")
                     ->orWhere('patient.Full_Name', 'LIKE', "%{$query}%")
                     ->orWhere('patient.Phone', 'LIKE', "%{$query}%");
    })
    ->groupBy(
        'patient.Patient_ID',
        'patient.Full_Name',
        'patient.Gender',
        'patient.Address',
        'patient.Phone'
    )
    ->get();

    return view('content.hospital-content.search-patients', compact('patients'));

  }

  public function create()
  {
    $comorbidities = Comorbidity::all(); // Fetch all comorbidities
    $symptoms = Symptom::all();         // Fetch all symptoms

    return view('content.hospital-content.create-patient', compact('comorbidities', 'symptoms'));
  }

  public function store(Request $request)
  {
    try {
      $validatedData = $request->validate([
          'Full_Name' => 'nullable|string|max:255',
          'Identity_Number' => 'nullable',
          'Phone' => 'nullable|string|max:20',
          'Address' => 'nullable|string|max:255',
          'Gender' => 'required',
          'Comorbidity_ID' => 'nullable|array',
          'Symptom_ID' => 'nullable|array',
      ]);
    } catch (ValidationException $e) {
      return redirect()->route('create-patient')->with('error', 'Patient created failed!');
    }

    try {
        // Get the latest Patient_ID and auto increment it by 1
        $latestPatientId = PatientModel::max('Patient_ID');
        $newPatientId = $latestPatientId + 1;

        $patient = PatientModel::create([
            'Patient_ID' => $newPatientId,
            'Full_Name' => $validatedData['Full_Name'] ?? null,
            'Identity_Number' => $validatedData['Identity_Number'] ?? null,
            'Phone' => $validatedData['Phone'] ?? null,
            'Address' => $validatedData['Address'] ?? null,
            'Gender' => $validatedData['Gender'],
        ]);

          // Attach comorbidities
          if (!empty($validatedData['Comorbidity_ID'])) {
            $patient->comorbidities()->sync($validatedData['Comorbidity_ID']);
        }

        // Attach symptoms
        if (!empty($validatedData['Symptom_ID'])) {
            $patient->symptoms()->sync($validatedData['Symptom_ID']);
        }
        return redirect()->route('report', ['patient_id' => $patient->Patient_ID]);
    } catch (ValidationException $e) {
        return redirect()->route('create-patient')->with('error', 'Patient created failed!');
    }
  }
}
