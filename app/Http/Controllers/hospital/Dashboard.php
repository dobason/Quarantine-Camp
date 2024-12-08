<?php

namespace App\Http\Controllers\hospital;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Testing;

class Dashboard extends Controller
{
  public function index()
  {
    // Select * from patient
    $patients = Patient::all();

    // Select * from employee
    $employees = Employee::all();

    // Select * from testing
    $testings = Testing::all();

    return view('content.hospital-content.dashboard', compact(['patients', 'employees', 'testings']));

  }
}
