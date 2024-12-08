@extends('layouts/contentNavbarLayout')

@section('title', 'Search Patients')

@section('content')
<!-- Basic Bootstrap Table -->
<div class="card">
<div class="d-flex my-4">
  <a href="/dashboard">
    <button type="button" class="btn btn-secondary ms-2">Back to Dashboard</button>
  </a>
  <a href="/search-patients">
    <button type="button" class="btn btn-primary ms-2">Reload List</button>
  </a>
</div>
{{--  Bảng danh sách bệnh nhân....--}}
  <h5 class="card-header">Patient List</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Patient ID</th>
          <th>Full Name</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Symptom</th>
          <th>Comorbidities</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($patients as $patient)
        <tr>
          <td>{{ $patient->Patient_ID }}</td>
          <td>{{ $patient->Full_Name }}</td>
          <td>{{ $patient->Gender }}</td>
          <td>{{ $patient->Address }}</td>
          <td>{{ $patient->Phone }}</td>
          <td>{{ $patient->Symptoms }}</td>
          <td>{{ $patient->Comorbidities }}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="/testings?patient_id={{ $patient->Patient_ID }}"><i class="ri-eye-line me-1"></i>View Testings of Patient</a>
              <a class="dropdown-item" href="/report?patient_id={{ $patient->Patient_ID }}"><i class="ri-file-chart-line me-1"></i>View Detail of Patient</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
