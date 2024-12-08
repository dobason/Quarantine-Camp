<?php

namespace App\Http\Controllers\hospital;

use App\Http\Controllers\Controller;
use App\Models\Testing as TestingModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Testing extends Controller
{
  public function index(Request $request)
  {
    $patient_id = $request->input('patient_id'); // Get search input from request

    $testings = TestingModel::where('Patient_ID', $patient_id)->get();

    return view('content.hospital-content.testings', compact('testings'));
  }

  public function store(Request $request)
  {
    try {
      $validatedData = $request->validate([
          'Patient_ID' => 'required',
          'Test_Type' => 'nullable',
          'Result' => 'nullable',
          'CT_Value' => 'nullable',
          'SPO2' => 'nullable',
          'Respiratory_Rate' => 'nullable',
          'Warning' => 'nullable',
      ]);
    } catch (ValidationException $e) {
      return redirect()->route('create-patient')->with('error', 'Patient created failed!');
    }

    try {
        // Get the latest Test_ID and auto increment it by 1
        $latestTestId = TestingModel::max('Test_ID');
        $newTestId = $latestTestId + 1;

        TestingModel::create([
            'Test_ID' => $newTestId,
            'Patient_ID' => $validatedData['Patient_ID'],
            'Test_Type' => $validatedData['Test_Type'] ?? null,
            'Result' => $validatedData['Result'] ?? null,
            'CT_Value' => $validatedData['CT_Value'] ?? null,
            'SPO2' => $validatedData['SPO2'] ?? null,
            'Respiratory_Rate' => $validatedData['Respiratory_Rate'] ?? null,
            'Warning' =>  (bool) $validatedData['Warning'] ?? false,
        ]);

        return redirect()->route('report', ['patient_id' => $validatedData['Patient_ID']]);
    } catch (ValidationException $e) {
      return redirect()->route('report', ['patient_id' => $validatedData['Patient_ID']]);
    }
  }
}
